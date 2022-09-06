<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentContronller extends Controller
{
    public $students;
    public function index() {
        $this->students = [
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
        // return view('list-students',[
        //     'students'=>$students
        // ]);
        return $this->students;
    }

    public function formAddStudent() {

        // return view('form-add-student');
        return view('form-add-student');
    }

    public function __construct() {
        // if(isset($this->submit)) {
        //     return redirect('')
        // }
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
