@extends('layouts.app')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }

    </style>
    <div class="card uper">
        <div class="card-header">
            Edit Role Data
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
            <form method="post" action="{{ route('role.update', $role->id) }}">
                <div class="form-group">
                    @csrf
                    <label for="name">Name :</label>
                    <input type="text" class="form-control" name="name" value="{{ $role->name }}"/>
                </div>
                <div class="form-group">
                    @csrf
                    <label for="slug">Slug:</label>
                    <input type="text" class="form-control" name="slug" value="{{ $role->slug }}"/>
                </div>
                <button type="submit" class="btn btn-primary">Update Data</button>
            </form>
        </div>
    </div>
@endsection
