<?php

use Carbon\Carbon;

if (!function_exists('getRequestIp')) {
  function getRequestIp()
  {
    $ip = request()->header('CF-Connecting-IP');

    if (!$ip) {
      $ip = request()->ip();
    }

    return $ip;
  }


  if (!function_exists('formatDate')) {
    function formatDate($date)
    {
      Carbon::setLocale('ru');
      $parsedDate = Carbon::parse($date);
        return $parsedDate->isoFormat('DD MMM, в HH:mm');
    }
  }


}
