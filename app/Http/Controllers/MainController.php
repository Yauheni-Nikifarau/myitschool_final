<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use App\Models\Tag;
use App\Models\Discount;
use App\Http\Traits\ResourceTripCollection;

class MainController extends Controller
{
    use resourceTripCollection;

    public function index()
    {
        $latestTrips = Trip::with(['discount'])->select(['id', 'name', 'price', 'image', 'date_in', 'date_out'])->where('reservation', false)->orderBy('created_at', 'desc')->limit(3)->get();
        $tag = Tag::with(['trips'])->where('tag_name', 'hot tour')->first();
        $tripsOfTag = $tag->trips ?? [];
        $hotListArrayOfId = [];
        foreach ($tripsOfTag as $trip) {
            $hotListArrayOfId[] = $trip->id;
        }
        $hotTourList = Trip::with(['discount'])->select(['id', 'name', 'price', 'image', 'date_in', 'date_out'])->where('reservation', false)->whereIn('id', $hotListArrayOfId)->orderBy('created_at', 'desc')->limit(3)->get();
        $discount = Discount::with(['trips'])->where('value', 35)->first();
        $tripsOfDiscount = $discount->trips ?? [];
        $off35ArrayOfId = [];
        foreach ($tripsOfDiscount as $trip) {
            $off35ArrayOfId[] = $trip->id;
        }
        $offList = Trip::with(['discount'])->select(['id', 'name', 'price', 'image', 'date_in', 'date_out'])->where('reservation', false)->whereIn('id', $hotListArrayOfId)->orderBy('created_at', 'desc')->limit(3)->get();
        return view('main', [
            'latestList' => $this->tripsCollectionResource($latestTrips),
            'hotList' => $this->tripsCollectionResource($hotTourList),
            'offList' => $this->tripsCollectionResource($offList)
        ]);
    }
}
