<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OwnerController extends Controller
{
    public function display()
    {
        $owner_list = Owner::get()
            ->orderBy("name", "ASC");

        return view("owner.list", compact("owner_list"));
    }
}
