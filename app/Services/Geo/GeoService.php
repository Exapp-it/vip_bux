<?php
namespace App\Services\Geo;

use GuzzleHttp\Client;
use League\ISO3166\ISO3166;
use Illuminate\Support\Facades\Log;

class GeoService
{
  private $token;
  private $geoIpApiUrl;

  public function __construct($token, $geoIpApiUrl)
  {
    $this->token = $token;
    $this->geoIpApiUrl = $geoIpApiUrl;
  }

  public function getGeoData(string $ip)
  {
    $url = "{$this->geoIpApiUrl}{$ip}?token={$this->token}";

    $client = new Client();

    try {
      $response = $client->get($url);
      $data = json_decode($response->getBody());

      return $this->mapGeoData($data);
    } catch (\Exception $e) {
      Log::error('Error getting geo data: ' . $e->getMessage());
      return $this->mapGeoData((object) []);
    }
  }

  private function mapGeoData($data)
  {
    return (object) [
      'country' => $this->getCountryNameByCode($data->country ?? null),
      'city' => $data->city ?? 'Unknown',
      'region' => $data->region ?? 'Unknown',
      'code' => $data->country ?? 'Unknown',
      'timezone' => $data->timezone ?? 'Unknown',
    ];
  }

  private function getCountryNameByCode(?string $countryCode = null): string
  {
    $iso = new ISO3166();

    return $countryCode ? ($iso->alpha2($countryCode)['name'] ?? 'Unknown') : 'Unknown';
  }

}
