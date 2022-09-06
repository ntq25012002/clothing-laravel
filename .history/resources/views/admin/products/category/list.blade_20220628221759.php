@extends ('layouts.main')

@section('content-header-title')
    Danh sách danh mục
@endsection

@section('content')
    <form class="form-inline ml-3" action="{{ route('admin.category.list') }}">
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

    {{-- {{$categories}} --}}
    <form action="{{ route('admin.category.delete-categories') }}" method="post">
        @csrf
        <table class="table table-hover mt-3">
            <thead>
                <tr>
                    <th><input type="checkbox" name="" id="selectAllCheck"></th>
                    <th>Tên danh mục</th>
                    <th>Thời gian tạo</th>
                    <th>Thời gian cập nhật</th>
                    <th>Sửa</th>
                    <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
                @php
                    function categoryTree($data, $parent_id = 0, $level = 0)
                    {
                        $list = [];
                        foreach ($data as $item) {
                            if ($item['parent_id'] == $parent_id) {
                                $item['level'] = $level;
                                $list[] = $item;
                                unset($data[$item['id']]);
                                $child = categoryTree($data, $item['id'], $level + 1);
                                if ($child) {
                                    $list = array_merge($list, $child);
                                }
                            }
                        }
                        return $list;
                    }
                    $listCategory = categoryTree($categories, 0);
                    
                @endphp
                @foreach ($listCategory as $category)
                    <tr>
                        <td>
                            <input type="checkbox" name="ids[]" id="" class="classCheckBox"
                                value="{{ $category['id'] }}" />
                        </td>
                        {{-- <td>{{ $u['id'] }}</td> --}}
                        <td>{{ $category['name'] }}</td>
                        <td>{{ $category['created_at']->format('H:i:s d/m/Y ') }}</td>
                        <td>{{ $category['updated_at']->format('H:i:s d/m/Y ') }}</td>
                        <td>
                            <a href="{{ route('admin.user.edit-form', $category['id']) }}">
                                <i class="fas fa-pen-to-square"></i>
                        </td>
                        </a>
                        <td>
                            <a href="{{ route('admin.user.delete', $category['id']) }}" class="text-danger">
                                <i class="fas fa-trash-can"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
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
