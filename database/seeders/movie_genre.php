<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

$mutiple = [
    'Hành Động', 'Hài Kịch', 'Kinh Dị', 'Viễn Tưởng',
    'Giả Tưởng', 'Chiến Tranh', 'Trinh Thám',
    'Tình Cảm', 'Lãng Mạn', 'Ca Nhạc', 'Hoạt Hình',
    'Trẻ Em', 'Gia Đình', 'Phiêu Lưu', 'Lịch Sử',
    'Thể Thao', 'Tài Liệu','Tâm Lý'
];
for ($i = 0; $i < count($mutiple); $i++) {
    DB::table('movie_genres')->insert([
        'name' =>  $mutiple[$i],
        'status' => true,
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ]);
}
