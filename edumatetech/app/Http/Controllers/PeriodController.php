<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Period;

class PeriodController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $data =  Period::all();
        return view('period/view',compact('data'));
    }

    public function list()
    {       
         $data =  Period::all();
       
        return view('period/view',compact('data'));
    }

    public function create()
    {
        
        return view('period/create');
    }

    public function store(Period $period)
    {       	
    	
    	$input = request()->validate([
            'periodname'           => ['required', 'min:3', 'max:191'],
            'order'  => ['required'],
            'record_status'  => ['required']
           
        ]);

       
        $period->create($input);
        return redirect('/period/index')->with('success', 'Saved Successfully!');
        //return back()->with('success','Saved Successfully!');
    }

    public function edit($id)
    {         
       
       
            $period = Period::find( $id ); 
            
        return view('period/edit', compact('period'));
    }


    public function update(Period $period, $id)
    {
       
        $input = request()->validate([
            'periodname'           => ['required', 'min:3', 'max:191'],
            'order'  => ['required'],
            'record_status'  => ['required']           
        ]);
        $roles=Period::find($id);
        $roles->update( $input );
        return redirect('/period/index')->with('success', 'Period has been updated');
        //return back()->with('success','Updated Successfully!');
    }


    public function destroy(Request $request)
    {
        $id = $request->input('id');
        if( $id ) {
            $Period = Period::find( $id );     
            if($Period){                

                try {
                    $Period->delete();
                        
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
