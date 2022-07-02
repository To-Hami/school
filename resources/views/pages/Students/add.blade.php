@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{trans('main_trans.add_student')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{trans('main_trans.add_student')}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <h3>   اضافة طالب جديد :</h3>
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="post"  action="{{ route('Students.store') }}" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    <h6 style="font-family: 'Cairo', sans-serif;color: blue">{{trans('Students_trans.personal_information')}}</h6><br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('Students_trans.name_ar')}} : <span class="text-danger">*</span></label>
                                    <input  type="text" name="name"  class="form-control">
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('Students_trans.Date_of_Birth')}}  :</label>
                                    <input class="form-control" type="text"  id="hijri-picker" name="Date_Birth" data-date-format="yyyy-mm-dd">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="bg_id">{{trans('Students_trans.blood_type')}} : </label>
                                    <select style="height: 50px" class=" form-control custom-select mr-sm-2" name="blood_id">
                                        <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>
                                        @foreach($bloods as $bg)
                                            <option value="{{ $bg->id }}">{{ $bg->Name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>العنوان :</label>
                                    <input class="form-control" type="text"  name="address">
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>الهوية :</label>
                                    <input class="form-control" type="text"  name="Id_Number">
                                </div>
                            </div>



                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>وظيفة الوالد :</label>
                                    <input class="form-control" type="text"  name="jop">
                                </div>
                            </div>

                        </div>

                    <h6 style="font-family: 'Cairo', sans-serif;color: blue">{{trans('Students_trans.Student_information')}}</h6><br>
                    <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="Grade_id">{{trans('Students_trans.Grade')}} : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="Grade_id">
                                        <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>
                                        @foreach($my_Grades as $c)
                                            <option  value="{{ $c->id }}">{{ $c->Name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="Classroom_id">{{trans('Students_trans.classrooms')}} : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="Classroom_id">
                                        <option selected disabled>اختر من القائمة ...</option>
                                        @foreach($my_classes as $class)
                                            <option  value="{{ $class->id }}">{{ $class->Name_Class }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="section_id">{{trans('Students_trans.section')}} : </label>
                                    <select class="custom-select mr-sm-2" name="section_id">
                                        <option selected disabled>اختر من القائمة ...</option>
                                        @foreach($my_sections as $section)
                                            <option  value="{{ $section->id }}">{{ $section->Name_Section }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="academic_year">{{trans('Students_trans.academic_year')}} : <span class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="academic_year">
                                    <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>

                                    @foreach($Years as $Year)
                                        <option value="{{ $Year->id}}">{{ $Year->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="academic_year">{{trans('Students_trans.Attachments')}} : <span class="text-danger">*</span></label>
                            <input type="file" accept="image/*" name="photos[]" multiple>
                        </div>
                    </div>

                    </div><br>

                    <button class="btn btn-success btn-lg nextBtn btn-lg pull-right" type="submit">{{trans('Students_trans.submit')}}</button>
                </form>

            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
    @toastr_js
    @toastr_render
    <script>
        $(function () {

            initDefault();

        });

        function initDefault() {
            $("#hijri-picker").hijriDatePicker({
                hijri:true,
                showSwitcher:false
            });
        }
    </script>

@endsection
