<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(){
        $data = [];
        
        return view('admin.dashboard');
    }

    public function get_report()
    {
        $data = [];
        $data['code'] = 200;
        $data['msg'] = 'Thành công';

        $doanh_thu = DB::table('don_hang')
                ->select(DB::raw('SUM(ThanhTien) as total_revenue'))
                ->where('DaThanhToan', '=', 1)
                ->get();

        $count_customer = DB::table('khach_hang')->count();

        $count_paid_invoice = DB::table('don_hang')
                ->where('DaThanhToan', '=', 1)
                ->count();

        $count_unpaid_invoice = DB::table('don_hang')
                ->where('DaThanhToan', '=', 0)
                ->count();

        $array = array(
            "total_revenue" => number_format($doanh_thu[0]->total_revenue, 0, ',', '.'),
            "count_customer" => $count_customer,
            "paid_invoice" => $count_paid_invoice,
            "unpaid_invoice" => $count_unpaid_invoice
        );

        $data['report'] = $array;

        $response = response()->json($data);
        return $response;
    }
}
