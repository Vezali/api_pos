<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pet;
use App\Http\Resources\Pet as PetResource;

class Petcontroller extends Controller
{

    //app\Models\Pet;
    protected $model;

    public function __construct(Pet $pet)
    {
        $this-> model=$pet;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pet = $this->model->all();
        return response()->json($pet, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pet = new Pet();
        $pet->fill($request->all());
        $pet->save();
        $PetResource = new PetResource($pet);
        return response()->json($PetResource);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $pet = $this->model->findOrFail($id);
        $PetResource = new PetResource($pet);
        return response()->json($PetResource);
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
        $pet = $this->model->find($id);
        $pet->fill($request->all());
        $pet->save();
        $PetResource = new PetResource($pet);
        return response()->json($PetResource);
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(pet $pet)
    {
        $pet->delete();
        return response()->json([], 200);
    }
}
