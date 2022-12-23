<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'tanggal'            => $this->tanggal,
            'user'            => [
                'id' => $this->user->id,
                'name' => $this->user->name
            ],
            'nopol'              => $this->nopol,
            'jenis_kendaraan_id' => [
                'id' => $this->jenis_kendaraan->id,
                'nama' => $this->jenis_kendaraan->nama
            ],
            'jenis_transmisi_id' => [
                'id' => $this->jenis_transmisi->id,
                'nama' => $this->jenis_transmisi->nama
            ],
            'tahun'              => $this->tahun,
            'bahan_bakar'        => $this->bahan_bakar,
            'keluhan'            => $this->keluhan,
        ];
    }
}
