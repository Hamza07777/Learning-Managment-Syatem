<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Course;
use App\Models\Course_Assignment;
use Illuminate\Http\Request;

class Course_AssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (view()->exists('course_assignment.list'))

        {
            $course_assignment=Course_Assignment::all();
            session()->flash('alert-type', 'success');
            session()->flash('message', 'Page is Loading .......');
            return view('course_assignment.list')->with('course_assignment',$course_assignment);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (view()->exists('course_assignment.new'))

        {
            $assignment=Assignment::all();

            $course=Course::all();
            return view('course_assignment.new')->with('course',$course)->with('assignment',$assignment);
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
            'assignment_id' => 'required',
            'course_id' => 'required',

       ]);


        $course_assignment=Course_Assignment::create([
            'assignment_id' => $request['assignment_id'],
            'course_id' => $request['course_id'],

        ]);

            if($course_assignment)
            {
                session()->flash('alert-type', 'success');
                session()->flash('message', 'Record added successfully');
                return redirect()->route('course_assignment.index');
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
        if (view()->exists('course_assignment.new'))

        {
            $assignment=Assignment::all();

            $course=Course::all();

            $course_assignment=Course_Assignment::findOrFail($id);
            session()->flash('alert-type', 'success');
            session()->flash('message', 'Page is Loading .......');
            return view('course_assignment.new')->with('course_assignment',$course_assignment)->with('course',$course)->with('assignment',$assignment);
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
            'assignment_id' => 'required',
            'course_id' => 'required',

       ]);

        $course_assignment=Course_Assignment::whereId($id)->update([
            'assignment_id' => $request['assignment_id'],
            'course_id' => $request['course_id'],

            ]);

            if($course_assignment)
            {
                    session()->flash('alert-type', 'success');
                    session()->flash('message', 'Record Updated Successfully.');
                    return redirect()->route('course_assignment.index');
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
        $course_assignment = Course_Assignment::findOrFail($id);
        $course_assignment->delete();

        session()->flash('alert-type', 'success');
        session()->flash('message', 'Record deleted successfully');

        return redirect()->route('course_assignment.index');
    }


    public function multiplecourse_quizdelete(Request $request)
	{
		$id = $request->id;
		foreach ($id as $user) 
		{
			Course_Assignment::where('id', $user)->delete();
		}
		session()->flash('alert-type', 'success');
        session()->flash('message', 'Record deleted successfully');

        return redirect()->route('course_assignment.index');
	}
}
