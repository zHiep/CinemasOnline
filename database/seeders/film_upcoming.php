<?php

use App\Models\Cast;
use App\Models\Director;
use App\Models\Movie;
use Carbon\Carbon;

film1();
film2();
function film1()
{
    $movie = new Movie([
        'name' => 'NGƯỜI NHỆN: DU HÀNH VŨ TRỤ NHỆN',
        'image' => 'https://www.cgv.vn/media/catalog/product/cache/1/image/c5f0a1eff4c394a251036189ccddaacd/r/s/rsz_nguoi-nhen-2023.jpg',
        'showTime' => '140',
        'releaseDate' => '2023-06-01',
        'endDate' => '2023-06-30',
        'national' => 'United States',
        'description' => 'Vô số Spider-Man từ khắp các vũ trụ đang đối đầu nhau?!',
        'trailer' => 'SUz8Aw28vrc',
        'rating_id' => 5,
        'status' => 1,
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ]);

    $movie->save();

    $movie->movieGenres()->attach([1, 4, 14]);

    $director1 = new Director([
        'name' => 'Joaquim Dos Santos',
        'image' => 'https://upload.wikimedia.org/wikipedia/commons/3/3d/Joaquim_Dos_Santos_by_Gage_Skidmore.jpg',
        'birthday' => '1977-07-22',
        'national' => 'American, Portuguese',
        'content' => "Joaquim Dos Santos là một họa sĩ kịch bản, đạo diễn, nhà sản xuất, nhà văn và nhà thiết kế người Mỹ gốc Bồ Đào Nha . Anh ấy được biết đến nhiều nhất với công việc đạo diễn trên phim truyền hình Justice League Unlimited , Avatar: The Last Airbender , GI Joe: Resolute , The Legend of Korra và Voltron: Legendary Defender . Anh ấy cũng là đồng đạo diễn của các bộ phim Spider-Man: Across the Spider-Verse (2023) và Spider-Man: Beyond the Spider-Verse (2024).",
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ]);

    $director1->save();

    $director2 = new Director([
        'name' => 'Justin K. Thompson',
        'image' => 'https://www.imdb.com/name/nm1042511/mediaviewer/rm3815992320/?ref_=nm_ov_ph',
        'birthday' => null,
        'national' => null,
        'content' => "Justin K. Thompson is an illustrator, visual development artist, production designer, and director for animated works. He is one of the three directors of Spider-Man: Across the Spider-Verse.",
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ]);

    $director2->save();

    $director3 = new Director([
        'name' => 'Kemp Powers',
        'image' => 'https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcS9SQKu7Twrj-8LBLE0QtC5swFHfUZyQF3Zaq1QbhZhWI2Z3ybG',
        'birthday' => '1973-10-30',
        'national' => 'American',
        'content' => "Kemp Powers (sinh ngày 30 tháng 10 năm 1973) là một nhà làm phim và nhà viết kịch người Mỹ. Anh ấy được biết đến nhiều nhất với tác phẩm trong vở kịch One Night in Miami , bộ phim chuyển thể cùng tên năm 2020 và Soul . Kịch bản của anh ấy cho One Night in Miami... đã mang về cho anh ấy đề cử Kịch bản chuyển thể hay nhất tại Lễ trao giải Oscar lần thứ 93 vào tháng 4 năm 2021. [1] Tác phẩm của anh ấy về Soul có nghĩa là Powers trở thành người Mỹ gốc Phi đầu tiên đồng đạo diễn một bộ phim hoạt hình của Disney . [2]",
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ]);

    $director3->save();

    $movie->directors()->attach([$director1->id, $director2->id, $director3->id]);

    $cast1 = new Cast([
        'name' => 'Shameik Moore',
        'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQvyMCWiXBhBnqFlVzBAgNfhCFNFGPFHeYuBAxbpe_9LA74E5Cz',
        'birthday' => '1995-05-04',
        'national' => 'Atlanta, Georgia, Hoa Kỳ',
        'content' => "Shameik Alti Moore là một nam diễn viên, ca sĩ, vũ công và rapper người Mỹ. Anh được biết đến với vai trò lồng tiếng cho nhân vật Miles Morales / Spider-Man trong phim điện ảnh Người Nhện: Vũ trụ mới cùng các phần tiếp theo của tác phẩm.",
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ]);

    $cast1->save();

    $movie->casts()->attach([$cast1->id]);
}

function film2()
{
    $movie = new Movie([
        'name' => 'HOON PAYON: BÙA HÌNH NHÂN',
        'image' => 'https://www.cgv.vn/media/catalog/product/cache/1/image/c5f0a1eff4c394a251036189ccddaacd/p/o/poster_bhn_7-_kc_02.06.2023_1_.jpg',
        'showTime' => '101',
        'releaseDate' => '2023-06-02',
        'endDate' => '2023-06-30',
        'national' => 'Thailand',
        'description' => 'Được lấy cảm hứng từ loại bùa hình nhân hộ mệnh nổi tiếng ở Thái Lan, phim theo chân Tham trong hành trình đến một hòn đảo hẻo lánh để tìm người anh trai của mình đang tu hành ở đó. Tham phát hiện ra anh trai đã bị sát hại sau khi bị buộc tội giết người và trộm cắp. Quyết tâm ở lại hòn đảo để điều tra cũng như minh oan cho anh trai nhưng Tham lại vô tình khám phá ra nhiều cái chết bí ẩn khác tại ngôi làng bên cạnh.',
        'trailer' => 'PcCAFRdiPe4',
        'rating_id' => 2,
        'status' => 1,
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ]);

    $movie->save();

    $movie->movieGenres()->attach([3]);

    $director1 = new Director([
        'name' => 'Mike Phontharis Chotkijsadarsopon',
        'image' => 'https://www.nautiljon.com/images/people/01/12/mike_khun_138721.webp',
        'birthday' => null,
        'national' => 'Thái Lan',
        'content' => null,
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ]);
    $director1->save();

    $movie->directors()->attach([$director1->id]);

    $cast1 = new Cast([
        'name' => 'Phuwin Tangsakyuen',
        'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTGOnZ6CklHnjZWphAGuvpBzW_Ytv481AxfXbOtXYJV&usqp=CAE&s',
        'birthday' => '2003-07-05',
        'national' => 'Thái Lan',
        'content' => "Phuwin Tangsakyuen là một diễn viên người Thái Lan. Anh bắt đầu được biết đến qua vai chính Pattawee trong phim Fish Upon the Sky năm 2021, một bộ phim truyền hình được sản xuất bởi GMMTV. Năm 2022 - 2023 anh kết hợp cùng Naravit Lertratkosum cho ra mắt bộ phim Never Let Me Go.",
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ]);
    $cast1->save();

    $cast2 = new Cast([
        'name' => 'Up Poompat Iam-samang',
        'image' => 'https://upload.wikimedia.org/wikipedia/commons/c/c4/Up_Poompat.jpg',
        'birthday' => '1994-04-12',
        'national' => 'Thái Lan',
        'content' => "Poompat Iam-samang, còn gọi là Up Poompat, là diễn viên, người mẫu Thái. Anh còn được biết đến với vai Gene itrong Lovely Writer The Series.",
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ]);
    $cast2->save();

    $cast3 = new Cast([
        'name' => 'Nick Kunatip Pinpradab',
        'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR5gEVegHRNhZX3c_GmLnu8Wfevdobui6gWSBcGGn4&usqp=CAE&s',
        'birthday' => '1994-04-22',
        'national' => 'Thái Lan',
        'content' => null,
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ]);
    $cast3->save();

    $movie->casts()->attach([$cast1->id, $cast2->id, $cast3->id]);

}

