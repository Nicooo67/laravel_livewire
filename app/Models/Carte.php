<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carte extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['libelle', 'description'];
    
    public function elements()
    {
    return $this->hasMany(Element::class)->orderByDesc('created_at');
    }
}
