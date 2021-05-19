<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;
use App\Models\Animal;

class AreaController extends Controller
{
    public function getIndex()
    {
        $areas = Area::get();

        return view('area.index',compact('areas'));
    }

    public function getList(Request $request, Area $area)
    {
        $q = $request->input('search');
        $animals = Animal::query()
            ->where('area_id',$area->id)
            ->where(function($query) use($q)
            {
                return $query->where('name','LIKE','%'.$q.'%')
                ->orWhere('take_care_by','LIKE', '%'.$q.'%')
                ->orWhere('rescue_date','LIKE', '%'.$q.'%')
                ->orWhere('comment','LIKE', '%'.$q.'%');
            })->paginate(10);

        return view('area.list',compact('animals','area'));
    }

    
}
