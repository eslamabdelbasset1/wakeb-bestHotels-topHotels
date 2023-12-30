<?php

namespace App\Services;

use App\Contracts\BestHotelsInterface;
use GuzzleHttp\Client;

class BestHotelsService implements BestHotelsInterface
{
    protected $apiEndpoint = 'http://apigeteway.test/api/';
    public function getHotels() : array {
//        $response = Http::get($this->apiEndpoint . 'hotels');
        $client = new Client();
        $response = $client->get($this->apiEndpoint . 'best-hotels');
        $data = json_decode($response->getBody()->getContents(), true);
        return $this->formatResponse($data);
    }




    public function formatResponse($data): array
    {
        $formattedData = [];
        foreach ($data['data']  as $hotel) {
            $formattedData[] = [
                'provider' => $hotel['Provider'],
                'hotelName' => $hotel['Hotel Name'],
                'hotelFare' => round($hotel['Hotel Fare'], 2),
                'rate' => $hotel['Rate'],
                'roomAmenities' => explode(',', $hotel['Room Amenities']),
            ];
        }
        return $formattedData;
    }
}
