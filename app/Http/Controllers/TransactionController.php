<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Transaction;
use App\Office;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::latest()->paginate(5);
        return view('admin.transactions.index',compact('transactions'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function create()
    {
        $offices = Office::all();
        return view('admin.transactions.create', compact('offices'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        Transaction::create($request->all());
        return redirect()->route('transactions.index')->with('Success','TRANSACTION ADDED SUCCESSFULLY');
    }
    public function destroy(Transaction $transaction)
    {
        $transaction->delete();
        return redirect()->route('transactions.index')->with('Success','TRANSACTION DELETED SUCCESSFULLY');
    }
}
