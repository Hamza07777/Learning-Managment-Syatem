<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Models\User_detail;

class AdminController extends Controller
{

    public function __construct()
    {
       //$this->middleware('auth');
       
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (view()->exists('users.list'))

        {
            $user=User::all();
            session()->flash('alert-type', 'success');
            session()->flash('message', 'Page is Loading .......');
            return view('users.list')->with('user',$user);
        }
    }

    public function user_profile()
    {
        $user=Auth::user();
        session()->flash('alert-type', 'success');
        session()->flash('message', 'Page is Loading .......');
        return view('frontend.admin_profile')->with('user',$user);


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


    public function admin_update_detail(Request $request)
    {
        $id=Auth::user()->id;

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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (view()->exists('users.new'))
        {
            return view('users.new');
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
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required',
            'file' => 'required',
         
       ]);
       if ($request->hasFile('file')) {
    
        $extension=$request->file->extension();
        $filename=time()."_.".$extension;
        $request->file->move(public_path('user'), $filename);
    }
    else{
        $filename='';
    }
       try {
        $data = [];
        $data['email'] = $request->email;
        $data['password'] = $request->password;
        $data['name'] = $request->name;
       // dd($data);
        Mail::send('emails.credential', $data, function($message) use ($data){
            $message->to($data['email'], env('APP_NAME'))->subject
            ('Login Credentials');
        });
        $user=User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'role' => $request['role'],
            'file' => $filename,
            'password' => Hash::make($request['password']),
        ]);

            if($user)
            {
                $user->markEmailAsVerified();
                             
             //   dd($data);
 
                    session()->flash('alert-type', 'success');
                    session()->flash('message', 'User added successfully. Login Credentials send to your mail');
                    return redirect()->route('user.index');
            }
            else{
                session()->flash('alert-type', 'error');
                session()->flash('message', 'Record Not Added.');
                return redirect()->back();
            } 
        }catch (\Exception $e){
                session()->flash('alert-type', 'error');
                session()->flash('message', 'Due to mail server issue email has not been sent. User is Not Added');
                return redirect()->route('user.index');
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
        $user=User::findOrFail($id);
        session()->flash('alert-type', 'success');
        session()->flash('message', 'Page is Loading .......');
        return view('users.new')->with('user',$user);
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
            'email' => 'required|string|email|max:255',
            'role' => 'required',
         
       ]);

       if ($request->hasFile('file')) {
            if (isset($user->file) && file_exists(public_path('user/'.$user->file))) {
                unlink(public_path('user/'.$user->file));
            }


            $extension=$request->file->extension();
            $filename=time()."_.".$extension;
            $request->file->move(public_path('user'), $filename);
            $user=User::whereId($id)->update([
                'name' => $request['name'],
                'email' => $request['email'],
                'role' => $request['role'],
                'file' => $filename,
                ]);
        }
        else{
            $user=User::whereId($id)->update([
                'name' => $request['name'],
                'email' => $request['email'],
                'role' => $request['role'],
                ]);
        }
       

            if($user)
            {                             
                    session()->flash('alert-type', 'success');
                    session()->flash('message', 'User Updated Successfully.');
                    return redirect()->route('user.index');
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
        $user = User::findOrFail($id);
        $user->delete();

        session()->flash('alert-type', 'success');
        session()->flash('message', 'User deleted successfully');

        return redirect()->route('user.index');
    }
    public function multiplecourse_quizdelete(Request $request)
	{
		$id = $request->id;
		foreach ($id as $user) 
		{
			User::where('id', $user)->delete();
		}
		session()->flash('alert-type', 'success');
        session()->flash('message', 'User deleted successfully');

        return redirect()->route('user.index');
	}
}
