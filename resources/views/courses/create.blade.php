@extends('layouts.app')

@section('content')

  <h1>Add New Course</h1>

  <form class="form-horizontal" action="{{ route('courses.store') }}" method="post">

    @include('courses.form')

    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Add</button>
      </div>
    </div>
  </form>
@stop
