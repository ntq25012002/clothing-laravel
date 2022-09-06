@extends ('layouts.main')

@section('content-header-title')
    Danh sách danh mục
@endsection

@section('content')
    <form class="form-inline ml-3" action="{{ route('admin.attribute.index') }}">
        {{-- <div class="form-group">
            <select name="role" id="" class="form-control-sm form-control form-select">
                <option value="">--- Tất cả ---</option>
                @foreach ($roles as $role)
                    <option value="{{$role['id']}}" {{$role['id'] == $search_role ? 'selected' : ''}}>{{$role['name']}}</option>
                @endforeach
            </select>
        </div> --}}
        <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" name="search_key" type="search" placeholder="Tìm..."
                aria-label="Search" value="{{ $key ?? '' }}">
            <div class="input-group-append">
                <button class="btn btn-navbar bg-white" type="submit"
                    style="border:1px solid rgb(206, 212, 218);border-left:0;">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </form>
    {{-- {{dd($categories)}} --}}
    <form action="{{ route('admin.attribute.delete-attributes') }}" method="post">
        @csrf
        <table class="table table-hover mt-3">
            <thead>
                <tr>
                    <th><input type="checkbox" name="" id="selectAllCheck"></th>
                    <th>Thuộc tính</th>
                    <th>Giá trị</th>
                    <th>Thời gian tạo</th>
                    <th>Thời gian cập nhật</th>
                    <th>Sửa</th>
                    <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
                @if(count($attrs) > 0)
                    @foreach ($attrs as $attr)
                        <tr>
                            <td>
                                <input type="checkbox" name="ids[]" id="" class="classCheckBox"
                                    value="{{ $attr['id'] }}" />
                            </td>
                            <td>
                                {{$attr->name}}
                            </td>
                            <td>
                                @if ($attr->name == 'color')
                                    <div style="background-color: {{ $attr['value'] }};width:34px;height:34px;"></div>
                                @else  
                                    {{$attr->value}}
                                @endif
                            </td>
                            <td>{{ date('H:i:s d/m/Y ',strtotime($attr['created_at']))}}</td>
                            <td>{{ date('H:i:s d/m/Y ',strtotime($attr['updated_at']))}}</td>
                            <td>
                                <a href="{{ route('admin.attribute.edit', $attr['id']) }}">
                                    <i class="fas fa-pen-to-square"></i>
                            </td>
                            </a>
                            <td>
                                <a href="{{ route('admin.attribute.delete', $attr['id']) }}" class="text-danger btn-delete">
                                    <i class="fas fa-trash-can"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @elseif (count($attrs) <= 0)
                    <tr>
                        <td colspan="7" class="text-primary text-center">Không có thuộc tính nào!</td>
                    </tr>
                @endif
            </tbody>
        </table>
        
        <button type="submit" class="btn text-danger submit" disabled name="submit">Xóa mục đã chọn</button>

    </form>
@endsection

@section('page-script')
    <script>
        const selectAll = document.querySelector('#selectAllCheck');
        const itemsCheckbox = document.querySelectorAll('input[name="ids[]"]');
        const deleteBtn = document.querySelector('.submit');
        const btnDelete = document.querySelectorAll('.btn-delete');
       
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
