<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\TinTuc;
use App\Comment;

class CommentController extends Controller
{
    //

    public function getDanhSach(){
    	$comment = Comment::all();
    	return view('admin.comment.danhsach',['comment'=>$comment]);
    }

    public function getXoa($id,$idTinTuc){
    	$comment = Comment::find($id);
    	$comment->delete();
    	return redirect('admin/tintuc/sua/'.$idTinTuc)->with('message','Xóa Bình Luận Thành Công!');
    }

    public function Them($article_id,Request $request){
        $this->validate($request,
            [
                'content' => 'required'
            ],
            [
                'content.required' => 'Bạn chưa nhập nội dung'
            ]);
        $tintuc = TinTuc::find($article_id);
        $comment = new Comment;
        $comment->idUser = Auth::user()->id;
        $comment->idTinTuc = $article_id;
        $comment->NoiDung = $request->content;
        $comment->save();

        return redirect('tin-tuc/'.$tintuc->TieuDeKhongDau.'.html')->with('message','Bình Luận đã được đăng!');
    }
}
