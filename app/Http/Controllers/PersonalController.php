<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class PersonalController extends Controller
{
    public function personalEdit($id)
    {
        $user = User::find($id);

        return view('users.editPersonal',compact('user'));
    }

    public function updatePersonal(Request $request, $id)
    {
        $validatedData = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'phone' => 'required',
            'email' => 'required',
            
        ]);

        $user = User::find($id);
        $user->update($request->only('firstname','lastname','email','phone','note'));

        return redirect()->route('users.index')->with('success',"Personal Details Updated!");
    }
}
