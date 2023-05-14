<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateSach extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sach', function (Blueprint $table) {
            $table->integer('MaSach',11);
            $table->string('TenSach');
            $table->integer('GiaBan');
            $table->string('MoTa');
            $table->text('AnhBia');
            $table->datetime('NgayCapNhat');
            $table->integer('SoLuongTon');
            $table->integer('MaNXB');
            $table->integer('MaTheLoai');
            $table->integer('MaKM');
            $table->integer('GiaMoi');
            $table->integer('Status');
            $table->integer('Active');
        });

        DB::table('sach')->insert([
            ['MaSach'=>1, 'TenSach'=>'Totto-Chan Bên Cửa Sổ', 'GiaBan'=>98000, 'MoTa'=>'Không còn cách nào khác, mẹ đành đưa Totto-chan đến một ngôi trường mới, trường Tomoe. Đấy là một ngôi trường kỳ lạ, lớp học thì ở trong toa xe điện cũ, học sinh thì được thoả thích thay đổi chỗ ngồi mỗi ngày, muốn học môn nào trước cũng được, chẳng những thế, khi đã học hết bài, các bạn còn được cô giáo cho đi dạo. Đặc biệt hơn ở đó còn có một thầy hiệu trưởng có thể chăm chú lắng nghe Totto-chan kể chuyện suốt bốn tiếng đồng hồ! Chính nhờ ngôi trường đó, một Totto-chan hiếu động, cá biệt đã thu nhận được những điều vô cùng quý giá để lớn lên thành một con người hoàn thiện, mạnh mẽ.', 'AnhBia'=>'sach1.jpg', 'NgayCapNhat'=>'2021-08-27 00:00:00', 'SoLuongTon'=>0, 'MaNXB'=>1, 'MaTheLoai'=>1, 'MaKM'=>1, 'GiaMoi'=>88200, 'Status'=>1, 'Active'=>0],
            ['MaSach'=>2, 'TenSach'=>'Mười Ba Lý Do', 'GiaBan'=>100000, 'MoTa'=>'Là cuốn sách hay', 'AnhBia'=>'sach2.jpg', 'NgayCapNhat'=>'2021-08-27 00:00:00', 'SoLuongTon'=>8, 'MaNXB'=>2, 'MaTheLoai'=>1, 'MaKM'=>1, 'GiaMoi'=>90000, 'Status'=>1, 'Active'=>0],
            ['MaSach'=>3, 'TenSach'=>'Bán Niềm Tin', 'GiaBan'=>168000, 'MoTa'=>'Là cuốn sách hay', 'AnhBia'=>'sach3.jpg', 'NgayCapNhat'=>'2021-08-27 00:00:00', 'SoLuongTon'=>26, 'MaNXB'=>3, 'MaTheLoai'=>1, 'MaKM'=>1, 'GiaMoi'=>151200, 'Status'=>1, 'Active'=>0],
            ['MaSach'=>4, 'TenSach'=>'Cuộc Đời Không Phụ Lòng Người Nỗ Lực', 'GiaBan'=>129000, 'MoTa'=>'Là cuốn sách hay', 'AnhBia'=>'sach4.jpg', 'NgayCapNhat'=>'2021-08-27 00:00:00', 'SoLuongTon'=>15, 'MaNXB'=>2, 'MaTheLoai'=>1, 'MaKM'=>1, 'GiaMoi'=>116100, 'Status'=>1, 'Active'=>0],
            ['MaSach'=>5, 'TenSach'=>'Tạo Dựng Thương Hiệu Cá Nhân', 'GiaBan'=>89000, 'MoTa'=>'Là cuốn sách hay', 'AnhBia'=>'sach5.jpg', 'NgayCapNhat'=>'2021-08-27 00:00:00', 'SoLuongTon'=>10000000, 'MaNXB'=>2, 'MaTheLoai'=>1, 'MaKM'=>1, 'GiaMoi'=>80100, 'Status'=>1, 'Active'=>0],
            ['MaSach'=>6, 'TenSach'=>'Content Đắt Có Bắt Được Trend', 'GiaBan'=>119000, 'MoTa'=>'Là cuốn sách hay', 'AnhBia'=>'sach6.jpg', 'NgayCapNhat'=>'2021-08-27 00:00:00', 'SoLuongTon'=>10000000, 'MaNXB'=>1, 'MaTheLoai'=>2, 'MaKM'=>1, 'GiaMoi'=>107100, 'Status'=>1, 'Active'=>1],
            ['MaSach'=>7, 'TenSach'=>'Yếu Tố Phát Triển Thương Hiệu Bền Vững - Lấy Khách Hàng Làm Trung Tâm', 'GiaBan'=>139000, 'MoTa'=>'Là cuốn sách hay', 'AnhBia'=>'sach7.jpg', 'NgayCapNhat'=>'2021-08-27 00:00:00', 'SoLuongTon'=>10000000, 'MaNXB'=>2, 'MaTheLoai'=>2, 'MaKM'=>1, 'GiaMoi'=>125100, 'Status'=>1, 'Active'=>0],
            ['MaSach'=>8, 'TenSach'=>'Làm Một Người Biết Ơn', 'GiaBan'=>50000, 'MoTa'=>'Là cuốn sách hay', 'AnhBia'=>'s1.jpg', 'NgayCapNhat'=>'2021-08-27 00:00:00', 'SoLuongTon'=>10000000, 'MaNXB'=>3, 'MaTheLoai'=>7, 'MaKM'=>1, 'GiaMoi'=>45000, 'Status'=>1, 'Active'=>0],
            ['MaSach'=>9, 'TenSach'=>'Tôi Là Chế Ngự Đại Vương', 'GiaBan'=>50000, 'MoTa'=>'Là cuốn sách hay', 'AnhBia'=>'s2.jpg', 'NgayCapNhat'=>'2021-08-27 00:00:00', 'SoLuongTon'=>10000000, 'MaNXB'=>3, 'MaTheLoai'=>2, 'MaKM'=>1, 'GiaMoi'=>45000, 'Status'=>1, 'Active'=>0],
            ['MaSach'=>10, 'TenSach'=>'Làm Một Người Bao Dung', 'GiaBan'=>50000, 'MoTa'=>'Là cuốn sách hay', 'AnhBia'=>'s3.jpg', 'NgayCapNhat'=>'2021-08-27 00:00:00', 'SoLuongTon'=>10000000, 'MaNXB'=>3, 'MaTheLoai'=>7, 'MaKM'=>1, 'GiaMoi'=>45000, 'Status'=>1, 'Active'=>0],
            ['MaSach'=>11, 'TenSach'=>'Thói Quen Tốt Theo Tôi Chọn Đời', 'GiaBan'=>50000, 'MoTa'=>'Là cuốn sách hay', 'AnhBia'=>'s4.jpg', 'NgayCapNhat'=>'2021-08-27 00:00:00', 'SoLuongTon'=>10000000, 'MaNXB'=>3, 'MaTheLoai'=>2, 'MaKM'=>1, 'GiaMoi'=>45000, 'Status'=>1, 'Active'=>0],
            ['MaSach'=>12, 'TenSach'=>'Việc Học Không Hề Đáng Sợ', 'GiaBan'=>50000, 'MoTa'=>'Là cuốn sách hay', 'AnhBia'=>'s5.jpg', 'NgayCapNhat'=>'2021-08-27 00:00:00', 'SoLuongTon'=>10000000, 'MaNXB'=>3, 'MaTheLoai'=>7, 'MaKM'=>1, 'GiaMoi'=>45000, 'Status'=>1, 'Active'=>0],
            ['MaSach'=>13, 'TenSach'=>'Cha Mẹ Không Phải Người Đầy Tớ Của Tôi', 'GiaBan'=>50000, 'MoTa'=>'Là cuốn sách hay', 'AnhBia'=>'s6.jpg', 'NgayCapNhat'=>'2021-08-27 00:00:00', 'SoLuongTon'=>10000000, 'MaNXB'=>3, 'MaTheLoai'=>2, 'MaKM'=>1, 'GiaMoi'=>45000, 'Status'=>1, 'Active'=>0],
            ['MaSach'=>14, 'TenSach'=>'Việc Làm Của Mình Tự Mình Làm', 'GiaBan'=>50000, 'MoTa'=>'Là cuốn sách hay', 'AnhBia'=>'s7.jpg', 'NgayCapNhat'=>'2021-08-27 00:00:00', 'SoLuongTon'=>10000000, 'MaNXB'=>3, 'MaTheLoai'=>1, 'MaKM'=>1, 'GiaMoi'=>45000, 'Status'=>1, 'Active'=>0],
            ['MaSach'=>15, 'TenSach'=>'Làm Một Người Trung Thực', 'GiaBan'=>50000, 'MoTa'=>'Là cuốn sách hay', 'AnhBia'=>'s8.jpg', 'NgayCapNhat'=>'2021-08-27 00:00:00', 'SoLuongTon'=>10000000, 'MaNXB'=>3, 'MaTheLoai'=>1, 'MaKM'=>1, 'GiaMoi'=>45000, 'Status'=>1, 'Active'=>0],
            ['MaSach'=>16, 'TenSach'=>'10 Bài Toán Trọng Điểm Hình Học Phẳng Oxy (Phiên Bản Mới Nhất)', 'GiaBan'=>159000, 'MoTa'=>'Là cuốn sách hay', 'AnhBia'=>'evo-2-1.jpg', 'NgayCapNhat'=>'2021-08-27 00:00:00', 'SoLuongTon'=>10000001, 'MaNXB'=>2, 'MaTheLoai'=>5, 'MaKM'=>1, 'GiaMoi'=>143100, 'Status'=>1, 'Active'=>0],
            ['MaSach'=>17, 'TenSach'=>'10 Chuyên Đề Bồi Dưỡng Học Sinh Giỏi Toán 4, 5 - Tập 2', 'GiaBan'=>30000, 'MoTa'=>'Là cuốn sách hay', 'AnhBia'=>'evo-2-2.jpg', 'NgayCapNhat'=>'2021-08-27 00:00:00', 'SoLuongTon'=>10000000, 'MaNXB'=>2, 'MaTheLoai'=>4, 'MaKM'=>1, 'GiaMoi'=>27000, 'Status'=>1, 'Active'=>0],
            ['MaSach'=>18, 'TenSach'=>'100 BÀI PHÂN TÍCH BÌNH GIẢNG BÌNH LUẬN VĂN HỌC', 'GiaBan'=>88000, 'MoTa'=>'Là cuốn sách hay', 'AnhBia'=>'evo-2-3.jpg', 'NgayCapNhat'=>'2021-08-27 00:00:00', 'SoLuongTon'=>9999999, 'MaNXB'=>2, 'MaTheLoai'=>6, 'MaKM'=>1, 'GiaMoi'=>79200, 'Status'=>1, 'Active'=>0],
            ['MaSach'=>19, 'TenSach'=>'100 Bài Tập Làm Văn Mẫu Lớp 5', 'GiaBan'=>38000, 'MoTa'=>'Là cuốn sách hay', 'AnhBia'=>'evo-2-4.jpg', 'NgayCapNhat'=>'2021-08-27 00:00:00', 'SoLuongTon'=>10000000, 'MaNXB'=>2, 'MaTheLoai'=>3, 'MaKM'=>1, 'GiaMoi'=>34200, 'Status'=>1, 'Active'=>0],
            ['MaSach'=>20, 'TenSach'=>'100 Đề Kiểm Tra Địa Lí 6 - 15 Phút - 45 Phút - Học Kì', 'GiaBan'=>60000, 'MoTa'=>'Là cuốn sách hay', 'AnhBia'=>'evo-2-5.jpg', 'NgayCapNhat'=>'2021-08-27 00:00:00', 'SoLuongTon'=>10000000, 'MaNXB'=>2, 'MaTheLoai'=>4, 'MaKM'=>1, 'GiaMoi'=>54000, 'Status'=>1, 'Active'=>0],
            ['MaSach'=>21, 'TenSach'=>'100 Đề Kiểm Tra Địa Lí 7', 'GiaBan'=>69000, 'MoTa'=>'Là cuốn sách hay', 'AnhBia'=>'evo-2-6.jpg', 'NgayCapNhat'=>'2021-08-27 00:00:00', 'SoLuongTon'=>10000000, 'MaNXB'=>2, 'MaTheLoai'=>4, 'MaKM'=>1, 'GiaMoi'=>62100, 'Status'=>1, 'Active'=>0],
            ['MaSach'=>22, 'TenSach'=>'100 Đề Kiểm Tra Học Kỳ Lớp 9 Và Ôn Thi Vào Lớp 10 THPT Môn Toán', 'GiaBan'=>85000, 'MoTa'=>'Là cuốn sách hay', 'AnhBia'=>'evo-2-7.jpg', 'NgayCapNhat'=>'2021-08-27 00:00:00', 'SoLuongTon'=>10000000, 'MaNXB'=>2, 'MaTheLoai'=>4, 'MaKM'=>1, 'GiaMoi'=>76500, 'Status'=>1, 'Active'=>0],
            ['MaSach'=>23, 'TenSach'=>'100 Đề Kiểm Tra Ngữ Văn 10', 'GiaBan'=>75000, 'MoTa'=>'Là cuốn sách hay', 'AnhBia'=>'evo-2-8.jpg', 'NgayCapNhat'=>'2021-08-27 00:00:00', 'SoLuongTon'=>10000000, 'MaNXB'=>2, 'MaTheLoai'=>5, 'MaKM'=>1, 'GiaMoi'=>67500, 'Status'=>1, 'Active'=>0],
            ['MaSach'=>334281778, 'TenSach'=>'Doraemon - Đại Chiến Thuật Côn Trùng', 'GiaBan'=>30000, 'MoTa'=>'Doraemon - Đại Chiến Thuật Côn Trùng\r\n\r\nNhà cung cấp:Nhà Xuất Bản Kim Đồng\r\n\r\nTác giả:Fujiko F Fujio\r\n\r\nNhà xuất bản:NXB Kim Đồng\r\n\r\nHình thức bìa:Bìa Mềm\r\n\r\nCâu chuyện kể về chuyến dã ngoại lí thú trước khi tốt nghiệp Trường đào tạo robot của nhóm bạn Doraemon. Thử thách trong ngày cuối cùng của chuyến đi cũng chính là bài thi tốt nghiệp. Mỗi học sinh phải tự chọn lấy một con robot côn trùng làm bạn đồng hành và tìm đường trở về trước hoàng hôn. Ai về trễ, người đó sẽ bị trượt tốt nghiệp! Liệu nhóm Doraemon có thể vượt qua thử thách này không, chúng ta cùng theo dõi nhé! Đây là phiên bản tranh truyện màu được vẽ lại từ tập phim hoạt hình cùng tên của tác giả Fujiko.F.Fujio.', 'AnhBia'=>'image-195509-1-12294.jpg', 'NgayCapNhat'=>'2021-12-15 10:34:40', 'SoLuongTon'=>97, 'MaNXB'=>1, 'MaTheLoai'=>325257678, 'MaKM'=>377019926, 'GiaMoi'=>30000, 'Status'=>1, 'Active'=>1],
            ['MaSach'=>431327246, 'TenSach'=>'Harry Potter and the Half-Blood Prince', 'GiaBan'=>252000, 'MoTa'=>'Khi cụ Dumbledore đến đường Privet Drive vào một đêm mùa hè để thu thập Harry Potter, bàn tay đũa phép của cụ bị thâm đen và teo lại, nhưng cụ không tiết lộ lý do tại sao. Những bí mật và sự nghi ngờ đang lan rộng khắp thế giới phù thủy, và bản thân Hogwarts cũng không an toàn. Harry tin rằng Malfoy mang Dấu ấn Hắc ám: có một Tử thần Thực tử trong số họ. Harry sẽ cần phép thuật mạnh mẽ và những người bạn thực sự khi khám phá những bí mật đen tối nhất của Voldemort, và cụ Dumbledore chuẩn bị cho cậu bé đối mặt với số phận của mình. Những ấn bản mới này của bộ truyện kinh điển và bán chạy nhất trên toàn thế giới, từng đoạt nhiều giải thưởng này có ngay những chiếc áo khoác mới có thể mua được của Jonny Duddle, với sức hấp dẫn trẻ em rất lớn, để đưa Harry Potter đến với thế hệ độc giả tiếp theo. Đã đến lúc BẬT MAGIC ON.', 'AnhBia'=>'harry-potter-and-the-half-blood-prince.jpg', 'NgayCapNhat'=>'2021-12-15 10:24:09', 'SoLuongTon'=>100, 'MaNXB'=>357429078, 'MaTheLoai'=>480966078, 'MaKM'=>377019926, 'GiaMoi'=>252000, 'Status'=>1, 'Active'=>1],
            ['MaSach'=>503078130, 'TenSach'=>'Doraemon Học Tập - Nhân Chia', 'GiaBan'=>30000, 'MoTa'=>'Doraemon Học Tập - Nhân Chia\r\n\r\nTác giả: Fujiko F Fujio, Kanjiro Kobayashi, Yukihiro Mitani\r\n\r\nKhuôn Khổ: 13x18 cm\r\n\r\nSố trang: 224\r\n\r\nĐịnh dạng: bìa mềm\r\n\r\nNgày phát hành: 20/03/2019\r\n\r\nGIỚI THIỆU TÁC PHẨM\r\nTrẻ em rất thích câu đố và những điều bí ẩn. Đó là vì quá trình suy luận ra kết quả, tức là suy nghĩ \"Vì sao lại thế?\" rất thú vị. Làm toán cũng vậy, nếu nắm bắt được cách suy luận để giải được bài toán thì môn này sẽ trở nên hấp dẫn, lôi cuốn.\r\n\r\nCuốn sách này không đưa ra những lời giải thích một chiều, mà các nhân vật trong truyện sẽ hóa thân thành độc giả, giải đố sai, mang nghi vấn về những vấn đề và đưa ra những lí giải hết sức hồn nhiên... Qua những tình tiết mang đầy chất truyện tranh đó, các em sẽ hiểu vấn đề nhanh và dễ hơn. Ngoài ra tập sách cũng cung cấp đầy đủ những kiến thức cơ bản, nền tảng quan trọng trong bộ môn toán mà các em cần nắm chắc.', 'AnhBia'=>'nhan-chia.jpg', 'NgayCapNhat'=>'2021-12-15 10:34:23', 'SoLuongTon'=>99, 'MaNXB'=>1, 'MaTheLoai'=>325257678, 'MaKM'=>377019926, 'GiaMoi'=>30000, 'Status'=>1, 'Active'=>1],
            ['MaSach'=>612034523, 'TenSach'=>'Harry Potter and the Chamber of Secrets', 'GiaBan'=>252000, 'MoTa'=>'The Triwizard Tournament is to be held at Hogwarts.', 'AnhBia'=>'harry-potter-and-the-chamber-of-secrets.jpg', 'NgayCapNhat'=>'2021-12-15 10:14:58', 'SoLuongTon'=>100, 'MaNXB'=>357429078, 'MaTheLoai'=>480966078, 'MaKM'=>377019926, 'GiaMoi'=>252000, 'Status'=>1, 'Active'=>1],
            ['MaSach'=>613999305, 'TenSach'=>'Harry Potter and the Goblet of Fire (2014)', 'GiaBan'=>252000, 'MoTa'=>'The Triwizard Tournament is to be held at Hogwarts.', 'AnhBia'=>'2-45bbd9f5-d1ba-49f6-80c6-4b3f67b55df3.jpg', 'NgayCapNhat'=>'2021-12-15 10:13:53', 'SoLuongTon'=>100, 'MaNXB'=>357429078, 'MaTheLoai'=>480966078, 'MaKM'=>377019926, 'GiaMoi'=>252000, 'Status'=>1, 'Active'=>1],
            ['MaSach'=>633772850, 'TenSach'=>'Doraemon Học Tập - Điện Năng, Âm Thanh, Ánh Sáng', 'GiaBan'=>30000, 'MoTa'=>'Doraemon Học Tập - Điện Năng, Âm Thanh, Ánh Sáng\r\n\r\nTác giả: Fujiko F Fujio, Hiroshi Murata, Nichinouken\r\nKhuôn Khổ: 13x18 cm\r\nSố trang: 224\r\nĐịnh dạng: bìa mềm\r\nNgày phát hành: 20/03/2019\r\n\r\nGIỚI THIỆU TÁC PHẨM\r\nTrẻ em rất thích câu đố và những điều bí ẩn. Đó là vì quá trình suy luận ra kết quả, tức là suy nghĩ \"Vì sao lại thế?\" rất thú vị. Nếu nắm bắt được cách suy luận thì môn này sẽ trở nên hấp dẫn, lôi cuốn.\r\n\r\nCuốn sách này không đưa ra những lời giải thích một chiều, mà các nhân vật trong truyện sẽ hóa thân thành độc giả, giải đố sai, mang nghi vấn về những vấn đề và đưa ra những lí giải hết sức hồn nhiên... Qua những tình tiết mang đầy chất truyện tranh đó, các em sẽ hiểu vấn đề nhanh và dễ hơn. Ngoài ra tập sách cũng cung cấp đầy đủ những kiến thức cơ bản, nền tảng quan trọng trong bộ môn mà các em cần nắm chắc.', 'AnhBia'=>'dien-nang.jpg', 'NgayCapNhat'=>'2021-12-15 10:34:00', 'SoLuongTon'=>99, 'MaNXB'=>1, 'MaTheLoai'=>325257678, 'MaKM'=>377019926, 'GiaMoi'=>30000, 'Status'=>1, 'Active'=>1],
            ['MaSach'=>794717844, 'TenSach'=>'Harry Potter and the Prisoner of Azkaban', 'GiaBan'=>252000, 'MoTa'=>'Khi Xe buýt Hiệp sĩ lao qua bóng tối và dừng lại trước mặt cậu, đó là khởi đầu cho một năm khác xa thường ở trường Hogwarts dành cho Harry Potter. Sirius Black, kẻ sát nhân hàng loạt đã trốn thoát và là tín đồ của Chúa tể Voldemort, đang chạy trốn - và họ nói rằng hắn ta đang đuổi theo Harry. Trong lớp Bói toán đầu tiên của mình, Giáo sư Trelawney nhìn thấy một điềm báo về cái chết trong lá trà của Harry. Nhưng có lẽ đáng sợ nhất là lũ Dementors đang tuần tra sân trường, với nụ hôn hút hồn của họ. Những ấn bản mới này của bộ truyện kinh điển và bán chạy nhất trên toàn thế giới, từng đoạt nhiều giải thưởng này có ngay những chiếc áo khoác mới có thể mua được của Jonny Duddle, với sức hấp dẫn trẻ em rất lớn, để đưa Harry Potter đến với thế hệ độc giả tiếp theo. Đã đến lúc BẬT MAGIC ON.', 'AnhBia'=>'harry-potte-and-the-prisoner-of-azkaban.jpg', 'NgayCapNhat'=>'2021-12-15 10:08:10', 'SoLuongTon'=>100, 'MaNXB'=>357429078, 'MaTheLoai'=>480966078, 'MaKM'=>377019926, 'GiaMoi'=>252000, 'Status'=>1, 'Active'=>1],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sach');
    }
}
