<h3>Thêm sinh viên mới</h3>
@php
    echo "<pre>";
        var_dump($errors->all());
        echo ($errors-all()[1]);
    echo "</pre>";
        
@endphp
@if (count($errors) > 0)
<div style="color: tomato">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<form action="" method="post" enctype="multipart/form">
    <div>
        <label for="">Full Name</label>
        <input type="text" name="full_name" id="">
        <div style="color: tomato">

        </div>
        {{-- {{isset($errName)? $errName : 'Không có lỗi về tên'}} --}}
    </div>
    <div>
        <label for="">Major</label>
        <input type="text" name="major" id="">
        {{-- {{isset($errMajor)? $errMajor : 'Không có lỗi về chuyên môn'}} --}}
        <div style="color: tomato">

        </div>
    </div>
    <input type="hidden" name="_token" id="" value="{{ csrf_token() }}">
    <div>
        <button type="submit" name="submit">Submit</button>
    </div>
</form>