<?php

namespace App\Http\Controllers;
use App\Models\Lophoc;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class LophocController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lophoc = Lophoc::orderBy('id', 'DESC')->get();
        $student = Student::all();
        $teacher = Teacher::all();
        
        $students = DB::table('lophoc')
            ->join('students', 'lophoc.student_id', '=', 'students.id')
            ->groupBy('lophoc.student_id')
            ->havingRaw('COUNT(*) > 1')
            ->select('students.name', DB::raw('COUNT(*) as total_lophoc'))
            ->orderBy('total_lophoc', 'desc')
            ->get();


        $classes = DB::table('lophoc')
            ->join('students', 'lophoc.student_id', '=', 'students.id')
            ->select('lophoc.name', 'students.name as tenhocsinh')
            ->orderBy('lophoc.name')
            ->get();



        $hanoi = DB::table('lophoc')
            ->join('students', 'lophoc.student_id', '=', 'students.id')
            ->join('teacher', 'lophoc.teacher_id', '=', 'teacher.id')
            ->where('students.address', '<>', 'Hà Nội')
            ->where('teacher.name', 'LIKE', '%An%')
            ->select('teacher.name', 'students.name as tenhocsinh', 'students.address')
            ->orderBy('lophoc.name')
            ->get();


  

         $hocsinhnam = DB::table('lophoc')
            ->join('students', 'lophoc.student_id', '=', 'students.id')
            ->where('students.address', 'Hà Nội')
            ->where('students.gender', 'Nam')
            ->groupBy('lophoc.name')
            ->havingRaw('COUNT(*) > 2')
            ->select('lophoc.name', DB::raw('COUNT(*) as total_male_students'))
            ->orderBy('total_male_students', 'desc')
            ->get(); 



        $param = [
            'lophoc'=> $lophoc,
            'student'=> $student,
            'teacher'=> $teacher,
            'classes'=> $classes,
            'students'=> $students,
            'hanoi'=> $hanoi,
            'hocsinhnam'=> $hocsinhnam,
        ];
        return view('lophoc.index', $param );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $student=Student::get();
        $teacher = Teacher::get();

        $param = [
            'student' => $student,
            'teacher' => $teacher,
        ];
        return view('lophoc.add', $param);
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
        $lophoc = new Lophoc();
        $lophoc->name = $request->name;
        $lophoc->student_id = $request->student_id;
        $lophoc->teacher_id = $request->teacher_id;
        $lophoc->save();
        return redirect()->route('lophoc.index');
    } catch (\Exception) {
        return redirect()->route('lophoc.index');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lophoc = Lophoc::find($id);
        $student=Student::get();
        $teacher=Teacher::get();
        $param = [
            'lophoc' => $lophoc ,
            'student' => $student, 
            'teacher' => $teacher, 
        ];
        return view('lophoc.edit' , $param);
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
        $lophoc = Lophoc::find($id);
        $lophoc->name = $request->name;
        $lophoc->student_id = $request->student_id;
        $lophoc->teacher_id = $request->teacher_id;
        $lophoc->save();
        return redirect()->route('lophoc.index');
    } catch (\Exception) {
        return redirect()->route('lophoc.index');
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
        $lophoc = Lophoc::find($id);
        $lophoc->delete();
        return redirect()->route('lophoc.index');
    } catch (\Exception) {
        return redirect()->route('lophoc.index');
    }
    }
}
