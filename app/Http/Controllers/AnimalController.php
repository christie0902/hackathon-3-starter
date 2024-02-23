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
            ->get();

        return view("animal.list", compact("animal_list"));
    }

}
