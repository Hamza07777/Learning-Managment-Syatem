<?php

namespace App\Http\Controllers;

use App\Models\Course_Tag;
use App\Models\Category;
use App\Models\Assignment;
use App\Models\Course;
use App\Models\Course_Assignment;
use App\Models\Course_Category;
use App\Models\Tag;
use App\Models\Course_Quiz;
use App\Models\Quiz;
use App\Models\Course_Location;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


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
            $category=Category::where('category_type','course')->get();
            $location=Location::all();
            $tag=Tag::where('tag_type','course')->get();
            $assignment=Assignment::all();
            $quiz=Quiz::all();
            return view('courses.new')->with('tag',$tag)->with('location',$location)->with('category',$category)->with('assignment',$assignment)->with('quiz',$quiz);
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
            'description' => 'required|string',
            'total_marks' => 'required|string|max:255',
            'meta_keyword' => 'required|string|max:255',
            'meta_description' => 'required|string|max:255',
             'meta_title' => 'required|string|max:255',
            'file' => 'required',
            'course_type' => 'required',
            'slug'=>'required|string|max:255|unique:courses',
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
            'course_type' => $request['course_type'],
            'meta_keyword' => $request['meta_keyword'],
            'meta_description' => $request['meta_description'],
            'meta_title' => $request['meta_title'],
            'slug' => $request['slug'],
            'file' => $filename,

        ]);
        $course_id = $course->id;
        $lenght=count((array)$request->get('tag_id')) ;
        if($lenght > 0){
            for ($i=0; $i <$lenght ; $i++) {
                Course_Tag::create([
                     'tag_id' => $request->tag_id[$i],
                     'course_id' => $course_id,
     
                 ]);
             }
        }
        
        $location_idlenght=count((array)$request->get('location_id')) ;
          if($location_idlenght > 0){
            for ($i=0; $i <$location_idlenght ; $i++) {
                Course_Location::create([
                    'location_id' => $request->location_id[$i],
                     'course_id' => $course_id,
        
                ]);
             }
        }

        $category_idlenght=count((array)$request->get('category_id')) ;
          if($category_idlenght > 0){
            for ($i=0; $i <$category_idlenght ; $i++) {
                Course_Category::create([
                'category_id' => $request->category_id[$i],
                'course_id' => $course_id,

                 ]);
             }
        }
        
        $assignment_idlenght=count((array)$request->get('assignment_id')) ;
          if($assignment_idlenght > 0){
            for ($i=0; $i <$assignment_idlenght ; $i++) {
                Course_Assignment::create([
                    'assignment_id' => $request->assignment_id[$i],
                    'course_id' => $course_id,
        
                ]);
             }
        }
        
        $quiz_idlenght=count((array)$request->get('quiz_id')) ;
          if($quiz_idlenght > 0){
            for ($i=0; $i <$quiz_idlenght ; $i++) {
                Course_Quiz::create([
                'quiz_id' => $request->quiz_id[$i],
                'course_id' => $course_id,

                ]);
             }
        }
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
            $tag=Tag::where('tag_type','course')->get();
            $course_tag=Course_Tag::where('course_id',$id)->get();
            $course_location=Course_Location::where('course_id',$id)->get();
            $category=Category::where('category_type','course')->get();
            $course_category=Course_Category::where('course_id',$id)->get();
            $location=Location::all();
            $assignment=Assignment::all();
            $quiz=Quiz::all();
            $course_quiz=Course_Quiz::where('course_id',$id)->get();
            $course_assignment=Course_Assignment::where('course_id',$id)->get();
            session()->flash('alert-type', 'success');
            session()->flash('message', 'Page is Loading .......');
            return view('courses.new')->with('course',$course)->with('tag',$tag)->with('course_tag',$course_tag)->with('location',$location)->with('course_location',$course_location)->with('course_category',$course_category)->with('category',$category)->with('course_assignment',$course_assignment)->with('assignment',$assignment)->with('quiz',$quiz)->with('course_quiz',$course_quiz);
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
        $course_tag=Course_Tag::where('course_id',$id)->count();
            if( $course_tag > 0){
                Course_Tag::where('course_id',$id)->delete();
            }
        $course_location=Course_Location::where('course_id',$id)->count();
            if( $course_location > 0){
                Course_Location::where('course_id',$id)->delete();
            }
        $course_category=Course_Category::where('course_id',$id)->count();
            if( $course_category > 0){
                Course_Category::where('course_id',$id)->delete();
            }
        $course_assignment=Course_Assignment::where('course_id',$id)->count();
            if( $course_assignment > 0){
                Course_Assignment::where('course_id',$id)->delete();
            } 
        $course_quiz=Course_Quiz::where('course_id',$id)->count();
            if( $course_quiz > 0){
                Course_Quiz::where('course_id',$id)->delete();
            }      
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'course_duration' => 'required|string|max:255',
            'no_of_student_allow' => 'required|string|max:255',
            'course_start_date' => 'required|string|max:255',
            'passing_percentage' => 'required|string|max:255',
            'course_retakes' => 'required|string|max:255',
            'price' => 'required|string|max:255',
            'sale_price' => 'required|string|max:255',
            'description' => 'required|string',
            'total_marks' => 'required|string|max:255',
            'course_type' => 'required',
            'meta_keyword' => 'required|string|max:255',
            'meta_description' => 'required|string|max:255',
            'meta_title' => 'required|string|max:255',
            'slug'=>'required|string|max:255',
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
            'course_type' => $request['course_type'],
            'meta_keyword' => $request['meta_keyword'],
            'meta_description' => $request['meta_description'],
            'meta_title' => $request['meta_title'],
            'slug' => $request['slug'],
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
                'course_type' => $request['course_type'],
                'price' => $request['price'],
                'meta_keyword' => $request['meta_keyword'],
                'meta_description' => $request['meta_description'],
                'meta_title' => $request['meta_title'],
                'slug' => $request['slug'],
                ]);
        }
        $lenght=count((array)$request->get('tag_id')) ;
        if($lenght > 0){
            for ($i=0; $i <$lenght ; $i++) {
                Course_Tag::create([
                     'tag_id' => $request->tag_id[$i],
                     'course_id' => $id,
     
                 ]);
             }
        }
        
        $location_idlenght=count((array)$request->get('location_id')) ;
          if($location_idlenght > 0){
            for ($i=0; $i <$location_idlenght ; $i++) {
                Course_Location::create([
                    'location_id' => $request->location_id[$i],
                     'course_id' => $id,
        
                ]);
             }
        }
        
        $category_idlenght=count((array)$request->get('category_id')) ;
          if($category_idlenght > 0){
            for ($i=0; $i <$category_idlenght ; $i++) {
                Course_Category::create([
                'category_id' => $request->category_id[$i],
                'course_id' => $id,

                 ]);
             }
        }
        
        $assignment_idlenght=count((array)$request->get('assignment_id')) ;
          if($assignment_idlenght > 0){
            for ($i=0; $i <$assignment_idlenght ; $i++) {
                Course_Assignment::create([
                    'assignment_id' => $request->assignment_id[$i],
                    'course_id' => $id,
        
                ]);
             }
        }
        
        $quiz_idlenght=count((array)$request->get('quiz_id')) ;
          if($quiz_idlenght > 0){
            for ($i=0; $i <$quiz_idlenght ; $i++) {
                Course_Quiz::create([
                'quiz_id' => $request->quiz_id[$i],
                'course_id' => $id,

                ]);
             }
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
        
        $course_tag=Course_Tag::where('course_id',$id)->count();
            if( $course_tag > 0){
                Course_Tag::where('course_id',$id)->delete();
            }
        $course_location=Course_Location::where('course_id',$id)->count();
            if( $course_location > 0){
                Course_Location::where('course_id',$id)->delete();
            }   
        $course_category=Course_Category::where('course_id',$id)->count();
            if( $course_category > 0){
                Course_Category::where('course_id',$id)->delete();
            } 
        $course_assignment=Course_Assignment::where('course_id',$id)->count();
            if( $course_assignment > 0){
                Course_Assignment::where('course_id',$id)->delete();
            }    
        $course_quiz=Course_Quiz::where('course_id',$id)->count();
            if( $course_quiz > 0){
                Course_Quiz::where('course_id',$id)->delete();
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
	
	public function check_slug(Request $request)
    {

        $slug = Str::slug($request->title);
        if (Course::where('slug',$slug)->exists()) {
                    $random = rand(0, 99999);
                  echo json_encode($slug.'-'.$random);
                    exit;
                }
                else{
                 
                  echo json_encode($slug);
                    exit;
                 
                }
                
            
        
      
    }
}
