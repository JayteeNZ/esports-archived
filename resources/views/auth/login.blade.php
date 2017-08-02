@extends('layouts.app')

@section('content')
    <div class="container d-flex align-items-center justify-content-center" style="height: 100vh">
        <form action="{{ route('login') }}" method="POST" style="flex: 1; max-width: 450px">
            <div class="form-group {{ $errors->has('email') ? 'has-danger' : '' }}">
                <label>Email</label>
                <input type="text" name="email" class="form-control" placeholder="Email Address">
                @if ($errors->has('email'))
                    <div class="form-control-feedback">{{ $errors->first('email') }}</div>
                @endif
            </div>
            <div class="form-group {{ $errors->has('password') ? 'has-danger' : '' }}">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="Password">
                @if ($errors->has('password'))
                    <div class="form-control-feedback">{{ $errors->first('password') }}</div>
                @endif
            </div>
            <div class="form-group">
                <label class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input">
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description" style="margin-top: 2px; margin-left: 5px">Remember me</span>
                </label>
            </div>
            <div class="form-group">
                {{ csrf_field() }}
                <button type="submit" class="btn btn-primary">Log me in</button>
            </div>
        </form>
    </div>
@endsection
