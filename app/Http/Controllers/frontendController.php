<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Course;
use App\Models\Order;
use App\Models\Quiz;
use App\Models\Unit;
use App\Models\User;
use App\Models\User_Course_Assignment_Marks;
use App\Models\User_Course_Quiz_Marks;
use App\Models\User_detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class frontendController extends Controller
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
            $course= DB::table('orders')->where('orders.user_id',$id)->where('orders.status','=','completed')->where('orders.course_status','=','start')
                  ->join('courses','courses.id','orders.course_id')
                  ->select('courses.*')
                  ->get();
          //  $course=Course::all();
   
            session()->flash('alert-type', 'success');
            session()->flash('message', 'Page is Loading .......');
            return view('frontend.courses')->with('course',$course);
        }
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
        $course=Course::findOrFail($id);
        session()->flash('alert-type', 'success');
        session()->flash('message', 'Page is Loading .......');
        return view('frontend.course_checkout')->with('course',$course);
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
    public function start_course($id)
    {
        $unit=Unit::where('course_id',$id)->get();
        $assignment=DB::table('course__assignments')->where('course__assignments.course_id',$id)
            ->join('assignments','assignments.id','course__assignments.assignment_id')
            ->select('assignments.*')
            ->get();

        $quiz=DB::table('course__quizzes')->where('course__quizzes.course_id',$id)
            ->join('quizzes','quizzes.id','course__quizzes.quiz_id')
            ->select('quizzes.*')
            ->get();
        // $assignment=Assignment::all();
        // $quiz=Quiz::all();
        session()->flash('alert-type', 'success');
        session()->flash('message', 'Page is Loading .......');
        return view('frontend.start_courses')->with('unit',$unit)->with('assignment',$assignment)->with('quiz',$quiz)->with('id',$id);
    }



    public function complete_course(Request $request,$id)
    {
       // dd($request);
       // $id=8;
       $user_id=Auth::user()->id;
        $assignment=DB::table('course__assignments')->where('course__assignments.course_id',$id)
        ->join('assignments','assignments.id','course__assignments.assignment_id')
        ->select('assignments.*')
        ->get();

        $quiz=DB::table('course__quizzes')->where('course__quizzes.course_id',$id)
        ->join('quizzes','quizzes.id','course__quizzes.quiz_id')
        ->select('quizzes.*')
        ->get();
        foreach ($assignment as $assignments) {
            $validatedData = $request->validate([
                'assi_'.$assignments->id => 'required',

           ]);
        }
        foreach ($quiz as $quizz) {
            $validatedData = $request->validate([
                'quiz_'.$quizz->id => 'required',

           ]);
        }
        foreach ($assignment as $assignmentt) {
            if ($request->hasFile('assi_'.$assignmentt->id)) {
                $assignment_file='assi_'.$assignmentt->id;
                $extension=$request->$assignment_file->extension();
                $filename=time()."_.".$extension;
                $request->$assignment_file->move(public_path('assignment'), $filename);
               // dd($filename);
                $assignment_file=new User_Course_Assignment_Marks();
                $assignment_file->file=$filename;
                $assignment_file->user_id=$user_id;
                $assignment_file->course_id=$id;
                $assignment_file->assignment_id=$assignmentt->id;
                $assignment_file->save();

            }
        }
        foreach ($quiz as $quize) {
            if ($request->hasFile('quiz_'.$quize->id)) {
                $file='quiz_'.$quize->id;
                $extension=$request->$file->extension();
                $filename=time()."_.".$extension;
               //  dd($filename);
                $request->$file->move(public_path('quiz'), $filename);
               
                $assignment_file=new User_Course_Quiz_Marks();
                $assignment_file->file=$filename;
                $assignment_file->user_id=$user_id;
                $assignment_file->course_id=$id;
                $assignment_file->quiz_id=$quize->id;
                $assignment_file->save();

            }
        }
        $order=Order::where('user_id',$user_id)->where('course_id',$id)->update([
            'course_status'=>'under_evaluation',
        ]);
        session()->flash('alert-type', 'success');
        session()->flash('message', 'Page is Loading .......');

        return redirect()->route('user-coureses.index');
       
      //  dd($request);


    }


    

    public function completed_courses(){
        $id=Auth::user()->id;
        $course= DB::table('user__marks')->where('user__marks.user_id',$id)
                  ->join('courses','courses.id','user__marks.course_id')
                  ->select('courses.*','user__marks.*')
                  ->get();
          //  $course=Course::all();
   
            session()->flash('alert-type', 'success');
            session()->flash('message', 'Page is Loading .......');
            return view('frontend.completed_courses')->with('course',$course);
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
