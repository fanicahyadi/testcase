@extends('layouts.app')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }

    </style>
    <div class="card uper">
        <div class="card-header">
            Add Room Data
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
            <form method="post" action="{{ route('rooms.store') }}">
                <div class="form-group">
                    @csrf
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" name="name" />
                </div>
                <div class="form-group">
                    <label for="description">Description :</label>
                    <textarea rows="5" columns="5" class="form-control" name="description"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Add Data</button>
            </form>
        </div>
    </div>
@endsection
