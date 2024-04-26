@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <a href="{{route('Student.Index')}}" class="btn btn-success">Students</a>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <img src="{{ asset('storage/students/' . $student->image) }}" style="border-radius: 50%; width: 150px; height: 150px; object-fit: cover;" class="m-5"  alt="Student Image" />
                <label class="m-2" for="name"><b>Student Name : </b><span>{{$student->name}}</span></label>
                <label class="m-2" for="age"><b>Student Age : </b><span>{{$student->age}}</span></label>
                <label class="m-2" for="status">
                    <b>Student Status : </b>
                    <span>
                        @if($student->status == 0)
                            Pending
                        @else
                            Active
                        @endif
                    </span>
                </label>
            </div>
        </div>
    </div>
</div>
@endsection
