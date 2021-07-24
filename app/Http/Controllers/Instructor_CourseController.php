<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User_detail;
use App\Models\Course;
use App\Models\Order;
use App\Models\User_Marks;
use App\Models\User_Course_Quiz_Marks;
use App\Models\User_Course_Assignment_Marks;

class Instructor_CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (view()->exists('frontend.courses'))

        {
            $id=Auth::user()->id;
           $course=DB::table('course__instructors')->where('course__instructors.user_id',$id)
                  ->join('courses','courses.id','course__instructors.course_id')
                  ->select('courses.*')
                  ->get();
          //  $course=Course::all();
            session()->flash('alert-type', 'success');
            session()->flash('message', 'Page is Loading .......');
            return view('frontend.instructor_courses')->with('course',$course);
        }
    }
    public function course_evaluation()
    {
        if (view()->exists('frontend.courses'))

        {
            $id=Auth::user()->id;
           $course=DB::table('course__instructors')->where('course__instructors.user_id',$id)
                  ->join('orders','orders.course_id','course__instructors.course_id')->where('orders.status','=','completed')->where('orders.course_status','=','under_evaluation')
                  ->join('courses','courses.id','course__instructors.course_id')
                  ->select('courses.*','orders.id AS order_id')
                  ->get();
               //   dd($course);
                //   $course= DB::table('orders')->where('orders.status','=','completed')->where('orders.course_status','=','under_evaluation')
                //   ->join('courses','courses.id','orders.course_id')
                //   ->select('courses.*','orders.id AS order_id')
                //   ->get();
          //  $course=Course::all();
            // session()->flash('alert-type', 'success');
            // session()->flash('message', 'Page is Loading .......');
            return view('courses.course_evalutaion_list_instructor')->with('course',$course);

        }
    }




    public function user_profile()
    {
        $user=Auth::user();
        session()->flash('alert-type', 'success');
        session()->flash('message', 'Page is Loading .......');
        return view('frontend.instrucotr_profile')->with('user',$user);


    }

    public function update_password(Request  $request)
    {
        $id=Auth::user()->id;
        $validatedData = $request->validate([
            'password' => 'required|string|min:8|max:255|confirmed',

       ]);

      $user= User::whereId($id)->update([
        'password' => Hash::make($request['password']),
        ]);
        Auth::logout();
        return redirect()->back();


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
        $course=Course::findOrFail($id);
        session()->flash('alert-type', 'success');
        session()->flash('message', 'Page is Loading .......');
        return view('frontend.single_course')->with('course',$course);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $auth_id=Auth::user()->id;
        $course=DB::table('course__instructors')->where('course__instructors.user_id',$auth_id)
                  ->join('orders','orders.course_id','course__instructors.course_id')->where('orders.status','=','completed')->where('orders.course_status','=','under_evaluation')->where('orders.id','=',$id)
                  ->join('courses','courses.id','course__instructors.course_id')
                  ->select('courses.*','orders.id AS order_id','orders.user_id','orders.course_id')
                  ->get();
       // dd($course);
        $assignment_number=User_Course_Assignment_Marks::where('user_id', '=', $course[0]->user_id)->where('course_id', '=', $course[0]->course_id)->whereNull('obtain_marks')->count();
        
        if($assignment_number > 0){
            //dd($assignment_number);
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
        
        session()->flash('alert-type', 'success');
        session()->flash('message', 'Page is Loading .......');
        return view('courses.add_marks_instructor')->with('course',$course);

    }


    public function course_add_marks(Request $request, $id){
        $auth_id=Auth::user()->id;
        $course=DB::table('course__instructors')->where('course__instructors.user_id',$auth_id)
        ->join('orders','orders.course_id','course__instructors.course_id')->where('orders.status','=','completed')->where('orders.course_status','=','under_evaluation')->where('orders.id','=',$id)
        ->join('courses','courses.id','course__instructors.course_id')
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
                return  redirect()->route('instrucotr_course_evaluation');
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

        $user = User::findOrFail($id);
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'date_of_birth' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'phone_number' => 'required|string|max:255',
            'whatsapp_number' => 'required|string|max:255',
       ]);
       if ($request->hasFile('file')) {
           if (isset($user->file) && file_exists(public_path('user/'.$user->file))) {
               unlink(public_path('user/'.$user->file));
           }


           $extension=$request->file->extension();
           $filename=time()."_.".$extension;
           $request->file->move(public_path('user'), $filename);
           User::whereId($id)->update([
            'name' => $request['name'],
            'file' => $filename,
            ]);
       }
       $user_detaol= User_detail::where('user_id',$id)->count();

       if($user_detaol > 0){

        $whatsapp_number=User_detail::where('user_id',$id)->where('user_key','whatsapp_number')->count();

        if($whatsapp_number>0)
        {
            User_detail::where('user_id',$id)->where('user_key','whatsapp_number')->update([
                'user_value' => $request['whatsapp_number'],
                ]);
        }
        else{
            $data = array(
                array('user_id'=>$id, 'user_key'=> 'whatsapp_number', 'user_value'=> $request['whatsapp_number']),
            );

           $user_detaol= User_detail::insert($data);
        }


        $city=User_detail::where('user_id',$id)->where('user_key','city')->count();

        if($city>0)
        {
            User_detail::where('user_id',$id)->where('user_key','city')->update([
                'user_value' => $request['city'],
                ]);
        }
        else{
            $data = array(
                array('user_id'=>$id, 'user_key'=> 'city', 'user_value'=> $request['city']),
            );

           $user_detaol= User_detail::insert($data);
        }


        $address=User_detail::where('user_id',$id)->where('user_key','address')->count();

        if($address>0)
        {
            User_detail::where('user_id',$id)->where('user_key','address')->update([
                'user_value' => $request['address'],
                ]);
        }
        else{
            $data = array(
                array('user_id'=>$id, 'user_key'=> 'address', 'user_value'=> $request['address']),
            );

           $user_detaol= User_detail::insert($data);
        }

        $date_of_birth=User_detail::where('user_id',$id)->where('user_key','date_of_birth')->count();

        if($date_of_birth>0)
        {
            User_detail::where('user_id',$id)->where('user_key','date_of_birth')->update([
                'user_value' => $request['date_of_birth'],
                ]);
        }
        else{
            $data = array(
                array('user_id'=>$id, 'user_key'=> 'date_of_birth', 'user_value'=> $request['date_of_birth']),
            );

           $user_detaol= User_detail::insert($data);
        }


        $country=User_detail::where('user_id',$id)->where('user_key','country')->count();
        if($country>0)
        {
            User_detail::where('user_id',$id)->where('user_key','country')->update([
                'user_value' => $request['country'],
                ]);
        }
        else{
            $data = array(
                array('user_id'=>$id, 'user_key'=> 'country', 'user_value'=> $request['country']),
            );

           $user_detaol= User_detail::insert($data);
        }


        $phone_number=User_detail::where('user_id',$id)->where('user_key','phone_number')->count();
        if($phone_number>0)
        {
            User_detail::where('user_id',$id)->where('user_key','phone_number')->update([
                'user_value' => $request['phone_number'],
                ]);
        }
        else{
            $data = array(
                array('user_id'=>$id, 'user_key'=> 'phone_number', 'user_value'=> $request['phone_number']),
            );

           $user_detaol= User_detail::insert($data);
        }

       }
       else{
        $data = array(
            array('user_id'=>$id, 'user_key'=> 'whatsapp_number', 'user_value'=> $request['whatsapp_number']),
            array('user_id'=>$id, 'user_key'=> 'city', 'user_value'=> $request['city']),
            array('user_id'=>$id, 'user_key'=> 'address', 'user_value'=> $request['address']),
            array('user_id'=>$id, 'user_key'=> 'date_of_birth', 'user_value'=> $request['date_of_birth']),
            array('user_id'=>$id, 'user_key'=> 'country', 'user_value'=> $request['country']),
            array('user_id'=>$id, 'user_key'=> 'phone_number', 'user_value'=> $request['phone_number']),

        );

       $user_detaol= User_detail::insert($data);
       }

       return redirect()->back();


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
