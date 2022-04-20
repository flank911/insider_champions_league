<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LeagueResource extends JsonResource
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
            'id' => $this->id,
            'points' => $this->points,
            'played' => $this->played,
            'won' => $this->won,
            'lost' => $this->lost,
            'draw' => $this->draw,
            'goal_difference' => $this->goal_difference,
            'team' => new TeamResource($this->whenLoaded('team')),
        ];
    }
}
