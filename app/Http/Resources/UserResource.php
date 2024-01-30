<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Http\Resources\WalletResource;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
  /**
   * Transform the resource into an array.
   *
   * @return array<string, mixed>
   */
  public function toArray(Request $request): array
  {
    return [
      'login' => $this->login,
      'wallet' => new WalletResource($this->wallet),
      'profile' => new ProfileResource($this->profile),
      'contact' => new ContactResource($this->contact),
      'created_at' => $this->created_at->format('Y-m-d H:i:s'),
      'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
    ];
  }
}
