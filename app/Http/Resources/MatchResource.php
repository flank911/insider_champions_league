<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MatchResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'first_team_goals' => $this->first_team_goals,
            'second_team_goals' => $this->second_team_goals,
            'week' => new TeamResource($this->whenLoaded('week')),
            'first_team' => new TeamResource($this->whenLoaded('firstTeam')),
            'second_team' => new TeamResource($this->whenLoaded('secondTeam')),
        ];
    }
}
