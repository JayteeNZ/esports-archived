@extends('layouts.app')

@section('content')
    <div class="d-flex centered" style="height: 100vh">
        <div class="login-container">
            <form method="POST" action="{{ route('register') }}">
            	<div class="row">
            		<div class="col-md-6">
            			<div class="form-group">
            				<label>Name</label>
            				<input type="text" name="first_name" class="form-control">
            			</div>
            		</div>
            		<div class="col-md-6">
            			<div class="form-group">
            				<label>Surname</label>
            				<input type="text" name="last_name" class="form-control">
            			</div>
            		</div>
            	</div>
                <div class="form-group">
                    <input type="text" name="email" class="form-control" placeholder="Email Address">
                </div>
                <div class="form-group">
                    <input type="text" name="username" class="form-control" placeholder="Choose a username">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                </div>
                <div class="form-group">
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Password Again">
                </div>
                <div class="form-group">
                    <label for="remember_me">
                        <input type="checkbox" name="remember" id="remember_me">
                        <span class="ml-3">Keep me signed in</span>
                    </label>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Login</button>
                    {{ csrf_field() }}
                </div>
            </form>
        </div>
    </div>        
@endsection
