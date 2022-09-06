@extends('layouts.main')

@section('content-header-title')
    <h3>Danh sách người dùng</h3>
@endsection
@section('content')
    <form class="form-inline ml-3" action="{{ route('admin.user.list') }}">
        <div class="form-group">
            <select name="role" id="" class="form-control-sm form-control form-select">
                <option value="">--- Tất cả ---</option>
                @foreach($roles as $role)
                    <option value="{{$role['id']}}" {{$role['id'] == $search_role ? 'selected' : ''}}>{{$role['name']}}</option>
                @endforeach
            </select>
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

    <form action="{{ route('admin.user.delete-users') }}" method="post">
        @csrf
        
        <table class="table table-hover mt-3">
            <thead>
                <tr>
                    <th><input type="checkbox" name="" id="selectAllCheck"></th>
                    {{-- <th>ID</th> --}}
                    <th>Avatar</th>
                    <th><span>Họ và tên</span> <i class="fa-regular fa-arrow-down-arrow-up"></i></th>
                    <th>Email</th>
                    <th>Giới tính</th>
                    <th>Quyền</th>
                    <th>Thời gian tạo</th>
                    <th>Thời gian cập nhật</th>
                    <th>Sửa</th>
                    <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $u)
                    <tr>
                        <td>
                            <input type="checkbox" name="ids[]" id="" class="classCheckBox"
                                value="{{ $u['id'] }}" />
                        </td>
                        {{-- <td>{{ $u['id'] }}</td> --}}
                        <td style="width:5%">
                            <img src="{{ asset('uploads/images/' . $u['avatar']) }}" alt="" style="width:100%">
                        </td>
                        <td>{{ $u['fullname'] }}</td>
                        <td>{{ $u['email'] }}</td>
                        <td>
                            @if($u['gender'] == 2) 
                                <span>Nam</span>
                            @elseif($u['gender'] == 1) 
                                <span>Nữ</span>
                            @else
                                <span>Khác</span>
                            @endif
                        </td>
                        <td>
                            {{ $u['role_id'] == 2 ? 'Quản trị' : 'Khách hàng' }}
                        </td>
                        <td>{{ $u['created_at']->format('H:i:s d/m/Y ') }}</td>
                        <td>{{ $u['updated_at']->format('H:i:s d/m/Y ') }}</td>
                        <td>
                            <a href="{{ route('admin.user.edit-form', $u['id']) }}">
                                <i class="fas fa-pen-to-square"></i>
                        </td>
                        </a>
                        <td>
                            <a href="{{ route('admin.user.delete', $u['id']) }}" class="text-danger">
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
