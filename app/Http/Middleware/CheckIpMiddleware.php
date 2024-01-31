<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckIpMiddleware
{
  /**
   * Handle an incoming request.
   *
   * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
   */
  public function handle(Request $request, Closure $next): Response
  {
    if (in_array(getRequestIp(), $this->whiteIpList())) {
      return $next($request);
    }

    abort(503);
  }

  private function whiteIpList()
  {
    return [
      '127.0.0.1',
    ];
  }
}
