<?php


require_once 'models/Student.php';

class StudentController {
    private $student;

    public function __construct() {
        $this->student = new Student();
    }



    public function create($data) {
        // Validate if the student already exists
        if ($this->student->exists($data['first_name'], $data['last_name'], $data['phone'])) {
            $_SESSION['error'] = "Error: This student data has already been used.";
            header("Location: index.php");
            exit(); // Ensure you exit to stop further execution
        }
    
        // Proceed with image upload
        $targetDir = "uploads/";
        $targetFile = $targetDir . basename($_FILES["image"]["name"]);
    
        // Check if image file is a valid image
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check === false) {
            $_SESSION['error'] = "File is not an image.";
            header("Location: index.php");
            exit();
        }
    
        // Move the uploaded file to the target directory
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            $this->student->first_name = $data['first_name'];
            $this->student->last_name = $data['last_name'];
            $this->student->phone = $data['phone'];
            $this->student->image = $targetFile; // Store the path
            $this->student->create();
        } else {
            $_SESSION['error'] = "Sorry, there was an error uploading your file.";
            header("Location: index.php");
            exit();
        }
    }
    

    

    public function read() {
        return $this->student->read();
    }

    public function update($data) {
        $this->student->id = $data['id'];
        $this->student->first_name = $data['first_name'];
        $this->student->last_name = $data['last_name'];
        $this->student->phone = $data['phone'];
        $this->student->image = $data['image'];
        $this->student->update();
    }

    public function delete($id) {
        $this->student->delete($id);
    }
}
?>
