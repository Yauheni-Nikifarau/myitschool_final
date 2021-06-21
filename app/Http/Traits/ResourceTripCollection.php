<?php


namespace App\Http\Traits;


use Carbon\Carbon;

trait ResourceTripCollection
{
    protected function tripsCollectionResource ($collection) {
        $resultCollection = [];
        foreach ($collection as $item) {
            $slug = str_replace(' ', '_', $item->name) . '_' . $item->id;
            $discountValue = $item->discount->value ?? 0;
            $endPrice = $item->price * ((100 - $discountValue) / 100);
            $endPrice = round($endPrice, 0);
            $dateIn = Carbon::parse($item->date_in)->format('d-m-Y');
            $dateOut = Carbon::parse($item->date_out)->format('d-m-Y');
            $dates = "{$dateIn} - {$dateOut}";
            $resultCollection[] = [
                'image' => '/storage/' . $item->image,
                'slug' => $slug,
                'name' => $item->name,
                'price' => $item->price,
                'end_price' => $endPrice,
                'dates' => $dates
            ];
        }
        return $resultCollection;
    }
}
