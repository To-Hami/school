<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Program;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $studants = Student::all();
        $teachers = Teacher::all();
        $Books = Book::all();
        $programs = Program::all();

        $student_problems = Student::whereHas('problems')->get();
        return view('dashboard',compact('studants','teachers','Books','programs','student_problems'));
    }
}
