<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\ClassDivision;

class ClassDivisionController extends Controller
{
    public function index()
    {
        $data =  ClassDivision::all();
        return view('classDivision/view',compact('data'));
    }

    public function list()
    {       
         $data =  ClassDivision::all();
       
        return view('classDivision/view',compact('data'));
    }

    public function create()
    {
        
        return view('classDivision/create');
    }

    public function store(ClassDivision $classDivision)
    {       	
    	
    	$input = request()->validate([
            'name'           => ['required', 'min:3', 'max:191'],
            'record_status'  => ['required']
           
        ]);

       
        $classDivision->create($input);
        return redirect('/class-division/index')->with('success', 'Saved Successfully!');
        //return back()->with('success','Saved Successfully!');
    }

    public function edit($id)
    {         
       
       
            $classDivision = ClassDivision::find( $id ); 
            
        return view('classDivision/edit', compact('classDivision'));
    }


    public function update(ClassDivision $classDivision, $id)
    {
       
        $input = request()->validate([
            'name'           => ['required', 'min:3', 'max:191'],
            'record_status'  => ['required']           
        ]);
        $classDivisions=ClassDivision::find($id);
        $classDivisions->update( $input );
        return redirect('/class-division/index')->with('success', 'ClassDivision has been updated');
        //return back()->with('success','Updated Successfully!');
    }


    public function destroy(Request $request)
    {
        $id = $request->input('id');
        if( $id ) {
            $ClassDivision = ClassDivision::find( $id );     
            if($ClassDivision){                

                try {
                    $ClassDivision->delete();
                        
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
