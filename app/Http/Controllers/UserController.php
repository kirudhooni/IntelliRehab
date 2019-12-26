<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\User;
use App\Mail\Welcome;
use App\Http\Requests\CreateEditUserRequest;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(20);

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   

        $this->authorize('create', User::class);
        $user = new User();

       
        return view('users.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateEditUserRequest $request)
    {
        
       
        $password = Str::random(10);
        
        // //\Mail::to($user)->send(new Welcome($user));
        
        
        $request->user()->create(array_merge($request->all(),['password' => Hash::make($password)]));
        return redirect()->route('users.index')->with('success', "User Created!");   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   

        $validatedData = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'level' => 'required',
        ]);

        $user = User::find($id);
        $user->update($request->only('firstname','lastname','email','phone','note','level'));

        return redirect()->route('users.index')->with('success',"User Updated!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function downloadusers()
    {
        $users = User::all();

        //return $users;
	    $csvExporter = new \Laracsv\Export();

	    return $csvExporter->build($users, ['id', 'firstname', 'lastname', 'username', 'phone', 'level','status','email','note','updated_at'])->download('Users_list.csv');
    }

    public function deactivate($id)
    {
        $user = User::find($id);

        if($user ->status == 'active'){
            $user ->status = 'inactive';
            $user ->save();
        
            return redirect()->route('users.index')->with('success',"User Deativated!");
        }
        else{
            $user ->status = 'active';
            $user ->save();
        
            return redirect()->route('users.index')->with('success',"User Activated!");
        }
    }

    public function getUsersNotInGroup($id)
    {
        $users = User::whereDoesntHave('groups',function ($query) use($id){$query->where('id',$id);})->get();
        return response()->json($users);
        
    }

    public function getUsersInGroup($id)
    {
        $users = User::whereHas('groups',function ($query) use($id){$query->where('id',$id);})->get();
        return response()->json($users);
    }
    

}
