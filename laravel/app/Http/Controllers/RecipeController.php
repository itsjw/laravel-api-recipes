<?php

namespace App\Http\Controllers;

use App\Recipe;
use App\Http\Resources\Recipe as RecipeResource;
use App\Http\Resources\RecipeCollection as RecipeCollectionResource;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new RecipeCollectionResource(Recipe::all());
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
        //todo validate for duplicates
        $recipe = Recipe::where('name', $request->name);

        try {
            $recipe = Recipe::create($request->all());
        } catch(\Illuminate\Database\QueryException $e) {
            return [
                'error' => [
                    'message' => sprintf('Recipe: %s already exists.', $request->name)
                ]
            ];
        }
        
        return $recipe;
    }

    /**
     * Display the specified resource.
     *
     * @return RecipeResource
     */
    public function show($id)
    {
        $recipe = Recipe::find($id);

        if(!$recipe) {
            return [
                'error' => [
                    'message' => 'Recipe not Found'
                ]
            ];
        }

        return new RecipeResource(Recipe::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $recipe = Recipe::find($id);

        //Cannot update a recipe that does not exist
        if(!$recipe) {
            return [
                'error' => [
                    'message' => 'Recipe not found'
                ]
            ];
        }

        $recipe->update($request->all());
        return $recipe;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recipe $recipe)
    {
        //
    }
}
