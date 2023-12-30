<?php

namespace App\Http\Controllers;

use App\Http\Resources\HotelCollection;
use App\Services\OurHotelsService;
use Illuminate\Http\Request;

class OurHotelsController extends Controller
{
    protected $ourHotelsService;

    public function __construct(OurHotelsService $ourHotelsService) {
        $this->ourHotelsService = $ourHotelsService;
    }

    public function getAggregatedHotels() {
        try {
            // You might validate request parameters here
            $aggregatedHotels = $this->ourHotelsService->getAvailableHotels();

//            return response()->json(['data' => $aggregatedHotels], 200);
            return HotelCollection::collection($aggregatedHotels);

        } catch (\Exception $e) {
//            // Handle exceptions and errors gracefully
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
