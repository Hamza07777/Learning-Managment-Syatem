@include('emails._head')

<tr>
    <td style="padding-left:10px; padding-top:20px;">
        Hi {{$name}},
    </td>
</tr>
<tr>
    <td style="padding-left:10px; padding-top:10px;">
        Welcome to Learning Managment System
    </td>
</tr>
<tr>
    <td style="padding-left:10px; padding-top:10px;">
        You can log in to the Learning Managment System with the following information:
        <br>Email: {{$email}}
        <br>Password: {{$password}}
        <br>Log in here: <a href="{{route('login')}}">{{route('login')}}</a>
    </td>
</tr>

@include('emails._footer')
