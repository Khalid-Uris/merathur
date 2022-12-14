<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'city';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'city_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['city_name','history','city_image'];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Get all of the comments for the City
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function location()
    {
        return $this->hasMany(Location::class, 'city_id', 'city_id');
    }
}
