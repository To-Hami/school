<?php

namespace App\Http\Controllers\Grades;;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGrades;
use App\Models\Classroom;
use App\Models\Grades\Grade;
use Illuminate\Http\Request;

class GradeController extends Controller
{


    public function index()
    {
        $Grades = Grade::all();
        return  view('pages.grades.grades', compact('Grades'));
    }





    public function store(StoreGrades $request)
    {
      // dd($request->all());

      try {
          $validated = $request->validated();
          $Grade = new Grade();
          $Grade->Name =$request->Name ;
          $Grade->Notes = $request->Notes;
          $Grade->save();
          toastr()->success(trans('messages.success'));
          return redirect()->route('grades.index');
      }

      catch (\Exception $e){
          return redirect()->back()->withErrors(['error' => $e->getMessage()]);
      }

    }

    public function show($id)
    {

    }


    public function edit($id)
    {

    }


    public function update(StoreGrades $request)
    {
        //dd($request->all());


          //  $validated = $request->validated();
            $Grades = Grade::findOrFail($request->id);
            $Grades->update($request ->all());

            toastr()->success(trans('messages.Update'));
            return redirect()->route('grades.index');

    }


    public function destroy( Request $request ,$id)
    {
        $MyClass_id = Classroom::where('Grade_id',$request->id)->pluck('Grade_id');

        if($MyClass_id->count() == 0){

            $Grades = Grade::findOrFail($request->id)->delete();
            toastr()->error(trans('messages.Delete'));
            return redirect()->route('grades.index');
        }

        else{

            toastr()->error(trans('Grades_trans.delete_Grade_Error'));
            return redirect()->route('grades.index');

        }
    }

}

?>
