@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    مكتبة الارشاد
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    مكتبة الارشاد
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <h3>المكتبة :</h3>
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="col-xl-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                @if (auth()->user()->hasPermission('edit_grades'))

                                <a href="{{route('books.create')}}" class="btn btn-success btn-lg" role="button"
                                   aria-pressed="true">اضافة مرجع : </a><br><br>
                                @endif
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>عنوان المرجع</th>
                                            <th> التفاصيل</th>


                                            <th>المزيد</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($books as $index=>$book)
                                            <tr>
                                                <td>{{$index+1 }}</td>
                                                <td>{{$book->name}}</td>
                                                <td>{{$book->details}}</td>


                                                <td>
                                                    <div class="dropdown show">

                                                            <a class="btn btn-outline-success btn-sm"
                                                               href="{{route('books.view',$book->id)}}"
                                                               role="button"><i class="fa fa-eye"></i>&nbsp;
                                                                عرض</a>

                                                            <a class="btn btn-outline-info btn-sm"
                                                               href="{{route('books.download',$book->id)}}"
                                                               role="button"><i
                                                                    class="fa fa-download"></i>&nbsp;
                                                                تحميل</a>
                                                        @if (auth()->user()->hasPermission('edit_grades'))

                                                        <a data-target="#Delete_Student{{ $book->id }}"
                                                           class="btn btn-outline-danger btn-sm"
                                                           data-toggle="modal"
                                                           href="#Delete_Student{{ $book->id }}"
                                                               role="button"><i
                                                                    class="fa fa-trash"></i>&nbsp;
                                                                حزف</a>
                                                            @endif

                                                    </div>
                                                </td>
                                            </tr>
                                            <!-- Deleted inFormation Student -->
                                            <div class="modal fade" id="Delete_Student{{$book->id}}" tabindex="-1"
                                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 style="font-family: 'Cairo', sans-serif;"
                                                                class="modal-title" id="exampleModalLabel">هل انت متأكد
                                                                من رغبتك بالحزف ؟ </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{route('books.destroy',$book->id)}}"
                                                                  method="post">
                                                                @csrf
                                                                @method('DELETE')

                                                                <input type="hidden" name="id" value="{{$book->id}}">


                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">{{trans('Students_trans.Close')}}</button>
                                                                    <button
                                                                        class="btn btn-danger">{{trans('Students_trans.submit')}}</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')
    @toastr_js
    @toastr_render
@endsection
