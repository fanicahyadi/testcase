@extends('layouts.app')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }

    </style>
    <div class="uper">
        @if (session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div><br />
        @endif
        <table class="table table-striped">

            <a href="{{ route('permission.create') }}" class="btn btn-primary"><i class="fas fa-plus mr-1"></i>Add Data</a> &nbsp;&nbsp;

            <thead>
                <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td>Guard Name</td>
                    <td colspan="2">Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($permissions as $permission)
                    <tr>
                        <td>{{ $permission->id }}</td>
                        <td>{{ $permission->name }}</td>
                        <td>{{ $permission->guard_name }}</td>
                        <td><a href="{{ route('permission.edit', $permission->id) }}" class="btn btn-primary">Edit</a></td>
                        <td>
                            <form action="{{ route('permission.destroy', $permission->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div>
        @endsection