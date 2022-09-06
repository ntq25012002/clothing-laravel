@extends('layouts.main')

@section('content-header-title')
    <h3>Danh sách đơn hàng </h3>
@endsection
@section('content')
    <form class="form-inline ml-3" action="{{ route('admin.order.index') }}">
        <div class="form-group">
            {{-- <select name="role" id="" class="form-control-sm form-control form-select">
                <option value="">--- Tất cả ---</option>
                @foreach($roles as $role)
                    <option value="{{$role['id']}}" {{$role['id'] == $search_role ? 'selected' : ''}}>{{$role['name']}}</option>
                @endforeach
            </select> --}}
        </div>
        <div class="input-group input-group-sm mx-2">
            <input class="form-control form-control-navbar" name="search_key" type="search" placeholder="Tìm..." aria-label="Search" value="{{$key ?? ''}}">
            <div class="input-group-append">
                <button class="btn btn-navbar bg-white" type="submit" style="border:1px solid rgb(206, 212, 218);border-left:0;">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </form>

    <form action="{{ route('admin.order.delete-orders') }}" method="post">
        {{-- {{$users}} --}}
        @csrf
        <table class="table table-hover mt-3">
            <thead>
                <tr>
                    <th><input type="checkbox" name="" id="selectAllCheck"></th>
                    {{-- <th>Khách hàng</th> --}}
                    <th>Mã đơn hàng</th>
                    <th>Số lượng sản phẩm</th>
                    <th>Thành tiền</th>
                    <th>Phương thức thanh toán</th>
                    <th>Trạng thái</th>
                    <th>Ghi chú</th>
                    <th>Thời gian đặt</th>
                    <th>Sửa</th>
                    <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>
                            <input type="checkbox" name="ids[]" id="" class="classCheckBox"
                                value="{{$order->id }}" />
                        </td>
                        {{-- <td>{{$order->customer->name }}</td> --}}
                        <td>{{$order->code }}</td>
                        <td>{{$order->amount }}</td>
                        <td>{{number_format($order->total,'0',',','.')}} đ</td>
                        <td class="text-center">
                            @if ($order->payment == 0)
                                <span>COD</span>
                            @elseif ($order->payment == 1)
                                <span>Paypal</span>
                            @elseif ($order->payment == 2)
                                <span>Stripe</span>
                            @elseif ($order->payment == 3)
                                <span>Credit</span>
                            @endif
                        </td>
                        <td>
                            @if ($order->status == 0)
                                <span class="btn btn-warning text-white">Đang chờ</span>
                            @elseif ($order->status == 1)
                                <span class="btn btn-primary">Đang vận chuyển</span>
                            @elseif ($order->status == 2)
                                <span class="btn btn-success">Đã nhận hàng</span>
                            @elseif ($order->status == 3)
                                <span class="btn btn-danger">Đã hủy</span>
                            @endif
                        </td>
                        <td>{{$order->note }}</td>
                        <td>{{date('H:i:s',strtotime($order['created_at']))}}</td>
                        <td>
                            <a href="{{ route('admin.order.edit-form', $order['id']) }}">
                                <i class="fas fa-pen-to-square"></i>
                        </td>
                        </a>
                        <td>
                            <a href="{{ route('admin.order.delete', $order['id']) }}" class="text-danger">
                                <i class="fas fa-trash-can"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <button type="submit" class="btn text-danger submit" disabled name="submit">Xóa mục đã chọn</button>
        {{-- {{ $users->links() }} --}}
    </form>
@endsection


@section('page-script')
    <script>
        const selectAll = document.querySelector('#selectAllCheck');
        const itemsCheckbox = document.querySelectorAll('input[name="ids[]"]');
        const deleteBtn = document.querySelector('.submit');
        itemsCheckbox.forEach(function(item) {
            item.onchange = function() {
                const checked = document.querySelectorAll('input[name="ids[]"]:checked')
                const isCheckedAll = checked.length === itemsCheckbox.length;
                const isDelete = checked.length === 0;
                if (isCheckedAll) {
                    selectAll.checked = isCheckedAll;
                }
                selectAll.checked = isCheckedAll;

                if (isDelete) {
                    deleteBtn.disabled = isDelete;
                }
                deleteBtn.disabled = isDelete;

            }
        })
        selectAll.onchange = function() {
            if (selectAll.checked) {
                deleteBtn.disabled = false;
                itemsCheckbox.forEach(function(item) {
                    item.checked = true;
                })
            } else {
                deleteBtn.disabled = true;

                itemsCheckbox.forEach(function(item) {
                    item.checked = false;
                })
            }
        }
    </script>
@endsection
