<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ContactResource extends JsonResource
{
  /**
   * Transform the resource into an array.
   *
   * @return array<string, mixed>
   */
  public function toArray(Request $request): array
  {
    return [
      'email' => $this->user->email,
      'phone' => $this->phone,
      'vk' => $this->vk,
      'telegram' => $this->telegram,
      'instagram' => $this->instagram,
      'youtube' => $this->youtube,
    ];
  }
}
