<?php

namespace App\Http\Controllers;

use App\Models\student;
use App\Http\Requests\StorestudentRequest;
use App\Http\Requests\StudentCreateRequest;
use App\Http\Requests\UpdatestudentRequest;
use App\Models\Skill;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::with('category')->get();
        return view('Admin.students.index', compact('students'));
    }

    public function invoice()
    {
        $students = Student::with('category')->get();
        return view('Admin.students.invoice', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $skill = Skill::get();
        return view('Admin.students.create', compact('skill'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorestudentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentCreateRequest $request)
    {
        Student::create([
            'name' => $request->name,
            'national_id' => $request->national_id,
            'phone' => $request->phone,
            'pay' => $request->pay,
            'skill_id' => $request->skill_id,
        ]);
        Session::flash('done', 'Student Was Created');
        // return redirect()->back();
        return redirect('/admin/students/invoice');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\student  $student
     * @return \Illuminate\Http\Response
     */
    // public function show(student $student)
    // {
    //     //
    // }

    public function delete(Request $request)
    {
        $student= Student::find($request->id);
        if($student)
        {
            $student->delete();
            Session::flash('done', 'Student Was Deleted');
            return back();
        }
        return back()->withErrors(['Course not found']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::find($id);
        $skill = Skill::get();
        return view('Admin.students.edit', compact('student', 'skill'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatestudentRequest  $request
     * @param  \App\Models\student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStudentRequest $request)
    {
        $student = Student::find($request->id);

        $student->update([
            'name' => $request->name,
            'national-id' => $request->national_id,
            'phone' => $request->phone,
            'pay' => $request->pay,
            'skill_id' => $request->skill_id,
        ]);
        Session::flash('done', 'Student Was Updated');
        return redirect(route('admin.student.index'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\student  $student
     * @return \Illuminate\Http\Response
     */
    // public function destroy(student $student)
    // {
    //     //
    // }
}
