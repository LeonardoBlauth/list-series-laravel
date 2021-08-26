<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Episodio extends Model
{
    protected $fillable = ['numero'];

    public function temporada()
    {
        return $this->belongsTo(Temporada::class);
    }
}
