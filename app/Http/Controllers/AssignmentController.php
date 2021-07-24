<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use App\Models\Assignment;
use App\Models\User_Course_Assignment_Marks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (view()->exists('assignment.list'))

        {
            $assignment=Assignment::all();
            session()->flash('alert-type', 'success');
            session()->flash('message', 'Page is Loading .......');
            return view('assignment.list')->with('assignment',$assignment);
        }
    }

    public function all_course_instructor_assignment()
    {
        $id=Auth::user()->id;
        $assignment=DB::table('course__instructors')->where('course__instructors.user_id',$id)
        ->join('course__assignments','course__assignments.course_id','course__instructors.course_id')
        ->join('assignments','assignments.id','course__assignments.assignment_id')
        ->select('assignments.*')
        ->get();
       // dd($assignment);
          //  $assignment=Assignment::all();
            session()->flash('alert-type', 'success');
            session()->flash('message', 'Page is Loading .......');
            return view('assignment.all_course_assignment_instructor')->with('assignment',$assignment);

    }

    public function all_user_course_instructor_assignment()
    {
        $id=Auth::user()->id;
        $user_course_assignment_marks=DB::table('course__instructors')->where('course__instructors.user_id',$id)
        ->join('user__course__assignment__marks','user__course__assignment__marks.course_id','course__instructors.course_id')->whereNull('obtain_marks')
        ->join('assignments','assignments.id','user__course__assignment__marks.assignment_id')
        ->join('users','users.id','user__course__assignment__marks.user_id')
        ->join('courses','courses.id','user__course__assignment__marks.course_id')
        ->select('user__course__assignment__marks.*','assignments.title AS assignment_name','assignments.assignment_total_marks AS assignment_assignment_total_marks','users.name AS user_name','courses.name AS courses_name')
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
      //  dd($user_course_assignment_marks);
          //  $assignment=Assignment::all();
            session()->flash('alert-type', 'success');
            session()->flash('message', 'Page is Loading .......');
            return view('assignment.all_user_course_assignment_instructor')
            ->with('user_course_assignment_marks',$user_course_assignment_marks)->with('course',$course)->with('user',$user);

    }

    public function all_user_course_instructor_assignment_filter(Request $request)
    {
        $id=Auth::user()->id;
        $user_course_assignment_marks=DB::table('course__instructors')->where('course__instructors.user_id',$id)
        ->join('user__course__assignment__marks','user__course__assignment__marks.course_id','course__instructors.course_id')->whereNull('obtain_marks')->where('user__course__assignment__marks.user_id',$request->user_id)->where('user__course__assignment__marks.course_id',$request->course_id)
        ->join('assignments','assignments.id','user__course__assignment__marks.assignment_id')
        ->join('users','users.id','user__course__assignment__marks.user_id')
        ->join('courses','courses.id','user__course__assignment__marks.course_id')
        ->select('user__course__assignment__marks.*','assignments.title AS assignment_name','assignments.assignment_total_marks AS assignment_assignment_total_marks','users.name AS user_name','courses.name AS courses_name')
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
      //  dd($user_course_assignment_marks);
          //  $assignment=Assignment::all();
            session()->flash('alert-type', 'success');
            session()->flash('message', 'Page is Loading .......');
            return view('assignment.all_user_course_assignment_instructor')
            ->with('user_course_assignment_marks',$user_course_assignment_marks)->with('course',$course)->with('user',$user);

    }

    public function add_assignment_mark_view_instructor($id)
    {
        if (view()->exists('assignment.add_marks'))

        {
            $user_course_assignment_marks=User_Course_Assignment_Marks::findOrFail($id);

            $assignment=Assignment::findOrFail($user_course_assignment_marks->assignment_id);
            session()->flash('alert-type', 'success');
            session()->flash('message', 'Page is Loading .......');
            return view('assignment.add_marks_instructor')->with('assignment',$assignment)->with('user_course_assignment_marks',$user_course_assignment_marks);
        }

    }

    public function add_assignment_mark_submit_instructor(Request $request,$id){


        $user_course_assignment_marks=User_Course_Assignment_Marks::findOrFail($id);

        $assignment=Assignment::findOrFail($user_course_assignment_marks->assignment_id);
       // dd($course);
        $validatedData = $request->validate([
            'marks' => 'required|numeric|min:1|max:'.$assignment->assignment_total_marks,

       ]);
       $percentage=(100*$request['marks'])/$assignment->assignment_total_marks;
     //  dd($request);
       $user_marks=User_Course_Assignment_Marks::whereId($id)->update([
            'obtain_marks'=>$request['marks'],
            'percentage'=>$percentage,
            'message'=>"You have successfully Achieved ".$request['marks'] ." in ". $assignment->title ."and Percentage is ". $percentage."% .",
       ]);

       session()->flash('alert-type', 'success');
       session()->flash('message', 'Page is Loading .......');
        return  redirect()->route('all_user_course_instructor_assignment');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (view()->exists('assignment.new'))

        {

            return view('assignment.new');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //  dd($request);
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'assignment_total_marks' => 'required|string|max:255',
            'assignment_note' => 'required|string|max:255',
            'assignment_days' => 'required|string|max:255',
            'assignment_detail' => 'required|string|max:255',
            'assignment_file' => 'required',
       ]);

        if ($request->hasFile('assignment_file')) {
            $extension=$request->assignment_file->extension();
            $filename=time()."_.".$extension;
            $request->assignment_file->move(public_path('assignment'), $filename);
        }
        $assignment=Assignment::create([
            'title' => $request['title'],
            'assignment_total_marks' => $request['assignment_total_marks'],
            'assignment_note' => $request['assignment_note'],
            'assignment_days' => $request['assignment_days'],
            'assignment_detail' => $request['assignment_detail'],
            'assignment_file' => $filename,
        ]);

            if($assignment)
            {


                    session()->flash('alert-type', 'success');
                    session()->flash('message', 'Assignment added successfully');
                    return redirect()->route('assignment.index');
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
        if (view()->exists('assignment.new'))

        {

            $assignment=Assignment::findOrFail($id);
            session()->flash('alert-type', 'success');
            session()->flash('message', 'Page is Loading .......');
            return view('assignment.new')->with('assignment',$assignment);
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
        $assignment = Assignment::findOrFail($id);
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'assignment_total_marks' => 'required|string|max:255',
            'assignment_note' => 'required|string|max:255',
            'assignment_days' => 'required|string|max:255',
            'assignment_detail' => 'required|string|max:255',
       ]);
       if ($request->hasFile('assignment_file')) {

        if (isset($assignment->assignment_file) && file_exists(public_path('assignment/'.$assignment->assignment_file))) {
            unlink(public_path('assignment/'.$assignment->assignment_file));
        }


        $extension=$request->assignment_file->extension();
        $filename=time()."_.".$extension;
        $request->assignment_file->move(public_path('assignment'), $filename);
        $assignment=Assignment::whereId($id)->update([
            'title' => $request['title'],
            'assignment_total_marks' => $request['assignment_total_marks'],
            'assignment_note' => $request['assignment_note'],
            'assignment_days' => $request['assignment_days'],
            'assignment_detail' => $request['assignment_detail'],
            'assignment_file' => $filename,
            ]);
    }
        else{
            $assignment=Assignment::whereId($id)->update([
                'title' => $request['title'],
                'assignment_total_marks' => $request['assignment_total_marks'],
                'assignment_note' => $request['assignment_note'],
                'assignment_days' => $request['assignment_days'],
                'assignment_detail' => $request['assignment_detail'],

                ]);

        }


            if($assignment)
            {
                    session()->flash('alert-type', 'success');
                    session()->flash('message', 'Assignment Updated Successfully.');
                    return redirect()->route('assignment.index');
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
        $assignment = Assignment::findOrFail($id);
        if (isset($assignment->assignment_file) && file_exists(public_path('assignment/'.$assignment->assignment_file))) {
            unlink(public_path('assignment/'.$assignment->assignment_file));
        }
        $assignment->delete();

        session()->flash('alert-type', 'success');
        session()->flash('message', 'Assignment deleted successfully');

        return redirect()->route('assignment.index');
    }

    public function download($file){
        $file_path = public_path('assignment/'.$file);
        return response()->download( $file_path);
    }




    public function all_user_course_assignment(){
        $user=User::where('role', 'user')->get();

        $course=Course::all();
        $user_course_assignment_marks=User_Course_Assignment_Marks::whereNull('obtain_marks')->get();
        session()->flash('alert-type', 'success');
        session()->flash('message', 'Page is Loading .......');
        return view('assignment.all_user_course_assignment')
        ->with('user_course_assignment_marks',$user_course_assignment_marks)->with('user',$user)->with('course',$course);

    }

    public function all_user_course_assignment_filter(Request $request){
        $user=User::where('role', 'user')->get();

        $course=Course::all();

        $user_course_assignment_marks=User_Course_Assignment_Marks::whereNull('obtain_marks')->where('user_id',$request->user_id)->where('course_id',$request->course_id)->get();
        session()->flash('alert-type', 'success');
        session()->flash('message', 'Page is Loading .......');
        return view('assignment.all_user_course_assignment')
        ->with('user_course_assignment_marks',$user_course_assignment_marks)->with('user',$user)->with('course',$course);


    }



    public function add_assignment_mark_view($id)
    {
        if (view()->exists('assignment.add_marks'))

        {
            $user_course_assignment_marks=User_Course_Assignment_Marks::findOrFail($id);

            $assignment=Assignment::findOrFail($user_course_assignment_marks->assignment_id);
            session()->flash('alert-type', 'success');
            session()->flash('message', 'Page is Loading .......');
            return view('assignment.add_marks')->with('assignment',$assignment)->with('user_course_assignment_marks',$user_course_assignment_marks);
        }

    }

    public function add_assignment_mark_submit(Request $request,$id){


        $user_course_assignment_marks=User_Course_Assignment_Marks::findOrFail($id);

        $assignment=Assignment::findOrFail($user_course_assignment_marks->assignment_id);
       // dd($course);
        $validatedData = $request->validate([
            'marks' => 'required|numeric|min:1|max:'.$assignment->assignment_total_marks,

       ]);
       $percentage=(100*$request['marks'])/$assignment->assignment_total_marks;
     //  dd($request);
       $user_marks=User_Course_Assignment_Marks::whereId($id)->update([
            'obtain_marks'=>$request['marks'],
            'percentage'=>$percentage,
            'message'=>"You have successfully Achieved ".$request['marks'] ." in ". $assignment->title ."and Percentage is ". $percentage."% .",
       ]);

       session()->flash('alert-type', 'success');
       session()->flash('message', 'Page is Loading .......');
        return  redirect()->route('all_user_course_assignment');

    }



    public function multiplecourse_quizdelete(Request $request)
	{
		$id = $request->id;
		foreach ($id as $user)
		{
            $assignment = Assignment::findOrFail($user);
            if (isset($assignment->assignment_file) && file_exists(public_path('assignment/'.$assignment->assignment_file))) {
                unlink(public_path('assignment/'.$assignment->assignment_file));
            }
            $assignment->delete();
		}
		session()->flash('alert-type', 'success');
        session()->flash('message', 'Assignment deleted successfully');

        return redirect()->route('assignment.index');
	}
}
