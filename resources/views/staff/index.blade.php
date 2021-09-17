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

            <a href="" class="btn btn-primary"><i class="fas fa-plus mr-1"></i>Add Data</a> &nbsp;&nbsp;

            <thead>
                <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td>No HP</td>
                    <td colspan="2">Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($staffs as $staff)
                    <tr>
                        <td>{{ $staff->id }}</td>
                        <td>{{ $staff->name }}</td>
                        <td>{{ $staff->no_hp }}</td>
                        <td><a href="{{ route('staffs.edit', $staff->id) }}" class="btn btn-primary">Edit</a></td>
                        <td>
                            <form action="{{ route('staffs.destroy', $staff->id) }}" method="post">
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
