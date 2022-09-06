{{-- <h3>Thêm sinh viên mới</h3> --}}

@extends('admin.layouts.main')

@section('content-header-title')
    <h3>Thêm vai trò</h3>
@endsection

@section('content')
    <form action="" method="post" enctype="multipart/form-data" class="form">
        @csrf

        <div class="card">
            <div class="card-body">

                @if (session('msg'))
                    <div class="alert alert-success" role="alert">
                        {{ session('msg') }}
                    </div>
                @endif
                {{-- <input class="form-control" type="hidden" name="_token" id="" value="{{ csrf_token() }}"> --}}
                <div class="d-flex">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="">Vai trò</label>
                            <input class="form-control" type="text" name="name" id=""
                                value="{{ old('name') }}">
                            @error('name')
                                <span style="color: tomato">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div>
                            <label for="">Mô tả</label>
                            <textarea name="display_name" class="form-control" id="" cols="30" rows="6"></textarea>
                            @error('display_name')
                                <div style="color: tomato">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <input type="checkbox" name="check_all" id="check_all">
                <label for="check_all">Chọn tất cả</label>
            </div>
        </div>
        @foreach ($permissionParents as $permissionParentItem)
            <div class="card">
                <div class="card-header bg-info bg-gradient">
                    <input type="checkbox" name="check_all" id="check_all{{ $permissionParentItem->id }}"
                        class="check_wrapper">
                    <label class="py-0 mb-0"
                        for="check_all{{ $permissionParentItem->id }}">{{ $permissionParentItem->display_name }}</label>
                </div>
                <div class="card-body d-flex justify-content-start">
                    @foreach ($permissionParentItem->permissions as $permissionChild)
                        <div class="col-md-3 px-0">
                            <input type="checkbox" name="permission_id[]" id="check_item{{ $permissionChild->id }}"
                                class="check_item" value="{{ $permissionChild->id }}">
                            <label for="check_item{{ $permissionChild->id }}">{{ $permissionChild->display_name }}</label>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach

        <div class="d-flex justify-content-end my-3 col-12 px-0">
            <a href="{{ route('admin.user.index') }}" class="btn btn-success mx-3 text-white">Danh sách</a>
            <button type="submit" name="submit" class="btn btn-primary">Thêm vai trò</button>
        </div>
    </form>
@endsection

@section('page-script')
    <script>
        $('.check_wrapper').on('change', function() {
            $(this).parent().parent().find('.check_item').prop('checked', $(this).prop('checked'))
            let checkedItems = $('input[name="permission_id[]"]:checked')
            let isCheckedAll = checkItems.length === checkedItems.length
            $('#check_all').prop('checked',isCheckedAll)
        })
        const checkItems = $('input[name="permission_id[]"]');
        checkItems.on('change', function() {
            let item = this.parentElement.parentElement.querySelectorAll('input[name="permission_id[]"]');
            let checked = this.parentElement.parentElement.querySelectorAll('input[name="permission_id[]"]:checked')
            let isChecked = item.length ===checked.length;

            let checkedItems = $('input[name="permission_id[]"]:checked')
            let isCheckedAll = checkItems.length === checkedItems.length
            $('#check_all').prop('checked',isCheckedAll)

            $(this).parent().parent().parent().find('input[name="check_all').prop('checked', isChecked)
        })

        $('#check_all').on('change', function() {

            checkItems.prop('checked',$(this).prop('checked'));
            $('.check_wrapper').prop('checked',$(this).prop('checked'));

        })
    </script>
@endsection
