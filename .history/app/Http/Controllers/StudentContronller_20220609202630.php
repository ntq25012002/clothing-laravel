<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentContronller extends Controller
{
    public function index() {
        $students = [
            [
                'id' => 1,
                'name'=>"Nguyễn Trung Quân",
                'major'=>"Lập trình website",
            ],
            [
                'id' => 2,
                'name'=>"Nguyễn Văn A",
                'major'=>"Lập trình mobile",
            ],
            [
                'id' => 3,
                'name'=>"Đỗ Đức B",
                'major'=>"Marketing",
            ],
        ];
        
        return view('list-students',[
            'students'=>$students
        ]);
    }

    public function formAddStudent() {

    }

    public function addStudent() {

    }

    public function getStudent($id) {

    }

    public function updateStudent($id) {

    }

    public function deleteStudent($id) {

    }
}
