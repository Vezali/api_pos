<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class user extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'email'=>$this->email,
            'cep'=>$this->cep,
            'logradouro'=>$this->logradouro,
            'numero'=>$this->numero,
            'bairro'=>$this->bairro,
            'cidade'=>$this->cidade,
            'estado'=>$this->estado
        ];
    }
}
