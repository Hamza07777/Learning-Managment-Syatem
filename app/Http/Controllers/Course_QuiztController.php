<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Course_Quiz;
use App\Models\Quiz;
use Illuminate\Http\Request;

class Course_QuiztController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (view()->exists('course_quiz.list'))

        {
            $course_quiz=Course_Quiz::all();
            session()->flash('alert-type', 'success');
            session()->flash('message', 'Page is Loading .......');
            return view('course_quiz.list')->with('course_quiz',$course_quiz);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (view()->exists('course_quiz.new'))

        {
            $quiz=Quiz::all();

            $course=Course::all();
            return view('course_quiz.new')->with('course',$course)->with('quiz',$quiz);
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
        $validatedData = $request->validate([
            'quiz_id' => 'required',
            'course_id' => 'required',

       ]);


        $course_quiz=Course_Quiz::create([
            'quiz_id' => $request['quiz_id'],
            'course_id' => $request['course_id'],

        ]);

            if($course_quiz)
            {
                session()->flash('alert-type', 'success');
                session()->flash('message', 'Record added successfully');
                return redirect()->route('course_quiz.index');
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
        if (view()->exists('course_quiz.new'))

        {
            $quiz=Quiz::all();

            $course=Course::all();

            $course_quiz=Course_Quiz::findOrFail($id);
            session()->flash('alert-type', 'success');
            session()->flash('message', 'Page is Loading .......');
            return view('course_quiz.new')->with('course_quiz',$course_quiz)->with('course',$course)->with('quiz',$quiz);
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
        $validatedData = $request->validate([
            'quiz_id' => 'required',
            'course_id' => 'required',

       ]);

        $course_quiz=Course_Quiz::whereId($id)->update([
            'quiz_id' => $request['quiz_id'],
            'course_id' => $request['course_id'],

            ]);

            if($course_quiz)
            {
                    session()->flash('alert-type', 'success');
                    session()->flash('message', 'Record Updated Successfully.');
                    return redirect()->route('course_quiz.index');
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
        $course_quiz = Course_Quiz::findOrFail($id);
        $course_quiz->delete();

        session()->flash('alert-type', 'success');
        session()->flash('message', 'Record deleted successfully');

        return redirect()->route('course_quiz.index');
    }

    public function multiplecourse_quizdelete(Request $request)
	{
		$id = $request->id;
		foreach ($id as $user) 
		{
			Course_Quiz::where('id', $user)->delete();
		}
		session()->flash('alert-type', 'success');
        session()->flash('message', 'Record deleted successfully');

        return redirect()->route('course_quiz.index');
	}
}
