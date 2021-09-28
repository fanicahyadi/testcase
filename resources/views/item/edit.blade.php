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
            <form method="post" action="{{ route('items.update', $items->id) }}">
            @csrf
                <div class="form-group">   
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" name="name" value="{{ $items->name }}" />
                </div>
                <div class="form-group">
                    <label for="category_id">Category_id:</label>
                    <input type="number" class="form-control" name="category_id" value="{{ $items->category_id }}" />
                </div>
                <div class="form-group">
                    <label for="room_id">Room_id:</label>
                    <input type="number" class="form-control" name="room_id" value="{{ $items->room_id }}" />
                </div>
                <div class="form-group">
                    <label for="quantity">Quantity :</label>
                    <input type="number" class="form-control" name="quantity" value="{{ $items->quantity }}" />
                </div>
                <div class="form-group">
                    <label for="price">Price :</label>
                    <input type="text" class="form-control" name="price" value="{{ $items->price }}" />
                </div>
                <button type="submit" class="btn btn-primary">Update Data</button>
            </form>
        </div>
    </div>
@endsection
