<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Quiz;
use App\Models\User;
use App\Models\User_Course_Quiz_Marks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (view()->exists('quiz.list'))

        {
            $quiz=Quiz::all();
            session()->flash('alert-type', 'success');
            session()->flash('message', 'Page is Loading .......');
            return view('quiz.list')->with('quiz',$quiz);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (view()->exists('quiz.new'))

        {

            return view('quiz.new');
        }
    }

    

    public function all_course_instructor_quizzes()
    {
        $id=Auth::user()->id;
        $quiz=DB::table('course__instructors')->where('course__instructors.user_id',$id)
        ->join('course__quizzes','course__quizzes.course_id','course__instructors.course_id')
        ->join('quizzes','quizzes.id','course__quizzes.quiz_id')
        ->select('quizzes.*')
        ->get();
       // dd($assignment);
          //  $assignment=Assignment::all();
            session()->flash('alert-type', 'success');
            session()->flash('message', 'Page is Loading .......');
            return view('quiz.all_course_quiz_instructor')->with('quiz',$quiz);

    }






    public function all_user_course_instructor_quizzes()
    {
        $id=Auth::user()->id;
        $user_course_quiz_marks=DB::table('course__instructors')->where('course__instructors.user_id',$id)
        ->join('user__course__quiz__marks','user__course__quiz__marks.course_id','course__instructors.course_id')->whereNull('obtain_marks')
        ->join('quizzes','quizzes.id','user__course__quiz__marks.quiz_id')
        ->join('users','users.id','user__course__quiz__marks.user_id')
        ->join('courses','courses.id','user__course__quiz__marks.course_id')
        ->select('user__course__quiz__marks.*','quizzes.title AS quiz_name','quizzes.total_marks AS quizzes_total_marks','users.name AS user_name','courses.name AS courses_name')
        ->get();

        $course=DB::table('course__instructors')->where('course__instructors.user_id',$id)
        ->join('courses','courses.id','course__instructors.course_id')
        ->select('courses.*')
        ->get();
        $user=DB::table('course__instructors')->where('course__instructors.user_id',$id)
        ->join('orders','orders.course_id','course__instructors.course_id')->where('orders.status','=','completed')->where('orders.course_status','=','under_evaluation')
        ->join('users','users.id','orders.user_id')
        ->select('users.*')
        ->get();
     //   dd($user_course_quiz_marks);
          //  $assignment=Assignment::all();
            session()->flash('alert-type', 'success');
            session()->flash('message', 'Page is Loading .......');
            return view('quiz.all_user_course_quiz_instructor')
            ->with('user_course_quiz_marks',$user_course_quiz_marks)->with('course',$course)->with('user',$user);

    }
    public function all_user_course_instructor_quizzes_filter(Request $request)
    {
        $id=Auth::user()->id;
        $user_course_quiz_marks=DB::table('course__instructors')->where('course__instructors.user_id',$id)
        ->join('user__course__quiz__marks','user__course__quiz__marks.course_id','course__instructors.course_id')->whereNull('obtain_marks')->where('user__course__quiz__marks.user_id',$request->user_id)->where('user__course__quiz__marks.course_id',$request->course_id)
        ->join('quizzes','quizzes.id','user__course__quiz__marks.quiz_id')
        ->join('users','users.id','user__course__quiz__marks.user_id')
        ->join('courses','courses.id','user__course__quiz__marks.course_id')
        ->select('user__course__quiz__marks.*','quizzes.title AS quiz_name','quizzes.total_marks AS quizzes_total_marks','users.name AS user_name','courses.name AS courses_name')
        ->get();

        $course=DB::table('course__instructors')->where('course__instructors.user_id',$id)
        ->join('courses','courses.id','course__instructors.course_id')
        ->select('courses.*')
        ->get();
        $user=DB::table('course__instructors')->where('course__instructors.user_id',$id)
        ->join('orders','orders.course_id','course__instructors.course_id')->where('orders.status','=','completed')->where('orders.course_status','=','under_evaluation')
        ->join('users','users.id','orders.user_id')
        ->select('users.*')
        ->get();
     //   dd($user_course_quiz_marks);
          //  $assignment=Assignment::all();
            session()->flash('alert-type', 'success');
            session()->flash('message', 'Page is Loading .......');
            return view('quiz.all_user_course_quiz_instructor')
            ->with('user_course_quiz_marks',$user_course_quiz_marks)->with('course',$course)->with('user',$user);

    }


    public function add_quiz_mark_view_instructor($id)
    {
        if (view()->exists('assignment.add_marks')) {
            $user_course_quiz_marks=User_Course_Quiz_Marks::findOrFail($id);

            $quiz=Quiz::findOrFail($user_course_quiz_marks->quiz_id);
            session()->flash('alert-type', 'success');
            session()->flash('message', 'Page is Loading .......');
            return view('quiz.add_marks_instructor')->with('quiz', $quiz)->with('user_course_quiz_marks', $user_course_quiz_marks);
        }
    }    




    public function add_quiz_mark_submit_instructor(Request $request,$id){


        $user_course_quiz_marks=User_Course_Quiz_Marks::findOrFail($id);

        $quiz=Quiz::findOrFail($user_course_quiz_marks->quiz_id);
       // dd($course);
        $validatedData = $request->validate([
            'marks' => 'required|numeric|min:1|max:'.$quiz->total_marks,

       ]);
       $percentage=(100*$request['marks'])/$quiz->total_marks;
     //  dd($request);
       $user_marks=User_Course_Quiz_Marks::whereId($id)->update([
            'obtain_marks'=>$request['marks'],
            'percentage'=>$percentage,
            'message'=>"You have successfully Achieved ".$request['marks'] ." in ". $quiz->title ."and Percentage is ". $percentage."% .",
       ]);

       session()->flash('alert-type', 'success');
       session()->flash('message', 'Page is Loading .......');
        return  redirect()->route('all_user_course_instructor_quizzes');

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     //   dd($request);
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'total_marks' => 'required|string|max:255',
            'quiz_allow_days' => 'required|string|max:255',
            'quiz_retakes' => 'required|string|max:255',
            'quiz_note' => 'required|string|max:255',
            'file' => 'required',
       ]);

        if ($request->hasFile('file')) {
            $extension=$request->file->extension();
            $filename=time()."_.".$extension;
            $request->file->move(public_path('quiz'), $filename);
        }
        $quiz=Quiz::create([
            'title' => $request['title'],
            'total_marks' => $request['total_marks'],
            'quiz_allow_days' => $request['quiz_allow_days'],
            'quiz_retakes' => $request['quiz_retakes'],
            'quiz_note' => $request['quiz_note'],
            'file' => $filename,
        ]);

            if($quiz)
            {


                    session()->flash('alert-type', 'success');
                    session()->flash('message', 'Quiz added successfully');
                    return redirect()->route('quiz.index');
            }
            else{
                session()->flash('alert-type', 'error');
                session()->flash('message', 'Record Not Added.');
                return redirect()->back();
            }
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
    public function edit($id)
    {
        if (view()->exists('quiz.new'))

        {

            $quiz=Quiz::findOrFail($id);
            session()->flash('alert-type', 'success');
            session()->flash('message', 'Page is Loading .......');
            return view('quiz.new')->with('quiz',$quiz);
        }

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
        $quiz = Quiz::findOrFail($id);
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'total_marks' => 'required|string|max:255',
            'quiz_allow_days' => 'required|string|max:255',
            'quiz_retakes' => 'required|string|max:255',
            'quiz_note' => 'required|string|max:255',
       ]);
       if ($request->hasFile('file')) {

        if (isset($quiz->file) && file_exists(public_path('quiz/'.$quiz->file))) {
            unlink(public_path('quiz/'.$quiz->file));
        }


        $extension=$request->file->extension();
        $filename=time()."_.".$extension;
        $request->file->move(public_path('quiz'), $filename);

        $quiz=Quiz::whereId($id)->update([
            'title' => $request['title'],
            'total_marks' => $request['total_marks'],
            'quiz_allow_days' => $request['quiz_allow_days'],
            'quiz_retakes' => $request['quiz_retakes'],
            'quiz_note' => $request['quiz_note'],
            'file' => $filename,
            ]);
    }
        else{
            $quiz=Quiz::whereId($id)->update([
              'title' => $request['title'],
            'total_marks' => $request['total_marks'],
            'quiz_allow_days' => $request['quiz_allow_days'],
            'quiz_retakes' => $request['quiz_retakes'],
            'quiz_note' => $request['quiz_note'],
                ]);

        }


            if($quiz)
            {
                    session()->flash('alert-type', 'success');
                    session()->flash('message', 'Quiz Updated Successfully.');
                    return redirect()->route('quiz.index');
            }
            else{
                session()->flash('alert-type', 'error');
                session()->flash('message', 'Record Not Updated.');
                return redirect()->back();
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $quiz = Quiz::findOrFail($id);
        if (isset($quiz->file) && file_exists(public_path('quiz/'.$quiz->file))) {
            unlink(public_path('quiz/'.$quiz->file));
        }
        $quiz->delete();

        session()->flash('alert-type', 'success');
        session()->flash('message', 'Quiz deleted successfully');

        return redirect()->route('quiz.index');
    }

    public function download($file){
        $file_path = public_path('quiz/'.$file);
        session()->flash('alert-type', 'success');
        session()->flash('message', 'file Download successfully');
        return response()->download( $file_path);
    }


    public function all_user_course_quiz(){
        $user=User::where('role', 'user')->get();

        $course=Course::all();
        $user_course_quiz_marks=User_Course_Quiz_Marks::whereNull('obtain_marks')->get();
        session()->flash('alert-type', 'success');
        session()->flash('message', 'Page is Loading .......');
        return view('quiz.all_user_course_quiz')
        ->with('user_course_quiz_marks',$user_course_quiz_marks)->with('user',$user)->with('course',$course);

    }

    public function all_user_course_quiz_filter(Request $request){
        $user=User::where('role', 'user')->get();

        $course=Course::all();

        $user_course_quiz_marks=User_Course_Quiz_Marks::whereNull('obtain_marks')->where('user_id',$request->user_id)->where('course_id',$request->course_id)->get();
        session()->flash('alert-type', 'success');
        session()->flash('message', 'Page is Loading .......');
        return view('quiz.all_user_course_quiz')
        ->with('user_course_quiz_marks',$user_course_quiz_marks)->with('user',$user)->with('course',$course);


    }

    public function add_quiz_mark_view($id)
    {
        if (view()->exists('assignment.add_marks')) {
            $user_course_quiz_marks=User_Course_Quiz_Marks::findOrFail($id);

            $quiz=Quiz::findOrFail($user_course_quiz_marks->quiz_id);
            session()->flash('alert-type', 'success');
            session()->flash('message', 'Page is Loading .......');
            return view('quiz.add_marks')->with('quiz', $quiz)->with('user_course_quiz_marks', $user_course_quiz_marks);
        }
    }    




    public function add_quiz_mark_submit(Request $request,$id){


        $user_course_quiz_marks=User_Course_Quiz_Marks::findOrFail($id);

        $quiz=Quiz::findOrFail($user_course_quiz_marks->quiz_id);
       // dd($course);
        $validatedData = $request->validate([
            'marks' => 'required|numeric|min:1|max:'.$quiz->total_marks,

       ]);
       $percentage=(100*$request['marks'])/$quiz->total_marks;
     //  dd($request);
       $user_marks=User_Course_Quiz_Marks::whereId($id)->update([
            'obtain_marks'=>$request['marks'],
            'percentage'=>$percentage,
            'message'=>"You have successfully Achieved ".$request['marks'] ." in ". $quiz->title ."and Percentage is ". $percentage."% .",
       ]);

       session()->flash('alert-type', 'success');
       session()->flash('message', 'Page is Loading .......');
        return  redirect()->route('all_user_course_quiz');

    }
    

    public function multiplecourse_quizdelete(Request $request)
	{
		$id = $request->id;
		foreach ($id as $user)
		{
            $quiz = Quiz::findOrFail($user);
            if (isset($quiz->file) && file_exists(public_path('quiz/'.$quiz->file))) {
                unlink(public_path('quiz/'.$quiz->file));
            }
            $quiz->delete();
		}
		session()->flash('alert-type', 'success');
        session()->flash('message', 'Quiz deleted successfully');

        return redirect()->route('quiz.index');
	}
}
