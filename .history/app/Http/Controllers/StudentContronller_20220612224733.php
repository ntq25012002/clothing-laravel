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

    public function addStudent(Request $request) {

        echo "<pre>";
            print_r($request->all());
            echo ($request->full_name);
        echo "</pre>";
        $request->validate([
            'full_name' =>'required|max:50',
            'major'=> 'required|min:6',
        ],[
            'full_name.required' =>'Vui lòng nhập họ tên!',
            'full_name.max' => 'Nhập tối đa 50 ký tự',
            'major.required' => 'Vui lòng nhập chuyên môn!',
            'major.min' => 'Nhập tối thiểu 6 ký tự'
        ]);

    }

    public function validationform(Request $request) {
        echo "<pre>";
            print_r($request->all());
            echo ($request->full_name);
        echo "</pre>";
        $request->validate([
            'full_name'=>'required|max:50',
            'major'=>'required'
        ]);
        
        // $this->validation($request,[
        //     'full_name'=>'required|max:50',
        //     'major'=>'required'
        // ]);
    }

    public function getStudent($id) {
        $student = '';
        foreach ($this->students as $item) {
            if($item['id'] == $id) {
                $student = $item;
            }
        }
        return view('admin.form-edit-student', [
            'id' => $id,
            'student' => $student
        ]);
    }

    public function updateStudent(Request $request, $id) {
        foreach($this->students as $item) {
            if($item['id'] == $id) {
                $item['full_name'] = $request->full_name;
                $item['major'] = $request->major;
                return $item;
            }
        }
        // return redirect(route('list-students'));
    }

    public function deleteStudent($id) {

    }
}
