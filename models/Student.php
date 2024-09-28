<?php


require_once 'config/database.php';

class Student {
    public $id;
    public $first_name;
    public $last_name;
    public $phone;
    public $image;

    public function create() {
        global $pdo;
        $stmt = $pdo->prepare("INSERT INTO students (first_name, last_name, phone, image) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$this->first_name, $this->last_name, $this->phone, $this->image]);
    }

    public function read() {
        global $pdo;
        $stmt = $pdo->query("SELECT * FROM students");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update() {
        global $pdo;
        $stmt = $pdo->prepare("UPDATE students SET first_name = ?, last_name = ?, phone = ?, image = ? WHERE id = ?");
        return $stmt->execute([$this->first_name, $this->last_name, $this->phone, $this->image, $this->id]);
    }

    public function delete($id) {
        global $pdo;
        $stmt = $pdo->prepare("DELETE FROM students WHERE id = ?");
        return $stmt->execute([$id]);
    }
    public function exists($first_name, $last_name, $phone) {
        global $pdo; // Make sure you have the PDO instance available
        $stmt = $pdo->prepare("SELECT * FROM students WHERE first_name = ? AND last_name = ? AND phone = ?");
        $stmt->execute([$first_name, $last_name, $phone]);
        return $stmt->fetch() !== false; // Return true if a record exists
    }
    
    
}
?>
