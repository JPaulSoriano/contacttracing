<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Appointment;
use App\Transaction;
use App\Office;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');

    }

    public function adminhome()
    {
        return view('adminhome');
    }
}
