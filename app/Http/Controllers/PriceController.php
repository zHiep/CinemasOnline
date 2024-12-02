<?php

namespace App\Http\Controllers;

use App\Models\Price;
use App\Models\RoomType;
use App\Models\SeatType;
use Illuminate\Http\Request;

class PriceController extends Controller
{
    private $hssv2345t17;
    private $hssv2345s17;
    private $nl2345t17;
    private $nl2345s17;
    private $nctte2345t17;
    private $nctte2345s17;
    private $vtt2345t17;
    private $vtt2345s17;
    private $hssv67cnt17;
    private $hssv67cns17;
    private $nl67cnt17;
    private $nl67cns17;
    private $nctte67cnt17;
    private $nctte67cns17;
    private $vtt67cnt17;
    private $vtt67cns17;

    public function __construct()
    {
        $this->hssv2345t17 = Price::where('day', 'Monday, Tuesday, Wednesday, Thursday')
            ->where('generation', 'hssv')
            ->where('after', '08:00')->get()->first();
        $this->hssv2345s17 = Price::where('day', 'Monday, Tuesday, Wednesday, Thursday')
            ->where('generation', 'hssv')
            ->where('after', '17:00')->get()->first();

        $this->nl2345t17 = Price::where('day', 'Monday, Tuesday, Wednesday, Thursday')
            ->where('generation', 'nl')
            ->where('after', '08:00')->get()->first();
        $this->nl2345s17 = Price::where('day', 'Monday, Tuesday, Wednesday, Thursday')
            ->where('generation', 'nl')
            ->where('after', '17:00')->get()->first();

        $this->nctte2345t17 = Price::where('day', 'Monday, Tuesday, Wednesday, Thursday')
            ->where('generation', 'nctte')
            ->where('after', '08:00')->get()->first();
        $this->nctte2345s17 = Price::where('day', 'Monday, Tuesday, Wednesday, Thursday')
            ->where('generation', 'nctte')
            ->where('after', '17:00')->get()->first();

        $this->vtt2345t17 = Price::where('day', 'Monday, Tuesday, Wednesday, Thursday')
            ->where('generation', 'vtt')
            ->where('after', '08:00')->get()->first();
        $this->vtt2345s17 = Price::where('day', 'Monday, Tuesday, Wednesday, Thursday')
            ->where('generation', 'vtt')
            ->where('after', '17:00')->get()->first();

        $this->hssv67cnt17 = Price::where('day', 'Friday, Saturday, Sunday')
            ->where('generation', 'hssv')
            ->where('after', '08:00')->get()->first();
        $this->hssv67cns17 = Price::where('day', 'Friday, Saturday, Sunday')
            ->where('generation', 'hssv')
            ->where('after', '17:00')->get()->first();

        $this->nl67cnt17 = Price::where('day', 'Friday, Saturday, Sunday')
            ->where('generation', 'nl')
            ->where('after', '08:00')->get()->first();
        $this->nl67cns17 = Price::where('day', 'Friday, Saturday, Sunday')
            ->where('generation', 'nl')
            ->where('after', '17:00')->get()->first();

        $this->nctte67cnt17 = Price::where('day', 'Friday, Saturday, Sunday')
            ->where('generation', 'nctte')
            ->where('after', '08:00')->get()->first();
        $this->nctte67cns17 = Price::where('day', 'Friday, Saturday, Sunday')
            ->where('generation', 'nctte')
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
            'hssv2345t17' => $this->hssv2345t17->price,
            'hssv2345s17' => $this->hssv2345s17->price,
            'nl2345t17' => $this->nl2345t17->price,
            'nl2345s17' => $this->nl2345s17->price,
            'nctte2345t17' => $this->nctte2345t17->price,
            'nctte2345s17' => $this->nctte2345s17->price,
            'vtt2345t17' => $this->vtt2345t17->price,
            'vtt2345s17' => $this->vtt2345s17->price,
            'hssv67cnt17' => $this->hssv67cnt17->price,
            'hssv67cns17' => $this->hssv67cns17->price,
            'nl67cnt17' => $this->nl67cnt17->price,
            'nl67cns17' => $this->nl67cns17->price,
            'nctte67cnt17' => $this->nctte67cnt17->price,
            'nctte67cns17' => $this->nctte67cns17->price,
            'vtt67cnt17' => $this->vtt67cnt17->price,
            'vtt67cns17' => $this->vtt67cns17->price,
        ]);
    }

    public function edit(Request $request)
    {
        $this->hssv2345t17->price = $request->hssv2345t17;
        $this->hssv2345t17->save();

        $this->hssv2345s17->price = $request->hssv2345s17;
        $this->hssv2345s17->save();

        $this->nl2345t17->price = $request->nl2345t17;
        $this->nl2345t17->save();

        $this->nl2345s17->price = $request->nl2345s17;
        $this->nl2345s17->save();

        $this->nctte2345t17->price = $request->nctte2345t17;
        $this->nctte2345t17->save();

        $this->nctte2345s17->price = $request->nctte2345s17;
        $this->nctte2345s17->save();

        $this->vtt2345t17->price = $request->vtt2345t17;
        $this->vtt2345t17->save();

        $this->vtt2345s17->price = $request->vtt2345s17;
        $this->vtt2345s17->save();

        $this->hssv67cnt17->price = $request->hssv67cnt17;
        $this->hssv67cnt17->save();

        $this->hssv67cns17->price = $request->hssv67cns17;
        $this->hssv67cns17->save();

        $this->nl67cnt17->price = $request->nl67cnt17;
        $this->nl67cnt17->save();

        $this->nl67cns17->price = $request->nl67cns17;
        $this->nl67cns17->save();

        $this->nctte67cnt17->price = $request->nctte67cnt17;
        $this->nctte67cnt17->save();

        $this->nctte67cns17->price = $request->nctte67cns17;
        $this->nctte67cns17->save();

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

        return redirect('admin/prices')->with('success', 'Saved!');
    }
}
