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
        @php var_dump($students);
        @endphp
            <tr>
                <td>{{$students->id}}</td>
                <td>{{$students->full_name}}</td>
                <td>{{$students->major}}</td>
                <td>{{$students->Sửa}}</td>
                <td>{{$students->Xóa}}</td>
            </tr>
    </tbody>
</table>