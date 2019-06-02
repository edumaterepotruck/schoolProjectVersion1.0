<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Sample;
//use Datatables;

class SampleController extends Controller
{
    public function index()
    {
        $data =  Sample::all();
        return view('sample/view',compact('data'));
    }

    public function list()
    {       
         $data =  Sample::all();
       
        return view('sample/view',compact('data'));
    }

    public function create()
    {
        
        return view('sample/create');
    }

    public function store(Sample $sample)
    {       	
    	
    	$input = request()->validate([
            'name'          => ['required', 'min:3', 'max:191'],
            'email'    => ['required', 'min:3', 'max:191'],
            'password'  => ['required'],
            'active'          => ['required']
           
        ]);

       
        $sample->create($input);
        return back()->with('success','Saved Successfully!');
    }

    public function edit($id)
    {         
       
       
            $sample = Sample::find( $id ); 
            
        return view('sample/edit', compact('sample'));
    }


    public function update(Sample $sample, $id)
    {
       
        $input = request()->validate([
            'name'          => ['required', 'min:3', 'max:191'],
            'email'    => ['required', 'min:3', 'max:191'],
            'password'  => ['required'],
            'active'          => ['required']
           
        ]);
        $samples=Sample::find($id);
        $samples->update( $input );
        return redirect('/sample/index')->with('success', 'Stock has been updated');
        return back()->with('success','Updated Successfully!');
    }


    public function destroy(Request $request)
    {
        $id = $request->input('id');
        if( $id ) {
            $Sample = Sample::find( $id );     
            if($Sample){                

                try {
                    $Sample->delete();
                        
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
