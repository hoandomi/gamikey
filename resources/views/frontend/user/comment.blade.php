@extends('frontend.layouts.master')

@section('content')
    <main>
        <div class="container profile_user my-5">
            <div class="user-items">
                @include('frontend.user.sidebar.sidebar')
                <div class="user-right">
                    <div class="user-right__items">
                        <h1>Lịch sử Bình Luận</h1>
                        <div class="lineX"></div>
                        <div class="oders-search-items">
                            <div class="oders-table-item ">
                                <table class="col-12">
                                    <thead>
                                        <tr>
                                            <th>Thời gian</th>
                                            <th>Bình Luận</th>
                                            <th>Sản phẩm</th>
                                            <th>Rating</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($comments as $comment)
                                            <tr id="order1" class="order">
                                                <td>{{ $comment->created_at }}</td>
                                                <td>{{ $comment->comment }}</td>
                                                <td>{{ $comment->product->name }}</td>
                                                <td>{{ $comment->rating }}</td>
                                            </tr>
                                        @endforeach
                                        @foreach ($commentsReply as $commentReply)
                                            <tr id="order1" class="order">
                                                <td>{{ $comment->created_at }}</td>
                                                <td>{{ $comment->comment }}</td>
                                                <td>{{ $comment->product->name }}</td>
                                                <td>{{ $comment->rating }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
