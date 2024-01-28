<?php

if (!function_exists('getRequestIp')) {
  function getRequestIp()
  {
    $ip = request()->header('CF-Connecting-IP');

    if (!$ip) {
      $ip = request()->ip();
    }

    return $ip;
  }

}
