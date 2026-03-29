<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cats = Cat::all();
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
    public function store(Request $request)
    {
        $data = $request->all();

        $newCat = new Cat();
        $newCat->name = $data['name'];
        $newCat->slug = $data['slug'];
        $newCat->sex = $data['sex'];
        $newCat->date_of_birth = $data['date_of_birth'];
        $newCat->coat = $data['coat'];
        $newCat->info = $data['info'];
        $newCat->adottato = $request->has('adottato');
        $newCat->prenotato = $request->has('prenotato');
        if (array_key_exists("image", $data)) {
            $img_url = Storage::putFile("cats", $data["image"]);
            $newCat->image = $img_url;
        }
        $newCat->save();

        return redirect()->route("cats.show", $newCat);
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
    public function update(Request $request, Cat $cat)
    {
        $data = $request->all();

        $cat->name = $data['name'];
        $cat->slug = $data['slug'];
        $cat->sex = $data['sex'];
        $cat->date_of_birth = $data['date_of_birth'];
        $cat->coat = $data['coat'];
        $cat->info = $data['info'];
        $cat->adottato = $request->has('adottato');
        $cat->prenotato = $request->has('prenotato');
        if (array_key_exists("image", $data)) {
            Storage::delete($cat->image);
            $img_url = Storage::putFile("cats", $data["image"]);
            $cat->image = $img_url;
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
