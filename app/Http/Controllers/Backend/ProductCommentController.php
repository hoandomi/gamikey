<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\ProductCommentDataTable;
use App\DataTables\ProductReplyCommentDataTable;
use App\Http\Controllers\Controller;
use App\Models\ProductComment;
use App\Models\ProductReplyComment;
use Illuminate\Http\Request;

class ProductCommentController extends Controller
{
    //
    public function allComments(ProductCommentDataTable $dataTables)
    {
        return $dataTables->render('admin.comment.index');
    }

    public function replyComment(ProductReplyCommentDataTable $dataTables)
    {
        return $dataTables->render('admin.comment.reply');
    }

    public function destroyComment($id)
    {
        $comment = ProductComment::findOrFail($id);
        ProductReplyComment::where('product_comment_id', $id)->delete();
        $comment->delete();
        return response(['message' => 'Xóa bình luận thành công', 'status' => 'success'], 200);
    }

    public function destroyReplyComment($id)
    {
        $replyComment = ProductReplyComment::findOrFail($id);
        $replyComment->delete();
        return response(['message' => 'Xóa bình luận thành công', 'status' => 'success'], 200);
    }

    public function changeStatusComment(Request $request)
    {
        $comment = ProductComment::findOrFail($request->id);
        $comment->status = !$comment->status;
        $comment->save();
        return response(['message' => 'Thay đổi trạng thái bình luận thành công', 'status' => 'success'], 200);
    }

    public function changeStatusReplyComment(Request $request)
    {
        $replyComment = ProductReplyComment::findOrFail($request->id);
        $replyComment->status = !$replyComment->status;
        $replyComment->save();
        return response(['message' => 'Thay đổi trạng thái bình luận thành công', 'status' => 'success'], 200);
    }
}
