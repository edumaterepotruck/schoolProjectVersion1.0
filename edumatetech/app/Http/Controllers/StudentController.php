<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

use App\Religion;
use App\Caste;
use App\Student;

class StudentController extends Controller
{
    public function index()
    {
        $data =  Student::select('users.id as id','users.name as name','users.record_status as record_status','roles.name as role')
        ->join('user__role__mappings','user__role__mappings.user_id','=','users.id')
        ->join('roles','roles.id','=','user__role__mappings.role_id')
        ->get();

        
        return view('student/view',compact('data'));
    }

    public function list()
    {       
         $data =  Student::all();
       
        return view('student/view',compact('data'));
    }

    public function create()
    {
        $religions =  Religion::active();
        $castes = Caste::active();
        return view('student/create',compact('religions','castes'));
    }

    public function store(Student $student)
    {       	
    	
    	$input = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'role_id'  => ['required'],
            'record_status'  => ['required']
            
           
        ]);
        

        $input['password'] = Hash::make( $input['password'] );

        DB::beginTransaction();

                try{
                    
                $result = Student::create($input);                

                
                }
                catch(\Exception $e)
                {

                DB::rollback();
                return back()->with('error','Something Went Wrong!');
                }

                DB::commit();
                return redirect('/student/index')->with('success', 'Student has been inserted');
        //return back()->with('success','Saved Successfully!');
    }

    public function edit($id)
    {
        $roles = Role::active();
        
        //$student = Student::find( $id );   
        $student =  Student::select('users.id as id','users.name as name','users.email as email','users.record_status as record_status','role_id as role_id')
        ->join('user__role__mappings','user__role__mappings.user_id','=','users.id')
        ->find( $id );          
        return view('student/edit', compact('student','roles'));
    }


    public function update(Student $student, $id)
    {
       
        $input = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255','unique:users,email,'. $id ],
            'record_status'  => ['required'] ,
            //'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role_id'  => ['required']
            
        ]);
        

        DB::beginTransaction();

        try{
            
        $users=Student::find($id);
        $users->update( $input );
                
        $userRole =User_Role_Mapping::where('user_id',$users->id)->first();
        $userRole->user_id = $users->id;
        $userRole->role_id = $input['role_id'];


        $userRole->save();
        }
        catch(\Exception $e)
        {

        DB::rollback();
        return back()->with('error','Something Went Wrong!');
        }

        DB::commit();


        return redirect('/student/index')->with('success', 'Student has been updated');
       
    }


    public function destroy(Request $request)
    {
        $id = $request->input('id');
        if( $id ) {
            $Student = Student::find( $id );     
            if($Student){                

                try {
                    $Student->delete();
                        
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
