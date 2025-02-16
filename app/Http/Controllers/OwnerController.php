<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use App\Models\Animal;

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

    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'surname' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'pet_name' => 'required'
        ], [
            'first_name.required' => 'Please enter your first name!',
            'surname.required' => 'Please enter your surname!',
            'email.required' => 'Please enter your email!',
            'email.email' => 'Please enter a valid email address!',
            'phone.required' => 'Please enter your phone number!',
            'phone.numeric' => 'Phone number must be numeric!',
            'pet_name.required' => 'Please enter your pet name!'
        ]);

        $data = $request->all();

        // Create a new owner
        $new_owner = new Owner();
        $new_owner->first_name = $data['first_name'];
        $new_owner->surname = $data['surname'];
        $new_owner->email = $data['email'];
        $new_owner->phone = $data['phone'];
        $new_owner->save();

        // Create a new animal associated with the owner
        $new_animal = new Animal();
        $new_animal->name = $data['pet_name'];
        $new_owner->animal()->save($new_animal);


        session()->flash('success_message', 'Owner has been added!');

        return redirect()->back();
    }

    public function edit($id)
    {
        $owner = Owner::findOrFail($id);
        return view('owner.edit', compact('owner'));
    }

    public function update(Request $request, $id)
    {
        $owner = Owner::findOrFail($id);

        $this->validate($request, [
            'first_name' => 'required',
            'surname' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'pet_name' => 'required'
        ], [
            'first_name.required' => 'Please enter your first name!',
            'surname.required' => 'Please enter your surname!',
            'email.required' => 'Please enter your email!',
            'email.email' => 'Please enter a valid email address!',
            'phone.required' => 'Please enter your phone number!',
            'phone.numeric' => 'Phone number must be numeric!',
            'pet_name.required' => 'Please enter your pet name!'
        ]);

        $owner->first_name = $request->input('first_name');
        $owner->surname = $request->input('surname');
        $owner->email = $request->input('email');
        $owner->phone = $request->input('phone');
        $owner->save();

        $petName = $request->input('pet_name');
        $animal = $owner->animal()->where('name', $petName)->first();

        if ($animal) {
            $animal->update([
                'name' => $petName
            ]);
        } else {
            $owner->animal()->create([
                'name' => $petName
            ]);
        }

        return redirect()->route('owner.display');
    }

    public function destroy($id) {
        $owner = Owner::findOrFail($id);
        $owner->delete();

        return redirect()->route('owner.display');
    }

}
