<?php

use App\Models\Room;
use App\Models\Seat;
use Illuminate\Support\Facades\DB;

//TODO: theater
DB::table('theaters')->insert([
    [
        'name' => 'Rạp Cao Lỗ',
        'address' => '180 Cao Lỗ, Phường 4, Quận 8',
        'city' => 'Hồ Chí Minh',
        'location' => 'https://goo.gl/maps/byH5EsfDuzKR1fYu6',
        'status' => true,
    ], [
        'name' => 'Rạp Hồ Gươm ',
        'address' => '180 Lỗ Cao, Phường 5, Quận 9',
        'city' => 'Hà Nội',
        'location' => 'https://goo.gl/maps/byH5EsfDuzKR1fYu6',
        'status' => true,
    ], [
        'name' => 'Rạp VinCom Đà Nẵng',
        'address' => '180 Cỗ Lao, Phường 6, Quận 10',
        'city' => 'Đà Nẵng',
        'location' => 'https://goo.gl/maps/byH5EsfDuzKR1fYu6',
        'status' => true
    ]
]);


//TODO: room_types
DB::table('roomtypes')->insert([
    [
        'name' => '2D',
        'surcharge' => 0,
    ], [
        'name' => '3D',
        'surcharge' => 40000,
    ], [
        'name' => '4D',
        'surcharge' => 60000,
    ], [
        'name' => 'IMAX',
        'surcharge' => 100000,
    ]
]);

//TODO: room
DB::table('rooms')->insert([
    [
        'name' => 'Phòng 1',
        'roomType_id' => 1,
        'theater_id' => 1,
        'status' => true,
    ], [
        'name' => 'Phòng 2',
        'roomType_id' => 1,
        'theater_id' => 1,
        'status' => true,
    ], [
        'name' => 'Phòng 1',
        'roomType_id' => 1,
        'theater_id' => 2,
        'status' => true,
    ], [
        'name' => 'Phòng 2',
        'roomType_id' => 1,
        'theater_id' => 2,
        'status' => true,
    ], [
        'name' => 'Phòng 3',
        'roomType_id' => 1,
        'theater_id' => 2,
        'status' => true,
    ], [
        'name' => 'Phòng 1',
        'roomType_id' => 1,
        'theater_id' => 3,
        'status' => true,
    ], [
        'name' => 'Phòng 2',
        'roomType_id' => 1,
        'theater_id' => 3,
        'status' => true,
    ], [
        'name' => 'Phòng 3',
        'roomType_id' => 1,
        'theater_id' => 3,
        'status' => true,
    ], [
        'name' => 'Phòng 4',
        'roomType_id' => 1,
        'theater_id' => 3,
        'status' => true,
    ], [
        'name' => 'Phòng 5',
        'roomType_id' => 1,
        'theater_id' => 3,
        'status' => true,
    ], [
        'name' => 'Phòng 6',
        'roomType_id' => 1,
        'theater_id' => 3,
        'status' => true,
    ]
]);

//TODO: seat_types
DB::table('seattypes')->insert([
    [
        'name' => 'standard',
        'surcharge' => 0,
        'color' => '#FFF0C7',
    ],
    [
        'name' => 'vip',
        'surcharge' => 20000,
        'color' => '#FFC8CB',
    ],
    [
        'name' => 'couple',
        'surcharge' => 30000,
        'color' => '#FF62B0',
    ]
]);
function seat_type()
{
    $room = Room::find(1);
    for ($i = 65; $i <= (65 + 8); $i++) {
        for ($j = 1; $j <= 18; $j++) {
            $seat = new Seat([
                'row' => chr($i),
                'col' => $j,
                'room_id' => $room->id,
            ]);
            if ($j == 2) {
                $seat->me = 2;
            }
            if (19 - 2 == $j) {
                $seat->ms = 2;
            }
            if ($i <= 68 && $room->roomType_id == 1) {
                $seat->seatType_id = 1;
            } else {
                $seat->seatType_id = 2;
            }
            $seat->save();
        }
    }
}

function seat_type2()
{
    $room = Room::find(2);
    for ($i = 65; $i <= (65 + 8); $i++) {
        for ($j = 1; $j <= 18; $j++) {
            $seat = new Seat([
                'row' => chr($i),
                'col' => $j,
                'room_id' => $room->id,
            ]);
            if ($j == 4) {
                $seat->me = 2;
            }
            if (19 - 4 == $j) {
                $seat->ms = 2;
            }
            if ($i <= 68 && $room->roomType_id == 1) {
                $seat->seatType_id = 1;
            } else {
                $seat->seatType_id = 2;
            }
            $seat->save();
        }
    }
}

function seat_type3()
{
    $room = Room::find(3);
    for ($i = 65; $i <= (65 + 10); $i++) {
        for ($j = 1; $j <= 20; $j++) {
            $seat = new Seat([
                'row' => chr($i),
                'col' => $j,
                'room_id' => $room->id,
            ]);
            if ($j == 10) {
                $seat->me = 1;
            }

            if ($i <= 68 && $room->roomType_id == 1) {
                $seat->seatType_id = 1;
            } else {
                $seat->seatType_id = 2;
            }
            $seat->save();
        }
    }
}
function gold()
{
    $room = Room::find(4);
    for ($i = 65; $i <= (65 + 3); $i++) {
        for ($j = 1; $j <= 8; $j++) {
            $seat = new Seat([
                'row' => chr($i),
                'col' => $j,
                'room_id' => $room->id,
            ]);
            if ($j == 2 || $j == 4 || $j == 6) {
                $seat->me = 1;
            }

            if ($i <= 68 && $room->roomType_id == 1) {
                $seat->seatType_id = 2;
            } else {
                $seat->seatType_id = 2;
            }
            $seat->save();
        }
    }
}
function imax()
{
    $room = Room::find(5);
    for ($i = 65; $i <= (65 + 15); $i++) {
        for ($j = 1; $j <= 38; $j++) {
            //Limit seat on row
            if($i == 65){
                if($j>20)
                {
                    continue;
                }
            }//row A 20 seat
            if($i == 66){
                if($j>24)
                {
                    continue;
                }
            }//row B 24 seat
            if($i == 67){
                if($j>28)
                {
                    continue;
                }
            }//row C 28 seat
            if($i == 68){
                if($j>32)
                {
                    continue;
                }
            }//row D 32 seat
            if($i == 69){
                if($j>34)
                {
                    continue;
                }
            }//row E 34 seat
            if($i == 70){
                if($j>34)
                {
                    continue;
                }
            }//row F 34 seat
            if($i == 80){
                if($j>36)
                {
                    continue;
                }
            }//row F 34 seat
            //create Seat
            $seat = new Seat([
                'row' => chr($i),
                'col' => $j,
                'room_id' => $room->id,
            ]);

            //set spacing for seat
            //A
            if($i == 65)
            {
                if ($j == 2 || $j==18) {
                    $seat->me = 1;
                }
            }
            //B
            if($i == 66)
            {
                if ($j == 4 || $j==20) {
                    $seat->me = 1;
                }
            }
            //C
            if($i == 67)
            {
                if ($j == 6 || $j==22) {
                    $seat->me = 1;
                }
            }
            //D
            if($i == 68)
            {
                if ($j == 8 || $j==24) {
                    $seat->me = 1;
                }
            }
            //E
            if($i == 69)
            {
                if ($j == 9 || $j==25) {
                    $seat->me = 1;
                }
            }
            //F
            if($i == 70)
            {
                if ($j == 9 || $j==25) {
                    $seat->me = 1;

                }
                $seat->mb = 1;
            }
            //G
            if($i == 71)
            {
                if ($j == 11 || $j==27) {
                    $seat->me = 1;
                }
            }
            //H
            if($i == 72)
            {
                if ($j == 11 || $j==27) {
                    $seat->me = 1;
                }
            }
            //I
            if($i == 73)
            {
                if ($j == 11 || $j==27) {
                    $seat->me = 1;
                }
            }
            //J
            if($i == 74)
            {
                if ($j == 11 || $j==27) {
                    $seat->me = 1;
                }
            }
            //K
            if($i == 75)
            {
                if ($j == 11 || $j==27) {
                    $seat->me = 1;
                }
            }
            //L
            if($i == 76)
            {
                if ($j == 11 || $j==27) {
                    $seat->me = 1;
                }
            }
            //M
            if($i == 77)
            {
                if ($j == 11 || $j==27) {
                    $seat->me = 1;
                }
            }
            //N
            if($i == 78)
            {
                if ($j == 11 || $j==27) {
                    $seat->me = 1;
                }
            }
            //O
            if($i == 79)
            {
                if ($j == 11 || $j==27) {
                    $seat->me = 1;
                }
            }
            if ($i <= 68 && $room->roomType_id == 1) {
                $seat->seatType_id = 2;
            } else {
                $seat->seatType_id = 2;
            }
            $seat->save();
        }
    }
}
seat_type();
seat_type2();
seat_type3();
gold();
imax();
