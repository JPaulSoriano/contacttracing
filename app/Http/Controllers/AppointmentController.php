<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Transaction;
use App\Office;
use App\Appointment;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class AppointmentController extends Controller
{

    public function index()
    {
        $appointments = Appointment::where('user_id', Auth::user()->id)->paginate(5);
        return view('appointments.index',compact('appointments'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function staffindex()
    {
        $appointments = Appointment::whereHas('transaction.office', function($query){
            $query->where('id', Auth::user()->office_id);
        })->orderBy('created_at', 'desc')->paginate(10);

        return view('appointments.staffindex',compact('appointments'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function unapproved()
    {
        $appointments = Appointment::whereHas('transaction.office', function($query){
            $query->where('id', Auth::user()->office_id);
        })->where('status', '=', '0')->paginate(10);

        return view('appointments.unapproved',compact('appointments'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function approved()
    {
        $appointments = Appointment::whereHas('transaction.office', function($query){
            $query->where('id', Auth::user()->office_id);
        })->where('status', '=', '1')->paginate(10);

        return view('appointments.approved',compact('appointments'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function tomorrow()
    {
        $appointments = Appointment::whereHas('transaction.office', function($query){
            $query->where('id', Auth::user()->office_id);
        })->where('proposed_date', '=', Carbon::tomorrow()->format('Y-m-d'))->paginate(10);

        return view('appointments.tomorrow',compact('appointments'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function today()
    {
        $appointments = Appointment::whereHas('transaction.office', function($query){
            $query->where('id', Auth::user()->office_id);
        })->where('proposed_date', '=', Carbon::today()->format('Y-m-d'))->paginate(10);

        return view('appointments.today',compact('appointments'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
    


    public function create(Office $office)
    {
        $transactions = Transaction::all();
        return view('appointments.create',compact('transactions', 'office'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'transaction_id' => 'required',
            'proposed_date' => 'required',
            'proposed_time' => 'required',
        ]);

        $input = $request->all();
        Auth::user()->appointments()->create($input);

        return redirect()->route('appointments.index')->with('success','SUCCESS');
    }


    public function refuse(Appointment $appointment)
    {
        $appointment->status = '0';
        $appointment->save();

        return redirect()->route('staffindex')->with('refused','TRANSACTION REFUSED!');
    }

    public function approve(Appointment $appointment)
    {
        $appointment->status = '1';
        $appointment->save();

        return redirect()->route('staffindex')->with('success','TRANSACTION APPROVED!');
    }


    public function edit(Appointment $appointment)
    {
        return view('appointments.edit',compact('appointment'));
    }


    public function update(Request $request, Appointment $appointment)
    {
        $request->validate([
            'appointed_date' => 'required',
            'appointed_time' => 'required',
        ]);

        $appointment->update($request->all());

        return redirect()->route('staffindex')
                        ->with('success','APPOINTMENT SUCCESS');
    }

    public function show(Appointment $appointment){
        return view('appointments.show',compact('appointment'));
    }

    public function scan(){
        return view('scan');
    }
}
