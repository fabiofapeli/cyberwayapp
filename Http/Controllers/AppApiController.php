<?php

namespace FabioFapeli\CyberwayApp\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use FabioFapeli\CyberwayApp\Entities\App;
use Illuminate\Routing\Controller;

class AppApiController extends Controller
{
    private $app;

    public function __construct(App $app)
    {
        $this->app = $app;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @return Response
     */
    public function update(Request $request)
    {
        $app = $this->app->where('uuid', $request->uuid)->first();
        if($app != null){
            $app->update($request->all()); 
        }
        else{
            return response()->json(['regid' => 'does_not_exist'], 200);
        }
        return $app;
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
