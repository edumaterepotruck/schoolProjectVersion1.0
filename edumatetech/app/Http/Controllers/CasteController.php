<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Religion;
use App\CasteCategory;
use App\Caste;

class CasteController extends Controller
{
    public function index()
    {
        
        $data =  Caste::select('castes.id as id','castes.name as caste','religions.name as religion','caste_categories.name as caste_categorie','castes.record_status as record_status')
        ->join('religions','castes.religion_id','=','religions.id')
        ->join('caste_categories','castes.caste_categories_id','=','caste_categories.id')
        ->get();
        return view('caste/view',compact('data'));
    }

    public function list()
    {       
        $data =  Caste::select('castes.id as id','castes.name as caste','religions.name as religion','caste_categories.name as caste_categorie','castes.record_status as record_status')
        ->join('religions','castes.religion_id','=','religions.id')
        ->join('caste_categories','castes.caste_categories_id','=','caste_categories.id')
        ->get();       
        return view('caste/view',compact('data'));
    }

    public function create()
    {
        $religions =  Religion::active();
        $caste_categories =  CasteCategory::active();
        
        return view('caste/create',compact('religions','caste_categories'));
    }

    public function store(Caste $caste)
    {       	
    	
    	$input = request()->validate([
            'name'           => ['required'],
            'religion_id'  => ['required'],
            'caste_categories_id'  => ['nullable'],            
            'record_status'  => ['required']
           
        ]);

       
        $caste->create($input);
        return redirect('/caste/index')->with('success', 'Saved Successfully!');
        //return back()->with('success','Saved Successfully!');
    }

    public function edit($id)
    {         
       
        $religions =  Religion::active();
        $caste_categories =  CasteCategory::active();

        $data =  Caste::select('castes.id as id','castes.name as caste','castes.religion_id as religion','caste_categories_id as caste_categorie','castes.record_status as record_status')
               ->find( $id );  
        return view('caste/edit',compact('religions','caste_categories','data'));
    }


    public function update(Caste $caste, $id)
    {
       
        $input = request()->validate([
            'name'           => ['required'],
            'religion_id'  => ['required'],
            'caste_categories_id'  => ['nullable'],            
            'record_status'  => ['required']
           
        ]);
        $classMappings=Caste::find($id);
        $classMappings->update( $input );
        return redirect('/caste/index')->with('success', 'Caste has been updated');
        
    }


    public function destroy(Request $request)
    {
        $id = $request->input('id');
        if( $id ) {
            $Caste = Caste::find( $id );     
            if($Caste){                

                try {
                    $Caste->delete();
                        
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


    public function getCastebyReligion(Request $request){

		$caste = Caste::byReligion($request->input('religion_id'));
		return response()->json( $caste ); 

	}



}
