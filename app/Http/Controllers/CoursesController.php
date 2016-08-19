<?php

namespace App\Http\Controllers;

use App\Course;
use App\Http\Requests;
use App\Http\Requests\CourseRequest;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
  /**
   * Display a list of Courses
   * @return Illuminate\Http\Response
   *
   */
  public function index()
  {
    $courses = Course::all();
    return view('courses.index', compact('courses'));
  }

  /**
   * Display a Course resource
   * @param  Course $course
   * @return Illuminate\Http\Response
   */
  public function show(Course $course)
  {
    return view('courses.show', compact('course'));
  }

  /**
   * Display a form to create a Course Resource
   * @return Illuminate\Http\Response
   */
  public function create()
  {
    return view('courses.create');
  }

  /**
   * [store description]
   * @param  CourseRequest $request
   * @return Illuminate\Http\Response
   */
  public function store(CourseRequest $request)
  {
    Course::create($request->all());

    return redirect()->route('courses.index');
  }

  public function edit(Course $course)
  {
    return view('courses.edit', compact('course'));
  }

  public function update(Course $course, CourseRequest $request)
  {
    $course->update($request->all());

    return redirect()->route('courses.index');
  }

  public function destroy(Course $course)
  {
    $course->delete();

    return back();
  }
}
