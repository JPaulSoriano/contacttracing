<?php

namespace App\Http\Controllers;
use App\Tracing;
use App\TimeVisit;
use App\Mail\ContactTracingMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TracingController extends Controller
{

    public function __construct()
    {
 
        $this->middleware('auth', ['only' => ['index','show']]);
    }
    
    public function index(){
        $tracings = DB::table('tracings')->count();
        $tracingstoday = DB::table('tracings')->whereDate('created_at', '=', date('Y-m-d'))->count();

        $timevisits = DB::table('time_visits')->count();
        $timevisitstoday = DB::table('time_visits')->whereDate('created_at', '=', date('Y-m-d'))->count();

        $estdate = DB::table('tracings')->whereDate('est_date', '=', date('Y-m-d'))->count();
        return view('tracings.index',compact('timevisits', 'tracings', 'tracingstoday', 'timevisitstoday', 'estdate'));
    }


    public function traced(){
        $timevisits = TimeVisit::all();
        return view('tracings.traced',compact('timevisits'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function tracedtoday(){
        $timevisits = TimeVisit::whereDate('created_at', '=', date('Y-m-d'))->get();
        return view('tracings.tracedtoday', compact('timevisits'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function registered(){
        $tracings = Tracing::all();
        return view('tracings.registered',compact('tracings'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    public function registeredtoday(){
        $tracings = Tracing::whereDate('created_at', '=', date('Y-m-d'))->get();
        return view('tracings.registeredtoday', compact('tracings'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    public function estdate(){
        $estdate = Tracing::whereDate('est_date', '=', date('Y-m-d'))->get();
        return view('tracings.estdate', compact('estdate'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create(){

        return view('tracings.create');
    }

    public function store(Request $request){

        $request->validate([
            'last_name' => 'required',
            'first_name' => 'required',
            'middle_name' => 'required',
            'age' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'street' => 'required',
            'city' => 'required',
            'province' => 'required',
            'purpose' => 'required',
            'course' => 'required',
            'stud_type' => 'required',
            'est_date' => 'required'
        ]);
  

        $tracing = Tracing::create($request->all());

        Mail::to($request->email)->send(new ContactTracingMail($tracing));

        return redirect('/qrcode/'.$tracing->id);
    }

    public function show(Tracing $tracing){

        $tracing->timeVisit()->create();
        return view('tracings.show',compact('tracing'));


    }
    
    public function destroy(Tracing $tracing){

        $tracing->delete();
        return redirect()->route('tracings.index')
                        ->with('success','Tracing deleted successfully');

    }

    
}
