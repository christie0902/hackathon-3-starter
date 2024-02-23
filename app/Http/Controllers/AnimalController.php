<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public function display()
    {
        $animal_list = Animal::get()
            ->orderBy("name", "ASC");

        return view("animal.list", compact("animal_list"));
    }

}
