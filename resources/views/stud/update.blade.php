@extends('layout')

@section('content')


<div class="card mt-5">
    <div class="card-header">
        Update
    </div>

    <div class="card-body">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form method="post" action="{{ route('stud.update', $stud->id) }}">
            <div class="form-group">
                @csrf
                @method('PATCH')
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" value="{{ $stud->name }}" />
            </div>
           
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="tel" class="form-control" name="address" value="{{ $stud->address }}" />
            </div>

           
            <div class="d-flex justify-content-end">

              <button type="submit" class="btn btn-outline-primary">Update</button>
              
              
              <a href="{{'/stud'}}" class="btn btn-outline-warning" name="send">Back</a>
          </div>
        </form>
    </div>
</div>
@endsection