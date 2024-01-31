<?php

namespace App\Http\Resources;

use Carbon\Carbon;
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
    Carbon::setLocale('ru');
    return [
      'id' => $this->id,
      'login' => $this->login,
      'points' => $this->experience_points,
      'status' => $this->status_readable,
      'wallet' => new WalletResource($this->wallet),
      'profile' => new ProfileResource($this->profile),
      'contact' => new ContactResource($this->contact),
      'updated_at' => formatDate($this->updated_at),
      'created_at' => formatDate($this->created_at),
    ];
  }
}
