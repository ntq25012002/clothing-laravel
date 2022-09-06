<a href="">Thêm mới</a>
<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Họ và tên</th>
            <th>Chuyên Ngành</th>
            <th collapse=2>Action</th>
        </tr>
    </thead>
    <tbody>
        @php print_r($students);
        echo "<pre>";
            foreach ($students as $student) {
                var_dump($student['id']);
                
            }
        @endphp
            <tr>
                @foreach ($students as $student)
                    <td>{{$stuent['id']}}</td>
                    <td>{{$stuent['full_name']}}</td>
                    <td>{{$stuent['major']}}</td>
                    <td> <a href="">Sửa</a> </td>
                    <td> <a href="">Xóa</a> </td>
                @endforeach
            </tr>
    </tbody>
</table>