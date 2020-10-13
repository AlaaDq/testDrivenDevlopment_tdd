<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Carbon\Carbon;
class Book extends Model
{
    protected $guarded = [];

    public function path()
    {
        return '/books/' . $this->id;
    }

    public function checkout($user)
    {
        $this->reservations()->create([
            'user_id'=>$user->id,
            'checked_out_at'=>Carbon::now(),
        ]);

    }

    public function checkin($user)
    {
       $reservation = $this->reservations()->where('user_id',$user->id)
        ->whereNotNull('checked_out_at')
        ->whereNull('checked_in_at')
        ->first();

        // dd($reservation);

        if(is_null($reservation))
        {
            throw new \Exception();
        }

        $reservation->update([
            'checked_in_at'=>Carbon::now()
        ]);
    }
    
    public function setAuthorIdAttribute($author)
    {
        $this->attributes['author_id'] = (Author::firstOrCreate([
            'name' => $author,
            ]))->id;
        }

    public function reservations()
    {
      return $this->hasMany(Reservation::class);
    }
}
    