<?php
use Illuminate\Support\Facades\DB;

DB::table('posts')->insert([
    [
        'title'=>'U2 Vui Vẻ-Bắp Nước Siêu Hạt Dẻ',
        'image' => 'https://www.galaxycine.vn/media/2022/11/1/combo-u22-digital-1135x660_1667285093971.jpg',
        'content'=>'Cuối 2022, Galaxy Cinema dành tặng các Stars từ 22 tuổi trở xuống một phần quà ưu khủng. Từ 01.11.2022, Galaxy Cinema chính thức ra mắt Combo ưu tiên chỉ dành riêng cho các Stars từ 13 đến 22 tuổi. Đến Galaxy Cinema, thưởng thức loạt phim hay và mua ngay Combo 1 U22 đủ bắp giòn nước ngọt chỉ từ 49k. Muốn thêm phần nước, hãy chọn Combo 2 U22 chỉ từ 59k. Lưu ý: Các rạp tại Tp. Hồ Chí Minh, Hà Nội, Hải Phòng thêm 10k mỗi loại Combo.',
        'conditions'=>'Dành cho khách hàng thành viên U22 (độ tuổi 13-22). Áp dụng khi mua trực tiếp tại quầy. Vui lòng xuất trình đồng thời giấy tờ tùy thân có ngày sinh hoặc vé U22 kèm thông tin thành viên hợp lệ (thẻ thành viên, app) khi mua combo. Mỗi khách hàng mua tối đa 01 Combo 1/ Combo 2 U22 mỗi lần. Trong mọi trường hợp, quyết định của Galaxy Cinema là quyết định cuối cùng.',
        'status' => 1,
        'user_id'=>'1'
    ], [
        'title'=>'Milo Siêu Khủng Giá Chỉ 19K!',
        'image' => 'https://www.galaxycine.vn/media/2023/4/19/milo-kv-1135x660_1681889209366.jpg',
        'content'=>"Vào thứ 4 cuối cùng mỗi tháng, đồng giá 19k/ ly Milo size L siêu khủng khi mua kèm 01 hộp bắp hoặc bất kỳ combo nào khác. Mau đặt vé để vừa thưởng thức siêu phẩm The Little Mermaid, phim hoạt hình Doraemon: Nobita's Sky Utopia, tác phẩm hành động Fast X… vừa nhâm nhi Milo thơm ngọt nhé!",
        'conditions'=>'Áp dụng cho khách hàng là thành viên của Galaxy Cinema. Áp dụng giá ưu đãi cho tối đa 02 ly Milo khi mua kèm 01 hộp bắp hoặc 1 combo Bất Kỳ. Áp dụng cộng lũy tiến theo điều kiện chương trình. Khách hàng đã mua Bắp hoặc Combo Online vui lòng trình giao dịch cho: nhân viên trước khi thanh toán; trước khi đổi bắp nước đã mua online. Không giới hạn số lần tham gia chương trình. Trong mọi trường hợp, quyết định của Galaxy Cinema là quyết định cuối cùng ',
        'status' => 1,
        'user_id'=>'1'
    ], [
        'title'=>'VNPAY Giảm Ngay 15K!',
        'image' => 'https://www.galaxycine.vn/media/2023/4/28/1135-x-660_1682665330285.jpg',
        'content'=>"Khách hàng sẽ được hưởng loạt Bom tấn điện ảnh Việt tại Galaxy trong dịp lễ này, còn gì tuyệt vời hơn khi vừa được thưởng thức phim hay, hưởng ưu đãi ngập tràn mà còn được giảm giá khi thanh toán qua VNPAY-QR, chi tiết như sau: Bước 1: Khách hàng mở Ví VNPAY/App Mobile Banking và chọn “Quét QR” Bước 2: Scan mã thanh toán trên màn hình của Thu ngân Bước 3: Tại bước chờ xác nhận thanh toán, Khách hàng nhập mã “VNPAYGLX” hoặc “VNPAYGLX2” tại ô “Nhập mã giảm giá” Bước 4: Bấm “Xác nhận thanh toán” Khách hàng sẽ được giảm ngay 15K",
        'conditions'=>'Agribank, Vietcombank, VietinBank, BIDV, VÍ VNPAY ABBANK, BAOVIETBank, SCB, EXIMBANK HDBANK, VIETABANK, Ocean Bank, BIDC SAIGONBANK, IVB, VIETABANK, Public Bank Vietnam, Coop Bank ',
        'status' => 1,
        'user_id'=>'1'
    ], [
        'title'=>'Happy Day',
        'image' => 'https://www.galaxycine.vn/media/2022/1/13/1135x660_1642060289192.jpg',
        'content'=>"Vào thứ 3 hàng tuần – Happy Day, Galaxy Cinema dành tặng giá vé ưu đãi CHỈ TỪ 50K! ",
        'conditions'=>'Áp dụng mỗi thứ 3 hàng tuần. Áp dụng cho tất cả khách hàng. Trong mọi trường hợp, quyết định của Galaxy Cinema là quyết định cuối cùng.',
        'status' => 1,
        'user_id'=>'1'
    ], [
        'title'=>'Chào 2023, Đón Mưa Quà Tặng Thành Viên Từ Galaxy Cinema!',
        'image' => 'https://www.galaxycine.vn/media/2023/1/17/bangqltv-2023-digital-1135x660_1673940857578.jpg',
        'content'=>"Chỉ cần là thành viên Galaxy Cinema, nhận ngay 1 bắp 2 nước! Từ 22.01.2023, Galaxy Cinema mang đến cho các Stars chính sách quà tặng tối ưu nhất từ trước đến nay! Tích lũy điểm thưởng và sử dụng thanh toán vé/ bắp nước. Khách hàng thành viên có sinh nhật trong tháng sẽ được tặng combo 2 - 01 bắp ngọt -2 nước. Đặc biệt hơn nữa, G-Star và X-Star vừa nhận combo vừa có thêm vé mừng sinh nhật.",
        'conditions'=>'Vé sinh nhật có thể sử dụng trong tháng tương ứng. Riêng thành viên sinh tháng 1 có thể đổi quà đến hết ngày 28.02.2023. Quà tặng sinh nhật (combo 2, vé xem phim 2D dành cho thành viên hạng G-Star, X-Star) được thả vào tài khoản thành viên & có giá trị sử dụng hiệu lực trong tháng sinh nhật thành viên. Thành viên phải có ít nhất 1 giao dịch (vé/ bắp nước) với chi tiêu > 0 trong vòng 12 tháng trở lại. Thành viên tiếp tục được tặng vé khi nâng hạng. Số vé tặng hạng thành viên G-Star 02 vé/năm. Khi thành viên G-Star thoả điều kiện nâng hạng thành X-Star, số vé tặng thêm là 02 vé. Tổng số vé tặng hạng thành viên X-Star là 04 vé/năm. Trong mọi trường hợp, quyết định của Galaxy Cinema là quyết định cuối cùng.',
        'status' => 1,
        'user_id'=>'1'
    ]
]);
