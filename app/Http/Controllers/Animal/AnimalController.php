<?php

namespace App\Http\Controllers\Animal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Animal;
use App\Models\Area;

class AnimalController extends Controller
{
    public function getIndex(Request $request)
    {
    	$q = $request->input('search');
    	$animals = Animal::query()
    		->where('name','LIKE','%'.$q.'%')
    		->orWhere('take_care_by','LIKE', '%'.$q.'%')
            ->orWhere('rescue_date','LIKE', '%'.$q.'%')
            ->orWhere('comment','LIKE', '%'.$q.'%')
    		->paginate(10);

        return view('animal.index', compact('animals'));
    }

    public function getCreate(Animal $animal)
    {
    	$areas = Area::all();

        return view('animal.create', compact('areas'));
    }

    public function postCreate(Request $request)
    {
    	$animal = new Animal;
        $animal->name = $request->input('animal-name');
        $animal->type = $request->input('types');
        $animal->rescue_date = $request->input('rescue-date');
        $animal->vacination_date = $request->input('vacination-date');
        $animal->sterilization_date = $request->input('sterilization-date');
        $animal->area_id = $request->input('areas');
        $animal->take_care_by = $request->input('take-care-by');
        $animal->rescue = $request->input('rescue');
        $animal->comment = $request->input('comment');
        $animal->color = $request->input('color');
        $animal->save();

        return redirect()
            ->route('animal.index')
            ->with('success', 'Animal successfully created.');
    }

    public function getDog()
    {
        $dogs = Animal::query()
            ->where('type','Dog')
            ->paginate(10);

        return view('animal.dog', compact('dogs'));
    }

    public function getCat()
    {
        $cats = Animal::query()
            ->where('type','Cat')
            ->paginate(10);

        return view('animal.cat', compact('cats'));
    }

    public function getOther()
    {
        $others = Animal::query()
            ->where('type','Other')
            ->paginate(10);

        return view('animal.other', compact('others'));
    }

    public function getInfo(Animal $animal)
    {

        return view('animal.info', compact('animal'));
    }

    public function getUpdate(Animal $animal)
    {
        $areas = Area::all();

        return view('animal.update', compact('animal', 'areas'));
    }

    public function postUpdate(Request $request, Animal $animal)
    {
        $animal->name = $request->input('animal-name');
        $animal->type = $request->input('types');
        $animal->rescue_date = $request->input('rescue-date');
        $animal->vacination_date = $request->input('vacination-date');
        $animal->sterilization_date = $request->input('sterilization-date');
        $animal->area_id = $request->input('areas');
        $animal->take_care_by = $request->input('take-care-by');
        $animal->rescue = $request->input('rescue');
        $animal->comment = $request->input('comment');
        $animal->color = $request->input('color');
        $animal->save();

        return redirect()
            ->route('animal.index')
            ->with('success', 'Animal successfully updated.');
    }

    public function postDelete(Animal $animal)
    {
        $animal->delete();

        return redirect()
            ->route('animal.index')
            ->with('success', 'Animal successfully deleted.');
    }
}
