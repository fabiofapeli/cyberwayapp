<?php

namespace FabioFapeli\CyberwayApp\Entities;

use Illuminate\Database\Eloquent\Model;
use stdClass;

class App extends Model
{
    protected $table = 'apps';

    protected $fillable = [
      'uuid', 'regid', 'platform', 'model', 'connected', 'appable_id', 'appable_type'
    ];


    public function appable()
    {
        return $this->morphTo();
    }

    /**
     * Atualiza regid ou retorna que não existe
     * @param object $data 
     * @return object $app 
     */
    static function tryUpdateRegid($data){
    	$app = App::where('uuid', $data->uuid)->first();
        if($app != null){
        	if(is_object($data))
        		$data = (array) $data;
            $app->update($data); 
        }
        else{
        	$app = new stdClass();
        	$app->regid = 'does_not_exist';
        }
        return $app;
    }

}
