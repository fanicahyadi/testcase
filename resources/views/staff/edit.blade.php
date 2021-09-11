@extends('layouts.app')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }

    </style>
    <div class="card uper">
        <div class="card-header">
            Edit Item Data
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
            <form method="post" action="{{ route('staffs.update', $staffs->id) }}">
                <div class="form-group">
                    @csrf
                    @method('PATCH')
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" name="name" value="{{ $staffs->name }}" />
                </div>
                <div class="form-group">
                    @csrf
                    @method('PATCH')                    
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" name="email" value="{{ $staffs->name }}" />
                </div>
                <button type="submit" class="btn btn-primary">Update Data</button>
            </form>
        </div>
    </div>
@endsection
