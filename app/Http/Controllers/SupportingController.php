<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;
use App\Kalender;

class SupportingController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
    }

    public function kalender(){
    	$events = [];
        $data = Kalender::all();
                if($data->count()) {
                    foreach ($data as $key => $value) {
                        $events[] = Calendar::event(
                            $value->title,
                            true,
                            new \DateTime($value->start_date),
                            new \DateTime($value->end_date.' +1 day'),
                            null,
                            // Add color and link on event
                         [
                             'color' => '#ff0000'
                         ]
                        );
                    }
                }
        $calendar = Calendar::addEvents($events);
    	return view('template.supporting.kalender', compact('calendar'));
    }

    public function email(){
    	return view('template.supporting.email');
    }
}
