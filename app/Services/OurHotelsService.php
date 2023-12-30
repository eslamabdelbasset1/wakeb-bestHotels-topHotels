<?php

namespace App\Services;

use App\Contracts\BestHotelsInterface;
use App\Contracts\TopHotelsInterface;

class OurHotelsService
{
    public function __construct(public BestHotelsInterface $bestHotelsService, public TopHotelsInterface $topHotelsService) {}

    public function getAvailableHotels(): array
    {
        try {
            $bestHotels = $this->bestHotelsService->getHotels();
            $topHotels = $this->topHotelsService->getHotels();

            // Merge, sort, and format the data from both services according to requirements
            $mergedHotels = array_merge($bestHotels, $topHotels);

            // Sort the merged hotels by 'rate' or any other criteria
            usort($mergedHotels, function ($best, $top) {
                return $best['rate'] <=> $top['rate'];
            });

            return $mergedHotels;
        } catch (\Exception $e) {
            // Log or handle the exception accordingly
            throw new \Exception('Failed to fetch available hotels: ' . $e->getMessage());
        }
    }
}
