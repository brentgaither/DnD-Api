<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\UserItem;

class Item extends Model
{
  public function userItem()
  {
      return $this->hasMany(UserItem::class);
  }
}
