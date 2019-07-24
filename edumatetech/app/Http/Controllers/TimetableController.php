<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Day;
use App\Period;
use App\Subject;
use App\Timetable;
use App\ClassMapping;


class TimetableController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        
        $data =  Timetable::select('timetables.id as id','class_mappings.batchname as batchname','days.dayname as day','periods.periodname as period','subjects.name as subject','timetables.record_status as record_status')
        ->join('days','timetables.days_id','=','days.id')
        ->join('periods','timetables.periods_id','=','periods.id')
        ->join('subjects','timetables.subjects_id','=','subjects.id')
        ->join('class_mappings','timetables.class_mappings_id','=','class_mappings.id')
        ->get();
        return view('timeTable/view',compact('data'));
    }

    public function list()
    {       
        // $data =  TimeTable::select('castes.id as id','castes.name as timeTable','religions.name as religion','caste_categories.name as caste_categorie','castes.record_status as record_status')
        // ->join('religions','castes.religion_id','=','religions.id')
        // ->join('caste_categories','castes.caste_categories_id','=','caste_categories.id')
        // ->get();       
        $classMappings = ClassMapping::active();
         return view('timeTable/details',compact('classMappings'));
    }

    public function create()
    {
        $days =  Day::active();
        $periods =  Period::active();
        $subjects =  Subject::active();
        $classMappings = ClassMapping::active();
       
        
        return view('timeTable/create',compact('days','periods','subjects','classMappings'));
    }

    public function store(TimeTable $timeTable)
    {       	
    	
    	$input = request()->validate([
            'class_mappings_id'  => ['required'],
            'days_id'            => ['required'],
            'periods_id'         => ['required'],
            'subjects_id'        => ['required'],            
            'record_status'      => ['required']
           
        ]);

       try{
            $timeTable->create($input);
            }         
            catch (\Exception $e) 
            {
            dd($e->getMessage());
            }  
        return redirect('/timeTable/index')->with('success', 'Saved Successfully!');
        //return back()->with('success','Saved Successfully!');
    }

    public function edit($id)
    {         
       
        $days =  Day::active();
        $periods =  Period::active();
        $subjects =  Subject::active();
        $classMappings = ClassMapping::active();
       

        $data =  Timetable::select('timetables.id as id','class_mappings_id as batchname','days_id as day','periods_id as period','subjects_id as subject','timetables.record_status as record_status')
        ->find( $id );  

       // dd($data);
        return view('timeTable/edit',compact('days','periods','subjects','classMappings','data'));
    }


    public function update(TimeTable $timeTable, $id)
    {
       
        $input = request()->validate([
            'class_mappings_id'  => ['required'],
            'days_id'            => ['required'],
            'periods_id'         => ['required'],
            'subjects_id'        => ['required'],            
            'record_status'      => ['required']
           
        ]);
        try{
        $timeTables=TimeTable::find($id);
        $timeTables->update( $input );
    }         
    catch (\Exception $e) 
    {
    dd($e->getMessage());
    } 
        return redirect('/timeTable/index')->with('success', 'TimeTable has been updated');
        
    }


    public function destroy(Request $request)
    {
        $id = $request->input('id');
        if( $id ) {
            $TimeTable = TimeTable::find( $id );     
            if($TimeTable){                

                try {
                    $TimeTable->delete();
                        
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

    public function getTimeTablebyBatch(Request $request){
       //public function getTimeTablebyBatch(){
        $data =  Timetable::select('timetables.id as id','class_mappings.batchname as batchname','days.dayname as day','periods.periodname as period','subjects.name as subject','timetables.record_status as record_status')
        ->join('days','timetables.days_id','=','days.id')
        ->join('periods','timetables.periods_id','=','periods.id')
        ->join('subjects','timetables.subjects_id','=','subjects.id')
        ->join('class_mappings','timetables.class_mappings_id','=','class_mappings.id')
        ->where('timetables.class_mappings_id','=',$request->input('class_mappings_id'))
        ->get();

        $days = Timetable::select('days.dayname as day')
        ->join('days','timetables.days_id','=','days.id')
        ->where('timetables.class_mappings_id','=',$request->input('class_mappings_id'))
        ->distinct()
        ->get();

        $periods = Timetable::select('periods.periodname as period')
        ->join('periods','timetables.periods_id','=','periods.id')
        ->where('timetables.class_mappings_id','=',$request->input('class_mappings_id'))
        ->distinct()
        ->get();

        //dd($days);

        //return response()->json(['days ' => $days, 'periods' => $periods]);
//return response()->json( $data ); 
return view('timeTable/detailview',compact('days','periods','data'));
//return view('timeTable/detailview')->with('days', $days)->with('periods', $periods)->with('data', $data);
	}

}
