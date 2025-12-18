<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Cảm ơn bạn đã mua hàng của chúng tôi</h1>
    <h2>Đây là tài khoản của bạn:</h2>
    <h3>Email: {{ $email }}</h3>
    <h3>Họ Và Tên: {{ $username }}</h3>
    <h3>Số Điện Thoại: {{ $phone }}</h3>
    <h4>ORDER ID: {{ $order->invoice_id }}</h4>
    <h5>Phương thức thanh toán: {{ $order->payment_method }}</h5>
    <br>
    @if (@$productAccountStores['username'] != null)
        <ul>
            @foreach ($productAccountStores['username'] as $item)
                <li>Tài Khoản:{{ $item }}</li>
            @endforeach
            @foreach ($productAccountStores['password'] as $item)
                <li>Mật Khẩu:{{ $item }}</li>
            @endforeach
        </ul>
    @endif
    <br>
    @if (@$productAccountStores['code'] != null && @$productAccountStores['code'] != '')
        <ul>
            @foreach ($productAccountStores['code'] as $item)
                <li>Mã:{{ $item }}</li>
            @endforeach
        </ul>
    @endif
</body>

</html>
