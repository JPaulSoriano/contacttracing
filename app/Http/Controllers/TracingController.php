<?php

namespace App\Http\Controllers;
use App\Tracing;
use App\TimeVisit;
use Illuminate\Http\Request;

class TracingController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){

        $tracings = Tracing::all();

        $timevisits = TimeVisit::latest()->paginate(5);
        return view('tracings.index',compact('timevisits', 'tracings'))
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
            'purpose' => 'required'
        ]);
  

        $tracing = Tracing::create($request->all());

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
