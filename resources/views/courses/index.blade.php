@extends('layouts.app')

@section('content')

  <h1>Courses</h1>

  <a href="{{ route('courses.create') }}" class="btn btn-default">Add New Course</a>

  <table class="table table-striped">
    <tbody>
      @foreach($courses as $course)
        <tr>
          <td>
            {!! $course->name !!}
          </td>
          <td>
            <a href="{{ route('courses.show', $course->slug) }}" class="btn btn-default">Details</a>
            <a href="{{ route('courses.edit', $course->slug) }}" class="btn btn-default">Edit</a>
            <form action="{{ route('courses.destroy', $course->slug) }}" method="post">
              {{ csrf_field() }}
              {{ method_field('DELETE') }}
              <button type="submit" class="btn btn-danger">Delete</button>
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>

@stop
