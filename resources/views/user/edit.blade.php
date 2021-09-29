@extends('layouts.app')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }

    </style>
    <div class="card uper">
        <div class="card-header">
            Edit User Data
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif
            <form method="post" action="{{ route('users.update', $users->id) }}">
                <div class="form-group">
                    @csrf
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" name="name" value="{{ $users->name }}" />
                </div>
                <div class="form-group">
                    @csrf
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" name="email" value="{{ $users->email }}" />
                </div>
            @if (count($errors))
                @foreach ($errors->all() as $error)
                  <p class="alert alert-danger">{{$error}}</p>
                @endforeach
            @endif    
                    <div class="form-group">
                    @csrf
                    <label for="oldpassword">Password:</label>
                    <input type="password" id="first-name" class="form-control"  placeholder="Enter old password" name="oldpassword"> 
                    </div>

                    <div class="form-group">
                        @csrf
                        <label for="newpassword">New Password:</label>
                        <input type="password" id="first-name" class="form-control" placeholder="Enter new password" name="newpassword"> 
                    </div>

                    <div class="form-group">
                        @csrf
                        <label for="password_confirmation">Password Confirmation:</label>
                        <input type="password" id="first-name"  class="form-control" placeholder="Enter password confirmation"  name="password_confirmation"> 
                    </div>
              <button type="submit" class="btn btn-primary">Update Data</button>
            </form>
        </div>
    </div>
@endsection
