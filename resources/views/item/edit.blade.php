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
                <div class="form-group">
                    @csrf
                    @method('PATCH')
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" name="name" value="{{ $items->name }}" />
                </div>
                <div class="form-group">
                    <label for="category">Category :</label>
                    <textarea rows="5" columns="5" class="form-control" name="category">{{ $items->category }}</textarea>
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
