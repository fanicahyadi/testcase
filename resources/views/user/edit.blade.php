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
                <div class="form-group">
                    @csrf
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" name="password" value="{{ $users->password }}" />

                    <input type="hidden" name="method" value="PUT" class="form-control"/>
                        <label>New Password:</label>
                            <input
                                type="password"
                                className="form-control"
                                placeholder="Enter New Password"
                                name="password_new"
                                autoFocus />
                    <div class={(resetpassword.errors && resetpassword.errors.password_new) ?>
                    </div>
        
                        <label >Password Confirm:</label>
                            <input
                                type="password"
                                className="form-control"
                                placeholder="Enter Password Confirmation"
                                name="password_confirmation" />
                    <div class={(resetpassword.errors && resetpassword.errors.password_confirmation) ?>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Update Data</button>
            </form>
        </div>
    </div>
@endsection
