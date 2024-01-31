<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
{
  /**
   * Transform the resource into an array.
   *
   * @return array<string, mixed>
   */
  public function toArray(Request $request): array
  {
    return [
      'name' => $this->name,
      'lastname' => $this->lastname,
      'birthday' => $this->birthday,
      'gender' => $this->gender_readable,
      'occupation' => $this->occupation,
      'country' => $this->country,
      'region' => $this->region,
      'city' => $this->city,
      'email_verified' => $this->email_verified,
      'phone_verified' => $this->phone_verified,
      'telegram_verified' => $this->telegram_verified,
    ];
  }
}
