<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Religion;

class ReligionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $data =  Religion::all();
        return view('religion/view',compact('data'));
    }

    public function list()
    {       
         $data =  Religion::all();
       
        return view('religion/view',compact('data'));
    }

    public function create()
    {
        
        return view('religion/create');
    }

    public function store(Religion $religion)
    {       	
    	
    	$input = request()->validate([
            'name'           => ['required', 'min:3', 'max:191'],
            'record_status'  => ['required']
           
        ]);

       
        $religion->create($input);
        return redirect('/religion/index')->with('success', 'Saved Successfully!');
        //return back()->with('success','Saved Successfully!');
    }

    public function edit($id)
    {         
       
       
            $religion = Religion::find( $id ); 
            
        return view('religion/edit', compact('religion'));
    }


    public function update(Religion $religion, $id)
    {
       
        $input = request()->validate([
            'name'           => ['required', 'min:3', 'max:191'],
            'record_status'  => ['required']           
        ]);
        $roles=Religion::find($id);
        $roles->update( $input );
        return redirect('/religion/index')->with('success', 'Religion has been updated');
        //return back()->with('success','Updated Successfully!');
    }


    public function destroy(Request $request)
    {
        $id = $request->input('id');
        if( $id ) {
            $Religion = Religion::find( $id );     
            if($Religion){                

                try {
                    $Religion->delete();
                        
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
