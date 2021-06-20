<?php

namespace App\Http\Controllers;

use App\Models\Hotel;

class HotelsController extends Controller
{
    public function index () {
        $hotels = Hotel::select(['id', 'name', 'image'])->paginate(9);
        $hotelsNumber = Hotel::count();
        $numberOfPages = ceil($hotelsNumber / 9);
        return view('hotels', [
            'hotelsList' => $this->hotelsResourceCollection($hotels),
            'pages' => $numberOfPages
        ]);
    }

    private function hotelsResourceCollection ($hotelsCollection) {
        $resultCollection = [];
        foreach ($hotelsCollection as $hotel) {
            $slugDetails = str_replace(' ', '_', $hotel->name) . '_' . $hotel->id;
            $slugTrips = '/trips?hotel=' . $slugDetails;
            $image = '/storage/' . $hotel->image;
            $resultCollection[] = [
                'image' => $image,
                'slugDetails' => $slugDetails,
                'slugTrips' => $slugTrips,
                'name' => $hotel->name,
            ];
        }
        return $resultCollection;
    }
}
