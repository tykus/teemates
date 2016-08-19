<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
  use Sluggable;
  use SoftDeletes;

  /**
   * Mass-assignment protection
   * @var Array
   */
  protected $fillable = ['name', 'slug'];

  /**
   * Route-Model binding key
   * @return String
   */
  public function getRouteKeyName()
  {
    return 'slug';
  }

  /**
   * Return the sluggable configuration array for this model.
   * @return array
   */
  public function sluggable()
  {
    return [
      'slug' => [
        'source' => 'name',
        'onUpdate' => true
      ]
    ];
  }
}
