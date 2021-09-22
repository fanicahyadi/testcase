@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Add Item Data
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
      <form method="post" action="{{ route('items.store') }}">
          <div class="form-group">
              @csrf
              <label for="name">Name:</label>
              <input type="text" class="form-control" name="name"/>
          </div>
          <div class="form-group">
              <label for="category">Category :</label>
              <select class="form-control" name="category">
                @foreach ($category as $item)
                    <option value="{{ $item->id }}"> {{ $item->name }} </option>                 
                @endforeach
              </select>
          </div>
          <div class="form-group">
            <label for="room">Rooms :</label>
            <textarea rows="5" columns="5" class="form-control" name="room"></textarea>
        </div>
          <div class="form-group">
              <label for="quantity">Quantity :</label>
              <input type="number" class="form-control" name="quantity"/>
          </div>
          <div class="form-group">
              <label for="price">Price :</label>
              <input type="text" class="form-control" name="price"/>
          </div>
          <button type="submit" class="btn btn-primary">Add Data</button>
      </form>
  </div>
</div>
@endsection
