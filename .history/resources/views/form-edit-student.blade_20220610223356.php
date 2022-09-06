<h3>Sửa sinh viên có id = {{ $student['id'] }}</h3>
<form action="" method="post" enctype="multipart/form">
    <div>
        <label for="">Full Name</label>
        <input type="text" name="full_name" id="" value="{{ $student['full_name'] }}">
    </div>
    <div>
        <label for="">major</label>
        <input type="text" name="major" id="" value="{{$student['major'] }}">
    </div>
    <input type="hidden" name="_token" id="" value="{{ csrf_token() }}">
    <div>
        <button type="submit" name="submit">Submit</button>
    </div>
</form>