<?php


namespace App\model;


class StudentModel
{
    protected $database;

    public function __construct()
    {
        $db = new DBConnect();
        $this->database = $db->connect();
    }

    public function getAll()
    {
        $sql = 'SELECT * FROM `students`';
        $stmt = $this->database->query($sql);
        $data = $stmt->fetchAll();
        $array = [];
        foreach ($data as $item){
            $student = new Student($item['name'],$item['age'],$item['address'],$item['image']);
            $student->setId($item['id']);
            array_push($array,$student);
        }
        return $array;
    }

    public function addStudents($student)
    {
        $sql = 'INSERT INTO `students`(`name`, `age`, `address`, `image`) VALUES (:name,:age,:address,:image)';
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(':name',$student->getName());
        $stmt->bindParam(':age',$student->getAge());
        $stmt->bindParam(':address',$student->getAddress());
        $stmt->bindParam(':image',$student->getImage());
        $stmt->execute();
    }

    public function getStudentById($id)
    {
        $sql = 'SELECT * FROM `students` WHERE id = :id';
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $item = $stmt->fetch();
        $student = new Student($item['name'], $item['age'], $item['address'], $item['image']);
        $student->setId($id);
        return $student;
    }

    public function edit($student)
    {
        $sql = 'UPDATE `students` SET `name`=:name,`age`=:age,`address`=:address,`image`=:image WHERE id = :id';
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(':name',$student->getName());
        $stmt->bindParam(':age',$student->getAge());
        $stmt->bindParam(':address',$student->getAddress());
        $stmt->bindParam(':image',$student->getImage());
        $stmt->bindParam(':id',$student->getId());
        $stmt->execute();
    }

    public function delete($id)
    {
        $sql = 'DELETE FROM `students` WHERE id = :id';
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(':id',$id);
        $stmt->execute();
    }
}