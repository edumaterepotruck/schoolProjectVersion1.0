<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Role;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $data =  Role::all();
        return view('role/view',compact('data'));
    }

    public function list()
    {       
         $data =  Role::all();
       
        return view('role/view',compact('data'));
    }

    public function create()
    {
        
        return view('role/create');
    }

    public function store(Role $role)
    {       	
    	
    	$input = request()->validate([
            'name'           => ['required', 'min:3', 'max:191'],
            'record_status'  => ['required']
           
        ]);

       
        $role->create($input);
        return redirect('/role/index')->with('success', 'Saved Successfully!');
        //return back()->with('success','Saved Successfully!');
    }

    public function edit($id)
    {         
       
       
            $role = Role::find( $id ); 
            
        return view('role/edit', compact('role'));
    }


    public function update(Role $role, $id)
    {
       
        $input = request()->validate([
            'name'           => ['required', 'min:3', 'max:191'],
            'record_status'  => ['required']           
        ]);
        $roles=Role::find($id);
        $roles->update( $input );
        return redirect('/role/index')->with('success', 'Role has been updated');
        //return back()->with('success','Updated Successfully!');
    }


    public function destroy(Request $request)
    {
        $id = $request->input('id');
        if( $id ) {
            $Role = Role::find( $id );     
            if($Role){                

                try {
                    $Role->delete();
                        
                    return response()->json(['status' => 1]);
                    }         
                catch (\Exception $e) 
                    {
                    return response()->json(['status' => 0]);
                    }                
               
            }
        }

        return response()->json(['status' => 0,'errors' => []]);
    }
}
