<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visit;
use App\Models\Owner;
use App\Models\Animal;

class VisitController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'pet_name' => 'required',
            'visit_day’ => ‘required',
            'comment' => 'required'
        ], [
            'name.required' => 'Please enter owner name!',
            'pet_name.required' => 'Please enter pet name!',
            'comment.required' => 'Please enter some comments'
        ]);
        $data = $request->all();
        $owner = Owner::where('first_name', $data['name'])->firstOrFail();
        $pet = Animal::where('name', $data['pet_name'])->firstOrFail();
        $owner_id = $owner->id;
        $pet_id = $pet->id;
        $new_visit = new Visit();
        $new_visit->owner_id = $owner_id;
        $new_visit->animal_id = $pet_id;
        $new_visit->visit_day = $data['visit_day'];
        $new_visit->record = $data['comment'];
        $new_visit->save();
        session()->flash('success_message', 'Record has been saved!');
        return redirect()->back();
    }









}
