@extends('layouts.app')

@section('content')
    <div class="container d-flex align-items-center justify-content-center" style="height: 100vh">
        <form action="{{ route('register') }}" method="POST" style="flex: 1; max-width: 500px">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('first_name') ? 'has-danger' : '' }}">
                        <input type="text" name="first_name" class="form-control" placeholder="Name">
                        @if ($errors->has('first_name'))
                            <div class="form-control-feedback">{{ $errors->first('first_name') }}</div>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('last_name') ? 'has-danger' : '' }}">
                        <input type="text" name="last_name" class="form-control" placeholder="Surname">
                        @if ($errors->has('last_name'))
                            <div class="form-control-feedback">{{ $errors->first('last_name') }}</div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-group {{ $errors->has('email') ? 'has-danger' : '' }}">
                <input type="text" name="email" class="form-control" placeholder="Email Address">
                @if ($errors->has('email'))
                    <div class="form-control-feedback">{{ $errors->first('email') }}</div>
                @endif
            </div>
            <div class="form-group {{ $errors->has('username') ? 'has-danger' : '' }}">
                <input type="text" name="username" class="form-control" placeholder="Username">
                @if ($errors->has('username'))
                    <div class="form-control-feedback">{{ $errors->first('username') }}</div>
                @endif
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('password') ? 'has-danger' : '' }}">
                        <input type="password" name="password" class="form-control" placeholder="Choose a Password">
                        @if ($errors->has('password'))
                            <div class="form-control-feedback">{{ $errors->first('password') }}</div>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('password_confirmation') ? 'has-danger' : '' }}">
                        <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password">
                        @if ($errors->has('password_confirmation'))
                            <div class="form-control-feedback">{{ $errors->first('password_confirmation') }}</div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-group">
                {{ csrf_field() }}
                <button type="submit" class="btn btn-primary">Register</button>
            </div>
        </form>
    </div>
@endsection
