<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use DB;
// use Session;
use Symfony\Component\HttpFoundation\Session\Session;

class HomeController extends Controller
{
    public function index()
    {
        // lay sach moi
        $books_new = DB::select('SELECT MaSach,AnhBia,TenSach,GiaBan,GiaMoi,GiamGia
        FROM sach INNER JOIN khuyen_mai ON sach.MaKM = khuyen_mai.MaKM
        WHERE Active = 1 AND Status = 1 ORDER BY NgayCapNhat DESC LIMIT 7');

        // lay danh sach loai tu sanh
        $type_science = DB::select('SELECT MaLoai, TenLoai, cd.MaChuDe
        FROM loai l
        join chu_de cd on l.MaChuDe = cd.MaChuDe
        WHERE cd.MaChuDe = 1 and l.Status = 1 LIMIT 5');

        // lay sach thong tin thuoc tu sach
        $tu_sach = DB::select('SELECT MaSach,AnhBia,TenSach,GiaBan,GiaMoi,GiamGia
        FROM sach s
        JOIN khuyen_mai km on s.MaKM = km.MaKM
        JOIN the_loai tl on s.MaTheLoai = tl.MaTheLoai
        JOIN loai l on tl.MaLoai = l.MaLoai
        Join chu_de cd on l.MaChuDe = cd.MaChuDe
        WHERE cd.MaChuDe = 1 and s.Status = 1 ORDER BY NgayCapNhat DESC LIMIT 8');

        // lay danh sach loai sanh giao khoa
        $type_bookcase = DB::select("SELECT MaLoai, TenLoai, cd.MaChuDe
        FROM loai l
        join chu_de cd on l.MaChuDe = cd.MaChuDe
        WHERE cd.MaChuDe = 2 and l.Status = 1 LIMIT 5");

        $sach_giao_khoa = DB::select("SELECT MaSach,AnhBia,TenSach,GiaBan,GiaMoi,GiamGia
        FROM sach s
        JOIN khuyen_mai km on s.MaKM = km.MaKM
        JOIN the_loai tl on s.MaTheLoai = tl.MaTheLoai
        JOIN loai l on tl.MaLoai = l.MaLoai
        Join chu_de cd on l.MaChuDe = cd.MaChuDe
        WHERE cd.MaChuDe = 2 and s.Status = 1 ORDER BY NgayCapNhat DESC LIMIT 8");
        $data = [];
        $data['title'] = 'Trang chủ';
        $data['books_new'] = $books_new;
        $data['type_science'] = $type_science;
        $data['tu_sach'] = $tu_sach;
        $data['type_bookcase'] = $type_bookcase;
        $data['sach_giao_khoa'] = $sach_giao_khoa;

        return view('clients.home', $data);
    }

    public function contact()
    {
        $data = [];
        $data['title'] = 'Liên hệ';

        return view('clients.contact', $data);
    }

    public function introduction()
    {
        $data = [];
        $data['title'] = 'Giới thiệu';

        return view('clients.introduction', $data);
    }

    public function products()
    {
        $data = [];
        $MaChuDe = request()->MaChuDe;
        $MaLoai = request()->MaLoai;

        $title = 'Sản phẩm';

        //lay nha xuat ban
        $producer = DB::select("SELECT *
        FROM nha_xuat_ban nxb
        WHERE nxb.Status = 1");

        //lay bang gia
        $bang_gia = DB::select("SELECT *
        FROM bang_gia");

        // lay the loai sach
        $category_book = DB::select("SELECT *
        FROM the_loai tl
        where tl.Status = 1");

        // lay chu de
        $theme_book = DB::select("SELECT MaChuDe, TenChuDe
        FROM chu_de cd
        WHERE cd.Status = 1");

        // lay ma nxb
        $query_producer = DB::table('nha_xuat_ban')
            ->select('MaNXB')
            ->where('Status', 1);

        $lstProducer = request()->lstProducer;
        $Gia = request()->Gia;
        $lstCategory = request()->lstCategory;

        if (!empty($lstProducer)) {
            $lst_producer = array_map('intval', explode(' ', $lstProducer));
            $query_producer = $lst_producer;
            $lst_producer = implode("','", $lst_producer);
        }

        if (!empty($Gia)) {
            $MaGia = request()->Gia;
            $query_gia = DB::select("SELECT MocDau,MocCuoi as MocCuoi from bang_gia where MaGia = $MaGia");
            $MocDau = $query_gia[0]->MocDau;
            $MocCuoi = $query_gia[0]->MocCuoi;

            $MocDau = (int)$MocDau;
            $MocCuoi = (int)$MocCuoi;
        }
        //lay chu de
        $query_theme = DB::table('chu_de')
        ->select('MaChuDe')
        ->where('Status', 1);

        //lay loai
        $query_type = DB::table('loai')
        ->select('MaLoai')
        ->where('Status', 1);

        //lay ma the loai
        $query_category = DB::table('the_loai')
            ->select('MaTheLoai')
            ->where('Status', 1);

        if (!empty($lstCategory)) {
            $lst_category = array_map('intval', explode(' ', $lstCategory));
            $query_category = $lst_category;
            $lst_category = implode("','", $lst_category);
        }
        if ($MaLoai) {
            $category_book = DB::select("SELECT *
            FROM the_loai tl
            join loai l on l.MaLoai = tl.MaLoai
            where tl.Status = 1 and l.MaLoai = $MaLoai");

            $type_book = DB::select("SELECT MaLoai, TenLoai, MaChuDe
            FROM loai l
            WHERE l.Status = 1
            and l.MaChude = $MaChuDe");

        } else if (!empty($MaChuDe)) {
            $category_book = DB::select("SELECT *
            FROM the_loai tl
            join loai l on l.MaLoai = tl.MaLoai
            join chu_de cd on l.MaChuDe = cd.MaChuDe
            where tl.Status = 1 and cd.MaChuDe = $MaChuDe");

            $type_book = DB::select("SELECT MaLoai, TenLoai, MaChuDe
            FROM loai l
            WHERE l.Status = 1
            and l.MaChude = $MaChuDe");
        }else{
            $type_book = DB::select("SELECT MaLoai, TenLoai, MaChuDe
            FROM loai l
            WHERE l.Status = 1");
        }
        
        if($MaChuDe){
            $query_theme = [(int)$MaChuDe];
        }

        if($MaLoai){
            $query_type = [(int)$MaLoai];
        }

        if (!empty($_GET['Gia'])) {
            $sach_all = DB::table('sach')
                ->select('MaSach', 'AnhBia', 'TenSach', 'GiaBan', 'GiaMoi', 'GiamGia')
                ->join('khuyen_mai', 'khuyen_mai.MaKM', 'sach.MaKM')
                ->join('the_loai', 'the_loai.MaTheLoai', 'sach.MaTheLoai')
                ->join('nha_xuat_ban', 'nha_xuat_ban.MaNXB', 'sach.MaNXB')
                ->join('loai', 'loai.MaLoai', 'the_loai.MaLoai')
                ->whereBetween('sach.GiaMoi', [$MocDau, $MocCuoi])
                ->where('sach.Status', 1)
                ->whereIn('loai.MaChuDe', $query_theme)
                ->whereIn('loai.MaLoai', $query_type)
                ->whereIn('the_loai.MaTheLoai', $query_category)
                ->whereIn('nha_xuat_ban.MaNXB', $query_producer)
                ->orderBy('NgayCapNhat', 'DESC')
                ->paginate(config('page.page'));
            $sach_all->appends(request()->all());
        } else {
            $sach_all = DB::table('sach')
                ->select('MaSach', 'AnhBia', 'TenSach', 'GiaBan', 'GiaMoi', 'GiamGia')
                ->join('khuyen_mai', 'khuyen_mai.MaKM', 'sach.MaKM')
                ->join('the_loai', 'the_loai.MaTheLoai', 'sach.MaTheLoai')
                ->join('nha_xuat_ban', 'nha_xuat_ban.MaNXB', 'sach.MaNXB')
                ->join('loai', 'loai.MaLoai', 'the_loai.MaLoai')
                ->where('sach.Status', 1)
                ->whereIn('loai.MaChuDe', $query_theme)
                ->whereIn('loai.MaLoai', $query_type)
                ->whereIn('the_loai.MaTheLoai', $query_category)
                ->whereIn('nha_xuat_ban.MaNXB', $query_producer)
                ->orderBy('NgayCapNhat', 'DESC')
                ->paginate(config('page.page'));
            $sach_all->appends(request()->all());
        }
        
        $data['title'] = $title;
        $data['type_book'] = $type_book;
        $data['lstProducer'] = $lstProducer;
        $data['bang_gia'] = $bang_gia;
        $data['theme_book'] = $theme_book;
        $data['MaChuDe'] = $MaChuDe;
        $data['category_book'] = $category_book;
        $data['producer'] = $producer;
        $data['Gia'] = $Gia;
        $data['lstCategory'] = $lstCategory;
        $data['sach_all'] = $sach_all;
        $data['MaLoai'] = $MaLoai;

        return view('clients.products', $data);
    }

    public function products_search(){
        $data = [];
        $title = 'Tìm kiếm';
        $search = request()->search;
        $result = DB::table('sach')
        ->select('MaSach','AnhBia','TenSach','GiaBan','GiaMoi','GiamGia')
        ->join('khuyen_mai', 'khuyen_mai.MaKM', 'sach.MaKM')
        ->where('TenSach', 'LIKE','%'.$search.'%')
        ->orderBy('sach.NgayCapNhat','DESC')
        ->paginate(config('page.page'));
        $result->appends(request()->all());

        $total = DB::select("SELECT count(*) as total
        FROM sach s
        JOIN khuyen_mai km on s.MaKM = km.MaKM
        WHERE TenSach like '%$search%'");

        $data['title'] = $title;
        $data['result'] = $result;
        $data['total'] = $total[0]->total;
        $data['search'] = $search;
        return view('clients.products_search', $data);
    }

    public function products_detail($id){
        $data = [];
        $MaSach = (int)$id;
        $find_sach = DB::table('sach')
        ->select('MaSach','TenSach','AnhBia', 'MoTa','GiaBan','GiaMoi','GiamGia','TenTheLoai','TenLoai','TenChuDe','SoLuongTon','TenNXB')
        ->join('nha_xuat_ban', 'nha_xuat_ban.MaNXB', 'sach.MaNXB')
        ->join('khuyen_mai','khuyen_mai.MaKM', 'sach.MaKM')
        ->join('the_loai', 'the_loai.MaTheLoai', 'sach.MaTheLoai')
        ->join('loai', 'loai.MaLoai', 'the_loai.MaLoai')
        ->join('chu_de', 'chu_de.MaChuDe', 'loai.MaChuDe')
        ->where('sach.MaSach','=', $MaSach)
        ->first();
        
        $book_new = DB::table('sach')
        ->select('MaSach','AnhBia','TenSach','GiaBan','GiaMoi','GiamGia')
        ->join('khuyen_mai', 'khuyen_mai.MaKM', 'sach.MaKM')
        ->where('sach.Active','=', 1)
        ->orderBy('NgayCapNhat', 'DESC')
        ->limit(7)->get();

        $data['title'] = 'Chi tiết sản phẩm';
        $data['sach'] = $find_sach;
        $data['book_new'] = $book_new;
        return view('clients.products_detail',$data);
    }
}
