@extends('layouts.main')

@section('content-header-title')
    <h3>Chi tiết đơn hàng</h3>
@endsection

@section('content')
<form action="" method="post">
    <div class="card">
        <div class="card-header">
            Thông tin khách hàng
        </div>
        <div class="card-body">
            <table>
                <tbody>
                    <tr>
                        <th>Họ tên: </th>
                        <td>{{$order->customer->name}}</td>
                    </tr>
                    <tr>
                        <th>Email: </th>
                        <td>{{$order->customer->email}}</td>
                    </tr>
                    <tr>
                        <th>Số điện thoại: </th>
                        <td>{{$order->customer->phone}}</td>
                    </tr>
                    <tr>
                        <th>Địa chỉ: </th>
                        <td>{{$order->customer->address}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            Thông tin đơn hàng
        </div>
        <div class="card-body">
            <table>
                <tbody>
                    <tr>
                        <th>Mã đơn hàng: </th>
                        <td>{{$order->code}}</td>
                    </tr>
                    <tr>
                        <th>Số lượng sản phẩm: </th>
                        <td>{{$order->amount}}</td>
                    </tr>
                    <tr>
                        <th>Thành tiền: </th>
                        <td>{{$order->total}}</td>
                    </tr>
                    <tr>
                        <th>Trạng thái: </th>
                        <td>
                            <select name="status" class="form-control form-select-control" id="">
                                <option value="0">Đang chờ</option>
                                <option value="1">Đang vận chuyển</option>
                                <option value="2">Đã nhận hàng</option>
                                <option value="3">Đã hủy</option>
                            </select>
                        </td>
                    </tr>
                </tbody>
            </table>

            <table class="table table-striped  mt-3">
                <thead>
                    <tr>
                        <th width="10%">Ảnh </span></th>
                        <th>Sản phẩm <span></span></th>
                        <th>Kích thước <span></span></th>
                        <th>màu sắc <span></span></th>
                        <th>Số lượng </span></th>
                        <th>Giá </th>
                        {{-- <th>Thời gian tạo</th> --}}
                        
                    </tr>
                </thead>
                <tbody>
                @foreach ($products as $pr)
                        <tr>
                            <td width="8%">
                                <img src="{{asset($pr->image)}}" alt="Ảnh sản phẩm" width="100%">
                            </td>
                            <td>
                                <span>{{$pr->name}}</span> 
                            </td>
                            <td>
                                <span>{{$pr->size}}</span> 
                            </td>
                            <td>
                                <div style="background-color:{{$pr->color}}; width:24px;height:24px"></div> 
                            </td>
                            <td>{{$pr->quantity}}</td>
                            <td>
                                <p>{{number_format($pr->price,0,',','.')}} đ</p>
                            </td>
    
                            {{-- <td>{{ $pr['created_at']->format('H:i:s d/m/Y ') }}</td>
                            <td>{{ $pr['updated_at']->format('H:i:s d/m/Y ') }}</td> --}}
                           
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-end mt-3 mb-3">
                <div class="btn btn-primary">Lưu</div>
            </div>
        </div>
    </div>

</form>
@endsection


