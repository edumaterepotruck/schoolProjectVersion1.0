<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\ClassDetail;

class ClassDetailController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $data =  ClassDetail::all();
        return view('classDetails/view',compact('data'));
    }

    public function list()
    {       
         $data =  ClassDetail::all();
       
        return view('classDetails/view',compact('data'));
    }

    public function create()
    {
        
        return view('classDetails/create');
    }

    public function store(ClassDetail $classDetail)
    {       	
    	
    	$input = request()->validate([
            'name'           => ['required', 'min:3', 'max:191'],
            'record_status'  => ['required']
           
        ]);

       
        $classDetail->create($input);
        return redirect('/class-detail/index')->with('success', 'Saved Successfully!');
        //return back()->with('success','Saved Successfully!');
    }

    public function edit($id)
    {         
       
       
            $classDetail = ClassDetail::find( $id ); 
            
        return view('classDetails/edit', compact('classDetail'));
    }


    public function update(ClassDetail $classDetail, $id)
    {
       
        $input = request()->validate([
            'name'           => ['required', 'min:3', 'max:191'],
            'record_status'  => ['required']           
        ]);
        $classDetails=ClassDetail::find($id);
        $classDetails->update( $input );
        return redirect('/class-detail/index')->with('success', 'ClassDetail has been updated');
        //return back()->with('success','Updated Successfully!');
    }


    public function destroy(Request $request)
    {
        $id = $request->input('id');
        if( $id ) {
            $ClassDetail = ClassDetail::find( $id );     
            if($ClassDetail){                

                try {
                    $ClassDetail->delete();
                        
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
