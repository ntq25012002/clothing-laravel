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
            foreach ($students as $student) {
                echo $student->id . ' - '. $student->name;
            }
        @endphp
            <tr>
                
                <td> <a href="">Sửa</a> </td>
                <td> <a href="">Xóa</a> </td>
            </tr>
    </tbody>
</table>