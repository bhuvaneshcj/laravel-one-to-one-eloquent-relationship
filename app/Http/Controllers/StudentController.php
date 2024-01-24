<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::orderBy('id', 'desc')->paginate(10);
        return view('students.index', compact('students'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'dob' => 'required|date',
            'email' => 'required|email',
            'phone' => 'required',
            'line_1' => 'required',
            'line_2' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'pincode' => 'required',
        ]);

        $student = Student::create([
            'name' => $request->name,
            'dob' => $request->dob,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        $student->address()->create([
            'line_1' => $request->line_1,
            'line_2' => $request->line_2,
            'city' => $request->city,
            'state' => $request->state,
            'country' => $request->country,
            'pincode' => $request->pincode,
        ]);

        toastr()->success('Student created');
        return redirect()->route('students.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name' => 'required',
            'dob' => 'required|date',
            'email' => 'required|email',
            'phone' => 'required',
            'line_1' => 'required',
            'line_2' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'pincode' => 'required',
        ]);

        $student->update([
            'name' => $request->name,
            'dob' => $request->dob,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        $student->address->update([
            'line_1' => $request->line_1,
            'line_2' => $request->line_2,
            'city' => $request->city,
            'state' => $request->state,
            'country' => $request->country,
            'pincode' => $request->pincode,
        ]);

        toastr()->success('Student updated');
        return redirect()->route('students.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();
        toastr()->success('Student deleted');
        return redirect()->route('students.index');
    }
}
