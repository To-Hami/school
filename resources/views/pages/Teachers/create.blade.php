@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{ trans('Teacher_trans.Add_Teacher') }}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{ trans('Teacher_trans.Add_Teacher') }}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <h3 >{{ trans('Teacher_trans.Add_Teacher') . " :" }}</h3>

    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    @if(session()->has('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{ session()->get('error') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">


                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="col-xs-12">
                        <div class="col-md-12">
                            <br>
                            <form action="{{route('Teachers.store')}}" method="post">
                             @csrf
{{--                            <div class="form-row">--}}




{{--                                <div class="col">--}}
{{--                                    <label for="title">{{trans('Teacher_trans.Email')}}</label>--}}
{{--                                    <input type="email" name="Email" class="form-control">--}}
{{--                                    @error('Email')--}}
{{--                                    <div class="alert alert-danger">{{ $message }}</div>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                                <div class="col">--}}
{{--                                    <label for="title">{{trans('Teacher_trans.Password')}}</label>--}}
{{--                                    <input type="password" name="Password" class="form-control">--}}
{{--                                    @error('Password')--}}
{{--                                    <div class="alert alert-danger">{{ $message }}</div>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <br>--}}


                            <div class="form-row">
                                <div class="col ">
                                    <label for="title">{{trans('Teacher_trans.Name_ar')}}</label>
                                    <input type="text" name="Name" class="form-control">
                                    @error('Name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
{{--                                <div class="form-group col">--}}
{{--                                    <label for="inputCity">{{trans('Teacher_trans.specialization')}}</label>--}}
{{--                                    <select style="height: 50px !important;" class="custom-select my-1 mr-sm-2 form-control" name="Specialization_id">--}}
{{--                                        <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>--}}
{{--                                        @foreach($specializations as $specialization)--}}
{{--                                            <option class="form-control" value="{{$specialization->id}}">{{$specialization->Name}}</option>--}}
{{--                                        @endforeach--}}
{{--                                    </select>--}}
{{--                                    @error('Specialization_id')--}}
{{--                                    <div class="alert alert-danger">{{ $message }}</div>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}

                            </div>
                            <br>
{{--                            <div class="form-row">--}}
{{--                                --}}
{{--                                <div class="form-group col">--}}
{{--                                    <label for="inputState">{{trans('Teacher_trans.Gender')}}</label>--}}
{{--                                    <select class="custom-select my-1 mr-sm-2" name="Gender_id">--}}
{{--                                        <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>--}}
{{--                                        @foreach($genders as $gender)--}}
{{--                                            <option value="{{$gender->id}}">{{$gender->Name}}</option>--}}
{{--                                        @endforeach--}}
{{--                                    </select>--}}
{{--                                    @error('Gender_id')--}}
{{--                                    <div class="alert alert-danger">{{ $message }}</div>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <br>

                            <div class="form-row">



                                <div class="col">
                                    <label for="title">{{trans('Teacher_trans.Joining_Date')}}</label>
                                    <div class='input-group'>

                                        <input id="hijri-picker"  type="text"  class="form-control"  name="Joining_Date"  required />
                                    </div>
                                    @error('Joining_Date')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>




                                <div class="form-group col">
                                    <label for="exampleFormControlTextarea1">{{trans('Teacher_trans.Address')}}</label>
                                    <input type="text" class="form-control" name="Address"
                                              id="exampleFormControlTextarea1" />
                                    @error('Address')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <br>


                            <button class="btn btn-success btn-lg nextBtn btn-lg pull-right" type="submit">حفظ </button>
                    </form>
                        </div>
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
    $("#hijri-picker").hijriDatePicker({
    hijri:true,
    showSwitcher:false
    });
    }
</script>
    @toastr_js
    @toastr_render
@endsection
