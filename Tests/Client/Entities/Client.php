<?php
namespace FabioFapeli\CyberwayApp\Tests\Client\Entities;

use FabioFapeli\CyberwayApp\Entities\App;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'clients';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];


    public function app()
    {
        return $this->morphOne(App::class, 'appable');
    }

    public function apps()
    {
         return $this->morphMany(App::class, 'appable');
    }

}

