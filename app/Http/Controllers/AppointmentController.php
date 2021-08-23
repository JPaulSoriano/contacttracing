<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Transaction;
use App\Office;
use App\Appointment;

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
        })->get();

        return view('appointments.staffindex',compact('appointments'))->with('i', (request()->input('page', 1) - 1) * 5);
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
