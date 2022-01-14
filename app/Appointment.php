<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Appointment extends Model
{
   protected $guarded = [];

   public function doctor()
   {
 
      return $this->BelongsTo(User::class,'user_id','id');

   }
}
