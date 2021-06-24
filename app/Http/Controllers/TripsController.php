<?php

namespace App\Http\Controllers;

use App\Http\Traits\ResourceTripCollection;
use App\Models\Discount;
use App\Models\Hotel;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Trip;

class TripsController extends Controller
{
    use resourceTripCollection;

    public function index (Request $request) {
        list($trips, $tripsNumber) = $this->getFilteredTrips($request);
        $queries = $request->query();
        $queries['hotel'] = $queries['hotel'] ?? null;
        $queries['tag'] = $queries['tag'] ?? null;
        $queries['discount'] = $queries['discount'] ?? null;
        $queries['min_price'] = $queries['min_price'] ?? null;
        $queries['max_price'] = $queries['max_price'] ?? null;
        $queries['people'] = $queries['people'] ?? null;
        $queries['meal'] = $queries['meal'] ?? null;
        $queries['min_date_in'] = $queries['min_date_in'] ?? null;
        $queries['max_date_in'] = $queries['max_date_in'] ?? null;
        $queries['min_date_out'] = $queries['min_date_out'] ?? null;
        $queries['max_date_out'] = $queries['max_date_out'] ?? null;
        $queryString = $request->getQueryString();
        $queryString = preg_replace('/&?page=\d+/', '', $queryString);
        $tags = Tag::select(['tag_name'])->get();
        $discounts = Discount::select(['value'])->get();
        $numberOfPages = ceil($tripsNumber / 9);
        $currentPage = request()->input('page', 1);
        if ($numberOfPages > 5) {
            $startPage = $currentPage <= 3 ? 1 : $currentPage - 2;
            $endPage = $currentPage <= 3 ? 5 : $currentPage + 2;
            $endPage = $endPage > $numberOfPages ? $numberOfPages : $endPage;
        } else {
            $startPage = 1;
            $endPage = $numberOfPages;
        }

        return view('trips', [
            'tripList' => $this->tripsCollectionResource($trips),
            'startPage' => $startPage,
            'endPage' => $endPage,
            'queryString' => $queryString,
            'tags' => $tags,
            'discounts' => $discounts,
            'queries' => $queries
        ]);
    }

    public function show ($slug) {
        preg_match('/_[0-9]+$/', $slug, $matches);
        $trip_id = substr(end($matches), 1);
        $trip = Trip::with(['hotel', 'discount', 'tags'])->find($trip_id);
        return view('trip', [
            'trip' => $this->resourceTrip($trip)
        ]);
    }

    private function resourceTrip ($trip) {
        $hotelSlug = '/hotels/' . str_replace(' ', '_', $trip->hotel->name) . '_' . $trip->hotel->id;
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

    private function getFilteredTrips (Request $request) {
        $trips = Trip::with(['hotel', 'discount', 'tags']);
        $trips = $trips->leftJoin('discounts', 'trips.discount_id', '=', 'discounts.id');
        $trips = $trips->where('reservation', 0);
        $trips = $trips->select(['trips.id', 'trips.name', 'trips.price', 'trips.image', 'trips.date_in', 'trips.date_out']);

        if ($request->exists('people') && $request->input('people') != '') {
            $trips = $trips->where('quantity_of_people', $request->input('people'));
        }

        if ($request->exists('meal') && $request->input('meal') != '') {
            $trips = $trips->where('meal_option', $request->input('meal'));
        }

        if ($request->exists('min_date_in') && $request->input('min_date_in') != '') {
            $min_date_in = Carbon::parse($request->input('min_date_in'));
            $trips = $trips->where('date_in', '>=', $min_date_in);
        }

        if ($request->exists('max_date_in') && $request->input('max_date_in') != '') {
            $max_date_in = Carbon::parse($request->input('max_date_in'));
            $trips = $trips->where('date_in', '<=', $max_date_in);
        }

        if ($request->exists('min_date_out') && $request->input('min_date_out') != '') {
            $min_date_out = Carbon::parse($request->input('min_date_out'));
            $trips = $trips->where('date_out', '>=', $min_date_out);
        }

        if ($request->exists('max_date_out') && $request->input('max_date_out') != '') {
            $max_date_out = Carbon::parse($request->input('max_date_out'));
            $trips = $trips->where('date_out', '<=', $max_date_out);
        }

        if ($request->exists('hotel') && $request->input('hotel') != '') {
            $hotels = Hotel::with(['trips'])->where('name', 'like', '%' . $request->input('hotel') . '%')->get();
            $arrayOfTripsId = [];
            foreach ($hotels as $hotel) {
                $trips_array = $hotel->trips ?? [];
                foreach ($trips_array as $trip) {
                    $arrayOfTripsId[] = $trip->id;
                }
            }
            $arrayOfTripsId = array_unique($arrayOfTripsId);
            $trips->whereIn('trips.id', $arrayOfTripsId);
        }

        if ($request->exists('tag') && $request->input('tag') != '') {
            $tag_name = str_replace('_', ' ', $request->input('tag'));
            $tag = Tag::with(['trips'])->where('tag_name', $tag_name)->first();
            $trips_array = $tag->trips ?? [];
            $arrayOfTripsId = [];
            foreach ($trips_array as $trip) {
                $arrayOfTripsId[] = $trip->id;
            }
            $trips->whereIn('trips.id', $arrayOfTripsId);
        }

        if ($request->exists('discount') && $request->input('discount') != '') {
            $discount = Discount::with(['trips'])->where('value', $request->input('discount'))->first();
            $trips_array = $discount->trips ?? [];
            $arrayOfTripsId = [];
            foreach ($trips_array as $trip) {
                $arrayOfTripsId[] = $trip->id;
            }
            $trips->whereIn('trips.id', $arrayOfTripsId);
        }

        if ($request->exists('min_price') && $request->input('min_price') != '') {
            $trips = $trips->whereRaw('trips.price * (100 - value) / 100 >= ?', [$request->input('min_price')]);
        }

        if ($request->exists('max_price') && $request->input('max_price') != '') {
            $trips = $trips->whereRaw('trips.price * (100 - value) / 100 <= ?', [$request->input('max_price')]);
        }

        if ($request->exists('order') && $request->input('order') != '') {
            $direction = $request->input('direction', 'asc');
            $trips->orderBy('trips.' . $request->input('order'), $direction);
        }

        if ($request->exists('limit') && $request->input('limit') != '') {
            $trips->limit($request->input('limit'));
            $count = $trips->count();
            $trips = $trips->paginate(9);
            return [$trips, $count];
        }

        $count = $trips->count();

        $trips = $trips->paginate(9);

        return [$trips, $count];
    }
}
