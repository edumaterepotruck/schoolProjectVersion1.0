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
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $data =  User::select('users.id as id','users.name as name','users.record_status as record_status','roles.name as role')
        ->join('user__role__mappings','user__role__mappings.user_id','=','users.id')
        ->join('roles','roles.id','=','user__role__mappings.role_id')
        ->get();

        
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

                DB::commit();
                return redirect('/user/index')->with('success', 'User has been inserted');
        //return back()->with('success','Saved Successfully!');
    }

    public function edit($id)
    {
        $roles = Role::active();
        
        //$user = User::find( $id );   
        $user =  User::select('users.id as id','users.name as name','users.email as email','users.record_status as record_status','role_id as role_id')
        ->join('user__role__mappings','user__role__mappings.user_id','=','users.id')
        ->find( $id );          
        return view('user/edit', compact('user','roles'));
    }


    public function update(User $user, $id)
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
            
        $users=User::find($id);
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
