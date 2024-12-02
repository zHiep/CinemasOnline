<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

DB::table('casts')->insert([
    [
        'name' => 'Helen Mirren',
        'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/3f/Helen_Mirren-2208.jpg/250px-Helen_Mirren-2208.jpg',
        'birthday' => '1945-07-26',
        'national' => 'Anh',
        'content' => 'Dame Helen Lydia Mirren, DBE (sinh ngày 26 tháng 7 năm 1945) là một diễn viên người Anh.
        Bà đã giành được 1 giải Oscar, 4 giải SAG, 4 giải BAFTA, 3 giải Quả cầu vàng và 4 giải Emmy trong suốt sự nghiệp của mình.',
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ],
    [
        'name' => 'Aksel Hennie',
        'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/fb/Aksel_Hennie.jpg/240px-Aksel_Hennie.jpg',
        'birthday' => '1975-10-29',
        'national' => 'Anh',
        'content' => "Hennie was admitted to the Norwegian National Academy of Theatre after applying four times.[2] He graduated in 2001, and has acted both at Teatret Vårt in Molde (2001–2002) and at Oslo Nye Teater (since 2002), where he has been in plays such as Hamlet and Kvinnen Som Gifftet Seg Med en Kalkun (The Woman Who Married a Turkey).[3]
Hennie's most notable success has been as a film actor. He made his debut starring in the feature film Jonny Vang in 2003. Although the director, Jens Lien, originally thought Hennie was too young for the role, the actor convinced him he was the right man for the film.[4] That same year, he also acted in the films Buddy and Ulvesommer. The next year, Hennie made his debut as a director and writer with the film, Uno, in which he also acted. For this role, Hennie and his co-star, Nicolai Cleve Broch, undertook six months of hard physical training in order to perform convincingly as bodybuilders.[2]",
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ],
    [
        'name' => 'Jorma Tommila',
        'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/99/Jorma_Tommila_2020_Cropped.jpg/220px-Jorma_Tommila_2020_Cropped.jpg',
        'birthday' => '1959-01-01',
        'national' => 'Finland',
        'content' => "Whilst at Helsinki Theatre Academy in 1987, Tommila was one of four founding members of God's Theater, a Finnish theater group that made experimental and radical stage art, which included full frontal nudity, setting of fire extinguishers and throwing faeces into the crowd.[4] The four were arrested and fined and given suspended prison sentences and were expelled from the college which caused protest riots from fellow students.[5]
In 1997 Tommila won the Jussi Award for Best Actor for his role in the film The Christmas Party, directed by his God Theatre’s fellow founder Jari Halonen.[6]",
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ],
    [
        'name' => 'Jack Doolan',
        'image' => 'https://flxt.tmsimg.com/assets/330739_v9_ba.jpg',
        'birthday' => '1987-07-28',
        'national' => 'Anh',
        'content' => 'Jack Doolan is an English actor. He is best known for portraying Tyler Boyce in the BBC sitcom The Green Green Grass alongside John Challis and Sue Holderness. Doolan has guest starred in other television shows such as Spooks, EastEnders, The Bill and Peep Show and a lead part in Cemetery Junction, a comedy drama film by Ricky Gervais and Stephen Merchant.',
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ],
    [
        'name' => 'Bradley Cooper',
        'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/04/Bradley_Cooper_avp_2014.jpg/200px-Bradley_Cooper_avp_2014.jpg',
        'birthday' => '1975-01-05',
        'national' => 'M',
        'content' => 'Bradley Charles Cooper (sinh ngày 5/1/1975) là một diễn viên và nhà sản xuất phim người Mỹ. Anh đã được đề cử nhiều giải thưởng danh giá, trong đó có 4 giải Emmy, 2 giải BAFTA và 2 giải Quả Cầu Vàng. Từng là một trong số các diễn viên được trả thù lao cao nhất trong 3 năm liên tiếp, anh từng xuất hiện trong danh sách Forbes Celebrity 100 hai lần, và danh sách 100 người có ảnh hưởng nhất thế giới của tạp chí Times vào năm 2015.

Anh tham gia khóa MFA ở Actors Studio, tại New York vào năm 2000. Sự nghiệp của anh bắt đầu bằng vai diễn phim truyền hình như Sex and the City vào năm 1999, 2 năm sau anh tham gia bộ phim ngắn đầu tiên của mình là Wet Hot American Summer. Tuy nhiên, nhờ vai diễn Will Tippin trong bộ phim trinh thám Alias (2001-2006), anh nhận được nhiều sự chú ý và đạt vài thành công nho nhỏ với vai diễn phụ trong bộ phim hài Wedding Crasher (2005). Vai diễn trong The Hangover năm 2009 là vai diễn đột phá của anh, bộ phim nhận được nhiều đánh giá tích cực và thành công về mặt thương mại, dẫn đến việc có thêm 2 phần được sản xuất vào năm 2011 và năm 2013.

Vai diễn nhà văn nghèo khó trong Limitless (2011) và vai diễn cảnh sát mới vào nghề trong bộ phim trinh thám The Place Beyond the Pines (2012) nhận được nhiều lời khen từ giới phê bình. Anh cũng nhận được nhiều thành công với vai diễn trong bộ phim hài tình cảm Silver Linings Playbook (2012), vai phụ trong bộ phim hài trinh thám American Hustle (2013) và tham gia quá trình sản xuất cũng như đóng vai chính trong phim American Sniper (2014). Vì những sự đóng góp này mà anh được đề cử 4 giải Oscar và là diễn viên nam thứ 10 nhận được đề cử giải Oscar trong 3 năm liên tiếp. Năm 2014, anh đóng vai Joseph Merrick trong nhạc kịch The Elephant Man của Broadway, và nhận được đều cử Diễn viên kịch xuất sắc nhất từ giải Tony. Cũng vào năm 2014, anh tham gia lồng tiếng cho nhân vật Rocket Racoon thuộc Vũ trụ điện ảnh Marvel.

Cuộc sống riêng tư của anh cũng là đề tài của giới truyền thông. Anh từng kết hôn với Jennifer Espotio từ năm 2006 tới năm 2007, hiện tại anh đang có mối quan hệ với Irina Shayk (cả hai đã có một con gái) từ năm 2015. Anh cũng ủng hộ nhiều tổ chức giúp đỡ mọi người chống lại căn bệnh ung thư.',
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ],
    [
        'name' => 'Chris Pratt',
        'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/99/Chris_Pratt_2018.jpg/220px-Chris_Pratt_2018.jpg',
        'birthday' => '1979-06-21',
        'national' => 'Mỹ',
        'content' => "Christopher Michael Pratt (born June 21, 1979)[1] is an American actor. He rose to prominence for playing Andy Dwyer in the NBC sitcom Parks and Recreation (2009–2015). He also appeared in The WB drama series Everwood (2002–2006) and had supporting roles in the films Wanted (2008), Jennifer's Body (2009), Moneyball (2011), Zero Dark Thirty (2012), and Her (2013).

Pratt has starred as Star-Lord in the Marvel Cinematic Universe, beginning with Guardians of the Galaxy (2014), and as Owen Grady in the Jurassic World trilogy (2015–2022). He has also voiced the main characters in the animated films The Lego Movie (2014), Onward (2020) and The Super Mario Bros. Movie (2023).

Pratt's other starring roles were in The Magnificent Seven (2016), Passengers (2016), and The Tomorrow War (2021), and the action thriller television series The Terminal List (2022). In 2015, Time magazine named him one of the 100 most influential people in the world.",
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ],
    [
        'name' => 'Karen Gillan',
        'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/07/Stuttgart_-Comic_Con_Germany_2019-_d90_by-RaBoe_116_%28cropped%29.jpg/220px-Stuttgart_-Comic_Con_Germany_2019-_d90_by-RaBoe_116_%28cropped%29.jpg',
        'birthday' => '1987-11-28',
        'national' => 'Scotland',
        'content' => "Karen Gillan (sinh ngày 28 tháng 11 năm 1987)[1] là nữ diễn viên, đạo diễn, người mẫu người Scotland.[2][3][4] Gillan đã được công nhận nhờ đóng phim và truyền hình Anh, đặc biệt là khi đóng vai Amy Pond, bạn đồng hành chính của Bác sĩ thứ mười một trong loạt phim khoa học viễn tưởng Doctor Who (2010–2013), cô đã nhận được một số giải thưởng và đề cử. Các vai diễn đầu tiên của cô bao gồm Ally trong bộ phim kinh dị Outcast (2010) và Jane Lockhart trong bộ phim hài lãng mạn Not Another Happy Ending (2013). Cô chuyển sang Hollywood đóng vai chính Kaylie Russell trong bộ phim kinh dị Oculus (2013), thành công thương mại đầu tiên của cô tại Hoa Kỳ, và sau đó cô đóng vai chính trong bộ phim sitcom Selfie (2014).

Gillan sau đó đã trở thành ngôi sao quốc tế khi thể hiện Nebula trong các bộ phim siêu anh hùng của Vũ trụ Điện ảnh Marvel Guardians of the Galaxy (2014), Guardians of the Galaxy Vol. 2 (2017), Avengers: Infinity War (2018) và Avengers: Endgame (2019). Cô dự định sẽ đóng lại vai diễn này trong các bộ phim sắp tới Thor: Love and Thunder (2022) và Guardians of the Galaxy Vol. 3 (2023). Gillan đã duy trì sự nổi bật chính với vai diễn Ruby Roundhouse của cô trong các bộ phim hành động Jumanji: Welcome to the Jungle (2017) và Jumanji: The Next Level (2019), cả hai đều đạt được thành công về mặt thương mại. Trên sân khấu, cô xuất hiện trong vở kịch Inadmissible Evidence (2011) của John Osborne và xuất hiện lần đầu trên sân khấu Broadway trong vở kịch Time to Act (2013). Gillan đã nhận được sự hoan nghênh của giới phê bình vì sự tham gia của cô với vai trò biên kịch, đạo diễn và người đóng vai chính trong bộ phim truyền hình The Party's Just Beginning (2018).

Các giải thưởng của Gillan bao gồm Giải thưởng Empire, Giải thưởng National Television, Giải Teen Choices và các đề cử cho Giải thưởng BAFTA Scotland và Giải thưởng Sao Thổ. Ngoài diễn xuất, cô còn được chú ý bởi hình ảnh và hoạt động tích cực trước công chúng, đặc biệt là hướng tới việc ngăn chặn tự tử.",
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ],
    [
        'name' => 'Zoe Saldana',
        'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/bc/Zoe_Saldana_%2828584206821%29_%28cropped_2%29.jpg/220px-Zoe_Saldana_%2828584206821%29_%28cropped_2%29.jpg',
        'birthday' => '1978-06-19',
        'national' => 'Mỹ',
        'content' => 'Zoe Yadira Saldaña Perego[1] (nhũ danh Saldaña Nazario,[2] 19 tháng 6 năm 1978),[3] là một nữ diễn viên người Mỹ. Sau buổi biểu diễn của cô với nhóm kịch Faces, cô đã tham gia hai tập phim năm 1999 của Law & Order. Sự nghiệp điện ảnh của cô bắt đầu một năm sau đó với vai một vũ công ba lê trong phim Center Stage (2000)

Saldaña bắt đầu làm việc trong các bộ phim khoa học viễn tưởng từ năm 2009 với vai diễn đầu tiên trong nhiều lần xuất hiện với vai Nyota Uhura trong loạt phim Star Trek và lần đầu tiên cô xuất hiện với vai Neytiri trong loạt phim Avatar. Cô đóng vai Gamora trong Vũ trụ Điện ảnh Marvel, bắt đầu với Guardians of the Galaxy (2014). Saldaña đã góp mặt trong ba trong số năm phim có doanh thu cao nhất mọi thời đại (Avatar, Avengers: Infinity War và Avengers: Endgame), một thành tích mà bất kỳ diễn viên nào khác cũng không đạt được. Các bộ phim của cô thu về hơn 11 tỷ đô la trên toàn thế giới, và cô là nữ diễn viên điện ảnh có thu nhập cao thứ hai mọi thời đại tính đến năm 2019.',
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ],
    [
        'name' => 'Dave Bautista',
        'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/40/Dave_Bautista_Photo_Op_GalaxyCon_Minneapolis_2019.jpg/250px-Dave_Bautista_Photo_Op_GalaxyCon_Minneapolis_2019.jpg',
        'birthday' => '1969-01-18',
        'national' => 'Mỹ',
        'content' => 'David Michael Bautista (sinh ngày 18 tháng 1 năm 1969), anh được biết đến với tên võ đài Batista, là một đô vật chuyên nghiệp đã nghỉ hưu, võ sĩ kiêm diễn viên người Mỹ gốc Philippines – Hy Lạp. Với tư cách đô vật chuyên nghiệp, anh từng thi đấu cho World Wrestling Entertainment (WWE) từ năm 2002 đến năm 2010, trong năm 2014 và từ năm 2018 đến 2019. Ngoài đấu vật chuyên nghiệp, anh còn được biết đến với sự nghiệp diễn xuất, đáng chú ý nhất là nhân vật Drax the Destroyer trong Vũ trụ Điện ảnh Marvel.

Bautista bắt đầu sự nghiệp đô vật của mình vào năm 1999, và vào năm 2000, anh ký hợp đồng với World Wrestling Federation lúc bấy giờ (WWF, đổi tên thành WWE vào năm 2002). Từ năm 2002 đến 2010, anh nổi tiếng với biệt danh danh Batista và trở thành nhà vô địch thế giới sáu lần khi vô địch hạng nặng thế giới bốn lần và hai lần vô địch WWE. Triều đại đầu tiên của anh với chức vô địch hạng nặng thế giới là triều đại dài nhất cho danh hiệu đó với 282 ngày. Anh ấy cũng đã ba lần tổ chức chức vô địch World Tag Team (hai lần với Ric Flair và một lần với John Cena) và chức vô địch WWE Tag Teammột lần (với Rey Mysterio). Anh là người chiến thắng trong trận đấu Royal Rumble năm 2005 và tiếp tục giành chức vô địch WrestleMania 21, một trong năm sự kiện trả tiền cho mỗi lần xem có doanh thu cao nhất trong lịch sử đấu vật chuyên nghiệp. Sau khi rời WWE vào năm 2010, anh ấy tái ký hợp đồng vào tháng 12 năm 2013, xuất hiện lần đầu tiên vào tháng 1 năm 2014 và giành chiến thắng trong trận đấu Royal Rumble năm đó. Anh ấy đã đặt tiêu đề WrestleMania XXX trước khi một lần nữa khởi hành vào tháng 6 năm đó. Vào tháng 10 năm 2018, Bautista đã trở lại WWE lần thứ hai và đối mặt với Triple H tại WrestleMania 35 vào tháng 4 năm 2019, trước khi từ giã sự nghiệp đấu vật.

Bautista bắt đầu diễn xuất vào năm 2006 và đã đóng vai chính trong The Man with the Iron Fists (2012), Riddick (2013), phim James Bond Spectre (2015), Blade Runner 2049 (2017), Army of the Dead và Dune (cùng năm 2021). Trong Vũ trụ Điện ảnh Marvel, anh đã đóng vai Drax the Destroyer trong các phim Guardians of the Galaxy (2014), Guardians of the Galaxy Vol. 2 (2017), Avengers: Infinity War (2018) và Avengers: Endgame (2019). Anh cũng đã xuất hiện trong một số bộ phim direct-to-video kể từ năm 2009.

Vào tháng 8 năm 2012, Bautista ký hợp đồng với Classic Entertainment & Sports để chiến đấu trong các môn võ tổng hợp (MMA). Anh ấy đã giành chiến thắng trong cuộc đấu MMA duy nhất của mình vào ngày 6 tháng 10 năm 2012, đánh bại Vince Lucero bằng loại trực tiếp kỹ thuật ở vòng đầu tiên.',
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ],
    [
        'name' => 'Scott Eastwood',
        'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/d2/Scott_Eastwood_52nd_Annual_Publicists_Awards_-_Feb_2015_%28cropped%29.jpg/200px-Scott_Eastwood_52nd_Annual_Publicists_Awards_-_Feb_2015_%28cropped%29.jpg',
        'birthday' => '1986-03-21',
        'national' => 'Mỹ',
        'content' => 'Scott Eastwood (tên khai sinh: Scott Clinton Reeves; sinh ngày 21 tháng 3 năm 1986)[2] là một diễn viên, người mẫu Hoa Kỳ.
        Anh từng tham gia trong các phim điện ảnh như Flags of Our Fathers (2006), Gran Torino (2008), Invictus (2009), The Forger (2012),
        Trouble with the Curve (2012), Texas Chainsaw (2013), Fury (2014), The Longest Ride (2015), Mercury Plains (2016), Suicide Squad (2016), Snowden (2016),
        The Fate of the Furious (2017), Pacific Rim Uprising (2018).
        Scott cũng làm người mẫu cho nhãn hiệu nước hoa Cool Water của Davidoff. Anh là con út của diễn viên Clint Eastwood.',
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ],
    [
        'name' => 'Vin Diesel',
        'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/71/Vin_Diesel_XXX_Return_of_Xander_Cage_premiere.png/250px-Vin_Diesel_XXX_Return_of_Xander_Cage_premiere.png',
        'birthday' => '1967-07-18',
        'national' => 'United States',
        'content' => 'Vin Diesel (tên khai sinh là Mark Sinclair[1] hay Mark Vincent;[2] sinh ngày 18 tháng 7 năm 1967) , là một diễn viên và nhà sản xuất người Mỹ. Là một trong những nam diễn viên có doanh thu cao nhất thế giới, anh được biết đến với vai Dominic Toretto trong loạt phim Fast & Furious.

Diesel bắt đầu sự nghiệp của mình vào năm 1990 nhưng chật vật để giành được các vai diễn cho đến khi anh viết kịch bản, đạo diễn, sản xuất và đóng vai chính trong bộ phim ngắn Multi-Facial (1995). Điều này thu hút sự chú ý của Steven Spielberg, người đang phát triển Saving Private Ryan (1998), và viết lại các yếu tố của bộ phim để cho phép Diesel xuất hiện trong một vai phụ. Diesel sau đó đã lồng tiếng cho nhân vật chính trong The Iron Giant (1999) trong khi nổi danh như một ngôi sao hành động sau khi gây ấn tượng với loạt phim Fast & Furious, XXX và The Chronicles of Riddick.

Diesel đóng vai Groot trong các bộ phim siêu anh hùng của Vũ trụ Điện ảnh Marvel, xuất hiện trong Guardians of the Galaxy (2014), Guardians of the Galaxy Vol. 2 (2017), Avengers: Infinity War (2018), Avengers: Endgame (2019) và Thor: Love and Thunder (2022) sắp tới. Anh cũng đóng vai Groot trong bộ phim hoạt hình Ralph Breaks the Internet (2018). Diesel cũng đã giành được thành công về mặt thương mại trong các thể loại khác, chẳng hạn như trong bộ phim hài The Pacifier (2005), trong khi màn trình diễn của anh trong Find Me Guilty (2006) được khen ngợi. Diesel miêu tả Bloodshot chuyển thể từ phim siêu anh hùng vào năm 2020, và dự kiến ​​sẽ xuất hiện trong các phim Avatar sắp tới.

Anh thành lập công ty sản xuất One Race Films, nơi anh cũng là nhà sản xuất hoặc điều hành sản xuất cho những chiếc xe ngôi sao của mình. Diesel cũng thành lập hãng thu âm Racetrack Records và nhà phát triển trò chơi điện tử Tigon Studios, cung cấp khả năng ghi lại chuyển động và giọng nói của anh ấy cho tất cả các bản phát hành của Tigon.',
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ],
    [
        'name' => 'Michelle Rodriguez',
        'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/8d/Michelle_Rodriguez_by_Gage_Skidmore_2.jpg/250px-Michelle_Rodriguez_by_Gage_Skidmore_2.jpg',
        'birthday' => '1978-07-12',
        'national' => 'United Kingdom',
        'content' => 'Mayte Michelle Rodriguez[2] (sinh ngày 12 tháng 7 năm 1978),[3] thường chỉ gọi là Michelle Rodriguez, là một diễn viên, nhà viết kịch bản phim và người chỉnh nhạc.[4] Vai diễn mang tính bước ngoặt trong sự nghiệp của Rodriguez là trong bộ phim độc lập Girlfight (2000). Trong phim, cô đảm nhiệm nhân vật một vận động viên quyền Anh, và phần thể hiện của cô đã nhận được những lời tán dương từ giới phê bình và mang về cho cô một số giải thưởng, trong đó có giải Independent Spirit Award (Giải Tinh thần độc lập)[5] và giải Gotham Award cho Vai diễn khởi đầu xuất sắc nhất.[6] Sau đó, cô lần đầu tiên đến với Hollywood với vai Letty Ortiz trong bom tấn The Fast and the Furious (2001), và tiếp tục đảm nhận vai diễn này trong hai phần tiếp theo là Fast & Furious (2009) và Fast & Furious 6 (2013).

Trong sự nghiệp của mình, cô đã tham gia một số phim hành động khá thành công, với những vai diễn cứng rắn, độc lập như Blue Crush, S.W.A.T., Battle: Los Angeles và bom tấn của đạo diễn James Cameron, Avatar. Cô cũng được biết đến với các vai diễn như Shé trong hai bộ phim hành động hài hước của Robert Rodriguez, Machete và Machete Kills, và vai Rain Ocampo trong loạt phim khoa học viễn tưởng Resident Evil và Resident Evil: Retribution.

Rodriguez cũng mở rộng lĩnh vực hoạt động của mình sang truyền hình, với vai diễn Ana Lucia Cortez trong mùa thứ hai của series truyền hình Lost trong vai trò diễn viên chính và sau đó cũng đã xuất hiện vài lần trong vai trò vai diễn khách mời trước khi series này kết thúc. Cô cũng đã tham gia lồng tiếng trong một số trò chơi điện tử như Call of Duty và Halo cũng như lồng tiếng cho phim hoạt hình 3D Turbo và chương trình truyền hình IGPX.[7]

Với tổng doanh thu tất cả các phim cô tham gia là trên 5,2 tỷ USD, Entertainment Weekly cho rằng cô là "một trong những nữ diễn viên Mỹ Latinh nổi bật nhất Hollywood".[8]',
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ],
    [
        'name' => 'Jason Momoa',
        'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/d6/Jason_Momoa_by_Gage_Skidmore.jpg/200px-Jason_Momoa_by_Gage_Skidmore.jpg',
        'birthday' => '1979-08-01',
        'national' => 'United States',
        'content' => 'Joseph Jason Namakaeha Momoa (sinh ngày 1 tháng 8 năm 1979) là nam diễn viên, đạo diễn và nhà sản xuất phim người Mỹ.[1]

Jason Momoa nổi tiếng với các vai diễn siêu anh hùng trong vũ trụ DC Mở rộng DC Extended Universe, bắt đầu từ năm 2016 với vai thủy thần Aquaman trong Batman v Superman: Dawn of Justice, Justice League và Aquaman.[2][3][4].

Trước đó, Jason Momoa từng vào vai Ronon Dex trong sê-ri phim viễn tưởng Stargate Atlantis (2004–2009), Khal Drogo trong Game of Thrones (2011–2012) hay Declan Harp trong Frontier (2016–nay).

Road to Paloma là bộ phim đầu tiên mà Jason Momoa làm giám đốc sản xuất kiêm biên kịch, ông cũng tham gia đóng vai chính trong bộ phim này, được phát hành ngày 11 tháng 7 năm 2014.[5]',
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ],
    [
        'name' => 'Charlize Theron',
        'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/5d/Charlize-theron-IMG_6045.jpg/220px-Charlize-theron-IMG_6045.jpg',
        'birthday' => '1975-08-07',
        'national' => 'United States',
        'content' => "Charlize Theron (phát âm theo tiếng Anh kiểu Mỹ: /ʃɑːrˈliːz ˈθɛrən/; phát âm theo tiếng Afrikaans: [ʃɐrˈlis tron];[1] sinh ngày 7 tháng 8 năm 1975) là một nữ diễn viên kiêm nhà làm phim người Mỹ gốc Nam Phi. Là một trong những nữ diễn viên được trả lương cao nhất thế giới, cô là chủ nhân của nhiều giải thưởng khác nhau, bao gồm giải Oscar, giải SAG và giải Quả cầu vàng. Năm 2016, Time đã vinh danh cô là một trong 100 người có ảnh hưởng nhất trên thế giới.

Theron trở nên nổi tiếng quốc tế vào những năm 1990 khi đóng vai phụ nữ hàng đầu trong các bộ phim Hollywood The Devil's Advocate (1997), Mighty Joe Young (1998) và The Cider House Rules (1999). Cô được giới phê bình đánh giá cao nhờ vai diễn kẻ giết người hàng loạt Aileen Wuornos trong Monster (2003), nhờ đó cô đã giành được giải Gấu bạc và Giải Oscar cho nữ diễn viên chính xuất sắc nhất, trở thành người Nam Phi đầu tiên giành giải Oscar ở hạng mục diễn xuất. Cô nhận được một đề cử giải Oscar khác cho vai một phụ nữ bị lạm dụng tình dục đi tìm công lý trong bộ phim truyền hình North Country (2005).

Theron kể từ đó đã đóng vai chính trong một số bộ phim hành động thành công về mặt thương mại, bao gồm The Italian Job (2003), Hancock (2008), Snow White and the Huntsman (2012), Prometheus (2012), Mad Max: Fury Road (2015), The Huntsman: Winter's War (2016), The Fate of the Furious (2017), Atomic Blonde (2017), The Old Guard (2020) và F9 (2021). Cô cũng nhận được lời khen ngợi khi đóng vai phụ nữ rắc rối trong các bộ phim truyền hình hài Young Adult (2011) và Tully (2018) của Jason Reitman, và cho vai Megyn Kelly trong bộ phim tiểu sử Bombshell (2019), lần cuối cùng nhận được đề cử Giải Oscar thứ ba.

Từ đầu những năm 2000, Theron đã mạo hiểm sản xuất phim với công ty Denver và Delilah Productions của cô. Cô đã sản xuất nhiều bộ phim, trong đó có nhiều bộ phim mà cô đã đóng vai chính, bao gồm The Burning Plain (2008), Dark Places (2015) và Long Shot (2019). Theron trở thành công dân Mỹ vào năm 2007, trong khi vẫn giữ quốc tịch Nam Phi của mình. Cô đã được vinh danh bằng cách khắc trên ngôi sao trên Đại lộ Danh vọng Hollywood.",
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ],
    [
        'name' => 'Brie Larson',
        'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/40/Captain_Marvel_trailer_at_the_National_Air_and_Space_Museum_4_%28cropped%29.jpg/240px-Captain_Marvel_trailer_at_the_National_Air_and_Space_Museum_4_%28cropped%29.jpg',
        'birthday' => '1989-10-01',
        'national' => 'United States',
        'content' => 'Brianne Sidonie Desaulniers (sinh ngày 1 tháng 10 năm 1989), được biết đến với nghệ danh Brie Larson (phiên âm tiếng Việt: Bri Lác-xơn[1]), là nữ diễn viên và ca sĩ người Mỹ. Brie Larson được giáo dục tại nhà ở Sacramento, bang California trước khi đi học diễn xuất tại nhà hát American Conservatory Theater.

Cô bắt đầu sự nghiệp với tư cách diễn viên nhí trong các chương trình hài kịch trên The Tonight Show with Jay Leno. Cô bắt đầu tham gia các vai phụ trong Sleepover và 13 Going on 30 đều trong năm 2004. Năm 2010, Larson góp mặt trong các bộ phim Greenberg và Scott Pilgrim vs. the World. Trên sóng truyền hình Larson vào vai Kate Gregson trong series hài của Diablo Cody mang tên United States of Tara từ 2009 tới 2011. Cô tiếp tục các vai trò diễn viên phụ trong Rampart (2011), 21 Jump Street (2012), Don Jon (2013) và The Spectacular Now (2013) trước khi đột phá với vai chính trong Short Term 12 (2013).

Vào năm 2015, cô là đồng vai chính trong Trainwreck và là nhân vật chính trong Room, bộ phim mang về cho Larson nhiều giải thưởng trong đó có Giải Oscar, Giải BAFTA và Giải Quả cầu vàng.',
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ],
    [
        'name' => 'Jason Statham',
        'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/d3/Jason_Statham_2018.jpg/250px-Jason_Statham_2018.jpg',
        'birthday' => '1967-07-26',
        'national' => 'United Kingdom',
        'content' => 'Jason Statham (sinh ngày 26 tháng 7, năm 1967 tại Shirebrook, Derbyshire, Anh Quốc) là một nam diễn viên điện ảnh và vận động viên nhảy cầu người Anh, được biết đến qua những vai diễn trong những bộ phim tội phạm Lock, Stock and Two Smoking Barrels, Revolver, Snatch,... Statham cũng đóng vai phụ trong vài bộ phim của Mỹ như The Italian Job, cũng như vai chính trong các phim The Transporter, Crank, The Bank Job, War và Death Race.',
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ],
    [
        'name' => 'Hoàng Mèo',
        'image' => 'https://35express.org/wp-content/uploads/2022/01/hoang-meo-la-ai-1-35express.jpg',
        'birthday' => '1982-01-01',
        'national' => 'Viet Nam',
        'content' => "Hoàng Mèo sinh năm 1982, ghi dấu ấn trong các tác phẩm như Lật mặt: Nhà có khách, Bố già, Chị Mười Ba... Đại Ngọc Trâm xuất thân là diễn viên kịch, sau đó lấn sân phim ảnh. Chị từng đóng các phim như Vợ tui tui sợ, Cặp đôi nội chiến...

Hoàng Mèo và Đại Ngọc Trâm gắn bó khi cùng hoạt động ở sân khấu Nụ cười mới. Họ yêu nhau 6 năm trước khi đi đến hôn nhân vào năm 2010. Họ có 2 con chung tên thân mật là Mì Gói và Bún Gạo.",
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ],
    [
        'name' => 'Trần Kim Hải',
        'image' => 'https://assets.htv.com.vn/Images/DanQuynh/2023/kkcd/quy2/kimhai.jpg',
        'birthday' => '1982-01-01',
        'national' => 'Viet Nam',
        'content' => 'Với vẻ ngoài gai góc và đậm chất điện ảnh, Trần Kim Hải là gương mặt mới được đạo diễn Lý Hải tin tưởng giao vai Toàn trong dự án Lật mặt 6 - Tấm vé định mệnh. Với Kim Hải, bộ phim là một bước ngoặt lớn trên hành trình theo đuổi đam mê, mang anh đến gần hơn với công chúng, sau nhiều năm miệt mài làm nghệ thuật. Dự án dài hơi và đầy tâm huyết của một tập thể lớn, đặc biệt dưới thương hiệu đầy uy tín mang tên Lật mặt đã cho anh một cơ hội lớn để thực sự sống với điện ảnh.',
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ],
    [
        'name' => 'Thanh Thức',
        'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/2c/ThanhThuc1984.jpg/200px-ThanhThuc1984.jpg',
        'birthday' => '1984-04-10',
        'national' => 'Viet Nam',
        'content' => 'Thanh Thức tên đầy đủ là Phạm Thanh Thức, sinh ra tại Trà Vinh, Việt Nam, là một diễn viên, người mẫu nổi tiếng của làng giải trí Việt Nam. Sở hữu gương mặt lạnh, nam tính, lịch lãm, và chiều cao lý tưởng 1m81, Thanh Thức là gương mặt người mẫu xuất hiện trong nhiều sự kiện thời trang lớn nhỏ trong nước. Anh còn được biết đến qua nhiều vai diễn phim truyền hình.[1]

Năm 2006, Thanh Thức giành giải Ba cuộc thi Thời trang Xuân do Nhà văn hóa Thanh Niên tổ chức.[2] Cũng từ đây, anh chính thức bước chân vào sự nghiệp người mẫu chuyên nghiệp. Ngoài ra, anh còn thường xuyên xuất hiện trong chương trình Thời trang và cuộc sống của HTV7, và nhiều chương trình thời trang như: Phong cách đam mê, Duyên dáng Việt Nam, Thời trang và cuộc sống, Hoa hậu Thế giới người Việt...

Năm 2008, Thanh Thức tham gia bộ phim điện ảnh "Khi yêu đừng quay đầu lại", là một bộ phim được đánh giá tốt của đạo diễn Võ Nghiêm Minh.[3][4] Sau đó, anh bắt đầu dần dần rời xa sàn catwalk và bước chân vào lĩnh vực điện ảnh, truyền hình qua các phim: Anh chàng đã đi ngược thời gian, Đối mặt, Blog và người đẹp, Siêu mẫu Xì trum... Hiện tại, anh là một người mẫu được nhiều nhãn hàng thời trang cao cấp và nhiều thương hiệu khác mời làm người mẫu quảng cáo.

Cũng giống như nhiều diễn viên khác, Thanh Thức cũng găp nhiều khó khăn và áp lực khi mới bước chân vào nghề diễn xuất. Nhưng vì sự ham học hỏi, yêu nghề, nên anh đã nhanh chóng nâng cao khả năng diễn xuất của mình.

Là một người kín tiếng trong chuyện đời tư, vậy nên ít ai biết rằng Thanh Thức đã kết hôn. Nam diễn viên cũng từ chôi chia sẻ về mái ấm của mình vì anh nghĩ rằng chưa đến lúc công bố với khán giả. Anh muốn vợ và con mình có được cuộc sống yên bình, không bị dư luận soi mói.[5][6]',
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ],
    [
        'name' => 'Huy Khánh',
        'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/63/Dien-vien-huy-khanh.jpg/200px-Dien-vien-huy-khanh.jpg',
        'birthday' => '1981-01-07',
        'national' => 'Viet Nam',
        'content' => 'Anh sinh năm 1981 tại Thành phố Hồ Chí Minh, có cha là người Việt còn mẹ là người Pháp. Anh tốt nghiệp trường Đại học Sân khấu – Điện ảnh Thành phố Hồ Chí Minh.[2] Huy Khánh được khán giả biết đến rộng rãi lần đầu tiên qua bộ phim Dốc tình năm 2004 của đạo diễn Lưu Trọng Ninh qua vai Thái.[2] Năm 2009, anh tham gia phim Chuyện tình xa xứ của đạo diễn Việt kiều Victor Vũ. Năm 2011, anh tiếp tục hợp tác với Victor Vũ khi đóng trong phim Cô dâu đại chiến.

Năm 2012, anh là người dẫn chương trình cho mùa thứ tư của cuộc thi âm nhạc Vietnam Idol.

Năm 2018, Huy Khánh tham gia phim truyền hình Nhà ông Hoàng có ma. Vai diễn Bùi Hoàng trong phim mang về cho anh một giải Ngôi Sao Xanh ở hạng mục Nam diễn viên xuất sắc nhất.',
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ],
    [
        'name' => 'Trương Quốc Cường',
        'image' => 'https://images2.thanhnien.vn/thumb_w/640/528068263637045248/2023/3/25/edit-quoc-cuongg-167976189473145731174.png',
        'birthday' => '1969-09-30',
        'national' => 'Viet Nam',
        'content' => 'Trương Quốc Cường xuất thân trong gia đình có 7 anh chị em, ông đứng thứ 5. Ông tốt nghiệp trường Islamic Kasim Tuet Memorial College. Năm 15 tuổi, ông thi vào Hội thể thao Du Viên, triển khai sự nghiệp đá bóng. Năm 1975, ông làm thành viên đội đại diện bóng đá Hong Kong đến Kuwait tham dự tranh giải U19 của Hiệp hội bóng đá Á Châu. Từ đó, ông được lên đội dự bị tại Du Viên, sau đó lại thăng lên tổ A. Về sau ông từng đá cho đội Đông Phương và Hải Phong, nhưng ít có cơ hội ra sân, trong thời gian đó, ông đã làm quen với Đàm Vịnh Lân và Trần Bách Tường do 2 người thuộc đội dự bị của CLB bóng đá không chuyên. Năm 1976, do TVB tuyển cầu thủ tham gia phim ngắn Vô hoa quả, ông đi thử vai do ham vui, kết quả lại được chọn. Vì cơ duyên đó mà ông đã gia nhập làng giải trí.',
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ],
    [
        'name' => 'Trung Dũng',
        'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/e/eb/Trung_Dung1973.jpg/200px-Trung_Dung1973.jpg',
        'birthday' => '1973-01-01',
        'national' => 'Viet Nam',
        'content' => 'Phạm Trung Dũng (sinh năm 1973) nổi tiếng với nghệ danh Trung Dũng, là một nam diễn viên và MC người Việt Nam. Năm 2015, anh đoạt giải thưởng "Nam diễn viên chính xuất sắc" tại Lễ trao giải Cánh diều với vai diễn Trung trong Lạc giới.[1]',
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ],
    [
        'name' => 'Tiến Luật',
        'image' => 'https://khafa.org.vn/wp-content/uploads/2021/12/202005120252528015-e68fd400-a0c8-4b5b-a065-df5c2657a42b.png',
        'birthday' => '1982-01-01',
        'national' => 'Viet Nam',
        'content' => 'Diễn viên hài Tiến Luật sinh năm 1982, tính đến nay anh đã 39 tuổi. Tiến Luật hiện nay anh đang sinh sống và làm việc tại TP. Hồ Chí Minh, nước Việt Nam. Tiến Luật chắc hẳn không còn là cái tên xa lạ đối với khán giả qua các bộ phim, cũng như các tiểu phẩm hài. Tiến Luật hiện tại anh đang công tác ở Sân khấu Thế giới trẻ TP HCM. Anh đã được khán giả yêu mến bởi một lối diễn xuất chân thật, và hóm hỉnh. Tiến Luật cũng chính là diễn viên đầy tài năng, đầy nhiệt huyết, và luôn hết lòng đối với sự nghiệp diễn xuất.',
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ],
    [
        'name' => 'Thu Trang',
        'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/1d/THU_TRANG_2020.jpg/250px-THU_TRANG_2020.jpg',
        'birthday' => '1984-09-23',
        'national' => 'Viet Nam',
        'content' => 'Thu Trang sinh ngày 23 tháng 9 năm 1984 tại Quận 6, Thành phố Hồ Chí Minh trong một gia đình tiểu thương khá giả. Năm 18 tuổi, vừa tốt nghiệp cấp 3, gia đình cô gặp khó khăn về kinh tế.

Từ năm 2002, khi đang học năm nhất trường Cao đẳng Sân khấu – Điện ảnh Thành phố Hồ Chí Minh (nay là trường Đại học Sân khấu – Điện ảnh Thành phố Hồ Chí Minh), Thu Trang đã bắt đầu đi diễn hài cùng các nghệ sĩ đàn anh để kiếm thêm thu nhập hỗ trợ cho gia đình. Sau một thời gian, cô nhận được nhiều lời mời đi đóng phim nên cuộc sống dần ổn định.[3]

Thu Trang kết hôn với nam diễn viên Tiến Luật vào năm 2011. Cả hai đã cùng nhau đóng nhiều bộ phim, tham gia nhiều gameshow truyền hình thực tế.[4]

Tháng 12 năm 2014, Thu Trang tham dự chương trình hài kịch Ơn giời cậu đây rồi.[5]

Năm 2016, cô cùng chồng là diễn viên Tiến Luật làm giám khảo trong cuộc thi Đấu trường tiếu lâm.[6]

Năm 2020, Thu Trang tham dự bộ phim Tiệc trăng máu và Chị Mười Ba - 3 ngày sinh tử (phần tiếp theo của bộ phim điện ảnh chuyển thể từ phim chiếu mạng trước đó Chị Mười Ba - Phần kết Thập Tam Muội).[7][8][9]

Năm 2021, cô tiếp tục tham gia dự án điện ảnh Chìa khóa trăm tỷ cùng nam diễn viên Kiều Minh Tuấn cùng video âm nhạc 72 phép thần thông của ca sĩ Ngô Kiến Huy',
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ],
    [
        'name' => 'Thái Hòa',
        'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/c4/THAI_HOA.jpg/250px-THAI_HOA.jpg',
        'birthday' => '1974-08-10',
        'national' => 'Viet Nam',
        'content' => 'Thái Hòa sinh ngày 10 tháng 8 năm 1974 tại Sài Gòn. Sau này lớn lên, do có lòng đam mê nghệ thuật nên anh quyết định làm diễn viên hài lẫn diễn viên kịch, cách diễn xuất của Thái Hòa khiến không ít khán giả yêu quý. Không những thế, anh còn đảm nhận luôn vai trò biên kịch sân khấu và đạo diễn sân khấu, hai tác phẩm ăn khách nhất của anh là Người vợ ma và Quả tim máu

Thái Hòa còn lấn sân sang lĩnh vực điện ảnh, bộ phim đầu tiên anh tham gia là phim Những đứa con thành phố, sau này anh gây nhiều ấn tượng với những bộ phim hài của đạo diễn Việt kiều Charlie Nguyễn như là Để Mai tính, Long Ruồi, Cưới ngay kẻo lỡ, Tèo em và Để Mai tính 2. gần đây nhất là phim " cây táo nở hoa".

Hiện tại, Thái Hòa đang sống với người vợ mới tên Hồng Thu.',
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ],
    [
        'name' => 'Kiều Minh Tuấn',
        'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/dd/KIEU_MINH_TUAN.jpg/250px-KIEU_MINH_TUAN.jpg',
        'birthday' => '1988-02-26',
        'national' => 'Viet Nam',
        'content' => 'Kiều Minh Tuấn (sinh ngày 26 tháng 2 năm 1988) là một nam diễn viên người Việt Nam.[1][2] Anh được biết đến và nổi tiếng qua các tác phẩm điện ảnh như: Bụi đời Chợ Lớn (2013), Scandal: Hào quang trở lại (2014), Em chưa 18 (2017), Lật mặt: Ba chàng khuyết (2018), Hạnh phúc của mẹ (2019) Anh Trai Yêu Quái (2019) Nắng 3: Lời hứa của cha (2020), Chị Mười Ba: Ba Ngày Sinh Tử (2020), Tiệc trăng máu (2020), Chìa khóa trăm tỷ (2022).',
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ],
    [
        'name' => 'Trấn Thành',
        'image' => 'https://image-us.24h.com.vn/upload/4-2022/images/2022-12-11/scsacsacsac-1670760945-945-width660height628.jpg',
        'birthday' => '1987-02-05',
        'national' => 'Viet Nam',
        'content' => 'Trấn Thành sinh ra và lớn lên tại Thành phố Hồ Chí Minh, có cha là người gốc Hoa đến từ Quảng Đông và mẹ là người Tiền Giang. Ngoài tiếng Việt, anh còn có thể nói tiếng Anh, tiếng Quảng Đông và Quan thoại.[1] Trấn Thành từng theo học khoa diễn viên Đại học Sân khấu - Điện ảnh.',
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ],
    [
        'name' => 'Yasamin Jasem',
        'image' => 'https://cdns.klimg.com/merdeka.com/i/w/news/2020/10/13/1230867/content_images/670x335/20201013145852-1-yasamin-003-miftahul-arifin.jpg',
        'birthday' => '2004-02-21',
        'national' => 'Indonesia',
        'content' => "Updating",
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ],
    [
        'name' => 'Tika Bravani',
        'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/6a/Tika_Bravani_on_Kartini_1.jpg/220px-Tika_Bravani_on_Kartini_1.jpg',
        'birthday' => '1990-02-17',
        'national' => 'Indonesia',
        'content' => "Ratu Tika Bravani was born in Denpasar, Bali from Bantenese father named Tubagus Zubir Ramadhan and Minangkabau mother named Kemalia Dewi.[1] The Ratu first name is the Bantenese noble title which is pinned to the female descendants of the first sultan of Banten, Maulana Hasanuddin patrilineally derived from the father who has a first name Tubagus as noble title.[2]
Since sixteen years old, Bravani had parted ways with her father because her parents divorced and she chose to live with her mother, Kemalia Dewi.[3] On July 30, 2014, Bravani's mother died at the fourth day of Eid al-Fitr. Dewi has been sick for a year, and was treated for nine months in hospital for cervical cancer.[4] For Bravani, her mother was a great and tough person, and she never complained even if she had problems.[5] Before she died, Dewi told Bravani to get married soon.",
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ],  [
        'name' => 'Mizuta Wasabi',
        'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSYa06nFydDQ-owVW2eph8oQ66rInym5u--p0YtOhoo&s',
        'birthday' => '1974-08-04',
        'national' => 'Japan',
        'content' => "Mizuta Wasabi, sinh 4 tháng 8 năm 1974 tại Aoyama, Mie, là một nữ seiyū. Hiện tại, cô sống ở Iga, Mie và làm việc cho ban quản lý seiyū Ken Production của Utsumi Kenji. Vào tháng 4 năm 2005, cô tham gia lồng tiếng nhân vật Doraemon trong loạt phim hoạt hình dài cùng tên.",
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ], [
        'name' => 'Megumi Oohara',
        'image' => 'https://resizing.flixster.com/OEIX6AxtTma5vHOS3c8b_X_AjHg=/218x280/v2/https://flxt.tmsimg.com/assets/1091062_v9_aa.jpg',
        'birthday' => '1975-04-16',
        'national' => 'Japan',
        'content' => "Ohara Megumi, sinh ngày 16 tháng 4 năm 1975 tại Tokyo, Nhật Bản, là một nữ seiyū. Cô có sở thích là nấu ăn và nghe nhạc. Vào tháng 4 năm 2005, cô tham gia lồng tiếng nhân vật Nobita trong loạt phim hoạt hình dài cùng tên.",
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ], [
        'name' => 'Sophie Thompson',
        'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSIf9zen6jfc_xKlrgOPfIuDw62NxOB-g-szgbwavhF3JoHMOZr',
        'birthday' => '1962-01-20',
        'national' => 'United Kingdom',
        'content' => "Được dịch từ tiếng Anh-Sophie Thompson là một nữ diễn viên người Anh đã từng làm việc trong lĩnh vực điện ảnh, truyền hình và sân khấu. Từng sáu lần được đề cử Giải thưởng Olivier, cô đã giành được Giải thưởng Olivier năm 1999 cho Nữ diễn viên chính xuất sắc nhất trong một vở nhạc kịch cho sự hồi sinh của Into the Woods ở London.",
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ], [
        'name' => 'Taliyah Blair',
        'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRwvE7QRTkXd45V0GXOLbBcL-IExdQmU6Gbqag4g86m&s',
        'birthday' => '1962-01-20',
        'national' => 'United Kingdom',
        'content' => "Taliyah Blair is a British actress, who has become known for her acting in Aladdin (2019), The War of the Worlds (2019), and The Creeping (2021). She began her professional acting career back in 2019. Taliyah also owns a self-titled YouTube channel. Born on , , Taliyah Blair hails from London, United Kingdom. As in 2023, Taliyah Blair's age is N/A. Check below for more deets about Taliyah Blair. This page will put a light upon the Taliyah Blair bio, wiki, age, birthday, family details, affairs, controversies, caste, height, weight, rumors, lesser-known facts, and more.",
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ],[
        'name' => 'Riann Steele',
        'image' => 'https://m.media-amazon.com/images/M/MV5BNDk3MWQ2ODAtYTk3OS00YzgwLWJhMzYtNzZkM2YzYTY2YzBjXkEyXkFqcGdeQXVyMjQwMDg0Ng@@._V1_.jpg',
        'birthday' => '1987-05-23',
        'national' => 'United Kingdom',
        'content' => "Riann Steele là một nữ diễn viên người Anh gốc Mỹ. Cô bắt đầu sự nghiệp của mình trong nhà hát. Các bộ phim của cô bao gồm Treacle Jr., Sket và The Creeping. Trên truyền hình, cô đóng vai chính trong bộ phim hài E4 Crazyhead và loạt phim NBC Debris.",
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ],[
        'name' => 'Jonah Hauer-King',
        'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSyncc1okwDauj-Wguyt34QBv4WqNDkA_GVpQ6TvriW&s',
        'birthday' => '1995-05-30',
        'national' => 'United Kingdom',
        'content' => "Jonah Hauer-King (sinh ngày 30 tháng 5 năm 1995) là một nam diễn viên người Anh.[1] Anh đã thủ vai Laurie trong phiên bản 2017 của BBC Little Women,[2][3] và đóng vai Andrius Aras trong phim Ashes in the Snow (2018), Bel Powley, David trong Postcards from London (2018), và Lucas trong phim A Dog's Way Home (2019).[4] Ngoài ra, anh còn tham gia diễn xuất trong các phim The Song of Names và Once Upon a Time in Staten Island.",
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ],[
        'name' => 'Halle Bailey',
        'image' => 'https://media-cdn-v2.laodong.vn/storage/newsportal/2022/9/20/1095362/Halle-Bailey.jpg',
        'birthday' => '2000-03-27',
        'national' => 'United States',
        'content' => "Halle Lynn Bailey là một nữ ca sĩ, nhạc sĩ và diễn viên người Mỹ. Cô được biết đến với tư cách là thành viên của bộ đôi Chloe x Halle cùng với chị gái của mình là Chloe Bailey, họ được đề cử cho 5 giải Grammy kể từ năm 2018.",
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    ],
]);
