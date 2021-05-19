<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;

class SettingController extends Controller
{
    public function getIndex()
    {
        return view('setting.index');
    }

    public function getArea()
    {
    	$areas = Area::paginate(5);

        return view('setting.area', compact('areas'));
    }

    public function createArea(Request $request)
    {
    	$request->validate([
    		'area-name' => 'required|string|max:191',
    	]);

    	$area = new Area;
        $area->name = $request->input('area-name');
        $area->save();

        return redirect()
            ->route('setting.area')
            ->with('success', 'Area successfully created.');
    }

    public function deleteArea(Area $area)
    {
        $area->delete();

        return redirect()
            ->route('setting.area')
            ->with('success', 'Area successfully deleted.');
    }

    public function updateArea(Area $area)
    {
        return view('setting.update-area', compact('area'));
    }

    public function postUpdateArea(Request $request, Area $area)
    {
    	$request->validate([
    		'area-name' => 'required|string|max:191',
    	]);

    	$area->name = $request->input('area-name');
    	$area->save();

        return redirect()->route('setting.area', compact('area'));
    }

    public function getStaff()
    {
    	$staffs = Staff::paginate(5);

        return view('setting.staff', compact('staffs'));
    }

    public function createStaff(Request $request)
    {
    	$request->validate([
    		'staff-name' => 'required|string|max:191',
    	]);

    	$staff = new Staff;
        $staff->name = $request->input('staff-name');
        $staff->save();

        return redirect()
            ->route('setting.staff')
            ->with('success', 'Staff successfully created.');
    }

    public function deleteStaff(Staff $staff)
    {
        $staff->delete();

        return redirect()
            ->route('setting.staff')
            ->with('success', 'Staff successfully deleted.');
    }

    public function updateStaff(Staff $staff)
    {
        return view('setting.update-staff', compact('staff'));
    }

    public function postUpdateStaff(Request $request, Staff $staff)
    {
    	$request->validate([
    		'staff-name' => 'required|string|max:191',
    	]);

    	$staff->name = $request->input('staff-name');
    	$staff->save();

        return redirect()->route('setting.staff', compact('staff'));
    }
    
}
