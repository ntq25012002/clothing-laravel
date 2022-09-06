<h3>Thêm sinh viên mới</h3>
<form action="" method="post" enctype="multipart/form">
    <div>
        <label for="">Full Name</label>
        <input type="text" name="full_name" id="">
       
        {{isset($errName)? $errName : 'Không có lỗi về tên'}}
    </div>
    <div>
        <label for="">major</label>
        <input type="text" name="major" id="">
        {{isset($errMajor)? $errMajor : 'Không có lỗi về chuyên môn'}}

    </div>
    <input type="hidden" name="_token" id="" value="{{ csrf_token() }}">
    <div>
        <button type="submit" name="submit">Submit</button>
    </div>
</form>