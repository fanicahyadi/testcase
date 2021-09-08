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
            
            <a href="{{ route('items.create') }}" class="btn btn-primary"><i class="fas fa-plus mr-1"></i>Add Data</a> &nbsp;&nbsp;

            <thead>            
                <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td>Catgories</td>
                    <td>Rooms</td>
                    <td>Quantity</td>
                    <td>Price</td>
                    <td colspan="2">Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->category}}</td>
                        <td>
                            {{ $item->room->name ?? '' }}
                         </td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ $item->price }}</td>
                        <td><a href="{{ route('items.edit', $item->id) }}" class="btn btn-primary">Edit</a></td>
                        <td>
                            <form action="{{ route('items.destroy', $item->id) }}" method="post">
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
