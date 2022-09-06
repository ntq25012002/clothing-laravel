@extends('layouts.main')

@section('content-header-title')
    <h3>Chi tiết đơn hàng</h3>
@endsection

@section('content')

    <div class="card">
        <div class="card-header">
            Thông tin khách hàng
        </div>
        <div class="card-body">
            <table>
                <tbody>
                    <tr>
                        <th>Họ tên: </th>
                        <td>{{$customer->name}}</td>
                    </tr>
                    <tr>
                        <th>Email: </th>
                        <td>{{$customer->email}}</td>
                    </tr>
                    <tr>
                        <th>Số điện thoại: </th>
                        <td>{{$customer->phone}}</td>
                    </tr>
                    <tr>
                        <th>Địa chỉ: </th>
                        <td>{{$customer->address}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

@endsection


