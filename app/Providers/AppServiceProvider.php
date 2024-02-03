<?php

namespace App\Providers;

use App\Services\Geo\GeoService;
use Illuminate\Support\ServiceProvider;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;

class AppServiceProvider extends ServiceProvider
{
  /**
   * Register any application services.
   */
  public function register(): void
  {
    $this->app->bind(GeoService::class, function ($app) {
      $geoIpApiUrl = config('services.ip_info.url');
      $token = config('services.ip_info.token');

      return new GeoService($token, $geoIpApiUrl);
    });
  }

  /**
   * Bootstrap any application services.
   */
  public function boot(): void
  {
    VerifyEmail::toMailUsing(function (object $notifiable, string $url) {
      return (new MailMessage)
        ->subject('Подтверждение адреса электронной почты')
        ->line('Нажмите кнопку ниже, чтобы подтвердить ваш адрес электронной почты.')
        ->action('Подтвердить адрес электронной почты', $url);
    });
  }
}
