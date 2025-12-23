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
        $students = Student::all();
        return view('students.index', compact('students'));
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
            'matricula' => 'required|unique:students',
            'age' => 'required|integer',
            'sex' => 'required',
            'blood_status' => 'required',
            'q1' => 'required|integer',
            'q2' => 'required|integer',
            'q3' => 'required|integer',
            'q4' => 'required|integer',
            'q5' => 'required|integer',
        ]);

        $grifinoria = 0;
        $sonserina = 0;
        $corvinal = 0;
        $lufalufa = 0;

        $answers = [
            $request->q1,
            $request->q2,
            $request->q3,
            $request->q4,
            $request->q5,
        ];

        foreach ($answers as $answer) {
            switch ($answer) {
                case 1:
                    $grifinoria++;
                    break;
                case 2:
                    $sonserina++;
                    break;
                case 3:
                    $corvinal++;
                    break;
                case 4:
                    $lufalufa++;
                    break;
            }
        }

        $house = '';
        if ($grifinoria >= $sonserina && $grifinoria >= $corvinal && $grifinoria >= $lufalufa) {
            $house = 'Grifinória';
        } else if ($sonserina >= $grifinoria && $sonserina >= $corvinal && $sonserina >= $lufalufa) {
            $house = 'Sonserina';
        } else if ($corvinal >= $grifinoria && $corvinal >= $sonserina && $corvinal >= $lufalufa) {
            $house = 'Corvinal';
        } else {
            $house = 'Lufa-Lufa';
        }

        Student::create([
            'name' => $request->name,
            'matricula' => $request->matricula,
            'age' => $request->age,
            'sex' => $request->sex,
            'blood_status' => $request->blood_status,
            'house' => $house,
        ]);

        return redirect()->route('students.index')->with('success', 'Student registered successfully! Welcome to ' . $house . '!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        return view('students.show', compact('student'));
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
            'age' => 'required|integer',
            'blood_status' => 'required',
        ]);

        $student->update($request->only(['name', 'age', 'blood_status']));

        return redirect()->route('students.index')->with('success', 'Student updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Student deleted successfully! Avada Kedavra!');
    }
}
