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

    public function show ($slug) {
        preg_match('/_[0-9]+$/', $slug, $matches);
        $hotel_id = substr(end($matches), 1);
        $hotel = Hotel::find($hotel_id);
        return view('hotel', [
            'hotel' => $this->resourceHotel($hotel)
        ]);
    }

    private function resourceHotel ($hotel) {
        $slug = str_replace(' ', '_', $hotel->name);
        $weather = $hotel->weather();
        $image = '/storage/' . $hotel->image;
        return [
            'name' => $hotel->name,
            'description' => $hotel->description,
            'slug' => $slug,
            'weather' => $weather,
            'image' => $image
        ];
    }

    private function hotelsResourceCollection ($hotelsCollection) {
        $resultCollection = [];
        foreach ($hotelsCollection as $hotel) {
            $slugDetails = '/hotels/' . str_replace(' ', '_', $hotel->name) . '_' . $hotel->id;
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
