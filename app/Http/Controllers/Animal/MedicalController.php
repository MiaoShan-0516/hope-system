<?php

namespace App\Http\Controllers\Animal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Animal;
use App\Models\Area;
use App\Models\MedicalRecord;
use Carbon\Carbon;

class MedicalController extends Controller
{
    public function getIndex(Request $request, MedicalRecord $medicalRecord)
    {
        $medicalRecord = MedicalRecord::get();
        $q = $request->input('search');
        $input = $request->input('search');
        $results = Animal::where('name','LIKE','%'.$q.'%')
            ->orWhereHas('medicalRecords', function($q) use ($input) {
                return $q->where('comment', 'LIKE', '%' . $input . '%')
                    ->orWhere('next_visit_date', 'LIKE', '%' . $input . '%')
                    ->orWhere('date', 'LIKE', '%' . $input . '%');
        })->paginate(10);

        return view('medical.index', compact('results','medicalRecord'));
    }

    public function getCreate(Animal $animal)
    {
        $todayDate = Carbon::now();
        $username = Auth::user();

        return view('medical.create',compact('animal','todayDate','username'));
    }

    public function postCreate(Request $request)
    {
        $medicalRecord = new MedicalRecord;
        $medicalRecord->comment = $request->input('comment');
        $medicalRecord->animal_id = $request->input('animal-id');
        $medicalRecord->next_visit_date = $request->input('next-visit-date');
        $medicalRecord->date = $request->input('visit-date');
        $medicalRecord->user_id = $request->input('created-by');
        $medicalRecord->save();

        return redirect()
            ->route('medical.index')
            ->with('success', 'Medical Record successfully created.');
    }

    public function getUpdate(Animal $animal, MedicalRecord $record)
    {
        $todayDate = Carbon::now();
        $username = Auth::user();

        return view('medical.update',compact('animal','todayDate','username','record'));
    }

    public function postUpdate(Request $request, MedicalRecord $record)
    {
        $record->comment = $request->input('comment');
        $record->animal_id = $request->input('animal-id');
        $record->next_visit_date = $request->input('next-visit-date');
        $record->date = $request->input('visit-date');
        $record->user_id = $request->input('created-by');
        $record->save();

        return redirect()
            ->route('medical.index')
            ->with('success', 'Medical Record successfully updated.');
    }

    public function postDelete(MedicalRecord $record)
    {
        $record->delete();

        return redirect()
            ->route('medical.index')
            ->with('success', 'Medical Record successfully deleted.');
    }
}
