<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    public function manage()
    {
        $data = [];
        $news = DB::table('bai_viet')
            ->orderBy('id', 'DESC')
            ->get();

        $data['news'] = $news;
        return view('admin.news.manage_new', $data);
    }

    public function create(Request $req)
    {
        $data = [];
        if ($req->method() == "POST") {
            $data['code'] = 200;
            $data['msg'] = 'Thành công';

            $id = time();
            $title = $req->title;
            $content = $req->new_content;
            $Status = (int)$req->Status;
            $created_at = date("Y-m-d H:i:s");
            if ($req->hasFile('image')) {
                $file = $req->image;
                $file_name = $file->getClientOriginalName();
                $Location = 'assets/client/images_new';
                $check_file_name = file_exists(public_path($Location) . '/' . $file_name);
                if (!$check_file_name) {
                    $check = DB::table('bai_viet')
                        ->insert([
                            'id' => $id,
                            'title' => $title,
                            'content' => $content,
                            'image' => $file_name,
                            'created_at' => $created_at,
                            'status' => $Status
                        ]);
                    if ($check) {
                        $file->move(public_path($Location), $file_name);
                    } else {
                        $data['code'] = 500;
                        $data['msg'] = 'Thất bại';
                    }
                } else {
                    $data['code'] = 500;
                    $data['msg'] = 'Tên ảnh đã tồn tại';
                }
            } else {
                $data['code'] = 500;
                $data['msg'] = 'Bạn chưa chọn ảnh bìa';
            }

            $response = response()->json($data);
            return $response;
        }

        return view('admin.news.create_new', $data);
    }

    public function edit(Request $req, $id)
    {
        $data = [];

        if ($req->method() == "POST") {
            $data['code'] = 200;
            $data['msg'] = 'Thành công';

            $title = $req->title;
            $content = $req->new_content;
            $Status = (int)$req->Status;
            $created_at = date("Y-m-d H:i:s");

            $bai_viet = DB::table('bai_viet')
                ->where('id', '=', $id)
                ->first();

            if ($bai_viet) {
                if ($req->hasFile('image')) {
                    $file = $req->image;
                    $file_name = $file->getClientOriginalName();
                    $Location = 'assets/client/images_new';
                    $check_file_name = file_exists(public_path($Location) . '/' . $file_name);

                    $image = $bai_viet->image;
                    $path = public_path($Location) . '/' . $image;
                    if ($check_file_name) {
                        $data['code'] = 500;
                        $data['msg'] = 'Tên ảnh đã tồn tại';
                    } else {
                        $check = DB::table('bai_viet')
                            ->where('id', '=', $id)
                            ->update([
                                'title' => $title,
                                'content' => $content,
                                'image' => $file_name,
                                'created_at' => $created_at,
                                'status' => $Status
                            ]);
                        if ($check) {
                            $file->move(public_path($Location), $file_name);
                            $check_file_name = file_exists($path);
                            if ($check_file_name) {
                                unlink($path);
                            }
                        }
                    }
                } else {
                    DB::table('bai_viet')
                        ->where('id', '=', $id)
                        ->update([
                            'title' => $title,
                            'content' => $content,
                            'created_at' => $created_at,
                            'status' => $Status
                        ]);
                }
            } else {
                $data['code'] = 500;
                $data['msg'] = 'Thất bại';
            }

            $response = response()->json($data);
            return $response;
        }

        $new = DB::table('bai_viet')
            ->where('id', '=', $id)->first();

        $data['new'] = $new;

        return view('admin.news.edit_new', $data);
    }

    public function delete(Request $req)
    {
        $data = [];
        $data['code'] = 200;
        $data['msg'] = 'Thành công';

        $id = $req->id;

        $bai_viet = DB::table('bai_viet')
            ->where('id', '=', $id)
            ->first();
        $Location = 'assets/client/images_new';
        if ($bai_viet) {
            $image = $bai_viet->image;
            $path = public_path($Location) . '/' . $image;

            DB::table('bai_viet')
                ->where('id', '=', $id)
                ->delete();
            $check_file_name = file_exists($path);
            if ($check_file_name) {
                unlink($path);
            }
        } else {
            $data['code'] = 500;
            $data['msg'] = 'Thất bại';
        }

        $response = response()->json($data);
        return $response;
    }

    public function status(Request $req)
    {
        $data = [];
        $data['code'] = 200;
        $data['msg'] = 'Thành công';

        $id = $req->id;
        $supplier = DB::table('bai_viet')
            ->where('id', '=', $id)
            ->first();

        $status = $supplier->status;
        if ($status == 0) {
            $status = 1;
        } else {
            $status = 0;
        }

        DB::table('bai_viet')
            ->where('id', '=', $id)
            ->update([
                'status' => $status
            ]);

        $response = response()->json($data);
        return $response;
    }
    // -------------------- image -------------------------
    public function manage_image()
    {
        $data = [];
        $images = DB::table('anh_bai_viet')
            ->orderBy('id', 'DESC')
            ->get();

        $data['images'] = $images;
        $response = response()->json($data);
        return $response;
    }

    public function add_image(Request $req)
    {
        $data = [];
        $data['code'] = 200;
        $data['msg'] = 'Thành công';
        $id = time();
        $Location = 'assets/client/images_in_new';
        if ($req->hasFile('image')) {
            $file = $req->image;
            $file_name = $file->getClientOriginalName();
            $Location = 'assets/client/images_in_new';
            $path = public_path($Location) . '/' . $file_name;
            $check_file_name = file_exists($path);
            if (!$check_file_name) {
                $check = DB::table('anh_bai_viet')
                    ->insert([
                        'id' => $id,
                        'name_image' => $file_name
                    ]);
                if ($check) {
                    $file->move(public_path($Location), $file_name);
                } else {
                    $data['code'] = 500;
                    $data['msg'] = 'Thất bại';
                }
            } else {
                $data['code'] = 500;
                $data['msg'] = 'Tên ảnh đã tồn tại';
            }
        } else {
            $data['code'] = 500;
            $data['msg'] = 'Bạn chưa chọn ảnh bìa';
        }
        $response = response()->json($data);
        return $response;
    }

    public function delete_image(Request $req)
    {
        $data = [];
        $data['code'] = 200;
        $data['msg'] = 'Thành công';

        $id = $req->id;

        $anh_bai_viet = DB::table('anh_bai_viet')
            ->where('id', '=', $id)
            ->first();
        $Location = 'assets/client/images_in_new';
        if ($anh_bai_viet) {
            $image = $anh_bai_viet->name_image;
            $path = public_path($Location) . '/' . $image;

            DB::table('anh_bai_viet')
                ->where('id', '=', $id)
                ->delete();
            $check_file_name = file_exists($path);
            if ($check_file_name) {
                unlink($path);
            }
        } else {
            $data['code'] = 500;
            $data['msg'] = 'Thất bại';
        }

        $response = response()->json($data);
        return $response;
    }
}
