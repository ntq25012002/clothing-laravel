@extends('layouts.main')

@section('content-header-title')
    <h3>Danh sách người dùng</h3>
@endsection
@section('content')
    <form class="form-inline ml-3" action="">
        <div class="input-group input-group-sm mx-2">
            <input class="form-control form-control-navbar" name="search_key" type="search" placeholder="Tìm..." aria-label="Search" value="{{$key ?? ''}}">
            <div class="input-group-append">
                <button class="btn btn-navbar bg-white" type="submit" style="border:1px solid rgb(206, 212, 218);border-left:0;">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </form>

    <form action="{{ route('admin.slider.delete-sliders') }}" method="post">
        {{-- {{$users}} --}}
        @csrf
        <table class="table table-hover mt-3">
            <thead>
                <tr>
                    <th><input type="checkbox" name="" id="selectAllCheck"></th>
                    <th>ID</th>
                    {{-- <th>Tên</th> --}}
                    <th>Tiêu đề</th>
                    <th>Mô tả</th>
                    <th>Hình ảnh</th>
                    <th>Thời gian tạo</th>
                    <th>Thời gian cập nhật</th>
                    <th>Sửa</th>
                    <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sliders as $slider)
                    <tr>
                        <td>
                            <input type="checkbox" name="ids[]" id="" class="classCheckBox"
                                value="{{ $slider['id'] }}" />
                        </td>
                        <td>{{ $slider['id'] }}</td>
                        <td>{{ $slider['title'] }}</td>
                        <td>{{ $slider['description'] }}</td>
                        <td style="width:15%">
                            <img src="{{ $slider['image_path'] }}" alt="" style="width:100%">
                        </td>
                       
                        <td>{{ $slider['created_at']->format('H:i:s d/m/Y ') }}</td>
                        <td>{{ $slider['updated_at']->format('H:i:s d/m/Y ') }}</td>
                        <td>
                            <a href="{{ route('admin.slider.edit-form', $slider['id']) }}">
                                <i class="fas fa-pen-to-square"></i>
                        </td>
                        </a>
                        <td>
                            <a href="{{ route('admin.slider.delete', $slider['id']) }}" class="text-danger">
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
