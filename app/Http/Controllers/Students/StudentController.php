<?php

namespace App\Http\Controllers\Students;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStudentsRequest;
use App\Imports\StudantImport;
use App\Models\Level;
use App\Models\Problem;
use App\Models\Student;
use App\Repository\StudentRepositoryInterface;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class StudentController extends Controller
{

    protected $Student;

    public function __construct(StudentRepositoryInterface $Student)
    {
        $this->Student = $Student;
    }


    public function index()
    {
        return $this->Student->Get_Student();
    }


    public function create()
    {
        return $this->Student->Create_Student();
    }

    public function store(StoreStudentsRequest $request)
    {
        return $this->Student->Store_Student($request);
    }

    public function show($id)
    {

        return $this->Student->Show_Student($id);

    }


    public function edit($id)
    {
        return $this->Student->Edit_Student($id);
    }


    public function update(StoreStudentsRequest $request)
    {
        return $this->Student->Update_Student($request);
    }


    public function destroy(Request $request)
    {
        return $this->Student->Delete_Student($request);
    }

    public function Get_classrooms($id)
    {
        return $this->Student->Get_classrooms($id);
    }

    public function Get_Sections($id)
    {
        return $this->Student->Get_Sections($id);
    }

    public function Upload_attachment(Request $request)
    {
        return $this->Student->Upload_attachment($request);
    }

    public function Download_attachment($studentsname, $filename)
    {
        return $this->Student->Download_attachment($studentsname, $filename);
    }

    public function Delete_attachment(Request $request)
    {
        return $this->Student->Delete_attachment($request);

    }


    /************************************************   student problem  **********************************************/


    public function StudentProblems($id)
    {
        $student = Student::findOrFail($id);
        $levels = Level::all();
        $problems = Problem::all();
        return view('pages.Students.problems', compact('student', 'levels', 'problems'));
    }


    public function updateProblems(Request $request)
    {


        $students = Student::findOrFail($request->id);
        $students->level_id = $request->level;
        $students->problems()->attach($request->problem_id, ['Notes' => $request->problem_details, 'Time' => $request->Joining_Date]);

        $students->save();

        $students = Student::all();
        return view('pages.Students.index', compact('students'));
    }

    /************************** import Excel   ******************************/

    public function importForm()
    {
        return view('pages.Students.import');
    }

    public function importExcel(Request $request)
    {
        Excel::import(new StudantImport(), $request->file);

        $students  = Student::all();
        return view('pages.Students.index', compact('students'));
    }
}
