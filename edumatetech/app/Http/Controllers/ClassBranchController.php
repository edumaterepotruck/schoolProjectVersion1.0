<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\ClassBranch;

class ClassBranchController extends Controller
{
    public function index()
    {
        $data =  ClassBranch::all();
        return view('classBranch/view',compact('data'));
    }

    public function list()
    {       
         $data =  ClassBranch::all();
       
        return view('classBranch/view',compact('data'));
    }

    public function create()
    {
        
        return view('classBranch/create');
    }

    public function store(ClassBranch $classBranch)
    {       	
    	
    	$input = request()->validate([
            'name'           => ['required', 'min:3', 'max:191'],
            'record_status'  => ['required']
           
        ]);

       
        $classBranch->create($input);
        return redirect('/classBranch/index')->with('success', 'Saved Successfully!');
        //return back()->with('success','Saved Successfully!');
    }

    public function edit($id)
    {         
       
       
            $classBranch = ClassBranch::find( $id ); 
            
        return view('classBranch/edit', compact('classBranch'));
    }


    public function update(ClassBranch $classBranch, $id)
    {
       
        $input = request()->validate([
            'name'           => ['required', 'min:3', 'max:191'],
            'record_status'  => ['required']           
        ]);
        $classBranchs=ClassBranch::find($id);
        $classBranchs->update( $input );
        return redirect('/classBranch/index')->with('success', 'ClassBranch has been updated');
        //return back()->with('success','Updated Successfully!');
    }


    public function destroy(Request $request)
    {
        $id = $request->input('id');
        if( $id ) {
            $ClassBranch = ClassBranch::find( $id );     
            if($ClassBranch){                

                try {
                    $ClassBranch->delete();
                        
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
