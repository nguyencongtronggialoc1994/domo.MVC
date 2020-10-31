<?php


namespace App\controller;


use App\model\Student;
use App\model\StudentModel;

class StudentController
{
    protected $studentModel;

    public function __construct()
    {
        $this->studentModel = new StudentModel();
    }

    public function show()
    {
        $students = $this->studentModel->getAll();
        include_once "src/view/list.php";
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET'){
            include_once "src/view/add.php";
        } else {
            $name = $_REQUEST['name'];
            $age = $_REQUEST['age'];
            $address = $_REQUEST['address'];

            $file = $_FILES['image']['tmp_name'];
            $path = 'uploads/'.$_FILES['image']['name'];
            if (move_uploaded_file($file,$path)){
                echo 'success';
            } else {
                echo 'fail';
            }

            $image = $path == 'uploads/'?'uploads/default.png':$path;

            $student = new Student($name,$age,$address,$image);
            $this->studentModel->addStudents($student);
            header('location:index.php');
        }


    }

    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET'){
            $id = $_REQUEST['id'];
            $student = $this->studentModel->getStudentById($id);
            include_once "src/view/edit.php";
        } else {
            $id = $_REQUEST['id'];
            $student = $this->studentModel->getStudentById($id);

            $name = $_REQUEST['name'];
            $age = $_REQUEST['age'];
            $address = $_REQUEST['address'];

            $file = $_FILES['image']['tmp_name'];
            $path = 'uploads/'.$_FILES['image']['name'];
            if (move_uploaded_file($file,$path)){
                echo 'success';
            } else {
                echo 'fail';
            }

            $image = $path == 'uploads/'?$student->getImage():$path;

            $newStudent = new Student($name,$age,$address,$image);
            $newStudent->setId($id);
            $this->studentModel->edit($newStudent);
            header('location:index.php');
        }
    }

    public function delete()
    {
        $id = $_REQUEST['id'];
        $this->studentModel->delete($id);
        header('location:index.php');
    }
}