<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User_Marks;
use App\Models\User_Course_Quiz_Marks;
use Illuminate\Http\Request;
use App\Models\User_Course_Assignment_Marks;
use Illuminate\Support\Facades\DB;

class Course_EvaluationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
        $course= DB::table('orders')->where('orders.status','=','completed')->where('orders.course_status','=','under_evaluation')
        ->join('courses','courses.id','orders.course_id')
        ->select('courses.*','orders.id AS order_id')
        ->get();
       // dd($course);
        return view('courses.course_evalutaion_list')->with('course',$course);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $course= DB::table('orders')->where('orders.status','=','completed')->where('orders.course_status','=','under_evaluation')->where('orders.id','=',$id)
        ->join('courses','courses.id','orders.course_id')
        ->select('courses.*','orders.id AS order_id','orders.user_id','orders.course_id')
        ->get();
       // dd($course);
        $assignment_number=User_Course_Assignment_Marks::where('user_id', '=', $course[0]->user_id)->where('course_id', '=', $course[0]->course_id)->whereNull('obtain_marks')->count();
        if($assignment_number > 0){
            session()->flash('alert-type', 'error');
            session()->flash('message', 'Check All the Course Assignments Before Further Proceding.');
            return redirect()->back();

        }

        $quiz_number=User_Course_Quiz_Marks::where('user_id', '=', $course[0]->user_id)->where('course_id', '=', $course[0]->course_id)->whereNull('obtain_marks')->count();
        if($quiz_number > 0){
            session()->flash('alert-type', 'error');
            session()->flash('message', 'Check All the Course Quizzes Before Further Proceding.');
            return redirect()->back();

        }
       // dd($course);
        session()->flash('alert-type', 'success');
        session()->flash('message', 'Page is Loading .......');
        return view('courses.add_marks')->with('course',$course);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $course= DB::table('orders')->where('orders.status','=','completed')->where('orders.course_status','=','under_evaluation')->where('orders.id','=',$id)
        ->join('courses','courses.id','orders.course_id')
        ->select('courses.*','orders.*')
        ->get();
       // dd($course);
        $validatedData = $request->validate([
            'marks' => 'required|numeric|min:1|max:'.$course[0]->total_marks,

       ]);
       $assignment_marks=User_Course_Assignment_Marks::where('user_id', '=', $course[0]->user_id)->where('course_id', '=', $course[0]->course_id)->whereNotNull('obtain_marks')->get();
       $assignment_number=User_Course_Assignment_Marks::where('user_id', '=', $course[0]->user_id)->where('course_id', '=', $course[0]->course_id)->whereNotNull('obtain_marks')->count();
       $assignment_marks_value=0;
       foreach ($assignment_marks as $assignment_marks) {

        $assignment_marks_value+=$assignment_marks->percentage;

       }
       $assignment_percentage=$assignment_marks_value/$assignment_number;



       $quiz_marks=User_Course_Quiz_Marks::where('user_id', '=', $course[0]->user_id)->where('course_id', '=', $course[0]->course_id)->whereNotNull('obtain_marks')->get();
       $quiz_number=User_Course_Quiz_Marks::where('user_id', '=', $course[0]->user_id)->where('course_id', '=', $course[0]->course_id)->whereNotNull('obtain_marks')->count();
       $quiz_marks_value=0;
       foreach ($quiz_marks as $quiz_marks) {

        $quiz_marks_value+=$quiz_marks->percentage;

       }
       $quiz_percentage=$quiz_marks_value/$quiz_number;


     //  dd($assignment_percentage);
       $percentage=(100*$request['marks'])/$course[0]->total_marks;




       $course_percentagee=($assignment_percentage+$percentage+$quiz_percentage)/3;
       $course_percentage=round($course_percentagee, 2);
       $user_marks=User_Marks::create([
            'obtain_marks'=>$request['marks'],
            'user_id'=>$course[0]->user_id,
            'course_id'=>$course[0]->course_id,
            'percentage'=>$course_percentage,
            'message'=>"You have successfully Achieved ".$request['marks'] ." in ". $course[0]->name ."and Percentage is ". $course_percentage."% .",
       ]);

       Order::whereId($id)->update([
                'course_status' => 'completed',
                ]);
                return  redirect()->route('course_evaluation.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
