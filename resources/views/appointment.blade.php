@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row ">
      <div class="col-md-3">
        <div class="card">
          <div class="cars-body">
            <h4 class="text-center">Doctor Information</h4>
            <img src="{{asset('images')}}/{{$user->image}}"  width="100px" style="border-radius:50px" >
             <br>
            <p class="lead"> Name: {{ucfirst($user->name)}}</p>
            <p class="lead">Specialist: {{$user->education}}</p> 
            <p class="lead">Degree: {{$user->department}}</p> 
          </div>
        </div>
      </div>
        <div class="col-md-9">
          @foreach($errors->all() as $error)
          <div class="alert alert-danger">{{$error}}</div>
          @endforeach
          @if(Session::has('message'))
            <div class="alert alert-success">
               {{Session::get('message')}}
            </div>
          @endif
          @if(Session::has('errmessage'))
            <div class="alert alert-danger>
               {{Session::get('errmessage')}}
            </div>
          @endif
          <form action="{{route('booking.appointment')}}" method="post">@csrf
            <div class="card">
                <div class="card-header lead">{{$date}}</div>
                   
                <div class="card-body">
                  <div class="row">
                      @foreach($times as $time)
                    <div class="col-md-3">
                       <label class="btn btn-outline-primary">
                         <input type="radio" name="status" name="time" value="{{$time->time}}">
                         <span>{{$time->time}}</span>
                       </label>
                    </div>
                        <input type="hidden" name="doctorId" value="{{$doctor_id}}">
                        <input type="hidden" name="appointmentId" value="{{$time->appointment_id}}">
                        <input type="hidden" name="date" value="{{$date}}">
                      @endforeach
                  </div>
                </div>
            </div>
            <div class="card-footer">
              @if(Auth::check())   <!-- if user login -->
                <button type="submit" class="btn btn-sucess" style="width:100%;">Book Appointment</button>
                @else
                <p>Please login to make appointment</p>
                <a href="/register">Register</a>
                <a href="/login">Login</a>
                @endif
              
              </div>
              </form>
        </div>
        
    </div>
</div>
@endsection
