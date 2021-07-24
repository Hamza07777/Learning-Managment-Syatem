<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CoursesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (view()->exists('courses.list'))

        {
            $course=Course::all();
            session()->flash('alert-type', 'success');
            session()->flash('message', 'Page is Loading .......');
            return view('courses.list')->with('course',$course);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (view()->exists('courses.new'))

        {
           
            return view('courses.new');
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
            'name' => 'required|string|max:255',
            'course_duration' => 'required|string|max:255',
            'no_of_student_allow' => 'required|string|max:255',
            'course_start_date' => 'required|string|max:255',
            'passing_percentage' => 'required|string|max:255',
            'course_retakes' => 'required|string|max:255',
            'price' => 'required|string|max:255',
            'sale_price' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'total_marks' => 'required|string|max:255',
            'file' => 'required',
       ]);

        if ($request->hasFile('file')) {
            $extension=$request->file->extension();
            $filename=time()."_.".$extension;
            $request->file->move(public_path('course'), $filename);
        }
        $course=Course::create([
            'name' => $request['name'],
            'course_duration' => $request['course_duration'],
            'no_of_student_allow' => $request['no_of_student_allow'],
            'course_start_date' => $request['course_start_date'],
            'passing_percentage' => $request['passing_percentage'],
            'course_retakes' => $request['course_retakes'],
            'price' => $request['price'],
            'sale_price' => $request['sale_price'],
            'description' => $request['description'],
            'total_marks' => $request['total_marks'],
            'file' => $filename,

        ]);

            if($course)
            {

 
                    session()->flash('alert-type', 'success');
                    session()->flash('message', 'Course added successfully');
                    return redirect()->route('course.index');
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
        if (view()->exists('courses.new'))

        {
           
            $course=Course::findOrFail($id);
            session()->flash('alert-type', 'success');
            session()->flash('message', 'Page is Loading .......');
            return view('courses.new')->with('course',$course);
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
        $course = Course::findOrFail($id);
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'course_duration' => 'required|string|max:255',
            'no_of_student_allow' => 'required|string|max:255',
            'course_start_date' => 'required|string|max:255',
            'passing_percentage' => 'required|string|max:255',
            'course_retakes' => 'required|string|max:255',
            'price' => 'required|string|max:255',
            'sale_price' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'total_marks' => 'required|string|max:255',
       ]);
       if ($request->hasFile('file')) {

        if (isset($course->file) && file_exists(public_path('course/'.$course->file))) {
            unlink(public_path('course/'.$course->file));
        }


        $extension=$request->file->extension();
        $filename=time()."_.".$extension;
        $request->file->move(public_path('course'), $filename);

        $course=Course::whereId($id)->update([
            'name' => $request['name'],
            'course_duration' => $request['course_duration'],
            'no_of_student_allow' => $request['no_of_student_allow'],
            'course_start_date' => $request['course_start_date'],
            'passing_percentage' => $request['passing_percentage'],
            'course_retakes' => $request['course_retakes'],
            'price' => $request['price'],
            'sale_price' => $request['sale_price'],
            'total_marks' => $request['total_marks'],
            'description' => $request['description'],  
            'file' => $filename,
            ]);
        }
        else{
            $course=Course::whereId($id)->update([
                'name' => $request['name'],
                'course_duration' => $request['course_duration'],
                'no_of_student_allow' => $request['no_of_student_allow'],
                'course_start_date' => $request['course_start_date'],
                'passing_percentage' => $request['passing_percentage'],
                'course_retakes' => $request['course_retakes'],
                'sale_price' => $request['sale_price'],
                'description' => $request['description'],
                'total_marks' => $request['total_marks'],
                'price' => $request['price'],
                ]);
        }
            if($course)
            {                             
                    session()->flash('alert-type', 'success');
                    session()->flash('message', 'Course Updated Successfully.');
                    return redirect()->route('course.index');
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
        $course = Course::findOrFail($id);
        if (isset($course->file) && file_exists(public_path('course/'.$course->file))) {
            unlink(public_path('course/'.$course->file));
        }
        $course->delete();

        session()->flash('alert-type', 'success');
        session()->flash('message', 'Course deleted successfully');

        return redirect()->route('course.index');
    }

    public function multiplecourse_quizdelete(Request $request)
	{
		$id = $request->id;
		foreach ($id as $user) 
		{
            $course = Course::findOrFail($user);
            if (isset($course->file) && file_exists(public_path('course/'.$course->file))) {
                unlink(public_path('course/'.$course->file));
            }
            $course->delete();
		}
        session()->flash('alert-type', 'success');
        session()->flash('message', 'Course deleted successfully');

        return redirect()->route('course.index');
	}
}
