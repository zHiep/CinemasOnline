<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

DB::table('movies')->insert([
    'name' => 'FAST & FURIOUS 10',
    'image' => 'https://upload.wikimedia.org/wikipedia/vi/2/22/Fast_X_VN_poster.jpg',
    'showTime' => '141',
    'releaseDate' => '2023-05-19',
    'endDate' => '2023-06-19',
    'national' => 'United States',
    "description" => 'Trong Fast Five (2011), Dom và nhóm của anh đã tiêu diệt trùm ma túy người Brazil Hernan Reyes ở Rio De Janeiro. Điều họ không biết là con trai của Reyes, Dante đã chứng kiến tất cả và dành 12 năm qua để lên một kế hoạch “hoàn hảo” sẽ khiến gia đình Dom phải trả giá đắt. Trải qua nhiều nhiệm vụ khó khăn tưởng chừng như bất khả thi nhưng Dom Toretto và gia đình của anh ấy đều đã vượt qua. Họ đánh bại mọi kẻ thù trên hành trình hơn 20 năm qua. Nhưng giờ đây, Dante được đánh giá là kẻ nguy hiểm nhất mà họ sẽ đối mặt: một mối đe dọa đáng sợ xuất hiện từ bóng tối của quá khứ, một kẻ thù đẫm máu, với quyết tâm phá tan gia đình và phá hủy mọi thứ mà Dom yêu thương mãi mãi. Phim mới Fast & Furious 10 ra mắt tại các rạp chiếu phim từ 19.05.2023.',
    'trailer' => 'eoOaKN4qCKw',
    'rating_id' => 3,
    'status' => 1,
    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
]);
DB::table('movies')->insert([
    'name' => 'LẬT MẶT 6: TẤM VÉ ĐỊNH MỆNH',
    'image' => 'https://www.cgv.vn/media/catalog/product/cache/1/thumbnail/190x260/2e2b8cd282892c71872b9e67d2cb5039/l/m/lm6_2x3_layout.jpg',
    'showTime' => '132',
    'releaseDate' => '2023-04-26',
    'endDate' => '2023-06-26',
    'national' => 'Viet Nam',
    "description" => 'Tấm vé có mệnh giá 10.000 đồng và sở hữu những con số "định mệnh": 10, 16, 18, 20, 27, 28 - ngày sinh của hội bạn thân sáu người do Trung Dũng, Quốc Cường, Thanh Thức, Huy Khánh, Hoàng Mèo, Trần Kim Hải đảm nhận. Tuy nhiên, nhân vật do Thanh Thức thủ vai, cũng là người giữ tấm vé trúng giải độc đắc lại không may bị tai nạn và qua đời, từ đây, những người còn lại phải dùng đủ mọi cách để tìm lại tấm vé “đổi đời”. Liệu nhóm bạn có thành công và giải mã được cái chết bị ẩn người người bạn thân? Cùng chờ đón đến 28.04 để biết được câu trả lời nha! ',
    'trailer' => '2EnP2tVC00Q',
    'rating_id' => 2,
    'status' => 1,
    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
]);
DB::table('movies')->insert([
    'name' => 'CON NHÓT MÓT CHỒNG',
    'image' => 'https://www.cgv.vn/media/catalog/product/cache/1/thumbnail/190x260/2e2b8cd282892c71872b9e67d2cb5039/7/0/700x1000_2_.jpg',
    'showTime' => '112',
    'releaseDate' => '2023-04-21',
    'endDate' => '2023-06-21',
    'national' => 'Viet Nam',
    "description" => 'Lấy cảm hứng từ web drama Chuyện Xóm Tui, phiên bản điện ảnh sẽ mang một màu sắc hoàn toàn khác: hài hước hơn, gần gũi và nhiều cảm xúc hơn. Bộ phim là câu chuyện của Nhót - người phụ nữ “chưa kịp già” đã sắp bị mãn kinh, vội vàng đi tìm chồng. Nhưng sâu thẳm trong cô là khao khát muốn có một đứa con, và luôn muốn hàn gắn với người cha suốt ngày say xỉn của mình.',
    'trailer' => 'e7KHOQ-alqY',
    'rating_id' => 2,
    'status' => 1,
    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
]);
DB::table('movies')->insert([
    'name' => 'GUARDIANS OF THE GALAXY VOL.3 VỆ BINH DẢI NGÂN HÀ 3',
    'image' => 'https://www.cgv.vn/media/catalog/product/cache/1/thumbnail/190x260/2e2b8cd282892c71872b9e67d2cb5039/3/5/350x495_1.png',
    'showTime' => '149',
    'releaseDate' => '2023-05-03',
    'endDate' => '2023-07-03',
    'national' => 'United States',
    "description" => 'Vệ binh dải Ngân Hà 3 là một bộ phim điện ảnh siêu anh hùng Mỹ công chiếu vào năm 2023 dựa trên nhóm siêu anh hùng Vệ binh dải Ngân Hà của Marvel Comics, do Marvel Studios sản xuất và Walt Disney Studios Motion Pictures phát hành',
    'trailer' => 'cfbKqpbdrYg',
    'rating_id' => 1,
    'status' => 1,
    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
]);
DB::table('movies')->insert([
    'name' => 'KHANZAB TIẾNG GỌI ÂM BINH',
    'image' => 'https://www.cgv.vn/media/catalog/product/cache/1/thumbnail/240x388/c88460ec71d04fa96e628a21494d2fd3/k/z/kz_main-poster_fb.jpg',
    'showTime' => '88',
    'releaseDate' => '2023-05-26',
    'endDate' => '2023-07-26',
    'national' => 'Indonesia',
    "description" => "Chuyện phim theo chân Rahayu - cô gái từng chứng kiến cha mình bị giết hại trong vụ thảm sát Banyuwangi năm 1998. Tại đây, những thầy cúng bị nghi ngờ thực hành ma thuật đen sẽ bị người dân giả dạng ninja để sát hại. Sau sự cố này, Rahayu cùng gia đình quyết định rời khỏi Banyuwangi để chuyển đến quê hương của họ ở Jetis, Yogyakarta.",
    'trailer' => 'RSADESwWRyw',
    'rating_id' => 3,
    'status' => 1,
    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
]);
DB::table('movies')->insert([
    'name' => 'Doraemon: Nobita và vùng đất lý tưởng trên bầu trời',
    'image' => 'https://www.cgv.vn/media/catalog/product/cache/1/image/c5f0a1eff4c394a251036189ccddaacd/m/a/main_poster_-_dmmovie2023.jpg',
    'showTime' => '108',
    'releaseDate' => '2023-05-26',
    'endDate' => '2023-07-26',
    'national' => 'Japan',
    "description" => "Doraemon: Nobita’s Sky Utopia 2023 kể về chuyến phiêu lưu của Doraemon, Nobita và những người bạn thân tới Paradapia - một hòn đảo hình trăng lưỡi liềm lơ lửng trên bầu trời. Ở nơi đó, tất cả đều hoàn hảo… đến mức cậu nhóc Nobita mê ngủ ngày cũng có thể trở thành một thần đồng toán học, một siêu sao thể thao. Cả hội Doraemon cùng sử dụng một món bảo bối độc đáo chưa từng xuất hiện trước đây để đến với vương quốc tuyệt vời này. Cùng với những người bạn ở đây, đặc biệt là chàng robot mèo Sonya, nhóm Doraemon đã có chuyến hành trình tới vương quốc trên mây tuyệt vời… cho đến khi những bí mật đằng sau vùng đất lý tưởng này được hé lộ.",
    'trailer' => 'bUTfUVLP_Zk',
    'rating_id' => 1,
    'status' => 1,
    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
]);
DB::table('movies')->insert([
    'name' => 'THE CREEPING OÁN HỒN',
    'image' => 'https://cdn.galaxycine.vn/media/2023/4/13/oan-hon-du-kien-khoi-chieu-26-05-2023_1681379006801.jpg',
    'showTime' => '94',
    'releaseDate' => '2023-05-26',
    'endDate' => '2023-07-26',
    'national' => 'United States',
    "description" => "Trải nghiệm thời thơ ấu đau thương, Anna trở về căn nhà xưa để chăm sóc người bà ốm yếu. Từ đó, những điều kỳ lạ bắt đầu xảy ra và các sự kiện kỳ quái dần xuất hiện cho đến khi Anna phát hiện ra mọi việc có liên quan đến một quá khứ bi thảm đã ám lên các thành viên trong gia đình. Điều gì sẽ xảy ra với Anna khi mọi oán niệm được ẩn giấu phía sau ngôi nhà và người bà kỳ lạ? ",
    'trailer' => 'ju2evnXK3PQ',
    'rating_id' => 3,
    'status' => 1,
    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
]);
DB::table('movies')->insert([
    'name' => 'THE LITTLE MERMAID NÀNG TIÊN CÁ',
    'image' => 'https://cdn.galaxycine.vn/media/2023/5/26/300x450-tien-ca_1685071821037.jpg',
    'showTime' => '135',
    'releaseDate' => '2023-05-26',
    'endDate' => '2023-07-26',
    'national' => 'United States',
    "description" => "“Nàng Tiên Cá” là câu chuyện được yêu thích về Ariel - một nàng tiên cá trẻ xinh đẹp và mạnh mẽ với khát khao phiêu lưu. Ariel là con gái út của Vua Triton và cũng là người ngang ngạnh nhất, nàng khao khát khám phá về thế giới bên kia đại dương. Trong một lần ghé thăm đất liền, nàng đã phải lòng Hoàng tử Eric bảnh bao. Trong khi tiên cá bị cấm tiếp xúc với con người, Ariel đã làm theo trái tim mình. Nàng đã thỏa thuận với phù thủy biển Ursula hung ác để cơ hội sống cuộc sống trên đất liền. Nhưng cuối cùng việc này lại đe dọa tới mạng sống của Ariel và vương miện của cha nàng",
    'trailer' => 'RxXHUnAi45E',
    'rating_id' => 2,
    'status' => 1,
    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
]);
DB::table('moviegenres_movies')->insert([
    [
        'movie_id' => 1,
        'movieGenre_id' => 1,
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ], [
        'movie_id' => 1,
        'movieGenre_id' => 5,
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ], [
        'movie_id' => 1,
        'movieGenre_id' => 13,
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ], [
        'movie_id' => 2,
        'movieGenre_id' => 1,
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ], [
        'movie_id' => 2,
        'movieGenre_id' => 8,
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ], [
        'movie_id' => 3,
        'movieGenre_id' => 2,
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ], [
        'movie_id' => 3,
        'movieGenre_id' => 18,
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ], [
        'movie_id' => 4,
        'movieGenre_id' => 1,
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ], [
        'movie_id' => 4,
        'movieGenre_id' => 2,
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ], [
        'movie_id' => 4,
        'movieGenre_id' => 14,
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ], [
        'movie_id' => 5,
        'movieGenre_id' => 3,
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ], [
        'movie_id' => 6,
        'movieGenre_id' => 11,
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ], [
        'movie_id' => 7,
        'movieGenre_id' => 3,
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ], [
        'movie_id' => 7,
        'movieGenre_id' => 18,
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ], [
        'movie_id' => 8,
        'movieGenre_id' => 18,
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ], [
        'movie_id' => 8,
        'movieGenre_id' => 5,
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ], [
        'movie_id' => 8,
        'movieGenre_id' => 10,
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ], [
        'movie_id' => 8,
        'movieGenre_id' => 14,
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ],
]);

DB::table('directors_movies')->insert([
    [
        'movie_id' => 1,
        'director_id' => 1,
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ], [
        'movie_id' => 2,
        'director_id' => 2,
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ], [
        'movie_id' => 3,
        'director_id' => 3,
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ], [
        'movie_id' => 4,
        'director_id' => 4,
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ], [
        'movie_id' => 5,
        'director_id' => 8,
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ], [
        'movie_id' => 6,
        'director_id' => 9,
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ], [
        'movie_id' => 7,
        'director_id' => 10,
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ], [
        'movie_id' => 8,
        'director_id' => 11,
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ]
]);

DB::table('casts_movies')->insert([
    [
        'movie_id' => 1,
        'cast_id' => 1,
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ], [
        'movie_id' => 1,
        'cast_id' => 10,
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ], [
        'movie_id' => 1,
        'cast_id' => 11,
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ], [
        'movie_id' => 1,
        'cast_id' => 13,
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ], [
        'movie_id' => 1,
        'cast_id' => 15,
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ], [
        'movie_id' => 1,
        'cast_id' => 16,
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ], [
        'movie_id' => 2,
        'cast_id' => 17,
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ], [
        'movie_id' => 2,
        'cast_id' => 18,
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ], [
        'movie_id' => 2,
        'cast_id' => 19,
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ], [
        'movie_id' => 2,
        'cast_id' => 20,
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ], [
        'movie_id' => 2,
        'cast_id' => 21,
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ], [
        'movie_id' => 2,
        'cast_id' => 22,
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ], [
        'movie_id' => 3,
        'cast_id' => 23,
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ], [
        'movie_id' => 3,
        'cast_id' => 24,
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ], [
        'movie_id' => 3,
        'cast_id' => 25,
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ], [
        'movie_id' => 4,
        'cast_id' => 5,
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ], [
        'movie_id' => 4,
        'cast_id' => 11,
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ], [
        'movie_id' => 4,
        'cast_id' => 6,
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ], [
        'movie_id' => 4,
        'cast_id' => 7,
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ], [
        'movie_id' => 4,
        'cast_id' => 8,
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ], [
        'movie_id' => 4,
        'cast_id' => 9,
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ], [
        'movie_id' => 5,
        'cast_id' => 28,
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ], [
        'movie_id' => 5,
        'cast_id' => 29,
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ], [
        'movie_id' => 6,
        'cast_id' => 30,
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ], [
        'movie_id' => 6,
        'cast_id' => 31,
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ], [
        'movie_id' => 7,
        'cast_id' => 32,
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ], [
        'movie_id' => 7,
        'cast_id' => 33,
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ], [
        'movie_id' => 7,
        'cast_id' => 34,
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ], [
        'movie_id' => 8,
        'cast_id' => 35,
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ], [
        'movie_id' => 8,
        'cast_id' => 36,
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ],
]);


