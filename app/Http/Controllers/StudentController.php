<?php

namespace App\Http\Controllers;

use App\Models\Classt;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with('classes')->get();

        return view('students.index', compact('students'));
    }

    public function create()
    {
        $classes = Classt::all();

        return view('students.create', compact('classes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:20|unique:students',
            'class_id' => 'required|exists:classts,id',
        ]);
        Student::create($request->all());
        return redirect()->route('students.index');
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);

        $classes = Classt::all();

        return view('students.edit', compact('student', 'classes'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:students,email,' . $id,
            'class_id' => 'required|exists:classts,id',
        ]);
        $student = Student::findOrFail($id);
        $student->update($request->all());

        return redirect()->route('students.index');
    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()->route('students.index');
    }
}
