<?php

namespace App\Http\Controllers;

use App\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = Group::paginate(20);

        return view('groups.index', compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $group = new Group();
        return view('groups.create', compact('group'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            
        ]);

        $group = new Group;

        $group->name = $request->name;
        $group->description = $request->description;

        $group->save();
        
        return redirect()->route('groups.index')->with('success', "Group Created!");  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        
        $group = Group::find($id);
        return view('groups.edit',compact('group'));
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Group $id)
    {   

        $validatedData = $request->validate([
            'name' => 'required',
            
        ]);
        $group = Group::find($id);
        $group->name = $request->name;
        $group->description = $request->description;

        $group->save();

        return redirect()->route('groups.index')->with('success',"Group Updated!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group)
    {
        //
    }

    public function downloadgroups()
    {
        $groups = Group::all();

        //return $users;
	    $csvExporter = new \Laracsv\Export();

	    return $csvExporter->build($groups, ['id', 'name', 'description', 'status','updated_at'])->download('Groups_list.csv');
    }

    public function deactivate($id)
    {
        $group = Group::find($id);
        if($group ->status == 'active'){
            $group ->status = 'inactive';
            $group ->save();
            return redirect()->route('groups.index')->with('success',"Group Deactivated!");
        }
        else{
            $group ->status = 'active';
            $group ->save();
            return redirect()->route('groups.index')->with('success',"Group Activated!");
        }
    }

    public function manage()
    {   
        
        return view('groups.manage');
    }

    public function getGroups()
    {
        $groups = Group::get();
        return response()->json($groups);
    }

    public function getUsers()
    {
        $groups = [];
        return response()->json($groups);
    }
}
