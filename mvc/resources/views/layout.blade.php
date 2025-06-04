<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
</head>
<body>
    <nav>
        <ul>
            <li>Trang sản phẩm</li>
            <li>Trang danh mục</li>
            <li>Trang giảm giá</li>
        </ul>
    </nav>
    <main>
        <div class="container">
            @yield('content')
        </div>
    </main>
    <footer>
        <span>Xuất bản bởi: <strong>Nguyễn Thành Trung</strong></span>
    </footer>
</body>
</html>