<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Course_Instructor;
use App\Models\User;
use Illuminate\Http\Request;

class Course_InstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (view()->exists('course_instructor.list'))

        {
            $course_instructor=Course_Instructor::all();
            session()->flash('alert-type', 'success');
            session()->flash('message', 'Page is Loading .......');
            return view('course_instructor.list')->with('course_instructor',$course_instructor);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (view()->exists('course_instructor.new'))

        {
            $user=User::where('role', 'instructor')->get();

            $course=Course::all();
            return view('course_instructor.new')->with('course',$course)->with('user',$user);
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
            'user_id' => 'required',
            'course_id' => 'required',

       ]);


        $course_instructor=Course_Instructor::create([
            'user_id' => $request['user_id'],
            'course_id' => $request['course_id'],

        ]);

            if($course_instructor)
            {
                session()->flash('alert-type', 'success');
                session()->flash('message', 'Record added successfully');
                return redirect()->route('course_instructor.index');
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
        if (view()->exists('course_instructor.new'))

        {
            $user=User::where('role', 'instructor')->get();

            $course=Course::all();

            $course_instructor=Course_Instructor::findOrFail($id);
            session()->flash('alert-type', 'success');
            session()->flash('message', 'Page is Loading .......');
            return view('course_instructor.new')->with('course_instructor',$course_instructor)->with('course',$course)->with('user',$user);
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
            'user_id' => 'required',
            'course_id' => 'required',

       ]);

        $course_instructor=Course_Instructor::whereId($id)->update([
            'user_id' => $request['user_id'],
            'course_id' => $request['course_id'],

            ]);

            if($course_instructor)
            {
                    session()->flash('alert-type', 'success');
                    session()->flash('message', 'Record Updated Successfully.');
                    return redirect()->route('course_instructor.index');
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
        $course_instructor = Course_Instructor::findOrFail($id);
        $course_instructor->delete();

        session()->flash('alert-type', 'success');
        session()->flash('message', 'Record deleted successfully');

        return redirect()->route('course_instructor.index');
    }

    public function multiplecourse_quizdelete(Request $request)
	{
		$id = $request->id;
		foreach ($id as $user)
		{
			Course_Instructor::where('id', $user)->delete();
		}
        session()->flash('alert-type', 'success');
        session()->flash('message', 'Record deleted successfully');

        return redirect()->route('course_instructor.index');
	}
}
