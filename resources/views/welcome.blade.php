@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row ">
        <div class ="col-md-6">
            <img src="/images/appoint.jpg" class="img-fluid" style="border:1px solid #ccc;">
        </div>
        <div class ="col-md-6">
           <h2>Create an account & Book your Appointment</h2>
            <p>lorem ipsum...</p>
            <div class="mt-5">
              <a href="{{url('/register')}}"> <button class="btn btn-success">Register as Patient</button></a>
               <a href="{{url('/login')}}"><button class="btn btn-seconday">Login</button></a> 
            </div>
        </div>
    </div>
    <hr>
   <!--  search doctor -->
   <form action="{{url('/')}}" method="GET">
    <div class="card">
      <div class="card-body">
         <div class="card-header">Find Doctors</div>
         <div class="card-body">
             <div class="row">
               <div class="col-md-8">
                 <input type="text" name="date" class="form-control" id="datepicker">  <!-- id=datepicker jquery -->
               </div>
               <div class="col-md-4">
                   <button class="btn btn-primary" type="submit">Find Doctors</button>
               </div>
             </div>
         </div>
      </div>
    </div>
    </form>

    <!-- display doctors -->
    <div class="card">
      <div class="card-body">
         <div class="card-header">Doctors</div>
         <div class="card-body">
            <table class="table table-striped">
               <thead>
                   <tr>
                       <th></th>
                       <th>Photo</th>
                       <th>Name</th>
                       <th>Expertise</th>
                       <th>Appointment</th>
                   </tr>
               </thead> 
               <tbody>
                   @forelse($doctors as $doctor)
                   <tr>
                       <th scope="row">1</th>
                       <td>
                           <img src="{{asset('images')}}/{{$doctor->doctor->image}}" width="100px" style="border-radius:50px">
                       </td>
                       <td>
                       {{$doctor->doctor->name}}
                       </td>
                       <td>
                       {{$doctor->doctor->department}}
                       </td>
                       <td>
                           <a href="{{route('create.appointment',[$doctor->user_id,$doctor->date])}}"><button class="btn btn-success">Book Appointment</button></a>
                       </td>
                   </tr>
                   @empty
                   <td>No doctors available today </td>
                   @endforelse
               </tbody>
            </table>
         </div>
      </div>
    </div>
</div>
@endsection
