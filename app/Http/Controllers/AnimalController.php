<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public function display()
    {
        $animal_list = Animal::query()
            ->orderBy("name", "ASC")
            ->limit(30)
            ->leftJoin('images', 'animals.image_id', '=', 'images.id')
            // ->owner()
            ->get();

        return view("animal.list", compact("animal_list"));
    }

    public function search(Request $request)
    {
        $search_query = $request->input('search-animal');
        $search_animal = Animal::where('name', 'like', '%' . $search_query . '%')
            // ->orWhere('breed', 'like', '%' . $search_query . '%')
            ->limit(30)
            ->leftJoin('owners', 'animals.owner_id', '=', 'owners.id')
            ->get();

        if (count($search_animal) < 1) {
            $messageAnimal = 'Animal not found. 🐶';
            return view('home', compact('messageAnimal'));
        } else {
            return view('home', compact('search_animal'));
        }

    }

    public function getDetail($id)
    {
        $animal_detail = Animal::findOrFail($id);
        return view('animal.details', compact('animal_detail'));
    }
}
