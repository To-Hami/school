@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="float: right !important; text-align: right">اعادة تعيين كلمة المرور</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div   class="form-group row" style="overflow: hidden;display: flex;flex-direction: row-reverse" >
                            <label for="email"  style="float: right;flex-direction: row-reverse" class="col-md-4 col-form-label text-md-right"> : البريد الالكتروني  </label>

                            <div class="col-md-6" style="flex-direction: row-reverse" >
                                <input id="email" style="border: 2px solid #84ba3f !important;" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span style="float: left;" class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" style="background-color: #84ba3f !important;border: 2px solid #84ba3f !important;">
                                    ارسال رابط اعادة التعيين
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
