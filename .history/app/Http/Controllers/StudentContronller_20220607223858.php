<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentContronller extends Controller
{
    public function index() {
        $students = [
            "id" => "1",
            "name"=>"Nguyễn Trung Quân",
            "major"=>"Lập trình website",
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
