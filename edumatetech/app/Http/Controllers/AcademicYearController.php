<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\AcademicYear;

class AcademicYearController extends Controller
{
    public function index()
    {
        $data =  AcademicYear::all();
        return view('academicyear/view',compact('data'));
    }

    public function list()
    {       
         $data =  AcademicYear::all();
       
        return view('academicyear/view',compact('data'));
    }

    public function create()
    {
        
        return view('academicyear/create');
    }

    public function store(AcademicYear $academicyear)
    {       	
    	
    	$input = request()->validate([
            'name'           => ['required', 'min:3', 'max:191'],
            'from'           => ['date'],
            'to'             => ['after:from'], 
            'record_status'  => ['required']
           
        ]);

       
        $academicyear->create($input);
        return redirect('/academicyear/index')->with('success', 'Saved Successfully!');
       // return back()->with('success','Saved Successfully!');
    }

    public function edit($id)
    {         
       
       
            $academicyear = AcademicYear::find( $id ); 
            
        return view('academicyear/edit', compact('academicyear'));
    }


    public function update(AcademicYear $academicyear, $id)
    {
       
        $input = request()->validate([
            'name'           => ['required', 'min:3', 'max:191'],
            'from'           => ['date'],
            'to'             => ['after:from'], 
            'record_status'  => ['required']           
        ]);
        $academicyears=AcademicYear::find($id);
        $academicyears->update( $input );
        return redirect('/academicyear/index')->with('success', 'AcademicYear has been updated');
      //  return back()->with('success','Updated Successfully!');
    }


    public function destroy(Request $request)
    {
        $id = $request->input('id');
        if( $id ) {
            $AcademicYear = AcademicYear::find( $id );     
            if($AcademicYear){                

                try {
                    $AcademicYear->delete();
                        
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
