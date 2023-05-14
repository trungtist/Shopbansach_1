<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class anh_bai_viet extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('anh_bai_viet')->insert([
        //     ['id'=>1645028748, 'name_image'=>'hinh-nen-phong-canh-1.jpg'],
        //     ['id'=>1645034130, 'name_image'=>'273203989_2154362718035042_1197821733344498729_n.jpg']
        // ]);

        // DB::table('bai_viet')->insert([
        //     ['id'=>1645024848, 'title'=>'Ngon quá trời ơi!', 'content'=>'<p style=\"text-align: center; \"><img style=\"width: 336px;\" src=\"https://i.ytimg.com/vi/AuRgsAvVASY/hqdefault.jpg?sqp=-oaymwEcCNACELwBSFXyq4qpAw4IARUAAIhCGAFwAcABBg==&amp;rs=AOn4CLBKHANnFnffxKHEqgtBy5pChXafXg\"></p><p style=\"text-align: center; \"><font color=\"#d63d3d\">Ngon không anh em :)</font></p>', 'image'=>'hinh-nen-phong-canh-1.jpg', 'created_at'=>'2022-02-16', 'status'=>1],
        //     ['id'=>1645032941, 'title'=>'Ngủ ngon anh em ơi!', 'content'=>'<p style=\"text-align: center; \"><img style=\"width: 310px;\" src=\"data:image/jpeg;base64,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\"></p><p style=\"text-align: center; \"><font color=\"#003163\">*** Khuya rồi anh em ngủ ngon đi ***</font></p>', 'image'=>'tai-xuong.jpg', 'created_at'=>'2022-02-21', 'status'=>1],
        //     ['id'=>1645033802, 'title'=>'Nghe nhạc thư giãn!', 'content'=>'<p style=\"text-align: center; \"><iframe frameborder=\"0\" src=\"//www.youtube.com/embed/zvnZEfmJDWo\" width=\"640\" height=\"360\" class=\"note-video-clip\" style=\"font-size: 1rem;\"></iframe></p><p style=\"text-align: center; \">Nghe nhạc để tận hưởng, thư giãn</p><p style=\"text-align: center; \">Đến đây nào!</p>', 'status'=>'hqdefault.png', 'created_at'=>'2022-02-17', 'status'=>1],
        //     ['id'=>1645034180, 'title'=>'Ai hóng đc gì thêm khum!!!', 'content'=>'<p style=\"text-align: center; \"><img style=\"width: 50%;\" src=\"http://127.0.0.1:8000/assets/client/images_in_new/273203989_2154362718035042_1197821733344498729_n.jpg\"></p><p style=\"text-align: center; \"><br></p>', 'image'=>'273203989_2154362718035042_1197821733344498729_n.jpg', 'created_at'=>'2022-02-17', 'status'=>1],
        //     ['id'=>1645292528, 'title'=>'Đặt hàng thành công', 'content'=>'<h2 style=\"text-align: center; \"><font color=\"#b56308\"><span style=\"font-family: &quot;Comic Sans MS&quot;;\">Đặt hàng thành công</span></font></h2><p style=\"text-align: center; \"><img style=\"width: 450px;\" src=\"https://us.123rf.com/450wm/radenmas/radenmas1602/radenmas160200020/52510858-congratulations-celebration-with-fireworks.jpg?ver=6\"></p><h3 style=\"text-align: center; \"><font color=\"#e79439\"><span style=\"font-family: &quot;Comic Sans MS&quot;;\">Chúc mừng bạn có một đơn hàng mới!</span></font>🥳🥳🥳</h3>', 'image'=>'congraturats.png', 'created_at'=>'2022-02-20', 'status'=>0]
        // ]);

        // DB::table('bang_gia')->insert([
        //     ['MaGia'=>1 ,'MocDau'=>0 ,'MocCuoi'=>100000],
        //     ['MaGia'=>2 ,'MocDau'=>100000 ,'MocCuoi'=>200000],
        //     ['MaGia'=>3 ,'MocDau'=>200000 ,'MocCuoi'=>300000],
        //     ['MaGia'=>4 ,'MocDau'=>300000 ,'MocCuoi'=>500000],
        //     ['MaGia'=>5 ,'MocDau'=>500000 ,'MocCuoi'=>1000000],
        //     ['MaGia'=>6 ,'MocDau'=>1000000 ,'MocCuoi'=>5000000],
        // ]);

        // DB::table('chi_tiet_don_hang')->insert([
        //     ['MaDonHang'=>255419916, 'MaSach'=>2, 'SoLuong'=>1, 'DonGia'=>90000],
        //     ['MaDonHang'=>317999085, 'MaSach'=>3, 'SoLuong'=>1, 'DonGia'=>151200],
        //     ['MaDonHang'=>317999085, 'MaSach'=>16, 'SoLuong'=>1, 'DonGia'=>143100],
        //     ['MaDonHang'=>680601536, 'MaSach'=>2, 'SoLuong'=>1, 'DonGia'=>90000],
        //     ['MaDonHang'=>680601536, 'MaSach'=>3, 'SoLuong'=>5, 'DonGia'=>151200],
        //     ['MaDonHang'=>680601536, 'MaSach'=>4, 'SoLuong'=>3, 'DonGia'=>116100],
        //     ['MaDonHang'=>790214152, 'MaSach'=>2, 'SoLuong'=>3, 'DonGia'=>90000],
        //     ['MaDonHang'=>1643890240, 'MaSach'=>431327246, 'SoLuong'=>1, 'DonGia'=>252000],
        //     ['MaDonHang'=>1643890240, 'MaSach'=>612034523, 'SoLuong'=>1, 'DonGia'=>252000],
        //     ['MaDonHang'=>1643892997, 'MaSach'=>612034523, 'SoLuong'=>1, 'DonGia'=>252000],
        //     ['MaDonHang'=>1643892997, 'MaSach'=>613999305, 'SoLuong'=>1, 'DonGia'=>252000],
        //     ['MaDonHang'=>1643892997, 'MaSach'=>794717844, 'SoLuong'=>2, 'DonGia'=>252000],
        //     ['MaDonHang'=>1643893062, 'MaSach'=>613999305, 'SoLuong'=>1, 'DonGia'=>252000],
        //     ['MaDonHang'=>1643893062, 'MaSach'=>794717844, 'SoLuong'=>3, 'DonGia'=>252000],
        //     ['MaDonHang'=>1645292960, 'MaSach'=>18, 'SoLuong'=>1, 'DonGia'=>79200],
        //     ['MaDonHang'=>1645293130, 'MaSach'=>613999305, 'SoLuong'=>1, 'DonGia'=>252000],
        //     ['MaDonHang'=>1645293164, 'MaSach'=>334281778, 'SoLuong'=>1, 'DonGia'=>30000],
        //     ['MaDonHang'=>1645346648, 'MaSach'=>334281778, 'SoLuong'=>2, 'DonGia'=>30000],
        //     ['MaDonHang'=>1645346648, 'MaSach'=>503078130, 'SoLuong'=>1, 'DonGia'=>30000],
        //     ['MaDonHang'=>1645346648, 'MaSach'=>633772850, 'SoLuong'=>1, 'DonGia'=>30000]
        // ]);

        // DB::table('chu_de')->insert([
        //     ['MaChuDe'=>1, 'TenChuDe'=>'Tủ Sách', 'Level'=>1, 'Status'=>1],
        //     ['MaChuDe'=>2, 'TenChuDe'=>'Sách Giao Khoa', 'Level'=>2, 'Status'=>1],
        // ]);

        // DB::table('danh_gia')->insert([
        //     ['MaDG'=>1, 'id_prod'=>1, 'MaND'=>1, 'NoiDung'=>'Mình cũng vừa mua♥', 'NgayDang'=>'2021-12-14 00:00:01', 'type'=>0],
        //     ['MaDG'=>2, 'id_prod'=>1, 'MaND'=>2, 'NoiDung'=>'Sách hay quá♥♥♥', 'NgayDang'=>'2021-12-14 00:00:00', 'type'=>0],
        //     ['MaDG'=>8, 'id_prod'=>2, 'MaND'=>2, 'NoiDung'=>'☻☺', 'NgayDang'=>'2021-12-15 09:28:17', 'type'=>0],
        //     ['MaDG'=>10, 'id_prod'=>3, 'MaND'=>6, 'NoiDung'=>'hay!', 'NgayDang'=>'2021-12-15 09:47:24', 'type'=>0],
        //     ['MaDG'=>1645088866, 'id_prod'=>1, 'MaND'=>1645088866, 'NoiDung'=>'hahah', 'NgayDang'=>'2022-02-17 16:07:46', 'type'=>0]
        // ]);

        // DB::table('don_hang')->insert([
        //     ['MaDonHang'=>255419916, 'DaThanhToan'=>1, 'NgayDat'=>'2021-12-10 17:45:15', 'NgayGiao'=>'0000-00-00', 'DiaChi'=>'Cầu Giấy - Hà Nội', 'PhiGiaoHang'=>25000, 'ThanhTien'=>115000, 'MoTa'=>'abc', 'MaKH'=>688010869, 'tran_code'=>0],
        //     ['MaDonHang'=>317999085, 'DaThanhToan'=>1, 'NgayDat'=>'2021-12-11 10:28:27', 'NgayGiao'=>'2021-12-25', 'DiaChi'=>'Mai Dịch - Cầu giấy - Hà Nội', 'PhiGiaoHang'=>20000, 'ThanhTien'=>314300, 'MoTa'=>'shop chất lượng', 'MaKH'=>688010869, 'tran_code'=>0],
        //     ['MaDonHang'=>680601536, 'DaThanhToan'=>0, 'NgayDat'=>'2021-12-10 19:24:53', 'NgayGiao'=>'0000-00-00', 'DiaChi'=>'Cầu Giấy - Hà Nội', 'PhiGiaoHang'=>25000, 'ThanhTien'=>1219300, 'MoTa'=>'hay lam ban oi', 'MaKH'=>688010869, 'tran_code'=>0],
        //     ['MaDonHang'=>790214152, 'DaThanhToan'=>0, 'NgayDat'=>'2021-12-11 09:31:08', 'NgayGiao'=>NULL, 'DiaChi'=>'Cầu Giấy - Hà Nội', 'PhiGiaoHang'=>25000, 'ThanhTien'=>295000, 'MoTa'=>'hay', 'MaKH'=>688010869, 'tran_code'=>0],
        //     ['MaDonHang'=>1643890240, 'DaThanhToan'=>0, 'NgayDat'=>'2022-02-03 19:10:40', 'NgayGiao'=>NULL, 'DiaChi'=>'Cầu Giấy - Hà Nội', 'PhiGiaoHang'=>25000, 'ThanhTien'=>529000, 'MoTa'=>'mong gui hang som', 'MaKH'=>2, 'tran_code'=>0],
        //     ['MaDonHang'=>1643892997, 'DaThanhToan'=>1, 'NgayDat'=>'2022-02-03 19:56:37', 'NgayGiao'=>'2022-02-09', 'DiaChi'=>'Cầu Giấy - Hà Nội', 'PhiGiaoHang'=>25000, 'ThanhTien'=>1033000, 'MoTa'=>'ok', 'MaKH'=>2, 'tran_code'=>0],
        //     ['MaDonHang'=>1643893062, 'DaThanhToan'=>0, 'NgayDat'=>'2022-02-03 19:57:42', 'NgayGiao'=>NULL, 'DiaChi'=>'Cầu Giấy - Hà Nội', 'PhiGiaoHang'=>25000, 'ThanhTien'=>1033000, 'MoTa'=>NULL, 'MaKH'=>2, 'tran_code'=>0],
        //     ['MaDonHang'=>1645292960, 'DaThanhToan'=>1, 'NgayDat'=>'2022-02-20 00:49:20', 'NgayGiao'=>'2022-02-21', 'DiaChi'=>'Mai Dịch - Cầu giấy - Hà Nội', 'PhiGiaoHang'=>20000, 'ThanhTien'=>99200, 'MoTa'=>NULL, 'MaKH'=>688010869, 'tran_code'=>13691002],
        //     ['MaDonHang'=>1645293130, 'DaThanhToan'=>0, 'NgayDat'=>'2022-02-20 00:52:10', 'NgayGiao'=>NULL, 'DiaChi'=>'vip_1', 'PhiGiaoHang'=>25000, 'ThanhTien'=>277000, 'MoTa'=>NULL, 'MaKH'=>688010869, 'tran_code'=>0],
        //     ['MaDonHang'=>1645293164, 'DaThanhToan'=>2, 'NgayDat'=>'2022-02-20 00:52:44', 'NgayGiao'=>NULL, 'DiaChi'=>'Mai Dịch - Cầu giấy - Hà Nội', 'PhiGiaoHang'=>20000, 'ThanhTien'=>50000, 'MoTa'=>NULL, 'MaKH'=>688010869, 'tran_code'=>0],
        //     ['MaDonHang'=>1645346648, 'DaThanhToan'=>2, 'NgayDat'=>'2022-02-20 15:44:08', 'NgayGiao'=>NULL, 'DiaChi'=>'Mai Dịch - Cầu giấy - Hà Nội', 'PhiGiaoHang'=>20000, 'ThanhTien'=>140000, 'MoTa'=>NULL, 'MaKH'=>688010869, 'tran_code'=>0]
        // ]);

        // DB::table('khach_hang')->insert([
        //     ['MaKH'=>2, 'HoTen'=>'abc', 'Email'=>'lamthatnhanh1113@gmail.com', 'MatKhau'=>'$2y$10$Air05HhMjicVl6EcXMP6JOcnCPmAWm1TnysUr8muJ56QfwRQEWC7a', 'DienThoai'=>'0123456789', 'NgayTao'=>'2022-02-03 15:27:12', 'Status'=>1],
        //     ['MaKH'=>688010869, 'HoTen'=>'Vương Văn Linh', 'Email'=>'lamthatnhanh111@gmail.com', 'MatKhau'=>'$2y$10$8MDJC/3d5tMwRuhUshDoT.Zy4JHZXknJau8drYdIi94y17RWig3fW', 'DienThoai'=>'0352566267', 'NgayTao'=>'2021-12-04 16:57:36', 'Status'=>1]
        // ]);

        // DB::table('khuyen_mai')->insert([
        //     ['MaKM'=>1, 'TenKM'=>'Khuyến mại 10%', 'GiamGia'=>10],
        //     ['MaKM'=>377019926, 'TenKM'=>'Không khuyến mại', 'GiamGia'=>0]
        // ]);

        // DB::table('loai')->insert([
        //     ['MaLoai'=>1, 'TenLoai'=>'Văn Học', 'MaChuDe'=>1, 'Level'=>1, 'Status'=>1],
        //     ['MaLoai'=>2, 'TenLoai'=>'Luật', 'MaChuDe'=>1, 'Level'=>2, 'Status'=>1],
        //     ['MaLoai'=>3, 'TenLoai'=>'Y Học', 'MaChuDe'=>1, 'Level'=>3, 'Status'=>1],
        //     ['MaLoai'=>4, 'TenLoai'=>'Thiêu Nhi', 'MaChuDe'=>1, 'Level'=>4, 'Status'=>1],
        //     ['MaLoai'=>5, 'TenLoai'=>'Sách Khoa Học', 'MaChuDe'=>1, 'Level'=>5, 'Status'=>1],
        //     ['MaLoai'=>6, 'TenLoai'=>'Ngoại Ngữ', 'MaChuDe'=>1, 'Level'=>6, 'Status'=>1],
        //     ['MaLoai'=>7, 'TenLoai'=>'Phụ Nữ', 'MaChuDe'=>1, 'Level'=>7, 'Status'=>1],
        //     ['MaLoai'=>8, 'TenLoai'=>'Tâm Lý - Kỹ Năng Sống', 'MaChuDe'=>1, 'Level'=>8, 'Status'=>1],
        //     ['MaLoai'=>9, 'TenLoai'=>'Nuôi Dạy Con', 'MaChuDe'=>1, 'Level'=>9, 'Status'=>1],
        //     ['MaLoai'=>10, 'TenLoai'=>'Kinh Doanh - Kinh Tế', 'MaChuDe'=>1, 'Level'=>10,'Status'=> 1],
        //     ['MaLoai'=>11, 'TenLoai'=>'Lịch Sử - Địa Lý - Tôn Giáo', 'MaChuDe'=>1, 'Level'=>11,'Status'=> 1],
        //     ['MaLoai'=>12, 'TenLoai'=>'Nấu Ăn - Nuôi Trồng', 'MaChuDe'=>1, 'Level'=>12,'Status'=> 1],
        //     ['MaLoai'=>13, 'TenLoai'=>'Sách Cấp 1', 'MaChuDe'=>2, 'Level'=>1, 'Status'=>1],
        //     ['MaLoai'=>14, 'TenLoai'=>'Sách Cấp 2', 'MaChuDe'=>2, 'Level'=>2, 'Status'=>1],
        //     ['MaLoai'=>15, 'TenLoai'=>'Sách Cấp 3', 'MaChuDe'=>2, 'Level'=>3, 'Status'=>1],
        //     ['MaLoai'=>16, 'TenLoai'=>'Sách Thi Đại Học', 'MaChuDe'=>2, 'Level'=>4, 'Status'=>1],
        //     ['MaLoai'=>17, 'TenLoai'=>'Sách Giáo Viên', 'MaChuDe'=>2, 'Level'=>5, 'Status'=>1],
        //     ['MaLoai'=>18, 'TenLoai'=>'Sách Đại Học', 'MaChuDe'=>2, 'Level'=>6, 'Status'=>1]
        // ]);

        // DB::table('nguoi_danh_gia')->insert([
        //     ['MaND'=>1, 'HoTen'=>'Trung', 'Email'=>'trungtis@gmail.com', 'AnhNen'=>'comment.png'],
        //     ['MaND'=>2, 'HoTen'=>'Linh', 'Email'=>'lamnhanh@gmail.com', 'AnhNen'=>'comment.png'],
        //     ['MaND'=>4, 'HoTen'=>'Linh', 'Email'=>'dfgdf@fdg.com', 'AnhNen'=>'comment4.jpg'],
        //     ['MaND'=>5, 'HoTen'=>'Linh', 'Email'=>'sdfd@dgdfg.com', 'AnhNen'=>'comment1.png'],
        //     ['MaND'=>6, 'HoTen'=>'linh', 'Email'=>'lamthatnhanh111@gmail.com', 'AnhNen'=>'comment4.jpg'],
        //     ['MaND'=>1645085713, 'HoTen'=>'1', 'Email'=>'3534@lsgd.com', 'AnhNen'=>'comment4.jpg'],
        //     ['MaND'=>1645088866, 'HoTen'=>'Văn Linh Vương', 'Email'=>'ssdgds@gmail.com', 'AnhNen'=>'comment5.jpg']
        // ]);

        // DB::table('nha_xuat_ban')->insert([
        //     ['MaNXB'=>1, 'TenNXB'=>'Đinh Tị', 'DiaChi'=>'Hà Nội', 'DienThoai'=>'0123456789', 'Status'=>1],
        //     ['MaNXB'=>2, 'TenNXB'=>'NXB Công Thương', 'DiaChi'=>'Hà Nội', 'DienThoai'=>'0123456789', 'Status'=>1],
        //     ['MaNXB'=>3, 'TenNXB'=>' NXB Đại Học Kinh Tế Quốc Dân', 'DiaChi'=>'Hà Nội', 'DienThoai'=>'0482435322', 'Status'=>1],
        //     ['MaNXB'=>4, 'TenNXB'=>'NXB Đà Nẵng', 'DiaChi'=>'Hà Nội', 'DienThoai'=>'0329392333', 'Status'=>1],
        //     ['MaNXB'=>5, 'TenNXB'=>'NXB Công An Nhân Dân', 'DiaChi'=>'Hà Nội', 'DienThoai'=>'0482435324', 'Status'=>1],
        //     ['MaNXB'=>357429078, 'TenNXB'=>'Macmillan Publishers', 'DiaChi'=>'Ngoài nước', 'DienThoai'=>'0123456789', 'Status'=>1]
        // ]);

        // DB::table('sach')->insert([
        //     ['MaSach'=>1, 'TenSach'=>'Totto-Chan Bên Cửa Sổ', 'GiaBan'=>98000, 'MoTa'=>'Không còn cách nào khác, mẹ đành đưa Totto-chan đến một ngôi trường mới, trường Tomoe. Đấy là một ngôi trường kỳ lạ, lớp học thì ở trong toa xe điện cũ, học sinh thì được thoả thích thay đổi chỗ ngồi mỗi ngày, muốn học môn nào trước cũng được, chẳng những thế, khi đã học hết bài, các bạn còn được cô giáo cho đi dạo. Đặc biệt hơn ở đó còn có một thầy hiệu trưởng có thể chăm chú lắng nghe Totto-chan kể chuyện suốt bốn tiếng đồng hồ! Chính nhờ ngôi trường đó, một Totto-chan hiếu động, cá biệt đã thu nhận được những điều vô cùng quý giá để lớn lên thành một con người hoàn thiện, mạnh mẽ.', 'AnhBia'=>'sach1.jpg', 'NgayCapNhat'=>'2021-08-27 00:00:00', 'SoLuongTon'=>0, 'MaNXB'=>1, 'MaTheLoai'=>1, 'MaKM'=>1, 'GiaMoi'=>88200, 'Status'=>1, 'Active'=>0],
        //     ['MaSach'=>2, 'TenSach'=>'Mười Ba Lý Do', 'GiaBan'=>100000, 'MoTa'=>'Là cuốn sách hay', 'AnhBia'=>'sach2.jpg', 'NgayCapNhat'=>'2021-08-27 00:00:00', 'SoLuongTon'=>8, 'MaNXB'=>2, 'MaTheLoai'=>1, 'MaKM'=>1, 'GiaMoi'=>90000, 'Status'=>1, 'Active'=>0],
        //     ['MaSach'=>3, 'TenSach'=>'Bán Niềm Tin', 'GiaBan'=>168000, 'MoTa'=>'Là cuốn sách hay', 'AnhBia'=>'sach3.jpg', 'NgayCapNhat'=>'2021-08-27 00:00:00', 'SoLuongTon'=>26, 'MaNXB'=>3, 'MaTheLoai'=>1, 'MaKM'=>1, 'GiaMoi'=>151200, 'Status'=>1, 'Active'=>0],
        //     ['MaSach'=>4, 'TenSach'=>'Cuộc Đời Không Phụ Lòng Người Nỗ Lực', 'GiaBan'=>129000, 'MoTa'=>'Là cuốn sách hay', 'AnhBia'=>'sach4.jpg', 'NgayCapNhat'=>'2021-08-27 00:00:00', 'SoLuongTon'=>15, 'MaNXB'=>2, 'MaTheLoai'=>1, 'MaKM'=>1, 'GiaMoi'=>116100, 'Status'=>1, 'Active'=>0],
        //     ['MaSach'=>5, 'TenSach'=>'Tạo Dựng Thương Hiệu Cá Nhân', 'GiaBan'=>89000, 'MoTa'=>'Là cuốn sách hay', 'AnhBia'=>'sach5.jpg', 'NgayCapNhat'=>'2021-08-27 00:00:00', 'SoLuongTon'=>10000000, 'MaNXB'=>2, 'MaTheLoai'=>1, 'MaKM'=>1, 'GiaMoi'=>80100, 'Status'=>1, 'Active'=>0],
        //     ['MaSach'=>6, 'TenSach'=>'Content Đắt Có Bắt Được Trend', 'GiaBan'=>119000, 'MoTa'=>'Là cuốn sách hay', 'AnhBia'=>'sach6.jpg', 'NgayCapNhat'=>'2021-08-27 00:00:00', 'SoLuongTon'=>10000000, 'MaNXB'=>1, 'MaTheLoai'=>2, 'MaKM'=>1, 'GiaMoi'=>107100, 'Status'=>1, 'Active'=>1],
        //     ['MaSach'=>7, 'TenSach'=>'Yếu Tố Phát Triển Thương Hiệu Bền Vững - Lấy Khách Hàng Làm Trung Tâm', 'GiaBan'=>139000, 'MoTa'=>'Là cuốn sách hay', 'AnhBia'=>'sach7.jpg', 'NgayCapNhat'=>'2021-08-27 00:00:00', 'SoLuongTon'=>10000000, 'MaNXB'=>2, 'MaTheLoai'=>2, 'MaKM'=>1, 'GiaMoi'=>125100, 'Status'=>1, 'Active'=>0],
        //     ['MaSach'=>8, 'TenSach'=>'Làm Một Người Biết Ơn', 'GiaBan'=>50000, 'MoTa'=>'Là cuốn sách hay', 'AnhBia'=>'s1.jpg', 'NgayCapNhat'=>'2021-08-27 00:00:00', 'SoLuongTon'=>10000000, 'MaNXB'=>3, 'MaTheLoai'=>7, 'MaKM'=>1, 'GiaMoi'=>45000, 'Status'=>1, 'Active'=>0],
        //     ['MaSach'=>9, 'TenSach'=>'Tôi Là Chế Ngự Đại Vương', 'GiaBan'=>50000, 'MoTa'=>'Là cuốn sách hay', 'AnhBia'=>'s2.jpg', 'NgayCapNhat'=>'2021-08-27 00:00:00', 'SoLuongTon'=>10000000, 'MaNXB'=>3, 'MaTheLoai'=>2, 'MaKM'=>1, 'GiaMoi'=>45000, 'Status'=>1, 'Active'=>0],
        //     ['MaSach'=>10, 'TenSach'=>'Làm Một Người Bao Dung', 'GiaBan'=>50000, 'MoTa'=>'Là cuốn sách hay', 'AnhBia'=>'s3.jpg', 'NgayCapNhat'=>'2021-08-27 00:00:00', 'SoLuongTon'=>10000000, 'MaNXB'=>3, 'MaTheLoai'=>7, 'MaKM'=>1, 'GiaMoi'=>45000, 'Status'=>1, 'Active'=>0],
        //     ['MaSach'=>11, 'TenSach'=>'Thói Quen Tốt Theo Tôi Chọn Đời', 'GiaBan'=>50000, 'MoTa'=>'Là cuốn sách hay', 'AnhBia'=>'s4.jpg', 'NgayCapNhat'=>'2021-08-27 00:00:00', 'SoLuongTon'=>10000000, 'MaNXB'=>3, 'MaTheLoai'=>2, 'MaKM'=>1, 'GiaMoi'=>45000, 'Status'=>1, 'Active'=>0],
        //     ['MaSach'=>12, 'TenSach'=>'Việc Học Không Hề Đáng Sợ', 'GiaBan'=>50000, 'MoTa'=>'Là cuốn sách hay', 'AnhBia'=>'s5.jpg', 'NgayCapNhat'=>'2021-08-27 00:00:00', 'SoLuongTon'=>10000000, 'MaNXB'=>3, 'MaTheLoai'=>7, 'MaKM'=>1, 'GiaMoi'=>45000, 'Status'=>1, 'Active'=>0],
        //     ['MaSach'=>13, 'TenSach'=>'Cha Mẹ Không Phải Người Đầy Tớ Của Tôi', 'GiaBan'=>50000, 'MoTa'=>'Là cuốn sách hay', 'AnhBia'=>'s6.jpg', 'NgayCapNhat'=>'2021-08-27 00:00:00', 'SoLuongTon'=>10000000, 'MaNXB'=>3, 'MaTheLoai'=>2, 'MaKM'=>1, 'GiaMoi'=>45000, 'Status'=>1, 'Active'=>0],
        //     ['MaSach'=>14, 'TenSach'=>'Việc Làm Của Mình Tự Mình Làm', 'GiaBan'=>50000, 'MoTa'=>'Là cuốn sách hay', 'AnhBia'=>'s7.jpg', 'NgayCapNhat'=>'2021-08-27 00:00:00', 'SoLuongTon'=>10000000, 'MaNXB'=>3, 'MaTheLoai'=>1, 'MaKM'=>1, 'GiaMoi'=>45000, 'Status'=>1, 'Active'=>0],
        //     ['MaSach'=>15, 'TenSach'=>'Làm Một Người Trung Thực', 'GiaBan'=>50000, 'MoTa'=>'Là cuốn sách hay', 'AnhBia'=>'s8.jpg', 'NgayCapNhat'=>'2021-08-27 00:00:00', 'SoLuongTon'=>10000000, 'MaNXB'=>3, 'MaTheLoai'=>1, 'MaKM'=>1, 'GiaMoi'=>45000, 'Status'=>1, 'Active'=>0],
        //     ['MaSach'=>16, 'TenSach'=>'10 Bài Toán Trọng Điểm Hình Học Phẳng Oxy (Phiên Bản Mới Nhất)', 'GiaBan'=>159000, 'MoTa'=>'Là cuốn sách hay', 'AnhBia'=>'evo-2-1.jpg', 'NgayCapNhat'=>'2021-08-27 00:00:00', 'SoLuongTon'=>10000001, 'MaNXB'=>2, 'MaTheLoai'=>5, 'MaKM'=>1, 'GiaMoi'=>143100, 'Status'=>1, 'Active'=>0],
        //     ['MaSach'=>17, 'TenSach'=>'10 Chuyên Đề Bồi Dưỡng Học Sinh Giỏi Toán 4, 5 - Tập 2', 'GiaBan'=>30000, 'MoTa'=>'Là cuốn sách hay', 'AnhBia'=>'evo-2-2.jpg', 'NgayCapNhat'=>'2021-08-27 00:00:00', 'SoLuongTon'=>10000000, 'MaNXB'=>2, 'MaTheLoai'=>4, 'MaKM'=>1, 'GiaMoi'=>27000, 'Status'=>1, 'Active'=>0],
        //     ['MaSach'=>18, 'TenSach'=>'100 BÀI PHÂN TÍCH BÌNH GIẢNG BÌNH LUẬN VĂN HỌC', 'GiaBan'=>88000, 'MoTa'=>'Là cuốn sách hay', 'AnhBia'=>'evo-2-3.jpg', 'NgayCapNhat'=>'2021-08-27 00:00:00', 'SoLuongTon'=>9999999, 'MaNXB'=>2, 'MaTheLoai'=>6, 'MaKM'=>1, 'GiaMoi'=>79200, 'Status'=>1, 'Active'=>0],
        //     ['MaSach'=>19, 'TenSach'=>'100 Bài Tập Làm Văn Mẫu Lớp 5', 'GiaBan'=>38000, 'MoTa'=>'Là cuốn sách hay', 'AnhBia'=>'evo-2-4.jpg', 'NgayCapNhat'=>'2021-08-27 00:00:00', 'SoLuongTon'=>10000000, 'MaNXB'=>2, 'MaTheLoai'=>3, 'MaKM'=>1, 'GiaMoi'=>34200, 'Status'=>1, 'Active'=>0],
        //     ['MaSach'=>20, 'TenSach'=>'100 Đề Kiểm Tra Địa Lí 6 - 15 Phút - 45 Phút - Học Kì', 'GiaBan'=>60000, 'MoTa'=>'Là cuốn sách hay', 'AnhBia'=>'evo-2-5.jpg', 'NgayCapNhat'=>'2021-08-27 00:00:00', 'SoLuongTon'=>10000000, 'MaNXB'=>2, 'MaTheLoai'=>4, 'MaKM'=>1, 'GiaMoi'=>54000, 'Status'=>1, 'Active'=>0],
        //     ['MaSach'=>21, 'TenSach'=>'100 Đề Kiểm Tra Địa Lí 7', 'GiaBan'=>69000, 'MoTa'=>'Là cuốn sách hay', 'AnhBia'=>'evo-2-6.jpg', 'NgayCapNhat'=>'2021-08-27 00:00:00', 'SoLuongTon'=>10000000, 'MaNXB'=>2, 'MaTheLoai'=>4, 'MaKM'=>1, 'GiaMoi'=>62100, 'Status'=>1, 'Active'=>0],
        //     ['MaSach'=>22, 'TenSach'=>'100 Đề Kiểm Tra Học Kỳ Lớp 9 Và Ôn Thi Vào Lớp 10 THPT Môn Toán', 'GiaBan'=>85000, 'MoTa'=>'Là cuốn sách hay', 'AnhBia'=>'evo-2-7.jpg', 'NgayCapNhat'=>'2021-08-27 00:00:00', 'SoLuongTon'=>10000000, 'MaNXB'=>2, 'MaTheLoai'=>4, 'MaKM'=>1, 'GiaMoi'=>76500, 'Status'=>1, 'Active'=>0],
        //     ['MaSach'=>23, 'TenSach'=>'100 Đề Kiểm Tra Ngữ Văn 10', 'GiaBan'=>75000, 'MoTa'=>'Là cuốn sách hay', 'AnhBia'=>'evo-2-8.jpg', 'NgayCapNhat'=>'2021-08-27 00:00:00', 'SoLuongTon'=>10000000, 'MaNXB'=>2, 'MaTheLoai'=>5, 'MaKM'=>1, 'GiaMoi'=>67500, 'Status'=>1, 'Active'=>0],
        //     ['MaSach'=>334281778, 'TenSach'=>'Doraemon - Đại Chiến Thuật Côn Trùng', 'GiaBan'=>30000, 'MoTa'=>'Doraemon - Đại Chiến Thuật Côn Trùng\r\n\r\nNhà cung cấp:Nhà Xuất Bản Kim Đồng\r\n\r\nTác giả:Fujiko F Fujio\r\n\r\nNhà xuất bản:NXB Kim Đồng\r\n\r\nHình thức bìa:Bìa Mềm\r\n\r\nCâu chuyện kể về chuyến dã ngoại lí thú trước khi tốt nghiệp Trường đào tạo robot của nhóm bạn Doraemon. Thử thách trong ngày cuối cùng của chuyến đi cũng chính là bài thi tốt nghiệp. Mỗi học sinh phải tự chọn lấy một con robot côn trùng làm bạn đồng hành và tìm đường trở về trước hoàng hôn. Ai về trễ, người đó sẽ bị trượt tốt nghiệp! Liệu nhóm Doraemon có thể vượt qua thử thách này không, chúng ta cùng theo dõi nhé! Đây là phiên bản tranh truyện màu được vẽ lại từ tập phim hoạt hình cùng tên của tác giả Fujiko.F.Fujio.', 'AnhBia'=>'image-195509-1-12294.jpg', 'NgayCapNhat'=>'2021-12-15 10:34:40', 'SoLuongTon'=>97, 'MaNXB'=>1, 'MaTheLoai'=>325257678, 'MaKM'=>377019926, 'GiaMoi'=>30000, 'Status'=>1, 'Active'=>1],
        //     ['MaSach'=>431327246, 'TenSach'=>'Harry Potter and the Half-Blood Prince', 'GiaBan'=>252000, 'MoTa'=>'Khi cụ Dumbledore đến đường Privet Drive vào một đêm mùa hè để thu thập Harry Potter, bàn tay đũa phép của cụ bị thâm đen và teo lại, nhưng cụ không tiết lộ lý do tại sao. Những bí mật và sự nghi ngờ đang lan rộng khắp thế giới phù thủy, và bản thân Hogwarts cũng không an toàn. Harry tin rằng Malfoy mang Dấu ấn Hắc ám: có một Tử thần Thực tử trong số họ. Harry sẽ cần phép thuật mạnh mẽ và những người bạn thực sự khi khám phá những bí mật đen tối nhất của Voldemort, và cụ Dumbledore chuẩn bị cho cậu bé đối mặt với số phận của mình. Những ấn bản mới này của bộ truyện kinh điển và bán chạy nhất trên toàn thế giới, từng đoạt nhiều giải thưởng này có ngay những chiếc áo khoác mới có thể mua được của Jonny Duddle, với sức hấp dẫn trẻ em rất lớn, để đưa Harry Potter đến với thế hệ độc giả tiếp theo. Đã đến lúc BẬT MAGIC ON.', 'AnhBia'=>'harry-potter-and-the-half-blood-prince.jpg', 'NgayCapNhat'=>'2021-12-15 10:24:09', 'SoLuongTon'=>100, 'MaNXB'=>357429078, 'MaTheLoai'=>480966078, 'MaKM'=>377019926, 'GiaMoi'=>252000, 'Status'=>1, 'Active'=>1],
        //     ['MaSach'=>503078130, 'TenSach'=>'Doraemon Học Tập - Nhân Chia', 'GiaBan'=>30000, 'MoTa'=>'Doraemon Học Tập - Nhân Chia\r\n\r\nTác giả: Fujiko F Fujio, Kanjiro Kobayashi, Yukihiro Mitani\r\n\r\nKhuôn Khổ: 13x18 cm\r\n\r\nSố trang: 224\r\n\r\nĐịnh dạng: bìa mềm\r\n\r\nNgày phát hành: 20/03/2019\r\n\r\nGIỚI THIỆU TÁC PHẨM\r\nTrẻ em rất thích câu đố và những điều bí ẩn. Đó là vì quá trình suy luận ra kết quả, tức là suy nghĩ \"Vì sao lại thế?\" rất thú vị. Làm toán cũng vậy, nếu nắm bắt được cách suy luận để giải được bài toán thì môn này sẽ trở nên hấp dẫn, lôi cuốn.\r\n\r\nCuốn sách này không đưa ra những lời giải thích một chiều, mà các nhân vật trong truyện sẽ hóa thân thành độc giả, giải đố sai, mang nghi vấn về những vấn đề và đưa ra những lí giải hết sức hồn nhiên... Qua những tình tiết mang đầy chất truyện tranh đó, các em sẽ hiểu vấn đề nhanh và dễ hơn. Ngoài ra tập sách cũng cung cấp đầy đủ những kiến thức cơ bản, nền tảng quan trọng trong bộ môn toán mà các em cần nắm chắc.', 'AnhBia'=>'nhan-chia.jpg', 'NgayCapNhat'=>'2021-12-15 10:34:23', 'SoLuongTon'=>99, 'MaNXB'=>1, 'MaTheLoai'=>325257678, 'MaKM'=>377019926, 'GiaMoi'=>30000, 'Status'=>1, 'Active'=>1],
        //     ['MaSach'=>612034523, 'TenSach'=>'Harry Potter and the Chamber of Secrets', 'GiaBan'=>252000, 'MoTa'=>'The Triwizard Tournament is to be held at Hogwarts.', 'AnhBia'=>'harry-potter-and-the-chamber-of-secrets.jpg', 'NgayCapNhat'=>'2021-12-15 10:14:58', 'SoLuongTon'=>100, 'MaNXB'=>357429078, 'MaTheLoai'=>480966078, 'MaKM'=>377019926, 'GiaMoi'=>252000, 'Status'=>1, 'Active'=>1],
        //     ['MaSach'=>613999305, 'TenSach'=>'Harry Potter and the Goblet of Fire (2014)', 'GiaBan'=>252000, 'MoTa'=>'The Triwizard Tournament is to be held at Hogwarts.', 'AnhBia'=>'2-45bbd9f5-d1ba-49f6-80c6-4b3f67b55df3.jpg', 'NgayCapNhat'=>'2021-12-15 10:13:53', 'SoLuongTon'=>100, 'MaNXB'=>357429078, 'MaTheLoai'=>480966078, 'MaKM'=>377019926, 'GiaMoi'=>252000, 'Status'=>1, 'Active'=>1],
        //     ['MaSach'=>633772850, 'TenSach'=>'Doraemon Học Tập - Điện Năng, Âm Thanh, Ánh Sáng', 'GiaBan'=>30000, 'MoTa'=>'Doraemon Học Tập - Điện Năng, Âm Thanh, Ánh Sáng\r\n\r\nTác giả: Fujiko F Fujio, Hiroshi Murata, Nichinouken\r\nKhuôn Khổ: 13x18 cm\r\nSố trang: 224\r\nĐịnh dạng: bìa mềm\r\nNgày phát hành: 20/03/2019\r\n\r\nGIỚI THIỆU TÁC PHẨM\r\nTrẻ em rất thích câu đố và những điều bí ẩn. Đó là vì quá trình suy luận ra kết quả, tức là suy nghĩ \"Vì sao lại thế?\" rất thú vị. Nếu nắm bắt được cách suy luận thì môn này sẽ trở nên hấp dẫn, lôi cuốn.\r\n\r\nCuốn sách này không đưa ra những lời giải thích một chiều, mà các nhân vật trong truyện sẽ hóa thân thành độc giả, giải đố sai, mang nghi vấn về những vấn đề và đưa ra những lí giải hết sức hồn nhiên... Qua những tình tiết mang đầy chất truyện tranh đó, các em sẽ hiểu vấn đề nhanh và dễ hơn. Ngoài ra tập sách cũng cung cấp đầy đủ những kiến thức cơ bản, nền tảng quan trọng trong bộ môn mà các em cần nắm chắc.', 'AnhBia'=>'dien-nang.jpg', 'NgayCapNhat'=>'2021-12-15 10:34:00', 'SoLuongTon'=>99, 'MaNXB'=>1, 'MaTheLoai'=>325257678, 'MaKM'=>377019926, 'GiaMoi'=>30000, 'Status'=>1, 'Active'=>1],
        //     ['MaSach'=>794717844, 'TenSach'=>'Harry Potter and the Prisoner of Azkaban', 'GiaBan'=>252000, 'MoTa'=>'Khi Xe buýt Hiệp sĩ lao qua bóng tối và dừng lại trước mặt cậu, đó là khởi đầu cho một năm khác xa thường ở trường Hogwarts dành cho Harry Potter. Sirius Black, kẻ sát nhân hàng loạt đã trốn thoát và là tín đồ của Chúa tể Voldemort, đang chạy trốn - và họ nói rằng hắn ta đang đuổi theo Harry. Trong lớp Bói toán đầu tiên của mình, Giáo sư Trelawney nhìn thấy một điềm báo về cái chết trong lá trà của Harry. Nhưng có lẽ đáng sợ nhất là lũ Dementors đang tuần tra sân trường, với nụ hôn hút hồn của họ. Những ấn bản mới này của bộ truyện kinh điển và bán chạy nhất trên toàn thế giới, từng đoạt nhiều giải thưởng này có ngay những chiếc áo khoác mới có thể mua được của Jonny Duddle, với sức hấp dẫn trẻ em rất lớn, để đưa Harry Potter đến với thế hệ độc giả tiếp theo. Đã đến lúc BẬT MAGIC ON.', 'AnhBia'=>'harry-potte-and-the-prisoner-of-azkaban.jpg', 'NgayCapNhat'=>'2021-12-15 10:08:10', 'SoLuongTon'=>100, 'MaNXB'=>357429078, 'MaTheLoai'=>480966078, 'MaKM'=>377019926, 'GiaMoi'=>252000, 'Status'=>1, 'Active'=>1],
        // ]);

        // DB::table('tac_gia')->insert([
        //     ['MaTacGia'=>1, 'TenTacGia'=>'Nguyễn Văn A', 'DiaChi'=>'Hà Nội', 'TieuSu'=>'Là nhà văn', 'DienThoai'=>'0123456789', 'Status'=>1],
        //     ['MaTacGia'=>2, 'TenTacGia'=>'Nguyễn Văn B', 'DiaChi'=>'Đà Nẵng', 'TieuSu'=>'Là nhà toán học', 'DienThoai'=>'0482435322', 'Status'=>1],            
        // ]);

        // DB::table('tham_gia')->insert([
        //     ['MaSach'=>1, 'MaTacGia'=>1, 'VaiTro'=>'Tác giả a']
        // ]);

        // DB::table('the_loai')->insert([
        //     ['MaTheLoai'=>1, 'TenTheLoai'=>'Truyện Cười', 'MaLoai'=>1, 'Level'=>1, 'Status'=>1],
        //     ['MaTheLoai'=>2, 'TenTheLoai'=>'Truyện Ngắn - Tản Văn', 'MaLoai'=>2, 'Level'=>2, 'Status'=>1],
        //     ['MaTheLoai'=>3, 'TenTheLoai'=>'Lớp 5 - Sách Tham Khảo', 'MaLoai'=>13, 'Level'=>1, 'Status'=>1],
        //     ['MaTheLoai'=>4, 'TenTheLoai'=>'Lớp 9 - Sách Tham Khảo', 'MaLoai'=>14, 'Level'=>2, 'Status'=>1],
        //     ['MaTheLoai'=>5, 'TenTheLoai'=>'Lớp 10 - Sách Tham Khảo', 'MaLoai'=>15, 'Level'=>3, 'Status'=>1],
        //     ['MaTheLoai'=>6, 'TenTheLoai'=>'Lớp 12 - Sách Tham Khảo', 'MaLoai'=>16, 'Level'=>4, 'Status'=>1],
        //     ['MaTheLoai'=>7, 'TenTheLoai'=>'Kiến Thức - Kỹ Năng Sống Cho Trẻ', 'MaLoai'=>8, 'Level'=>3, 'Status'=>1],
        //     ['MaTheLoai'=>325257678, 'TenTheLoai'=>'Manga - Comic', 'MaLoai'=>4, 'Level'=>4, 'Status'=>1],
        //     ['MaTheLoai'=>480966078, 'TenTheLoai'=>'Sách tiếng Anh', 'MaLoai'=>6, 'Level'=>8, 'Status'=>1]
        // ]);
        
        // DB::table('user')->insert([
        //     ['TenDN'=>'admin', 'MatKhau'=>'$2y$10$grSmMYTthyqx1thqeRwA2OWD/ieKEvjWLOe7xtt7nf2vxIwxzpWjq', 'Role'=>1]
        // ]);

        // DB::table('vi_tri_ship')->insert([
        //     ['MaViTri'=>1, 'TenViTri'=>'Cầu Giấy - Hà Nội', 'PhiShip'=>25000, 'Status'=>1],
        //     ['MaViTri'=>2, 'TenViTri'=>'Mai Dịch - Cầu giấy - Hà Nội', 'PhiShip'=>20000, 'Status'=>1],
        //     ['MaViTri'=>1644075428, 'TenViTri'=>'vip_1', 'PhiShip'=>25000, 'Status'=>1]
        // ]);
    }
}
