<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Trip;

class TripsController extends Controller
{
    public function show ($slug) {
        preg_match('/_[0-9]+$/', $slug, $matches);
        $trip_id = substr(end($matches), 1);
        $trip = Trip::with(['hotel', 'discount', 'tags'])->find($trip_id);
        return view('trip', [
            'trip' => $this->resourceTrip($trip)
        ]);
    }

    private function resourceTrip ($trip) {
        $hotelSlug = str_replace(' ', '_', $trip->hotel->name) . '_' . $trip->hotel->id;
        $price = round($trip->price, 0);
        $discountValue = $trip->discount->value ?? 0;
        $endPrice = $trip->price * ((100 - $discountValue) / 100);
        $endPrice = round($endPrice, 0);
        $dateIn = Carbon::parse($trip->date_in)->format('d-m-Y');
        $dateOut = Carbon::parse($trip->date_out)->format('d-m-Y');
        $dates = "{$dateIn} - {$dateOut}";
        $image = '/storage/' . $trip->image;
        $tripSlug = str_replace(' ', '_', $trip->name) . '_' . $trip->id;
        return [
            'name' => $trip->name,
            'hotelSlug' => $hotelSlug,
            'price' => $price,
            'discount' => $discountValue,
            'endPrice' => $endPrice,
            'dates' => $dates,
            'image' => $image,
            'tripSlug' => $tripSlug
        ];
    }
}
