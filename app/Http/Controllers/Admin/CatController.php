<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCatRequest;
use App\Http\Requests\UpdateCatRequest;
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
    public function store(StoreCatRequest $request)
    {
        $data = $request->validated();

        $newCat = new Cat();
        $newCat->name = $data['name'];
        $newCat->sex = $data['sex'];
        $newCat->date_of_birth = $data['date_of_birth'];
        $newCat->coat = $data['coat'];
        $newCat->info = $data['info'];
        $newCat->adottato = (bool) $data['adottato'];
        $newCat->prenotato = (bool) $data['prenotato'];
        if ($request->hasFile('image')) {
            $img_url = Storage::putFile("cats", $request->file("image"));
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
        if ($request->hasFile('image')) {
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
