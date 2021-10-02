@extends('layouts.app')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }

    </style>
    <div class="card uper">
        <div class="card-header">
            Edit Permission Data
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
            <form method="post" action="{{ route('permission.update', $permission->id) }}">
                <div class="form-group">
                    @csrf
                    <label for="name">Name :</label>
                    <input type="text" class="form-control" name="name" value="{{ $permission->name }}"/>
                </div>
                <div class="form-group">
                    @csrf
                    <label for="slug">Slug:</label>
                    <input type="text" class="form-control" name="slug" value="{{ $permission->slug }}"/>
                </div>
                <button type="submit" class="btn btn-primary">Update Data</button>
            </form>
        </div>
    </div>
@endsection
