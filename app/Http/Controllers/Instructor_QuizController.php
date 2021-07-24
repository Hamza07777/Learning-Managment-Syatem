<?php

namespace App\Http\Controllers;

use App\Models\Course_Quiz;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Instructor_QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (view()->exists('quiz.new_instructor'))

        {
            $id=Auth::user()->id;
            $course=DB::table('course__instructors')->where('course__instructors.user_id',$id)
            ->join('courses','courses.id','course__instructors.course_id')
            ->select('courses.*')
            ->get();

            return view('quiz.new_instructor')->with('course',$course);
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
     //   dd($request);
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'total_marks' => 'required|string|max:255',
            'quiz_allow_days' => 'required|string|max:255',
            'quiz_retakes' => 'required|string|max:255',
            'quiz_note' => 'required|string|max:255',
            'file' => 'required',
            'course_id' => 'required',
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

        $quizId= $quiz->id;
        $course_quiz=Course_Quiz::create([
            'quiz_id' => $quizId,
            'course_id' => $request['course_id'],

        ]);

            if($quiz)
            {


                    session()->flash('alert-type', 'success');
                    session()->flash('message', 'Quiz added successfully');
                    return redirect()->route('all_course_instructor_quizzes');
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
            return view('quiz.new_instructor')->with('quiz',$quiz);
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
                    return redirect()->route('all_course_instructor_quizzes');
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

        return redirect()->route('all_user_course_instructor_quizzes');
    }
}
