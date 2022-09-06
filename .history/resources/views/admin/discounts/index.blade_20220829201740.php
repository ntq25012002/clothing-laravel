@extends('admin.layouts.main')

@section('content-header-title')
    <h3>Danh sách mã giảm giá</h3>
@endsection
@section('content')
    <form class="form-inline" action="">
        <select name="status" id="" class="form-control-sm form-control form-select">
            <option value="">--- Trạng thái ---</option>
            <option value="1" {{request()->status == 1 ? 'selected' : ''}}>Chưa sử dụng</option>
            <option value="2" {{request()->status == 2 ? 'selected' : ''}}>Đã sử dụng</option>
        </select>
        <select name="type" id="" class="form-control-sm form-control form-select  mx-2">
            <option value="">--- Loại ---</option>
            <option value="1" {{request()->type == 1 ? 'selected' : ''}}>Phần trăm</option>
            <option value="2" {{request()->type == 2 ? 'selected' : ''}}>Tiền</option>
        </select>
        <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" name="search_key" type="search" placeholder="Tìm..." aria-label="Search" value="{{request()->search_key}}">
            <div class="input-group-append">
                <button class="btn btn-navbar bg-white" type="submit" style="border:1px solid rgb(206, 212, 218);border-left:0;">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </form>

    <form action="{{ route('admin.discount.delete-discounts') }}" method="post">
        {{-- {{$users}} --}}
        @csrf
        <table class="table table-hover mt-3">
            <thead>
                <tr>
                    <th><input type="checkbox" name="" id="selectAllCheck"></th>
                    <th>ID</th>
                    <th>Mã </th>
                    <th>Loại </th>
                    <th>Giảm giá</th>
                    <th>Trạng thái</th>
                    <th>Thời bắt đầu</th>
                    <th>Thời gian kết thúc</th>
                    <th>Sửa</th>
                    <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($discounts as $discount)
                    <tr>
                        <td>
                            <input type="checkbox" name="ids[]" id="" class="classCheckBox"
                                value="{{ $discount['id'] }}" />
                        </td>
                        <td>{{ $discount['id'] }}</td>
                        <td>{{ $discount['name'] }}</td>
                        <td>
                            @if ($discount['type'] == 1)
                                Phần trăm
                            @elseif ($discount['type'] == 2)
                                Tiền
                            @endif
                        </td>
                        <td>
                            @if ($discount['type'] == 1)
                                {{$discount['value']}} %
                            @elseif ($discount['type'] == 2)
                                {{number_format($discount['value'],'0',',','.')}} đ
                            @endif
                        </td>
                        <td>
                            @if ($discount['status'] == 2)
                                <div class="btn btn-secondary ">Đã sử dụng</div>
                            @elseif ($discount['status'] == 1)
                                <div class="btn btn-info">Chưa sử dụng</div>
                            @endif
                        </td>
                        <td>{{ date('H:i:s d/m/Y ',strtotime($discount->time_start)) }}</td>
                        <td>{{ date('H:i:s d/m/Y ',strtotime($discount->time_end)) }}</td>
                        <td>
                            <a href="{{ route('admin.discount.edit-form', $discount['id']) }}">
                                <i class="fas fa-pen-to-square"></i>
                        </td>
                        </a>
                        <td>
                            <a href="{{ route('admin.discount.delete', $discount['id']) }}" class="text-danger">
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
