<?php

namespace App\Http\Controllers;

use App\Recipe;
use Illuminate\Http\Request;
use App\Http\Resources\RecipeResource;
use JWTAuth;

class RecipeController extends Controller
{

    private $currentUser;
    public function __construct()
    {
        $this->currentUser = JWTAuth::parseToken()->authenticate();
    }


    /**
     *
     *
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    public function getSavedRecipes()
    {
        $recipes = $this->currentUser->recipes()->get();
        return compact('recipes');

        // return RecipeResource::collection(Recipe::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $recipe = new Recipe();
        $recipe->title = $request->get('title');
        $recipe->description = $request->get('description');
    
        $this->currentUser->recipes()->save($recipe);

        // $recipe = Recipe::create([
        //     'title' => $request->get('title'),
        //     'description' => $request->get('description'),
        // ]);

        // return new RecipeResource($recipe);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function show(Recipe $recipe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function edit(Recipe $recipe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recipe $recipe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recipe $recipe, Request $request)
    {
        Recipe::where('id', $request->id)->delete();
    }
}
