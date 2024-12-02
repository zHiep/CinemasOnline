<?php

use Illuminate\Support\Facades\DB;

DB::table('rating')->insert([
    [
        'name' => 'C13',
        'description' => 'PHIM ĐƯỢC PHỔ BIẾN ĐẾN NGƯỜI XEM TỪ ĐỦ 13 TUỔI TRỞ LÊN (13+)',
    ], [
        'name' => 'C16',
        'description' => 'PHIM ĐƯỢC PHỔ BIẾN ĐẾN NGƯỜI XEM TỪ ĐỦ 16 TUỔI TRỞ LÊN (16+)',
    ], [
        'name' => 'C18',
        'description' => 'PHIM ĐƯỢC PHỔ BIẾN ĐẾN NGƯỜI XEM TỪ ĐỦ 18 TUỔI TRỞ LÊN (18+)',
    ], [
        'name' => 'P',
        'description' => 'PHIM ĐƯỢC PHÉP PHỔ BIẾN ĐẾN NGƯỜI XEM Ở MỌI ĐỘ TUỔI.',
    ], [
        'name' => 'K',
        'description' => 'PHIM ĐƯỢC PHỔ BIẾN ĐẾN NGƯỜI XEM DƯỚI 13 TUỔI VÀ CÓ NGƯỜI BẢO HỘ ĐI KÈM.',
    ]
]);

DB::table('audios')->insert([[
    'name' => 'Việt'
], [
    'name' => 'Anh'
], [
    'name' => 'Trung Quốc'
], [
    'name' => 'Ấn Độ'
], [
    'name' => 'Nga'
], [
    'name' => 'Nhật'
], [
    'name' => 'Hàn Quốc'
], [
    'name' => 'Pháp'
], [
    'name' => 'Lồng tiếng'
]]);

DB::table('subtitles')->insert([
    [
        'name' => 'Việt'
    ], [
        'name' => 'Anh'
    ],
]);
