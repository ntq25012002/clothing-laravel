@extends ('layouts.main')

@section('content-header-title')
    Danh sách sản phẩm
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            @if (session('msg'))
                <div class="alert">
                </div>
            @endif
            <form class="form-inline ml-3" action="{{ route('admin.category.index') }}">
                <div class="form-group">
                    <select name="category" id="" class="form-control-sm form-control form-select">
                        <option value="">Danh mục</option>
                        @foreach ($categories as $cate)
                            <option value="{{ $cate['id'] }}"
                                {{ $cate['id'] == request()->category ? 'selected' : '' }}>
                                {{ str_repeat('--', $cate['level']) . ' ' . $cate['name'] }}
                            </option>
                        @endforeach
                    </select>
                </div>
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

            <form action="{{route('admin.product.delete-products')}}" id="myForm" class="form-delete" method="POST">
                @csrf
                <table class="table table-striped  mt-3">
                    <thead>
                        <tr>
                            <th><input type="checkbox" name="" id="selectAllCheck"></th>
                            {{-- <th>#</th> --}}
                            <th width="10%">Ảnh </span></th>
                            <th>Sản phẩm <span> ({{ $products->count() }})</span></th>
                            <th>Số lượng </span></th>
                            <th>Giá (VNĐ)</th>
                            <th>Danh mục </th>
                            <th>Tags </th>
                            <th>Slug </th>
                            {{-- <th>Thời gian tạo</th> --}}
                            {{-- <th>Thời gian cập nhật</th> --}}
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach ($products as $pr)
                            <tr class="product-{{$pr['id']}}">
                                <td>
                                    <input type="checkbox" name="ids[]" id="" class="classCheckBox"
                                        value="{{ $pr['id'] }}" />
                                </td>
                                {{-- <td>{{$pr['id']}}</td> --}}

                                <td width="8%">
                                    <img src="{{asset($pr['feature_image'])}}" alt="Ảnh sản phẩm" width="100%">
                                </td>
                                <td>
                                    <span class="product-name-{{$pr['id']}}">{{$pr['name']}}</span> 
                                </td>
                                <td>{{$pr['quantity']}}</td>
                                <td>
                                    @if(!empty($pr['promotional_price']))
                                        <p class="mb-0 text-success">
                                            {{number_format($pr['promotional_price'],0,',')}}
                                        </p>
                                        <del class="text-black-50">{{number_format($pr['price'],0,',')}}</del>
                                    @else
                                        <p>{{number_format($pr['price'],0,',','.')}}</p>
                                    @endif
                                </td>
                                <td>{{$pr->category->name}}</td>

                                <td>
                                    @foreach ($pr->tags as $itemTag)
                                        {{-- <span>{{$itemTag->pivot->tag_id}}</span> --}}
                                        <span>{{$itemTag->name . ', '}}</span>
                                    @endforeach
                                </td>
                                <td>{{$pr['slug']}}</td>
                                {{-- <td>{{ $pr['created_at']->format('H:i:s d/m/Y ') }}</td>
                                <td>{{ $pr['updated_at']->format('H:i:s d/m/Y ') }}</td> --}}
                                <td>
                                    <a href="{{ route('admin.product.edit-form', $pr['id']) }}">
                                        <i class="fas fa-pen-to-square"></i>
                                </td>
                                </a>
                                <td>
                                    <a data-url="{{ route('admin.product.delete', $pr['id']) }}" 
                                        class="text-danger btn-delete action-delete" data-id="{{ $pr['id']}}">
                                        <i class="fas fa-trash-can"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                    
                <div class="col-md-12 d-flex justify-content-between">
                    <div data-urlDeleteSelect="{{route('admin.product.delete-products')}}" class=" text-danger px-0 mb-5 submit btn-delete-select" disabled name="submit">Xóa mục đã chọn</div>
                    <div>
                        {{$products->links()}}
                    </div>
                </div>

            </form>
        </div>
    </div>
    
@endsection

@section('page-script')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('dist/js/product/list-product.js') }}"></script>

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
