@extends('layout')
@section('title', 'Danh sách sản phẩm')
@section('content')
    <h1>Trang chỉnh sửa sản phẩm</h1>
    @if(isset($_SESSION['errors']) && isset($_GET['msg']))
        <ul>
            @foreach ($_SESSION['errors'] as $error)
                <li>{{$error}}</li>            
            @endforeach
        </ul>
    @endif
    @if(isset($_SESSION['success']) && isset($_GET['msg']))
        <span>{{$_SESSION['success']}}</span>
    @endif
    <form action="{{route('product/edit/{id}', ['id'=>$product->id])}}" 
    method="post" enctype="multipart/form-data">
        <div>
            <label for="">Tên sản phẩm</label>
            <input type="text" name="name" value="{{$product->name}}" placeholder="Nhập tên sản phẩm">
        </div>
        <div>
            <label for="">Giá sản phẩm</label>
            <input type="text" name="price" value="{{$product->price}}" placeholder="Nhập giá sản phẩm">
        </div>
        <div>
            <label for="">Hình ảnh sản phẩm</label>
            <img src="{{storage($product->image)}}" alt="" width="100px" height="100px">
            <input type="file" name="image">
        </div>
        <div>
            <label for="">Số lượng sản phẩm</label>
            <input type="text" name="quantity" value="{{$product->quantity}}" placeholder="Nhập số lượng sản phẩm">
        </div>
        <div>
            <label for="">Trạng thái sản phẩm</label>4
            <select name="status" id="">
                <option value="1">Còn hoạt động</option>
                <option value="2">Dừng hoạt động</option>
            </select>
        </div>
        <div>
            <button type="submit" name="btnSave" value="save">Gửi</button>
        </div>
    </form>
    <a href="{{route("/product")}}"><button>Quay lại trang chủ</button></a>
@endsection