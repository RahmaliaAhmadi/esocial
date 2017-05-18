<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  // Maklumat nama table yang perlu dihubungi oleh Model Gallery ini
  protected $table = 'posts';

  // relationship diantara table posts kepada table users
  public function user()
  {
    return $this->belongsTo('App\Models\User', 'user_id', 'id');
  }
}
