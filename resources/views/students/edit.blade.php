@extends('layouts.app')
@section('title', 'Edit Student')
@section('content')

<div class="container mt-5">
    <form class="row g-3" action="{{route('students.update', $student->id)}}" method="post">
        @csrf @method('put')
        <div class="col-md-4">
            <label class="form-label" for="nameInp">Name</label>
            <input class="form-control" id="nameInp" type="text" name="name" value="{{$student->name}}">
            @error('name')<small class="text-danger">{{$message}}</small>@enderror
        </div>
        <div class="col-md-4">
            <label class="form-label" for="dobInp">D.O.B</label>
            <input class="form-control" id="dobInp" type="date" name="dob" value="{{$student->dob}}">
            @error('dob')<small class="text-danger">{{$message}}</small>@enderror
        </div>
        <div class="col-md-4">
            <label class="form-label" for="emailInp">Email Address</label>
            <input class="form-control" id="emailInp" type="email" name="email" value="{{$student->email}}">
            @error('email')<small class="text-danger">{{$message}}</small>@enderror
        </div>
        <div class="col-md-4">
            <label class="form-label" for="phoneInp">Phone</label>
            <input class="form-control" id="phoneInp" type="text" name="phone" value="{{$student->phone}}">
            @error('phone')<small class="text-danger">{{$message}}</small>@enderror
        </div>
        <div class="col-md-4">
            <label class="form-label" for="line1Inp">Address Line 1</label>
            <input class="form-control" id="line1Inp" type="text" name="line_1" value="{{$student->address->line_1}}">
            @error('line_1')<small class="text-danger">{{$message}}</small>@enderror
        </div>
        <div class="col-md-4">
            <label class="form-label" for="line2Inp">Address Line 2</label>
            <input class="form-control" id="line2Inp" type="text" name="line_2" value="{{$student->address->line_2}}">
            @error('line_2')<small class="text-danger">{{$message}}</small>@enderror
        </div>
        <div class="col-md-4">
            <label class="form-label" for="cityInp">City</label>
            <input class="form-control" id="cityInp" type="text" name="city" value="{{$student->address->city}}">
            @error('city')<small class="text-danger">{{$message}}</small>@enderror
        </div>
        <div class="col-md-4">
            <label class="form-label" for="stateInp">State</label>
            <input class="form-control" id="stateInp" type="text" name="state" value="{{$student->address->state}}">
            @error('state')<small class="text-danger">{{$message}}</small>@enderror
        </div>
        <div class="col-md-4">
            <label class="form-label" for="countryInp">Country</label>
            <input class="form-control" id="countryInp" type="text" name="country"
                value="{{$student->address->country}}">
            @error('country')<small class="text-danger">{{$message}}</small>@enderror
        </div>
        <div class="col-md-4">
            <label class="form-label" for="pincodeInp">Pincode</label>
            <input class="form-control" id="pincodeInp" type="text" name="pincode"
                value="{{$student->address->pincode}}">
            @error('pincode')<small class="text-danger">{{$message}}</small>@enderror
        </div>
        <div class="col-12">
            <button class="btn btn-primary" type="submit">Create</button>
        </div>
    </form>
</div>

@endsection