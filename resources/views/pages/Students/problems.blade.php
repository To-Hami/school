@extends('layouts.master')
@section('css')
    @toastr_css

@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')

@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <h3> تفاصيل الطالب :</h3>
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
                    <div class="details" style="overflow: hidden">
                        <div class="print">
                            <button class="btn btn-success btn-lg  btn-lg " type="reset" style="margin: 10px 0">تفاصيل
                                الطالب
                                الاضافية :
                            </button>


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input style="font-size: 15px" readonly type="hidden" name="id"
                                               value="{{$student->id}}">
                                        <label>{{trans('Students_trans.name_ar')}} : <span
                                                class="text-danger">*</span></label>
                                        <input readonly type="text" name="name" value="{{$student->name}}"
                                               class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>الهوية :</label>
                                        <input style="font-size: 15px" readonly class="form-control" type="text"
                                               value="{{$student->Id_Number}}"
                                               name="Id_Number">
                                    </div>
                                </div>


                                {{--                        <div class="row">--}}
                                {{--                            <div class="col-md-6">--}}
                                {{--                                <div class="form-group">--}}
                                {{--                                    <label>{{trans('Students_trans.email')}} : </label>--}}
                                {{--                                    <input type="email"  name="email" class="form-control" >--}}
                                {{--                                </div>--}}
                                {{--                            </div>--}}


                                {{--                            <div class="col-md-6">--}}
                                {{--                                <div class="form-group">--}}
                                {{--                                    <label>{{trans('Students_trans.password')}} :</label>--}}
                                {{--                                    <input  type="password" name="password" class="form-control" >--}}
                                {{--                                </div>--}}
                                {{--                            </div>--}}

                                {{--                            <div class="col-md-3">--}}
                                {{--                                <div class="form-group">--}}
                                {{--                                    <label for="gender">{{trans('Students_trans.gender')}} : <span class="text-danger">*</span></label>--}}
                                {{--                                    <select class="custom-select mr-sm-2" name="gender_id">--}}
                                {{--                                        <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>--}}
                                {{--                                        @foreach($Genders as $Gender)--}}
                                {{--                                            <option  value="{{ $Gender->id }}">{{ $Gender->Name }}</option>--}}
                                {{--                                        @endforeach--}}
                                {{--                                    </select>--}}
                                {{--                                </div>--}}
                                {{--                            </div>--}}

                                {{--                            <div class="col-md-3">--}}
                                {{--                                <div class="form-group">--}}
                                {{--                                    <label for="nal_id">{{trans('Students_trans.Nationality')}} : <span class="text-danger">*</span></label>--}}
                                {{--                                    <select class="custom-select mr-sm-2" name="nationalitie_id">--}}
                                {{--                                        <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>--}}
                                {{--                                        @foreach($nationals as $nal)--}}
                                {{--                                            <option  value="{{ $nal->id }}">{{ $nal->Name }}</option>--}}
                                {{--                                        @endforeach--}}
                                {{--                                    </select>--}}
                                {{--                                </div>--}}
                                {{--                            </div>--}}


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{trans('Students_trans.classrooms')}} :</label>
                                        <input style="font-size: 15px" readonly class=" hijri-date-default form-control"
                                               value="{{$student->classroom->Name_Class}}"
                                               type="text" id="hijri-picker" name="Date_Birth"
                                               data-date-format="yyyy-mm-dd">
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>ا{{trans('Students_trans.section')}}</label>
                                        <input style="font-size: 15px" readonly class="form-control" type="text"
                                               value="{{$student->section->Name_Section}}" name="address">
                                    </div>
                                </div>
                                <button class="btn btn-success btn-lg  btn-lg " type="reset"
                                        style="margin: 10px 10px;position: relative;right: 20px;">
                                    تفاصيل
                                    المشاكل السابقة :
                                </button>

                                <div class="col-md-12 ">

                                    <ul>
                                        @foreach($student->problems as $index=> $problem)
                                            <p class="list_problems">
                                             <span style="border: 3px solid #17a2b8;border-radius: 50%;;width: 31px;
                                               height: 30px; display: inline-block; text-align: center;">
                                                 {{$index + 1 }}
                                             </span>
                                                {{ $problem->pivot->Time . '  ==> '.  $problem->Name . '  ==> ' . $problem->pivot->Notes}}

                                            </p>

                                        @endforeach
                                    </ul>
                                </div>


                            </div>
                            <div class="float-left">
                                <button class="btn btn-success btn-lg  btn-lg " type="reset" style="margin: 10px 0">
                                    مستوي
                                    الاداء الحالي => {{ $student->levels->name }} </button>

                            </div>
                        </div>
                        <button class="btn btn-success btn-lg  btn-lg btn-floating print_ptn " type="reset"
                                style="margin: 10px 0 ;float: left">
                            طباعة التفاصيل
                        </button>
                    </div>

                    <br>
                    <div class="addProblem">

                        <form method="POST" action="{{ route('updateProblems',$student->id) }}" autocomplete="off"
                              enctype="multipart/form-data">
                            @csrf

                            {{ method_field('POST') }}

                            <button class="btn btn-success btn-lg  btn-lg " type="reset" style="margin: 10px 0">اضافة
                                تعديل علي الاداء اوالمشاكل :
                            </button>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="Grade_id">المستوي : <span class="text-danger">*</span></label>
                                        <select style="height: 50px" class="custom-select mr-sm-2 form-control"
                                                name="level">
                                            <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>
                                            @foreach($levels as $level)
                                                <option
                                                    value="{{ $level->id }}" {{ $student->levil_id == $level->id ? 'selected' : ''  }} >{{ $level->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="Classroom_id">المشاكل : <span class="text-danger">*</span></label>
                                        <select style="height: 50px" class="custom-select mr-sm-2 form-control"
                                                name="problem_id">
                                            <option selected disabled>اختر من القائمة ...</option>
                                            @foreach($problems as $problem)
                                                <option value="{{ $problem->id }}">{{ $problem->Name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <label for="title">تاريخ الاحداث :</label>
                                    <div class='input-group'>

                                        <input id="hijri_picker" type="text" class="hijri-date-input  form-control"
                                               name="Joining_Date" required/>
                                    </div>
                                    @error('Joining_Date')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                    <label for="title">تفاصيل المشكلة :</label>
                                    <textarea class='form-control' rows="4" name="problem_details">

                                </textarea>

                                </div>

                                {{--                            --}}


                                {{--                        <div class="col-md-3">--}}
                                {{--                            <div class="form-group">--}}
                                {{--                                <label for="academic_year">{{trans('Students_trans.academic_year')}} : <span class="text-danger">*</span></label>--}}
                                {{--                                <select class="custom-select mr-sm-2" name="academic_year">--}}
                                {{--                                    <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>--}}
                                {{--                                    @php--}}
                                {{--                                        $current_year = date("Y");--}}
                                {{--                                    @endphp--}}
                                {{--                                    @for($year=$current_year; $year<=$current_year +1 ;$year++)--}}
                                {{--                                        <option value="{{ $year}}">{{ $year }}</option>--}}
                                {{--                                    @endfor--}}
                                {{--                                </select>--}}
                                {{--                            </div>--}}
                                {{--                        </div>--}}


                            </div>
                            <br>

                            <button class="btn btn-success btn-lg nextBtn btn-lg pull-right"
                                    type="submit">{{trans('Students_trans.submit')}}
                            </button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')
    <script>

        $(function () {

            initDefault();

        });

        function initDefault() {
            $("#hijri_picker").hijriDatePicker({
                hijri: true,
                showSwitcher: false
            });
        }

        $(document).on('click', '.print_ptn', function () {

            $('.print').printThis();

        });
    </script>
    @toastr_js
    @toastr_render
@endsection
