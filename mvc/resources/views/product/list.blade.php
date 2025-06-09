@extends('layout')
@section('title', 'Danh sách sản phẩm')
@section('content')
    <a href="{{route("product/create")}}"><button>Thêm sản phẩm</button></a>
    <h1>Trang sản phẩm</h1>
    <table>
        <tr>
            <th>Tên sản phẩm</th>
            <th>Giá sản phẩm</th>
            <th>Hình ảnh sản phẩm</th>
            <th>Số lượng sản phẩm</th>
            <th>Trạng thái sản phẩm</th>
            <th>Hành động</th>
        </tr>
        @foreach ($products as $product )
            <tr>
                <td>{{$product->name}}</td>
                <td>{{$product->price}}</td>
                <td>
                    <img src="{{storage($product->image)}}" width="200px" height="300px" alt="">
                </td>
                <td>{{$product->quantity}}</td>
                <td>
                    @if($product->status == 1)
                        <span>Còn hàng</span>
                    @else
                        <span>Hết hàng</span>
                    @endif
                </td>
                <td>
                    <button>Sửa</button>
                    <button>Xóa</button>
                </td>
            </tr>
        @endforeach
    </table>
@endsection