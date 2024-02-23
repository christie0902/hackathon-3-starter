<?php

namespace App\Http\Controllers;

use App\Models\Owner;

use Illuminate\Http\Request;

class OwnerController extends Controller
{
    public function display()
    {
        $owner_list = Owner::query()
            ->orderBy('first_name', 'asc')
            ->limit(30)
            ->get();

        return view("owner.list", compact("owner_list"));
    }

    public function search(Request $request)
    {
        $search_query = $request->input('search-owner');
        $search_owner = Owner::where('first_name', 'like', '%' . $search_query . '%')
            ->orWhere('surname', 'like', '%' . $search_query . '%')
            ->limit(20)
            ->get();
            // dd($search_owner);
        if (count($search_owner)<1) {
            $messageOwner = 'Owner not found. 👤';
            // dd($message);
            return view('home', compact('messageOwner'));
        } else {
            return view('home', compact('search_owner'));
        }

    }

    public function getDetail($id)
    {
        $owner_detail = Owner::findOrFail($id);
        return view('owner.details', compact('owner_detail'));
    }
}
