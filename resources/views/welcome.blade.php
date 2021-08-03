@extends('layout')

@section('content')

<div class="card mt-5">
  <div class="card-header">
    Welcome To CRUD
  </div>

  <div class="card-body">
   
   
    <div class="row">
      <div class="col">
        <span> Employees Data Add Hear :- </span> <a href="{{ route('employees.index')}}" class="btn btn-info">Add</a>
  <br> <small>(CRUD With Normal alert)</small>
      </div>
      <div class="col">
        <span> Student Data Add Hear :- </span> <a href="{{ route('stud.index')}}" class="btn btn-info">Add</a>
        <br>   <small>(CRUD With alert)</small>
      </div>
      <div class="col">
        <span> Bike Data Add Hear :- </span> <a href="{{ route('bike.index')}}" class="btn btn-info">Add</a>
        <br> <small>(CRUD With sweetalert)</small>
      </div>
    </div>

  </div>
</div>

@endsection