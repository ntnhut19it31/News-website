<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TheLoai;
use App\TinTuc;
use App\LoaiTin;
use App\Comment;


class TinTucController extends Controller
{
    public function getDanhSach()
    {
    	$tintuc = TinTuc::orderBy('id','DESC')->get();
        return view('admin.tintuc.danhsach',['tintuc'=> $tintuc]);
    }

    public function getThem()

    {
        
        $theloai = TheLoai::all();
        $loaitin = LoaiTin::all();
    	return view('admin.tintuc.them',['theloai'=> $theloai,'loaitin'=>$loaitin]);
    }

    public function postThem(Request $request)
    {
    	 $this->validate($request,
            [
                'LoaiTin'=> 'required',
                'TieuDe'=>'required|min:3|unique:TinTuc,TieuDe',
                'TomTat'=> 'required',
                'NoiDung'=>'required'
            ],
            [
                'LoaiTin.required'=> 'Bạn chưa chọn loai tin',
                'TieuDe.required'=> 'Bạn chưa nhập tiêu đề ',
                'TieuDe.min'=> 'Tiêu đề phải có ít nhất 3 kí tự',
                'TieuDe.unique'=> 'Tiêu đề đã tồn tại',
                'TomTat.required'=> 'Bạn chưa nhập tóm tắt',
                'NoiDung.required'=> 'Bạn chưa nhập nội dung  '
            ]);
        $tintuc = new TinTuc;
        $tintuc->TieuDe = $request->TieuDe;
        $tintuc->idLoaiTin = $request->LoaiTin;
        $tintuc->TomTat = $request->TomTat;
         $tintuc->NoiDung = $request->NoiDung;
        // $tintuc->NoiBat = $request->NoiBat;
        $tintuc->Hinh = $request->Hinh;
         $tintuc->SoLuotXem = 0;
        // $tintuc->LoaiTin_id= $request->LoaiTin_id;



        if ($request->hasfile('Hinh')) 
        {
            $file = $request->file('Hinh');
            $duoianh = $file->getClientOriginalExtension();
            if( $duoianh !='jpg'&& $duoianh !='png'&& $duoianh !='jpeg')
            {
                return redirect('admin/tintuc/them')->with('loi','Bạn chỉ được chọn file ảnh có đuôi jpg, png, jpeg');

            }
            $name = $file ->getClientOriginalName();
            $Hinh =str_random(4)."_". $name;
            while (file_exists("upload/tintuc/".$Hinh))
            {
               $Hinh =str_random(4)."_". $name;
            }
            $file->move("upload/tintuc",$Hinh);//file mà mình muốn luu
            $tintuc->Hinh = $Hinh;
          
        }
        else
        {
            $tintuc->Hinh= "";

        }
        $tintuc->save();
        return redirect('admin/tintuc/them')->with('thongbao','Bạn đã thêm tin  thành công');

        
        
    }

    public function getSua($id)
    {   
        $theloai = TheLoai::all();
        $loaitin = LoaiTin::all();
        $tintuc = TinTuc::find($id);
    	return view('admin.tintuc.sua',['tintuc'=>$tintuc,'theloai'=>$theloai,'loaitin'=>$loaitin]);
    }

    public function postSua(Request $request,$id)
    {

        $tintuc = TinTuc::find($id);
        $this->validate($request,
            [
                'LoaiTin'=> 'required',
                'TieuDe'=>'required|min:3|unique:TinTuc,TieuDe',
                'TomTat'=> 'required',
                'NoiDung'=>'required'
            ],
            [
                'LoaiTin.required'=> 'Bạn chưa chọn loai tin',
                'TieuDe.required'=> 'Bạn chưa nhập tiêu đề ',
                'TieuDe.min'=> 'Tiêu đề phải có ít nhất 3 kí tự',
                'TieuDe.unique'=> 'Tiêu đề đã tồn tại',
                'TomTat.required'=> 'Bạn chưa nhập tóm tắt',
                'NoiDung.required'=> 'Bạn chưa nhập nội dung  '
            ]);
            $tintuc->TieuDe = $request->TieuDe;
            $tintuc->idLoaiTin = $request->LoaiTin;
            $tintuc->TomTat = $request->TomTat;
            $tintuc->NoiDung = $request->NoiDung;
            // $tintuc->NoiBat = $request->NoiBat;
            $tintuc->Hinh = $request->Hinh;
            
        // $tintuc->LoaiTin_id= $request->LoaiTin_id;



        if ($request->hasfile('Hinh')) 
        {
            $file = $request->file('Hinh');
            $duoianh = $file->getClientOriginalExtension();
            if( $duoianh !='jpg'&& $duoianh !='png'&& $duoianh !='jpeg')
            {
                return redirect('admin/tintuc/them')->with('loi','Bạn chỉ được chọn file ảnh có đuôi jpg, png, jpeg');

            }
            $name = $file ->getClientOriginalName();
            $Hinh =str_random(4)."_". $name;
            while (file_exists("upload/tintuc/".$Hinh))
            {
               $Hinh =str_random(4)."_". $name;
            }
            $file->move("upload/tintuc",$Hinh);
            unlink("upload/tintuc/".$tintuc->Hinh);
            $tintuc->Hinh = $Hinh;
          
        }
        
        $tintuc->save();
        return redirect('admin/tintuc/sua/'.$id)->with('thongbao','Bạn đã sửa thành công');
 
    }
    public function getXoa($id)
    {
        $tintuc= TinTuc::find($id);
        $tintuc->delete();
         return redirect('admin/tintuc/danhsach')->with('thongbao','Bạn đã xóa thành công');
    }
}
