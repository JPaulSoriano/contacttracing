<?php
    
namespace App\Http\Controllers;
    
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Office;
use Illuminate\Support\Facades\Hash;
    
class UserController extends Controller
{

    public function index()
    {
        $users = User::latest()->paginate(5);
        return view('users.index',compact('users'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function create()
    {
        $offices = Office::all();
        return view('users.create', compact('offices'));
    }
    

    public function store(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'office_id' => 'required'
        ]);
    
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
    
        $user = User::create($input);
    
        return redirect()->route('users.index')
                        ->with('success','User created successfully');
    }
    
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index')
                        ->with('success','User deleted successfully');
    }
}