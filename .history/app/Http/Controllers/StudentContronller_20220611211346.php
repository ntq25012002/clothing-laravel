<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentContronller extends Controller
{
    public $students = [
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
        return view('admin.form-add-student');
    }


    public function __construct() {
        if(isset($_POST['submit'])) {
            if($_POST['full_name'] != '' && $_POST['major'] != ''){
                $array = [
                    'id' => 4,
                    'full_name' => $_POST['full_name'],
                    'major' => $_POST['major'],
                ];
                $this->students[] = $array;
                // array_push($array,$this->students);
                return$this->students;
                // return redirect(route('list-students'));
                // return $this->students;
            }

            $errName = isset($_POST['full_name']) == '' ? 'Vui lòng nhập đầy đủ họ tên' : ''; 
            $errMajor = isset($_POST['major']) == '' ? 'Vui lòng nhập chuyên môn' : '';
            return view('admin.form-add-student', [
                'errName' => $errName,
                'errMajor' => $errMajor
            ]);
            // return redirect(route('formAddStudent'));

            // return $this->students ;
        }
    }
    
    // public function addStudent(Request $request) {
    //     if(isset($_POST['submit'])) {
    //         $errName = '';
    //         $errMajor = '';
            
    //         if($_POST['full_name'] != '' && $_POST['major'] != ''){
    //             $array = [
    //                 'id' => 4,
    //                 'full_name' => $_POST['full_name'],
    //                 'major' => $_POST['major'],
    //             ];
    //             $this->students[] = $array;
    //             // array_push($array,$this->students);
    //             return$this->students;
    //             // return redirect(route('list-students'));
    //             // return $this->students;
    //         }

    //         $errName = isset($_POST['full_name']) == '' ? 'Vui lòng nhập đầy đủ họ tên' : ''; 
    //         $errMajor = isset($_POST['major']) == '' ? 'Vui lòng nhập chuyên môn' : '';
    //         // return view('admin.form-add-student', [
    //         //     'errName' => $errName,
    //         //     'errMajor' => $errMajor
    //         // ]);
    //         return redirect(route('formAddStudent'. '/'. $errName));

    //         // return $this->students ;
    //     }
        
    //     // reut

    // }

    public function validationform(Request $request) {
        echo "<pre>";
            print_r($request->all());
        echo "</pre>";

        $this->validation($request,[
            'title'=>'required|max:50',
            'description'=>'required'
        ]);
    }

    public function getStudent($id) {
        $student = '';
        foreach ($this->students as $item) {
            if($item['id'] == $id) {
                $student = $item;
            }
        }
        return view('form-edit-student', [
            'id' => $id,
            'student' => $student
        ]);
    }

    public function updateStudent($id) {

    }

    public function deleteStudent($id) {

    }
}
