@extends ('layouts.main')

@section('content-header-title')
    Danh sách sản phẩm
@endsection

@section('content')
    <form class="form-inline ml-3" action="{{ route('admin.category.list') }}">
        {{-- <div class="form-group">
            <select name="category" id="" class="form-control-sm form-control form-select">
                <option value="">--- Tất cả ---</option>
                @foreach ($products as $product)
                    <option value="{{$product['id']}}" {{$product['id'] == $search_product ? 'selected' : ''}}>{{$product['name']}}</option>
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

    <form action="{{route('admin.product.delete-products')}}" method="post">
        @csrf
        <table class="table table-striped  mt-3">
            <thead>
                <tr>
                    <th>#</th>
                    <th><input type="checkbox" name="" id="selectAllCheck"></th>
                    <th>Ảnh </span></th>
                    <th>Sản phẩm <span> ({{ $products->count() }})</span></th>
                    <th>Số lượng </span></th>
                    <th>Giá (VNĐ)</th>
                    <th>Danh mục </th>
                    <th>Tags </th>
                    <th>Slug </th>
                    {{-- <th>Thời gian tạo</th>
                    <th>Thời gian cập nhật</th> --}}
                    <th>Sửa</th>
                    <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
                
                @foreach ($products as $pr)
                    <tr>
                        <td>
                            <input type="checkbox" name="ids[]" id="" class="classCheckBox"
                                value="{{ $pr['id'] }}" />
                        </td>
                        <td>{{$pr['id']}}</td>

                        <td width="8%">
                            <img src="{{asset('storage/product/'.$pr['feature_image'])}}" alt="Ảnh sản phẩm" width="100%">
                        </td>
                        <td>
                            {{$pr['name']}}
                        </td>
                        <td>{{$pr['quantity']}}</td>
                        <td>
                            @if(!empty($pr['promotional_price']))
                                <p class="mb-0 text-success">
                                    {{number_format($pr['promotional_price'],0,',')}}
                                </p>
                                <del class="text-black-50">{{number_format($pr['price'],0,',')}}</del>
                            @else
                                <p>{{number_format($pr['price'],0,',')}}</p>
                            @endif
                        </td>
                        <td>{{$pr->category->name}}</td>

                        <td>
                            @foreach ($pr->tags as $itemTag)
                                {{-- <span>{{$tags['1']}}</span> --}}
                                <span>{{$tags[$itemTag->pivot->tag_id]->name .', '}}</span>
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
                            <a href="{{ route('admin.product.delete', $pr['id']) }}" class="text-danger btn-delete">
                                <i class="fas fa-trash-can"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
            
        <div class="col-md-12 d-flex justify-content-between">
            <button type="submit" class="btn text-danger px-0 mb-5 submit" disabled name="submit">Xóa mục đã chọn</button>
            {{$products->links()}}
        </div>

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
