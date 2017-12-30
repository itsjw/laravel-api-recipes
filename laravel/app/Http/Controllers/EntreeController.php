<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entree;
use App\Recipe;
use App\Chef;

class EntreeController extends Controller
{
    /**
     * Store a newly created resource in storage. 
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $recipe = Recipe::find($request->recipe_id);

        if(!$recipe) {
            return [
                'error' => [
                    'message' => 'Recipe not Found'
                ]
            ];
        }

        $chef = Chef::find($request->chef_id);

        if(!$chef) {
            return [
                'error' => [
                    'message' => 'Chef not Found'
                ]
            ];
        }
        try {
            $entree = Entree::create($request->all());
        } catch(\Illuminate\Database\QueryException $e) {
            return [
                'error' => [
                    'message' => sprintf('Entree: %s made by %s already exists.', $recipe->name, $chef->name)
                ]
            ];
        }
        
        return $entree;
    }
}
