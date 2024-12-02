<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

DB::table('directors')->insert([
    [
        'name' => 'Louis Leterrier',
        'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/80/Louis_Leterrier.jpg/250px-Louis_Leterrier.jpg',
        'birthday' => '1973-06-17',
        'national' => 'Pháp',
        'content' => 'Louis Leterrier (sinh ngày 17 tháng 6 năm 1973) là nam đạo diễn phim người Pháp. Anh từng đạo diễn hai phần phim Transporter đầu tiên,
    Unleashed (2005), The Incredible Hulk (2008), Clash of the Titans (2010) và Now You See Me (2013).[1][2][3][4]',
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ],
    [
        'name' => 'Lý Hải',
        'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/a5/Ly_hai_1_%28cropped%29.jpg/800px-Ly_hai_1_%28cropped%29.jpg',
        'birthday' => '1968-09-28',
        'national' => 'Việt Nam',
        'content' => 'Nguyễn Văn Hải (sinh ngày 28 tháng 9 năm 1968), thường được biết đến với nghệ danh Lý Hải, là một nam ca sĩ, diễn viên, đạo diễn,
        nhà biên kịch kiêm nhà sản xuất điện ảnh người Việt Nam. Bước chân vào lĩnh vực ca hát từ năm 1993, nhưng tên tuổi của anh chỉ thật sự thành danh khi hợp tác với người quản lý Vĩnh Thuyên cho ra đời series album ca nhạc phim Trọn đời bên em vào năm 2001.
        Với thành công của loạt album này,Lý Hải đã xây dựng thành công thương hiệu cho riêng mình và trở thành một trong những nam ca sĩ ăn khách nhất thời điểm bấy giờ, đặc biệt là đối với khán giả miền Tây Nam Bộ.
        Với sở trường trình bày những ca khúc thuộc thể loại nhạc trẻ, nhạc Hoa lời Việt với giai điệu và ca từ đơn giản,Lý Hải từng được mệnh danh là "Ngôi sao ca nhạc bình dân"',
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ],
    [
        'name' => 'Vũ Ngọc Đãng',
        'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/00/V%C5%A8_NG%E1%BB%8CC_%C4%90%C3%83NG.jpg/250px-V%C5%A8_NG%E1%BB%8CC_%C4%90%C3%83NG.jpg',
        'birthday' => '1974-01-01',
        'national' => 'Việt Nam',
        'content' => 'Vũ Ngọc Đãng (sinh 1974) là nam đạo diễn, nhà biên kịch phim và nhà sản xuất phim người Việt Nam.
        Anh được biết đến qua vai trò đạo diễn các phim như: Những cô gái chân dài (2004),
        Bỗng dưng muốn khóc (2008), Đẹp từng centimet (2009) hay Hot boy nổi loạn (2011)',
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ],
    [
        'name' => 'James Gunn',
        'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/79/James_Gunn_%2828557194032%29_%28cropped%29.jpg/220px-James_Gunn_%2828557194032%29_%28cropped%29.jpg',
        'birthday' => '1966-08-05',
        'national' => 'Mỹ',
        'content' => 'James Francis Gunn Jr. (sinh ngày 5 tháng 8 năm 1966)[n 1] là một nhà làm phim và diễn viên người Mỹ.
        Anh ấy bắt đầu sự nghiệp của mình với tư cách là một nhà biên kịch vào giữa những năm 1990, bắt đầu tại Troma Entertainment với Tromeo and Juliet (1997).
        Sau đó, anh bắt đầu làm đạo diễn, bắt đầu với bộ phim kinh dị - hài Slither (2006), và chuyển sang thể loại siêu anh hùng với Super (2010), Guardians of the Galaxy (2014), Guardians of the Galaxy Vol. 2 (2017), The Suicide Squad (2021), và Guardians of the Galaxy Vol. 3 (2023).
         In 2022, Warner Bros. Discovery đã thuê Gunn trở thành đồng chủ tịch và đồng giám đốc điều hành của DC Studios.
        Ông cũng viết kịch bản và đạo diễn phim ngắn The Guardians of the Galaxy Holiday Special (2022) trên Disney+',
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ],
    [
        'name' => 'Jalmari Helander',
        'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/55/Jalmari_Helander.jpg/220px-Jalmari_Helander.jpg',
        'birthday' => '1976-07-21',
        'national' => 'Mỹ',
        'content' => 'Jalmari Helander (born 21 July 1976)[1] is a Finnish screenwriter and film director.
        He is known for the 2010 film Rare Exports: A Christmas Tale (which Cate Blanchett named as one of her favorite movies), the 2014 action-adventure Big Game starring Samuel L. Jackson,
        and the 2022 WWII action film Sisu.
        Before turning to feature films, Helander directed several short films and award-winning television commercials.[2]
        Helander is the brother-in-law of actor Jorma Tommila and the maternal uncle of Jorma"s son Onni, both of whom have acted in his films.',
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ],
    [
        'name' => 'Steven Caple Jr.',
        'image' => 'https://m.media-amazon.com/images/M/MV5BODg3YThjOGMtZTcyYS00NDA4LThhY2EtYzJkYjg2Njg5NmQzXkEyXkFqcGdeQXVyNjUwNzk3NDc@._V1_.jpg',
        'birthday' => '1988-02-16',
        'national' => 'Mỹ',
        'content' => "Steven Caple Jr. (born February 16, 1988) is an American film director, producer, and screenwriter. His credits include The Land (2016), Creed II (2018), A Different Tree, and Prentice-N-Fury's Ice Cream Adventure. In 2017, Forbes named Caple Jr. one of the '30 Under 30' in Hollywood & Entertainment.
        He also will direct Transformers: Rise of the Beasts (2023), the seventh live-action Transformers film.",
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ],
    [
        'name' => 'Patrick Wilson',
        'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/c1/Patrick_Wilson_by_Gage_Skidmore.jpg/250px-Patrick_Wilson_by_Gage_Skidmore.jpg',
        'birthday' => '1973-07-03',
        'national' => 'Virginia,Mỹ,Norfolk',
        'content' => "Patrick Joseph Wilson (sinh ngày 3 tháng 7 năm 1973) là một diễn viên và ca sĩ người Mỹ. Anh đã dành sự nghiệp đầu tiên của mình với sự tham gia của các vở nhạc kịch Broadway, bắt đầu từ năm 1995. Anh là ứng cử viên giải Tony hai lần cho vai diễn của anh trong Full Monty (2000–2001) và Oklahoma! (2002).
        Năm 2003, anh xuất hiện trong mini sê ri HBO Angels in America mà anh được đề cử cho Giải Quả cầu vàng và Giải thưởng Emmy Primetime cho diễn viên phụ xuất sắc trong phim truyền hình hoặc phim điện ảnh.[1][2][3]
        Wilson cũng xuất hiện trong các phim truyện như Phantom of the Opera (2004), Hard Candy (2005), Little Children (2006), Watchmen (2009), Insidious (2010), Quỷ quyệt 2 (2013), và vai nhà thần học Ed Warren trong bộ phim kinh dị siêu nhiên James Wan Ám ảnh kinh hoàng (2013) và The Conjuring 2 (2016), bốn phim sau đã khiến anh nổi danh là một 'scream king'.
        Trên truyền hình, anh đóng vai chính trong bộ phim truyền hình CBS A Gifted Man (2011–2012), và Lou Solverson trong mùa thứ hai của FX (kênh truyền hình) Fargo (2015), mà anh đã nhận được đề cử Giải Quả cầu vàng. Anh đã được chọn làm Orm Marius / Ocean Master trong phim phim siêu anh hùng DC Extended Universe tựa Aquaman (2018).",
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ], [
        'name' => 'Anggy Umbara',
        'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQfiU5ipjTAsk9HR2FhF0OJ8yagCy8xbng_59mfKRBC&usqp=CAE&s',
        'birthday' => '1980-10-21',
        'national' => 'Indonesia',
        'content' => "Updating",
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ], [
        'name' => 'Douyama Takumi',
        'image' => 'https://cdn-us.anidb.net/images/main/201065.jpg',
        'birthday' => '1980-10-21',
        'national' => 'Japan',
        'content' => "Updating",
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ], [
        'name' => 'Jamie Hooper',
        'image' => 'https://blazingminds.co.uk/wp-content/uploads/2022/08/WriterDirector_JamieHooper-800x586.jpg',
        'birthday' => '1980-10-21',
        'national' => 'United States',
        'content' => "Jamie's passion for filmmaking began at an early age, ever since his Dad bought a VHS-C camera and he claimed it as his own. Amazingly he's now an award winning filmmaker (who isn't?), with films that have screened at festivals around the world, from LSFF to Fantastic Fest. If Jamie isn't wielding a camera or slouched behind a computer he can usually be found in a kitchen eating peanut butter on toast.",
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ], [
        'name' => 'Rob Marshall',
        'image' => 'https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcRdTWaLJZdipsbn4Y9Y-G78-HrwjSqrvvzEuhW5-0u00YHDKtTo',
        'birthday' => '1960-10-17',
        'national' => 'United States',
        'content' => "Robert Doyle Marshall Jr., thường được biết đến với nghệ danh Rob Marshall, là một nam đạo diễn, biên đạo múa kiêm nhà sản xuất điện ảnh người Mỹ.",
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ],
]);
