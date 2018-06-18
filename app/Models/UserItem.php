<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Item;

class UserItem extends Model
{
  protected $table = 'users_items';

  public function item()
  {
      return $this->belongsTo(Item::class);
  }
}
