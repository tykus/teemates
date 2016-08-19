<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CoursesAdministrationTest extends TestCase
{

  use DatabaseMigrations;

  protected $course;

  public function setUp()
  {
    parent::setUp();
    factory(App\Course::class)->create([
      'name' => 'Luttrellstown Castle Golf Club',
      'slug' => 'luttrellstown-castle-golf-club'
    ]);
  }

  public function test_can_view_all_courses()
  {
    $this->visit('/courses')
      ->see('Luttrellstown Castle Golf Club');
  }

  public function test_can_view_an_individual_course()
  {
    $this->visit('/courses')
      ->click('Details')
      ->seePageIs("/courses/luttrellstown-castle-golf-club")
      ->see('Luttrellstown Castle Golf Club');
  }

  public function test_can_add_a_new_course()
  {
    $new_course_name = "Castleknock Golf Club";

    $this->visit('/courses')
      ->click('Add New Course')
      ->seePageIs('/courses/create')
      ->type($new_course_name, 'name')
      ->press('Add')
      ->seePageIs('/courses')
      ->see($new_course_name)
      ->seeInDatabase('courses', ['name' => $new_course_name])
      ->seeInDatabase('courses', ['slug' => str_slug($new_course_name)]);
  }

  public function test_does_not_allow_empty_course_name()
  {
    $this->visit('/courses/create')
      ->press('Add')
      ->seePageIs('/courses/create')
      ->see('is required');
  }

  public function test_does_not_allow_duplicate_courses()
  {
    $this->visit('/courses/create')
      ->type('Luttrellstown Castle Golf Club', 'name')
      ->press('Add')
      ->seePageIs('/courses/create')
      ->see('already been taken');
  }

  public function test_does_not_remove_course_from_database_on_delete()
  {
    $this->visit('/courses')
      ->press('Delete')
      ->dontSee('Luttrellstown Castle Golf Club')
      ->seeInDatabase('courses', ['name' => 'Luttrellstown Castle Golf Club']);
  }

  public function test_can_update_course()
  {
    $this->visit('/courses')
      ->click('Edit')
      ->seePageIs('/courses/luttrellstown-castle-golf-club/edit')
      ->type('Luttrellstown Castle Golf & Country Club', 'name')
      ->press('Update')
      ->seePageIs('/courses')
      ->see('Luttrellstown Castle Golf & Country Club');
  }

  public function test_updates_slug_on_edit()
  {
    $this->visit('/courses/luttrellstown-castle-golf-club/edit')
      ->type('Luttrellstown Castle Golf & Country Club', 'name')
      ->press('Update')
      ->seePageIs('/courses')
      ->see('Luttrellstown Castle Golf & Country Club')
      ->seeInDatabase('courses', ['slug' => 'luttrellstown-castle-golf-country-club']);
  }

}
