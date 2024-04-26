@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <label class="label label-primary" style="text-align: center;">Update a Student</label>
            </div>
        </div>
        <div class="col-8 mt-2">
            <div class="card">
                <div class="card-header">{{ __('Update a Student') }}</div>

                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form method="POST" action="{{route('Student.Update',$student->id)}}" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label for="image" class="col-md-4 col-form-label text-md-end">{{ __('Image') }}</label>
                            <div class="col-md-6">
                                <input id="image" type="file" class="form-control" name="image">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" value="{{$student->name}}" class="form-control" name="name" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="age" class="col-md-4 col-form-label text-md-end">{{ __('Age') }}</label>
                            <div class="col-md-6">
                                <input id="age" type="text" value="{{$student->age}}" class="form-control" name="age" required >
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="status" class="col-md-4 col-form-label text-md-end">{{ __('Status') }}</label>
                            <div class="col-md-6">
                                <select name="status" id="status" class="form-control">
                                    <option value="0">Pending</option>
                                    <option value="1">Active</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Update Student</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
