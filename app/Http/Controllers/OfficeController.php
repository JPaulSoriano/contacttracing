<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Office;

class OfficeController extends Controller
{
    public function index()
    {
        $offices = Office::latest()->paginate(5);
        return view('admin.offices.index',compact('offices'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function create()
    {
        return view('admin.offices.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        Office::create($request->all());
        return redirect()->route('offices.index')->with('Success','OFFICE ADDED SUCCESSFULLY');
    }
    public function destroy(Office $office)
    {
        $office->delete();
        return redirect()->route('offices.index')->with('Success','OFFICE DELETED SUCCESSFULLY');
    }
}
