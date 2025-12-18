<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ProductComment;
use App\Models\ProductReplyComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductCommentController extends Controller
{
    //
    public function getComment(Request $request)
    {
        $comments = ProductComment::with('user', 'replyComments')
            ->where('product_id', $request->product_id)
            ->where('status', 1)
            ->orderBy('created_at', 'desc')
            ->get();

        return response(['comments' => $comments], 200);
    }

    public function create(Request $request)
    {
        $request->validate(
            [
                'rating' => ['required', 'integer', 'min:1', 'max:5'],
                'comment' => ['required', 'string', 'max:1000'],
                'product_id' => ['required', 'exists:products,id'],
            ],
            [
                'rating.required' => 'Vui lòng chọn số sao đánh giá',
                'rating.integer' => 'Số sao đánh giá phải là số nguyên',
                'rating.min' => 'Vui lòng chọn ít nhất 1 sao',
                'rating.max' => 'Tối đa 5 sao',
                'comment.required' => 'Vui lòng nhập bình luận',
                'comment.string' => 'Bình luận phải là chuỗi',
                'comment.max' => 'Bình luận tối đa 1000 ký tự',
                'product_id.required' => 'Không tìm thấy sản phẩm',
                'product_id.exists' => 'Không tìm thấy sản phẩm',
            ],
            [
                'rating' => 'Số sao đánh giá',
                'comment' => 'Bình luận',
                'product_id' => 'Sản phẩm',
            ],
        );

        $comment = new ProductComment();
        $comment->rating = $request->rating;
        $comment->comment = $request->comment;
        $comment->product_id = $request->product_id;
        $comment->user_id = Auth::user()->id;
        // FORMAT Timezone To Asia/Ho_Chi_Minh
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $comment->created_at = date('Y-m-d H:i:s');
        $comment->save();

        return response(['message' => 'Đánh giá của bạn đã được gửi thành công', 'status' => 'success'], 200);
    }

    public function replyComment(Request $request)
    {
        $request->validate(
            [
                'product_id' => ['required', 'exists:products,id'],
                'comment' => ['required', 'string', 'max:1000'],
                'product_comment_id' => ['required', 'exists:product_comments,id'],
            ],
            [
                'comment.required' => 'Vui lòng nhập bình luận',
                'comment.string' => 'Bình luận phải là chuỗi',
                'comment.max' => 'Bình luận tối đa 1000 ký tự',
                'product_comment_id.required' => 'Không tìm thấy bình luận',
                'product_comment_id.exists' => 'Không tìm thấy bình luận',
            ],
            [
                'comment' => 'Bình luận',
                'product_comment_id' => 'Bình luận',
            ],
        );

        $comment = new ProductReplyComment();
        $comment->comment = $request->comment;
        $comment->product_id = $request->product_id;
        $comment->product_comment_id = $request->product_comment_id;
        $comment->user_id = Auth::user()->id;
        // FORMAT Timezone To Asia/Ho_Chi_Minh
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $comment->created_at = date('Y-m-d H:i:s');
        $comment->save();

        return response(['message' => 'Trả lời bình luận thành công', 'status' => 'success'], 200);
    }
}
