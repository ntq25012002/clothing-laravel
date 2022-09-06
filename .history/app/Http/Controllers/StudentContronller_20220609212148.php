<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentContronller extends Controller
{
    public function index() {
        $students = [
            [
                'id' => 1,
                'full_name'=>"Nguyễn Trung Quân",
                'major'=>"Lập trình website",
            ],
            [
                'id' => 2,
                'full_name'=>"Nguyễn Văn A",
                'major'=>"Lập trình mobile",
            ],
            [
                'id' => 3,
                'full_name'=>"Đỗ Đức B",
                'major'=>"Marketing",
            ],
        ];
        return view('list-students',[
            'students'=>$students
        ]);
    }

    public function formAddStudent() {

        return view('form-add-student',[
            'title'=>'Form thêm mới '
        ]);
    }

    public function addStudent() {

        return 'Thêm mới thành công !';
    }

    public function getStudent($id) {

    }

    public function updateStudent($id) {

    }

    public function deleteStudent($id) {

    }
}
