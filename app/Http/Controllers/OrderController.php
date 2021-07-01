<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Trip;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\Settings;
use Illuminate\Support\Facades\Response;

class OrderController extends Controller
{
    public function index () {
        $user_id = auth()->id();
        $ordersList = Order::with([

            'trip' => function (BelongsTo $query) {
                $query->with(['hotel']);
            }

        ])->where('user_id', $user_id)->get();
        return view('orders', [
            'ordersList' => $this->ordersListResource($ordersList)
            ]);
    }

    public function show ($id) {
        $order = Order::with([

            'trip' => function (BelongsTo $query) {
                $query->with(['hotel']);
            },

        ])->find($id);
        if (!$order) {
            return redirect('/404');
        }
        return view('order', [
            'order' => $this->orderResource($order)
        ]);
    }

    public function report ($id) {

        $order = Order::with([
            'trip' => function (BelongsTo $query) {
                $query->with(['hotel']);
            },
        ])->find($id);


        $fileFullPath = $order->createReport();

        $extension = request()->input('extension', 'docx');

        if ($extension == 'pdf') {
            $phpWord = IOFactory::load($fileFullPath, 'Word2007');
            $domPdfPath = base_path( 'vendor/dompdf/dompdf');
            Settings::setPdfRendererPath($domPdfPath);
            Settings::setPdfRendererName('DomPDF');
            $fileFullPath = str_replace('.docx', '.pdf', $fileFullPath);
            $phpWord->save($fileFullPath, 'PDF');
        }

        return Response::download($fileFullPath);
    }

    public function store ($slug) {
        preg_match('/[0-9]+$/', $slug, $matches);

        $trip_id = $matches[0];
        $user_id = auth()->user()->id ?? null;

        $trip = Trip::find($trip_id);

        $reservation_expires = Carbon::now()->addDays(3);

        try {

            DB::beginTransaction();

            $order = new Order();

            $order->trip_id             = $trip_id;
            $order->user_id             = $user_id;
            $order->paid                = false;
            $order->reservation_expires = $reservation_expires;
            $order->price               = $trip->price * (100 - ($trip->discount->value ?? 0)) / 100;

            $trip->update(['reservation' => true]);
            $order->save();

            DB::commit();

            $orderId = $order->id;

            return redirect('/orders/' . $orderId);

        } catch (\Exception $e) {

            DB::rollBack();

            return redirect()->back()->withErrors('Something went wrong. Please, try again');
        }
    }

    private function ordersListResource ($list) {
        $resultCollection = [];
        foreach ($list as $order) {
            $resultCollection[] = [
                'id' => $order->id,
                'created_at' => Carbon::parse($order->created_at)->format('h:i d-m-Y'),
                'price' => $order->price,
                'paid' => $order->paid ? 'yes' : 'no',
                'country' => $order->trip->hotel->country,
                'hotel' => $order->trip->hotel->name
            ];
        }
        return $resultCollection;
    }

    private function orderResource ($order) {
        return [
            'id' => $order->id,
            'paid' => $order->paid,
            'reservation_expires' => Carbon::parse($order->reservation_expires)->format('h:m d-m-Y'),
            'price' => $order->price,
            'image' => $order->trip->image
        ];
    }
}
