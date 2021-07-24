<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Course_Assignment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Instructor_AssignmentController extends Controller
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
        if (view()->exists('assignment.new_instructor'))
        {
            $id=Auth::user()->id;
            $course=DB::table('course__instructors')->where('course__instructors.user_id',$id)
            ->join('courses','courses.id','course__instructors.course_id')
            ->select('courses.*')
            ->get();
            return view('assignment.new_instructor')->with('course',$course);
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
            'course_id' => 'required',
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
  

        $assignmentId= $assignment->id;
        $course_assignment=Course_Assignment::create([
            'assignment_id' => $assignmentId,
            'course_id' => $request['course_id'],
        ]);
            if($assignment)
            {


                    session()->flash('alert-type', 'success');
                    session()->flash('message', 'Assignment added successfully');
                    return redirect()->route('all_course_instructor_assignment');
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
        if (view()->exists('assignment.new_instructor'))

        {
            $auth_id=Auth::user()->id;
            $course=DB::table('course__instructors')->where('course__instructors.user_id',$auth_id)
            ->join('courses','courses.id','course__instructors.course_id')
            ->select('courses.*')
            ->get();
            $assignment=Assignment::findOrFail($id);
            session()->flash('alert-type', 'success');
            session()->flash('message', 'Page is Loading .......');
            return view('assignment.new_instructor')->with('assignment',$assignment);
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
                    return redirect()->route('all_course_instructor_assignment');
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
        dd($id);
        $assignment = Assignment::findOrFail($id);
        if (isset($assignment->assignment_file) && file_exists(public_path('assignment/'.$assignment->assignment_file))) {
            unlink(public_path('assignment/'.$assignment->assignment_file));
        }
        $assignment->delete();

        session()->flash('alert-type', 'success');
        session()->flash('message', 'Assignment deleted successfully');

        return redirect()->route('all_course_instructor_assignment');
    }

}
