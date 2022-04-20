<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class MatchResourceCollection extends ResourceCollection
{
    public $collects = MatchResource::class;
    public static $wrap = null;
    /**
     * Transform the resource collection into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'matches' => $this->collection
        ];
    }
}
