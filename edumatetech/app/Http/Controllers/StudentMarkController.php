<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\StudentMark;
use App\AcademicYear;
use App\ClassMapping;
use App\Student;

class StudentMarkController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function create()
    {        
        $academicyear = AcademicYear::active();
        $class = ClassMapping::active();
        return view('studentMark/create',compact('academicyear','class'));
    }

    public function getstudent(Request $request)
    {   
         
        $stud = Student::select('students.id','students.firstname','students.rollno')
                        ->join('student_class_mapps','student_class_mapps.students_id','students.id')
                        ->where('student_class_mapps.academic_years_id',$request->input('accademic_id'))
                        ->where('student_class_mapps.class_mappings_id',$request->input('class_mappings_id'))
                        ->get();
      
       return response()->json(  $stud ); 
    }

    public function store(Request $request)
    {   

        
        dd($request);
    }
}
