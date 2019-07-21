<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Subject;

class SubjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $data =  Subject::all();
        return view('subject/view',compact('data'));
    }

    public function list()
    {       
         $data =  Subject::all();
       
        return view('subject/view',compact('data'));
    }

    public function create()
    {
        
        return view('subject/create');
    }

    public function store(Subject $subject)
    {       	
    	
    	$input = request()->validate([
            'name'           => ['required', 'min:3', 'max:191'],
            'subtype'  => ['required'],
            'record_status'  => ['required']
           
        ]);

       
        $subject->create($input);
        return redirect('/subject/index')->with('success', 'Saved Successfully!');
        //return back()->with('success','Saved Successfully!');
    }

    public function edit($id)
    {         
       
       
            $subject = Subject::find( $id ); 
            
        return view('subject/edit', compact('subject'));
    }


    public function update(Subject $subject, $id)
    {
       
        $input = request()->validate([
            'name'           => ['required', 'min:3', 'max:191'],
            'subtype'  => ['required'],
            'record_status'  => ['required']           
        ]);
        $roles=Subject::find($id);
        $roles->update( $input );
        return redirect('/subject/index')->with('success', 'Subject has been updated');
        //return back()->with('success','Updated Successfully!');
    }


    public function destroy(Request $request)
    {
        $id = $request->input('id');
        if( $id ) {
            $Subject = Subject::find( $id );     
            if($Subject){                

                try {
                    $Subject->delete();
                        
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
