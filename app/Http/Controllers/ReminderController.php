<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;
use App\Models\MedicalRecord;

class ReminderController extends Controller
{
    public function getIndex()
    {
        $animals = Animal::get();

        return view('reminder.index',compact('animals'));
    }

    public function getVaccine()
    {
        $months = array("Jan", "Feb", "Mar", "Apr", "May", "Jun", "Juy", "Aug", "Sep", "Oct", "Nov", "Dec");

        return view('reminder.vaccine',compact('months'));
    }

    public function getMonth($month)
    {
        if($month == 'Jan') {
            $animals = Animal::query()
                ->where('vacination_date','LIKE','%-01-%')
                ->paginate(10);
        }
        elseif($month == 'Feb') {
            $animals = Animal::query()
                ->where('vacination_date','LIKE','%-02-%')
                ->paginate(10);
        }
        elseif($month == 'Mar') {
            $animals = Animal::query()
                ->where('vacination_date','LIKE','%-03-%')
                ->paginate(10);
        }
        elseif($month == 'Apr') {
            $animals = Animal::query()
                ->where('vacination_date','LIKE','%-04-%')
                ->paginate(10);
        }
        elseif($month == 'May') {
            $animals = Animal::query()
                ->where('vacination_date','LIKE','%-05-%')
                ->paginate(10);
        }
        elseif($month == 'Jun') {
            $animals = Animal::query()
                ->where('vacination_date','LIKE','%-06-%')
                ->paginate(10);
        }
        elseif($month == 'Juy') {
            $animals = Animal::query()
                ->where('vacination_date','LIKE','%-07-%')
                ->paginate(10);
        }
        elseif($month == 'Aug') {
            $animals = Animal::query()
                ->where('vacination_date','LIKE','%-08-%')
                ->paginate(10);
        }
        elseif($month == 'Sep') {
            $animals = Animal::query()
                ->where('vacination_date','LIKE','%-09-%')
                ->paginate(10);
        }
        elseif($month == 'Oct') {
            $animals = Animal::query()
                ->where('vacination_date','LIKE','%-10-%')
                ->paginate(10);
        }
        elseif($month == 'Nov') {
            $animals = Animal::query()
                ->where('vacination_date','LIKE','%-11-%')
                ->paginate(10);
        }
        elseif($month == 'Dec') {
            $animals = Animal::query()
                ->where('vacination_date','LIKE','%-12-%')
                ->paginate(10);
        }
        else {
            $animals = Animal::paginate(10);
        }

        return view('reminder.month',compact('animals','month'));
    }

    public function getClinic()
    {
        $medicals = MedicalRecord::whereNotNull('next_visit_date')->paginate(10);

        return view('reminder.clinic',compact('medicals'));
    }
    
}
