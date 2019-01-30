<?php

namespace Kinytron\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Leaderboard extends JsonResource
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
            'name' => $this->user->name." ".$this->user->lastname,
            'college' => $this->user->college->name,
            'course' => $this->user->course->level." ".$this->user->course->letter,
            'score' => $this->score,
            'exam_id' => $this->exam->id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
