<h3>Thêm sinh viên mới</h3>
<form action="" method="post" enctype="multipart/form">
    <div>
        <label for="">Full Name</label>
        <input type="text" name="full_name" id="">
        @if (isset( $errName) )
            <div>
                {{ $errName }}
            </div> 
            
        @endif
        
    </div>
    <div>
        <label for="">major</label>
        <input type="text" name="major" id="">
    </div>
    <div>
        <button type="submit" name="submit">Submit</button>
    </div>
</form>