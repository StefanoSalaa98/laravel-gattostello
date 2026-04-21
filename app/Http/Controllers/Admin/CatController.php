<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCatRequest;
use App\Http\Requests\UpdateCatRequest;
use App\Models\Cat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class CatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $cats = Cat::query()
            // Eseguo la funzione solo se search è presente e non vuoto nella request”
            ->when(
                $request->filled('search'),
                function ($query) use ($request) {
                    $query->where('name', 'like', '%' . trim($request->search) . '%');
                }
            )
            // eseguo il controllo sul campo adottato se presente
            ->when($request->filled('adottato'), function ($query) use ($request) {
                $query->where('adottato', $request->adottato);
            })
            // eseguo il controllo sul campo prenotato se presente
            ->when($request->filled('prenotato'), function ($query) use ($request) {
                $query->where('prenotato', $request->prenotato);
            })
            ->orderBy('name')
            ->paginate(20)
            ->withQueryString();

        return view("cats.index", compact("cats"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("cats.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCatRequest $request)
    {
        $data = $request->validated();

        $newCat = new Cat();
        $newCat->name = $data['name'];
        $newCat->sex = $data['sex'];
        $newCat->date_of_birth = $data['date_of_birth'];
        $newCat->coat = $data['coat'];
        $newCat->info = $data['info'];
        // $newCat->adottato = (bool) $data['adottato'];
        // $newCat->prenotato = (bool) $data['prenotato'];
        $newCat->adottato = $request->boolean('adottato');
        $newCat->prenotato = $request->boolean('prenotato');
        // if ($request->hasFile('image')) {
        //     $img_url = Storage::putFile("cats", $request->file("image"));
        //     $newCat->image = $img_url;
        // }
        if ($request->hasFile('image')) {

            try {
                $file = $request->file('image');

                if (!$file) {
                    return response()->json(['error' => 'No file uploaded'], 400);
                }

                $uploadedFile = Cloudinary::upload(
                    $file->getRealPath(),
                    ['folder' => 'cats']
                );

                $newCat->image = $uploadedFile->getSecurePath();

            } catch (\Exception $e) {
                return response()->json([
                    'error' => $e->getMessage()
                ], 500);
            }
        }
        $newCat->save();

        // return redirect()->route("cats.show", $newCat);

        return response()->json([
            'all' => $request->all(),
            'file' => $request->file('image')
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Cat $cat)
    {
        return view("cats.show", compact("cat"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cat $cat)
    {
        return view("cats.edit", compact("cat"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCatRequest $request, Cat $cat)
    {

        $data = $request->validated();

        $cat->name = $data['name'];
        $cat->sex = $data['sex'];
        $cat->date_of_birth = $data['date_of_birth'];
        $cat->coat = $data['coat'];
        $cat->info = $data['info'];
        $cat->prenotato = (bool) $request->prenotato;
        $cat->adottato = (bool) $request->adottato;
        // if ($request->hasFile('image')) {
        //     Storage::delete($cat->image);
        //     $img_url = Storage::putFile("cats", $data["image"]);
        //     $cat->image = $img_url;
        // }
        if ($request->hasFile('image')) {

            // cancello vecchia immagine Cloudinary
            if ($cat->image) {
                $publicId = pathinfo($cat->image, PATHINFO_FILENAME);
                Cloudinary::destroy('cats/' . $publicId);
            }

            $uploadedFile = Cloudinary::upload(
                $request->file('image')->getRealPath(),
                [
                    'folder' => 'cats',
                    // img + leggere x risparmio crediti
                    'transformation' => [
                        'width' => 500,
                        'crop' => 'scale'
                    ]
                ]
            );

            $imageUrl = $uploadedFile->getSecurePath();

            $cat->image = $imageUrl;
        }

        $cat->update();

        return redirect()->route("cats.show", $cat);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cat $cat)
    {
        Storage::delete($cat->image);
        $cat->delete();
        return redirect()->route("cats.index");
    }
}
