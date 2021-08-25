<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Appointment;
use App\Transaction;
use App\Office;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class HomeController extends Controller
{
    public function index()
    {
        $all = Appointment::whereHas('transaction.office', function($query){
            $query->where('id', Auth::user()->office_id);
        })->orderBy('created_at', 'desc')->count();

        $unapprovecount = Appointment::whereHas('transaction.office', function($query){
            $query->where('id', Auth::user()->office_id);
        })->where('status', '=', '0')->count();

        $approvecount = Appointment::whereHas('transaction.office', function($query){
            $query->where('id', Auth::user()->office_id);
        })->where('status', '=', '1')->count();

        $tomorrow = Appointment::whereHas('transaction.office', function($query){
            $query->where('id', Auth::user()->office_id);
        })->where('proposed_date', '=', Carbon::tomorrow()->format('Y-m-d'))->count();

        $today = Appointment::whereHas('transaction.office', function($query){
            $query->where('id', Auth::user()->office_id);
        })->where('proposed_date', '=', Carbon::today()->format('Y-m-d'))->count();

        return view('home', compact('unapprovecount', 'approvecount', 'all', 'tomorrow', 'today'));

    }

    public function adminhome()
    {
        return view('adminhome');
    }
}
