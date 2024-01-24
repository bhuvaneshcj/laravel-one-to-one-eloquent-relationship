@extends('layouts.app')
@section('title', 'Students')
@section('content')

<div class="container mt-5">
    <div class="row align-items-center g-3 mb-3">
        <div class="col-md-6">
            <h4 class="mb-0">Students</h4>
        </div>
        <div class="col-md-6 text-md-end">
            <a class="btn btn-primary" href="{{route('students.create')}}">
                Create
            </a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">D.O.B</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">City</th>
                    <th scope="col">Pincode</th>
                    <th class="text-center" scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                <tr>
                    <th scope="row">{{++$i}}</th>
                    <td>{{$student->name}}</td>
                    <td>{{$student->dob}}</td>
                    <td>{{$student->email}}</td>
                    <td>{{$student->phone}}</td>
                    <td>{{$student->address->city}}</td>
                    <td>{{$student->address->pincode}}</td>
                    <td class="text-center">
                        <form action="{{route('students.destroy', $student->id)}}" method="post">
                            @csrf @method('delete')
                            <a class="text-success fw-medium" href="{{route('students.edit', $student->id)}}">
                                Edit
                            </a>
                            <button class="border-0 bg-transparent text-danger fw-medium" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @if($students instanceof \Illuminate\Pagination\LengthAwarePaginator)
        <div class="mt-4">
            {!! $students->links() !!}
        </div>
        @endif
    </div>
</div>

@endsection