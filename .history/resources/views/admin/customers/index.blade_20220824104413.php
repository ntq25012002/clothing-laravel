@extends('layouts.main')

@section('content-header-title')
    <h3>Danh sách khách hàng </h3>
@endsection
@section('content')
    
    <div class="card">
        <div class="card-header pl-0 pr-0 pb-0">
            <form class="form-inline ml-3" action="">
                <div class="input-group input-group-sm mx-2">
                    <input class="form-control form-control-navbar" name="phone" type="search" placeholder="Số điện thoại..." aria-label="Search" value="{{request()->phone}}">
                </div>
                <div class="input-group input-group-sm mx-2">
                    <input class="form-control form-control-navbar" name="email" type="search" placeholder="Email" aria-label="Search" value="{{request()->email}}">
                </div>
                <div class="input-group input-group-sm mx-2">
                    <input class="form-control form-control-navbar" name="search_key" type="search" placeholder="Họ tên" aria-label="Search" value="{{request()->search_key}}">
                    <div class="input-group-append">
                        <button class="btn btn-navbar bg-white" type="submit" style="border:1px solid rgb(206, 212, 218);border-left:0;">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-body pt-0">
            <form action="{{ route('admin.customer.delete-customers') }}" method="post">
                @csrf
                <table class="table table-hover mt-3">
                    <thead>
                        <tr>
                            <th><input type="checkbox" name="" id="selectAllCheck"></th>
                            <th>Họ tên</th>
                            <th>Email</th>
                            <th>Số điện thoại</th>
                            <th>Số đơn hàng</th>
                            <th>Địa chỉ</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customers as $customer)
                            <tr>
                                <td>
                                    <input type="checkbox" name="ids[]" id="" class="classCheckBox"
                                        value="{{$customer->id }}" />
                                </td>
                                <td>{{$customer->name }}</td>
                                <td class="text-center">{{$customer->email }}</td>
                                <td class="text-center">{{$customer->phone }}</td>
                                <td>{{$customer->orders->count() }}</td>

                                <td>{{$customer->address }}</td>
                                <td>
                                    <a href="{{ route('admin.customer.edit-form', $customer->id) }}">
                                        <i class="fas fa-pen-to-square"></i>
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('admin.customer.delete', $customer->id) }}" class="text-danger">
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
        </div>
    </div>
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
