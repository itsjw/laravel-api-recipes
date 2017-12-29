<?php

namespace App\Http\Controllers;

use App\Chef;
use App\Http\Resources\Chef as ChefResource;
use App\Http\Resources\ChefCollection as ChefCollectionResource;
use Illuminate\Http\Request;

class ChefController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new ChefCollectionResource(Chef::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $chef = Chef::create($request->all());
        } catch(\Illuminate\Database\QueryException $e) {
            return [
                'error' => [
                    'message' => sprintf('Chef: %s already exists.', $request->name)
                ]
            ];
        }
        
        return $chef;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $chef = Chef::find($id);

        if(!$chef) {
            return [
                'error' => [
                    'message' => 'Chef not Found'
                ]
            ];
        }
        
        return new ChefResource(Chef::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
