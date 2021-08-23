<?php

namespace App\Http\Controllers;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Appointment;
use Illuminate\Http\Request;

class QRController extends Controller
{
    public function generateQrCode($id) 
    {
        $appointment = Appointment::find($id);
        return view('qrcode', compact('appointment'));
    }
}
