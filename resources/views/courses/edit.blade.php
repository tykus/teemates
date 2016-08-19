@extends('layouts.app')

@section('content')

  <form class="form-horizontal" action="{{ route('courses.update', $course->slug) }}" method="post">
    {{ method_field('PUT') }}

    @include('courses.form')

    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <input type="submit" class="btn btn-default" value="Update">
      </div>
    </div>

  </form>

@stop
