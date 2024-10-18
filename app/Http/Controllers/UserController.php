<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function user(){
        return view('user');
    }
   public function index(){ 
    $User = User::get();
    return view('dashboard',compact('User'));
}

    function create() {
        return view('user.create');
    }

    function submit(Request $request) {
        $validated = $request->validate([
            'name' => 'required',
            'email' => ['required', 'unique:users', 'max:255'],
            'password' => 'required',
            'role' => 'required',
        ]);
        $filepath = public_path('profile');
        $User = New User();
        $User->name = $request->name;
        $User->email = $request->email;
        $User->password = bcrypt($request->password);
        $User->role = $request->role;
        if ($request->hasfile('iamge')) {
            $file = $request->file('image');
            $file_name = time(). $file->getClientOriginalName();

            $file->move(public_path('image'), $file_name);
            $User->foto = $file_name;
        }
        $User->save();
        return redirect()->route('admin.dashboard');
    }
    
    function edit($id) {
        $User = User::find($id);
        return view('user.edit', ['User' => $User])
        ;
    }
    function update(Request $request,$id) {
        $User = User::find($id);
        
        $validated = $request->validate([
            'name' => 'required',
            'email' => ['required', 'email', Rule::unique('users')->ignore($User->id, 'id')],
            'password' => 'nullable',
            'role' => 'required',

        ]); 
        $User->name = $request->name;
        $User->email = $request->email;

        if ($request->password) {
            $User->password = bcrypt($request->password);
        }

        $User->role = $request->role;
        $User->save();

        return redirect()->route('admin.dashboard');
    }

    function delete($id) {
        $User = User::find($id);
        $User->delete();
        return redirect()->route('admin.dashboard');
    }
}
