<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class LeagueResourceCollection extends ResourceCollection
{
    public $collects = LeagueResource::class;
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
            'league' => $this->collection
        ];
    }
}
