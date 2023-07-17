<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = Teacher::orderBy('id', 'DESC')->get();
        $param = [
            'teachers' => $teachers
        ];
        return view('teacher.index', $param );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teacher=Teacher::get();
        $param = [
            'teacher' => $teacher
        ];
        return view('teacher.add', $param);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    try {
        $teacher = new Teacher();
        $teacher->name = $request->name;
        $teacher->save();
        return redirect()->route('teachers.index');
    } catch (\Exception) {
        return redirect()->route('teachers.index');
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teacher = Teacher::find($id);
        $param = [
            'teacher' => $teacher ,
        ];
        return view('teacher.edit',$param);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    try {
        $teacher = Teacher::find($id);
        $teacher->name = $request->name;
        $teacher->save();
        return redirect()->route('teachers.index');
    } catch (\Exception) {
        return redirect()->route('teachers.index');
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    try {
        $teacher = Teacher::find($id);
        $teacher->delete();
        return redirect()->route('teachers.index');
    } catch (\Exception) {
        return redirect()->route('teachers.index');
    }
    }
}
