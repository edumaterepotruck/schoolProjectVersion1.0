<?php


namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Examtype;

class ExamtypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $data =  Examtype::all();
        return view('examtype/view',compact('data'));
    }

    public function list()
    {       
         $data =  Examtype::all();
       
        return view('examtype/view',compact('data'));
    }

    public function create()
    {
        
        return view('examtype/create');
    }

    public function store(Examtype $examtype)
    {       	
    	
    	$input = request()->validate([
            'examname'           => ['required', 'min:3', 'max:191'],
            'record_status'  => ['required']
           
        ]);

       
        $examtype->create($input);
        return redirect('/examtype/index')->with('success', 'Saved Successfully!');
        //return back()->with('success','Saved Successfully!');
    }

    public function edit($id)
    {         
       
       
            $examtype = Examtype::find( $id ); 
            
        return view('examtype/edit', compact('examtype'));
    }


    public function update(Examtype $examtype, $id)
    {
       
        $input = request()->validate([
            'examname'           => ['required', 'min:3', 'max:191'],
            'record_status'  => ['required']           
        ]);
        $examtype=Examtype::find($id);
        $examtype->update( $input );
        return redirect('/examtype/index')->with('success', 'Examtype has been updated');
        //return back()->with('success','Updated Successfully!');
    }


    public function destroy(Request $request)
    {
        $id = $request->input('id');
        if( $id ) {
            $Examtype = Examtype::find( $id );     
            if($Examtype){                

                try {
                    $Examtype->delete();
                        
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
