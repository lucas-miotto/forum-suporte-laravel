<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class SupportResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        return [
            'identify' => $this->id,
            'subject' => strtoupper($this->subject),
            'content' => $this->body,
            'dt_created' => Carbon::make($this->created_at)->format('Y-m-d'),
        ];
    }
}
