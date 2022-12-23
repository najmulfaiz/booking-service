<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $response = [
            'data' => [
                'id'       => $this->id,
                'name'     => $this->name,
                'email'    => $this->email,
                'no_hp'    => $this->no_hp,
                'alamat'   => $this->alamat,
                'province' => $this->province ??  null,
                'regency'  => $this->regency  ??  null,
            ]
        ];

        if($this->token) {
            $response['token'] = $this->token ??  null;
        }

        return $response;
    }
}
