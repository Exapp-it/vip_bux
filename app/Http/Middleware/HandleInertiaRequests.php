<?php

namespace App\Http\Middleware;

use App\Http\Resources\UserResource;
use Inertia\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HandleInertiaRequests extends Middleware
{
  /**
   * The root template that's loaded on the first page visit.
   *
   * @see https://inertiajs.com/server-side-setup#root-template
   * @var string
   */
  protected $rootView = 'app';

  /**
   * Determines the current asset version.
   *
   * @see https://inertiajs.com/asset-versioning
   * @param  \Illuminate\Http\Request  $request
   * @return string|null
   */
  public function version(Request $request): ?string
  {
    return parent::version($request);
  }

  /**
   * Defines the props that are shared by default.
   *
   * @see https://inertiajs.com/shared-data
   * @param  \Illuminate\Http\Request  $request
   * @return array
   */
  public function share(Request $request): array
  {
    $parentData = method_exists(parent::class, 'share') ? parent::share($request) : [];
    $user = Auth::user();
    $userData = $user ? (new UserResource($user)) : [];
    $flashData = [
      'message' => session('message'),
      'status' => session('status'),
    ];

    return array_merge($parentData, [
      'user' => $userData,
      'flash' => $flashData,
    ]);
  }
}
