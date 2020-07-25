<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\user as UserResources;

class Usercontroller extends Controller
{
     
    public function __construct(user $user)
    {
        $this-> model=$user;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */   
     public function index(user $user)
    {
        
        return response()->json($user->all(), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $address = \Correios::cep($request->cep);

        $user = new User();
        $user->fill($request->all());
        $user->password = Hash::make($user->password);
        if(!empty($address)) {
            $user->logradouro = $address['logradouro'];
            $user->bairro = $address['bairro'];
            $user->cidade = $address['cidade'];
            $user->estado = $address['uf'];
        }
        $user->save();

        $UserResource = new UserResources($user);
        return response()->json($UserResource, 200); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = $this->model->findOrFail($id);
        $UserResource = new UserResources($user);
        return response()->json($UserResource);        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $address = \Correios::cep($request->cep);

        $user->fill($request->all());
        $user->password = Hash::make($user->password);
        if(!empty($address)) {
            $user->logradouro = $address['logradouro'];
            $user->bairro = $address['bairro'];
            $user->cidade = $address['cidade'];
            $user->estado = $address['uf'];
        }
        $user->save();

        $UserResource = new UserResources($user);
        return response()->json($UserResource, 200); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(user $user)
    {
        $user->delete();
        return response()->json([], 200);
    }
}
