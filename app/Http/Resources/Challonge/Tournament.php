<?php

namespace App\Http\Resources\Challonge;

use Illuminate\Http\Resources\Json\Resource;

class Tournament extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
