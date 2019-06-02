<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Role;
use App\User_Role_Mapping;

class UsersController extends Controller
{
    public function index()
    {
        $data =  User::all();
        return view('user/view',compact('data'));
    }

    public function list()
    {       
         $data =  User::all();
       
        return view('user/view',compact('data'));
    }

    public function create()
    {
        $roles = Role::active();
        return view('user/create',compact('roles'));
    }

    public function store(User $user)
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
                    
                $result = User::create($input);                

                $userRole = new User_Role_Mapping;
                $userRole->user_id = $result->id;
                $userRole->role_id = $input['role_id'];
                $userRole->save();
                }
                catch(\Exception $e)
                {

                DB::rollback();
                return back()->with('error','Something Went Wrong!');
                }
        
        return back()->with('success','Saved Successfully!');
    }

    public function edit($id)
    {
        $user = User::find( $id );             
        return view('user/edit', compact('user'));
    }


    public function update(User $user, $id)
    {
       
        $input = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'record_status'  => ['required']   
        ]);
        $users=User::find($id);
        $users->update( $input );
        return redirect('/user/index')->with('success', 'User has been updated');
       
    }


    public function destroy(Request $request)
    {
        $id = $request->input('id');
        if( $id ) {
            $User = User::find( $id );     
            if($User){                

                try {
                    $User->delete();
                        
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
