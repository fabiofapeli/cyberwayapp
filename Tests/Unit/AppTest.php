<?php
namespace FabioFapeli\CyberwayApp\Tests\Unit;
use FabioFapeli\CyberwayApp\Entities\App;
use FabioFapeli\CyberwayApp\Tests\AbstractTestCase;
use FabioFapeli\CyberwayApp\Tests\Client\Entities\Client;
use stdClass;

class AppTest extends AbstractTestCase
{

   public function setUp(): void
   {
       parent::setUp();
       $this->migrate();
       $this->createApp();
       $this->createClient();
   }

   public function test_check_if_a_app_can_be_persisted(){
       $app = App::create([
       	'uuid'=>'bbbb',
       	'appable_id' => 1,
       	'appable_type' => 'Modules\Client\Entities\Client'
       ]);
       $this->assertEquals('bbbb',$app->uuid);

       $first = App::all()->first();
       $this->assertEquals('aaaa',$first->uuid);

   }

   public function test_check_appable(){
      $client = Client::all()->first();
      $client->app()->create([
        'uuid'=>'cccc'
      ]);
      $app = App::all()->last();
      $this->assertEquals('cccc',$app->uuid);
   }

   public function test_check_tryUpdateRegid_return_does_not_exist(){
      $data = new stdClass();
      $data->uuid = "dddd";
      $data->regid = "1111";
      $app = App::tryUpdateRegid($data);
      $this->assertEquals('does_not_exist',$app->regid);
   }

   public function test_check_tryUpdateRegid_update_regid_with_success(){
      $data = new stdClass();
      $data->uuid = "aaaa";
      $data->regid = "2222";
      $app = App::tryUpdateRegid($data);
      $this->assertEquals($data->regid, $app->regid);
   }

   public function createApp() {
        App::create([
       	'uuid'=>'aaaa',
        'regid'=>'0000',
       	'appable_id' => 1,
       	'appable_type' => 'Modules\Client\Entities\Client'
       ]);
    }

     public function createClient() {
        Client::create([
        'name'=>'John Doe'
       ]);
    }
    

}
