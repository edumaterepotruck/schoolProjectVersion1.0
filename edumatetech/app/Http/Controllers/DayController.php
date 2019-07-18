<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Day;

class DayController extends Controller
{
    public function index()
    {
        $data =  Day::all();
        return view('day/view',compact('data'));
    }

    public function list()
    {       
         $data =  Day::all();
       
        return view('day/view',compact('data'));
    }

    public function create()
    {
        
        return view('day/create');
    }

    public function store(Day $day)
    {       	
    	
    	$input = request()->validate([
            'dayname'           => ['required', 'min:3', 'max:191'],
            'order'  => ['required'],
            'record_status'  => ['required']
           
        ]);

       
        $day->create($input);
        return redirect('/day/index')->with('success', 'Saved Successfully!');
        //return back()->with('success','Saved Successfully!');
    }

    public function edit($id)
    {         
       
       
            $day = Day::find( $id ); 
            
        return view('day/edit', compact('day'));
    }


    public function update(Day $day, $id)
    {
       
        $input = request()->validate([
            'dayname'           => ['required', 'min:3', 'max:191'],
            'order'  => ['required'],
            'record_status'  => ['required']           
        ]);
        $days=Day::find($id);
        $days->update( $input );
        return redirect('/day/index')->with('success', 'Day has been updated');
        //return back()->with('success','Updated Successfully!');
    }


    public function destroy(Request $request)
    {
        $id = $request->input('id');
        if( $id ) {
            $Day = Day::find( $id );     
            if($Day){                

                try {
                    $Day->delete();
                        
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
