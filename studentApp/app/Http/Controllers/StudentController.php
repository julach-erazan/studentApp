<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    public function index() {
        $students = Student::all();
        return view('student.index',compact('students'));
    }

    public function create() {
        return view('student.create');
    }

    public function show($id) {
        $student = Student::where('id',$id)->first();
        return view('student.show',compact('student'));
    }

    public function edit($id) {
        $student = Student::where('id',$id)->first();
        return view('student.edit',compact('student'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'required|string|max:255',
            'age' => 'required|numeric',
            'status' => 'required|in:0,1',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/students');
            $imageName = basename($imagePath);
        } else {
            $imageName = null;
        }

        Student::create([
            'name' => $request->input('name'),
            'age' => $request->input('age'),
            'status' => $request->input('status'),
            'image' => $imageName,
        ]);

        return redirect()->back()->with('success', 'Student added successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'required|string|max:255',
            'age' => 'required|numeric',
            'status' => 'required|in:0,1',
        ]);
        $student = Student::findOrFail($id);
        if ($request->hasFile('image')) {
            if ($student->image) {
                Storage::delete('public/students/' . $student->image);
            }
            $imagePath = $request->file('image')->store('public/students');
            $student->image = basename($imagePath);
        }
        $student->name = $request->input('name');
        $student->age = $request->input('age');
        $student->status = $request->input('status');

        $student->save();

        return redirect()->back()->with('success', 'Student updated successfully.');
    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        if ($student->image) {
            Storage::delete('public/students/' . $student->image);
        }
        $student->delete();

        return redirect()->route('Student.Index')->with('success', 'Student deleted successfully.');
    }
}
