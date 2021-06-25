<?php

namespace App\Http\Controllers;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Http\Request;
use App\Tracing;

class QRController extends Controller
{
    
    public function generateQrCode($id) 
    {
        $tracing = Tracing::find($id);
        return view('qrcode', compact('tracing'));
    }
}
