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
use App\AcademicYear;
use App\ClassMapping;
use App\StudentClassMapp;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $data =  Student::select('id','firstname as name','record_status')        
        ->get();

        
        return view('student/view',compact('data'));
    }

    public function list()
    {       
        $data =  Student::select('id','firstname as name','record_status')->get();
       
        return view('student/view',compact('data'));
    }

    public function create()
    {
        $religions =  Religion::active();
        $castes = Caste::active();
        $academicyear = AcademicYear::active();
        $class = ClassMapping::active();
        return view('student/create',compact('religions','castes','academicyear','class'));
    }

    public function store(Student $student)
    {       	
    	
    	$validator = request()->validate([
            'academic_years_id' => ['required'],
            'class_mappings_id' => ['required'], 
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],          
            'gender'  => ['required'],
            'dob'  => ['required'],
            'identification'  => ['required'],
            'bloodGroup'  => ['nullable'],
            'admission_date'  => ['required'],
            'admission_no'  => ['required'],
            'rollno'  => ['required'],
            'registration_no'  => ['required'],
            'gaurdianName'  => ['required'],
            'gaurdianRelation'  => ['required'],
            'mobile'  => ['required'],
            'alt_mobile'  => ['nullable'],
            'telephone'  => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:students'],
            'address1'  => ['required'],
            'address2'  => ['nullable'],
            'country'  => ['required'],
            'state'  => ['required'],
            'district'  => ['required'],
            'city'  => ['required'],
            'religion_id'  => ['required'],
            'caste_id'  => ['required'],
            'pincode'  => ['required'],
            'record_status'  => ['required']
            
           
        ]);


        //dd($validator['academic_years_id']);
        
        //$result = Student::create($input);       

        DB::beginTransaction();

                try{
                    $input =   request(['firstname', 'lastname', 'gender','dob',
                    'identification','bloodGroup','admission_date','admission_no',
                    'rollno','registration_no','gaurdianName','gaurdianRelation','mobile',
                    'alt_mobile','telephone','email','address1',
                    'address2','country','state','district',
                    'city','religion_id','caste_id','pincode','record_status']);
               $stud=Student::create($input);                
               $input1 =   request([ 'academic_years_id','class_mappings_id']);
              // StudentClassMapp::create($input1); 
              $studentClassMapp = new StudentClassMapp();
              $studentClassMapp->students_id=$stud->id;
              $studentClassMapp->academic_years_id=$validator['academic_years_id'];
              $studentClassMapp->class_mappings_id=$validator['class_mappings_id'];
              $studentClassMapp->save();
                }
                catch(\Exception $e)
                {
dd($e->getMessage());
                DB::rollback();
                return back()->with('error','Something Went Wrong!');
                }

                DB::commit();
               return redirect('/student/index')->with('success', 'Student has been inserted');
        //return back()->with('success','Saved Successfully!');
    }

    public function edit($id)
    {        
        $religions =  Religion::active();
        $castes = Caste::active();
        $data =  Student::find( $id );  
        return view('student/edit',compact('religions','castes','data'));
        
    }


    public function update(Student $student, $id)
    {
       
        $input = request()->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],          
            'gender'  => ['required'],
            'dob'  => ['required'],
            'identification'  => ['required'],
            'bloodGroup'  => ['nullable'],
            'admission_date'  => ['required'],
            'admission_no'  => ['required'],
            'rollno'  => ['required'],
            'registration_no'  => ['required'],
            'gaurdianName'  => ['required'],
            'gaurdianRelation'  => ['required'],
            'mobile'  => ['required'],
            'alt_mobile'  => ['nullable'],
            'telephone'  => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:students,email,'. $id],
            'address1'  => ['required'],
            'address2'  => ['nullable'],
            'country'  => ['required'],
            'state'  => ['required'],
            'district'  => ['required'],
            'city'  => ['required'],
            'religion_id'  => ['required'],
            'caste_id'  => ['required'],
            'pincode'  => ['required'],
            'record_status'  => ['required']
            
           
        ]);
        

        DB::beginTransaction();

        try{
            
        $students=Student::find($id);
        $students->update( $input );
                
       
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
