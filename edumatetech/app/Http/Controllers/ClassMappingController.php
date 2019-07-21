<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\ClassMapping;
use App\ClassDetail;
use App\ClassDivision;
use App\ClassBranch;

class ClassMappingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        
        $data =  ClassMapping::select('class_mappings.id as id','class_mappings.batchname','class_details.name as class','class_divisions.name as division','class_branches.name as branch','class_mappings.record_status as record_status')
        ->join('class_details','class_mappings.class_detail_id','=','class_details.id')
        ->join('class_divisions','class_mappings.class_division_id','=','class_divisions.id')
        ->leftjoin('class_branches','class_mappings.class_branch_id','=','class_branches.id')
        ->get();
        return view('classMapping/view',compact('data'));
    }

    public function list()
    {       
        $data =  ClassMapping::select('class_mappings.id as id','class_mappings.batchname','class_details.name as class','class_divisions.name as division','class_branches.name as branch','class_mappings.record_status as record_status')
        ->join('class_details','class_mappings.class_detail_id','=','class_details.id')
        ->join('class_divisions','class_mappings.class_division_id','=','class_divisions.id')
        ->join('class_branches','class_mappings.class_branch_id','=','class_branches.id')
        ->get();
       
        return view('classMapping/view',compact('data'));
    }

    public function create()
    {
        $class =  ClassDetail::active();
        $divisions =  ClassDivision::active();
        $branchs =  ClassBranch::active();
        return view('classMapping/create',compact('class','divisions','branchs'));
    }

    public function store(ClassMapping $classMapping)
    {       	
    	
    	$input = request()->validate([
            'batchname'           => ['required'],
            'class_detail_id'           => ['required'],
            'class_division_id'  => ['required'],
            'class_branch_id'  => ['nullable'],            
            'record_status'  => ['required']
           
        ]);

       
        $classMapping->create($input);
        return redirect('/classMapping/index')->with('success', 'Saved Successfully!');
        //return back()->with('success','Saved Successfully!');
    }

    public function edit($id)
    {         
       
        $class =  ClassDetail::active();
        $divisions =  ClassDivision::active();
        $branchs =  ClassBranch::active();

        $data =  ClassMapping::select('class_mappings.id as id','class_mappings.batchname','class_detail_id as class','class_division_id as division','class_branch_id as branch','class_mappings.record_status as record_status')
                 ->find( $id );  
        return view('classMapping/edit',compact('class','divisions','branchs','data'));
    }


    public function update(ClassMapping $classMapping, $id)
    {
       
        $input = request()->validate([
            'batchname'           => ['required'],
            'class_detail_id'           => ['required'],
            'class_division_id'  => ['required'],
            'class_branch_id'  => ['nullable'],            
            'record_status'  => ['required']   
        ]);
        $classMappings=ClassMapping::find($id);
        $classMappings->update( $input );
        return redirect('/classMapping/index')->with('success', 'ClassMapping has been updated');
        //return back()->with('success','Updated Successfully!');
    }


    public function destroy(Request $request)
    {
        $id = $request->input('id');
        if( $id ) {
            $ClassMapping = ClassMapping::find( $id );     
            if($ClassMapping){                

                try {
                    $ClassMapping->delete();
                        
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
