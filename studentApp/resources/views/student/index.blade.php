@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="card">
                <h1 style="text-align: center;">Students</h1>
            </div>
        </div>
        <div class="col-8">
            <a href="{{route('Student.Create')}}" class="btn btn-success mt-2">Add Student</a>
            <table class="table table-active mt-5" style="width:100%;">
                <thead>
                    <tr>
                        <th>Student Id</th>
                        <th>Student Name</th>
                        <th>Age</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                    <tr>
                        <td>{{$student->id}}</td>
                        <td>{{$student->name}}</td>
                        <td>{{$student->age}}</td>
                        <td>
                            @if($student->status == 0)
                                Pending
                            @else
                                Active
                            @endif
                        </td>
                        <td>
                            <a href="{{route('Student.Show',$student->id)}}" class="btn btn-primary btn-sm "><i class="far fa-eye"></i></a>
                            <a href="{{route('Student.Edit',$student->id)}}" class="btn btn-success btn-sm "><i class="fas fa-edit"></i></a>
                            <a href="{{route('Student.Delete',$student->id)}}" class="btn btn-danger btn-sm "><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
