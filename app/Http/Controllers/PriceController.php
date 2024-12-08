<?php

namespace App\Http\Controllers;

use App\Models\Price;
use App\Models\RoomType;
use App\Models\SeatType;
use Illuminate\Http\Request;

class PriceController extends Controller
{
    private $vtt2345t17;
    private $vtt2345s17;
    private $vtt67cnt17;
    private $vtt67cns17;

    public function __construct()
    {
      
        $this->vtt2345t17 = Price::where('day', 'Monday, Tuesday, Wednesday, Thursday')
            ->where('generation', 'vtt')
            ->where('after', '08:00')->get()->first();
        $this->vtt2345s17 = Price::where('day', 'Monday, Tuesday, Wednesday, Thursday')
            ->where('generation', 'vtt')
            ->where('after', '17:00')->get()->first();
        $this->vtt67cnt17 = Price::where('day', 'Friday, Saturday, Sunday')
            ->where('generation', 'vtt')
            ->where('after', '08:00')->get()->first();
        $this->vtt67cns17 = Price::where('day', 'Friday, Saturday, Sunday')
            ->where('generation', 'vtt')
            ->where('after', '17:00')->get()->first();
    }

    public function price()
    {
        $roomTypes = RoomType::where('name', '!=', '2D')->get();
        $seatType = SeatType::where('name', '!=', 'standard')->get();

        return view('admin.prices.list', [
            'roomTypes' => $roomTypes,
            'seatTypes' => $seatType,
            'vtt2345t17' => $this->vtt2345t17->price,
            'vtt2345s17' => $this->vtt2345s17->price,
            'vtt67cnt17' => $this->vtt67cnt17->price,
            'vtt67cns17' => $this->vtt67cns17->price,
        ]);
    }

    public function edit(Request $request)
    {
        $this->vtt2345t17->price = $request->vtt2345t17;
        $this->vtt2345t17->save();

        $this->vtt2345s17->price = $request->vtt2345s17;
        $this->vtt2345s17->save();

        $this->vtt67cnt17->price = $request->vtt67cnt17;
        $this->vtt67cnt17->save();

        $this->vtt67cns17->price = $request->vtt67cns17;
        $this->vtt67cns17->save();

        $roomTypes = RoomType::all();

        foreach ($roomTypes as $roomType) {
            $rt = RoomType::find($roomType->id);
            $rt->surcharge = $request[$roomType->name];
            $rt->save();
            unset($rt);
        }

        $seatTypes = SeatType::all();

        foreach ($seatTypes as $seatType) {
            $st = SeatType::find($seatType->id);
            $st->surcharge = $request[$seatType->name];
            $st->save();
            unset($st);
        }

        return redirect('admin/prices')->with('success', 'Cập nhật giá vé thành công!');
    }
}
