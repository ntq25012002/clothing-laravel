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
        return view('list-students',[
            'students'=>$this->students
        ]);
        // return $this->students;
    }

    public function formAddStudent() {

        // return view('form-add-student');
        return view('form-add-student');
    }

    public function __construct() {
        if(isset($_POST['submit'])) {
            
        }
    }
    public function addStudent() {
        if(isset($_POST['submit'])) {
            
            if($_POST['full_name'] != '' && $_POST['major'] != ''){
                $array = [
                    'id' => 4,
                    'full_name' => $_POST['full_name'],
                    'major' => $_POST['major'],
                ];
                array_push($array,$this->students);
                
                return redirect(route('admin/list-students'));
            }

            // $errName = isset($_POST['full_name']) == '' ? 'Vui lòng nhập đầy đủ họ tên' : ''; 
            // $errMajor = isset($_POST['errMajor']) == '' ? 'Vui lòng nhập chuyên môn' : '';
            // return view('form-add-student', [
            //     'errName' => $errName,
            //     'errMajor' => $errMajor
            // ]);
            
        }
        
    }

    public function getStudent($id) {

    }

    public function updateStudent($id) {

    }

    public function deleteStudent($id) {

    }
}
