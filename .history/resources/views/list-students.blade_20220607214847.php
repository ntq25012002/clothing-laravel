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
        @foreach (student as students)
            <tr>
                <td>{{student->id}}</td>
                <td>{{student->full_name}}</td>
                <td>{{student->major}}</td>
                <td>{{student->Sửa}}</td>
                <td>{{student->Xóa}}</td>
            </tr>
        @endforeach
    </tbody>
</table>