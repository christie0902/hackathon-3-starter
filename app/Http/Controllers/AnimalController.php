<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public function display()
    {
        $animal_list = Animal::get()
            ->orderBy("name", "ASC");

        return view("animal.list", compact("animal_list"));
    }

    public function search(Request $request)
    {
        $search_query = $request->input('search-animal');
        $search_result = Animal::where('name', 'like', '%' . $search_query . '%')
            ->orWhere('breed', 'like', '%' . $search_query . '%')
            ->limit(20)
            ->get();

        return view('animal.search', compact('search_result'));
    }
}
