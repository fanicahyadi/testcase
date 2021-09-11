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
        <div>
            <table class="table table-striped">

                <a href="{{ route('rooms.create') }}" class="btn btn-primary"><i class="fas fa-plus mr-1"></i>Add Data</a> &nbsp;&nbsp;
    
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Name</td>
                        <td>Description</td>
                        <td colspan="2">Action</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rooms as $room)
                        <tr>
                            <td>{{ $room->id }}</td>
                            <td>{{ $room->name }}</td>
                            <td>{{ $room->description }}</td>
                            <td><a href="{{ route('rooms.edit', $room->id) }}" class="btn btn-primary">Edit</a></td>
                            <td>
                                <form action="{{ route('rooms.destroy', $room->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endsection
