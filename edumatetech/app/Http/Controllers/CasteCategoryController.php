<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\CasteCategory;

class CasteCategoryController extends Controller
{
    public function index()
    {
        $data =  CasteCategory::all();
        return view('casteCategory/view',compact('data'));
    }

    public function list()
    {       
         $data =  CasteCategory::all();
       
        return view('casteCategory/view',compact('data'));
    }

    public function create()
    {
        
        return view('casteCategory/create');
    }

    public function store(CasteCategory $casteCategory)
    {       	
    	
    	$input = request()->validate([
            'name'           => ['required', 'min:3', 'max:191'],
            'record_status'  => ['required']
           
        ]);

       
        $casteCategory->create($input);
        return redirect('/casteCategory/index')->with('success', 'Saved Successfully!');
        //return back()->with('success','Saved Successfully!');
    }

    public function edit($id)
    {         
       
       
            $casteCategory = CasteCategory::find( $id ); 
            
        return view('casteCategory/edit', compact('casteCategory'));
    }


    public function update(CasteCategory $casteCategory, $id)
    {
       
        $input = request()->validate([
            'name'           => ['required', 'min:3', 'max:191'],
            'record_status'  => ['required']           
        ]);
        $roles=CasteCategory::find($id);
        $roles->update( $input );
        return redirect('/casteCategory/index')->with('success', 'CasteCategory has been updated');
        //return back()->with('success','Updated Successfully!');
    }


    public function destroy(Request $request)
    {
        $id = $request->input('id');
        if( $id ) {
            $CasteCategory = CasteCategory::find( $id );     
            if($CasteCategory){                

                try {
                    $CasteCategory->delete();
                        
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
