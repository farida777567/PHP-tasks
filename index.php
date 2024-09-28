<?php
session_start(); // Start the session here

require_once 'controllers/StudentController.php';

$controller = new StudentController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_GET['action'] ?? '';
    switch ($action) {
        case 'create':
            $controller->create($_POST);
            break;
        case 'update':
            $controller->update($_POST);
            break;
    }
    header("Location: index.php");
    exit();
}

if (isset($_GET['action'])) {
    $action = $_GET['action'];
    if ($action === 'delete') {
        $controller->delete($_GET['id']);
        header("Location: index.php");
        exit();
    } elseif ($action === 'edit') {
        $studentId = $_GET['id'];
        $students = $controller->read();
        $student = array_filter($students, fn($s) => $s['id'] == $studentId)[0];
        include 'views/student_update.php';
        exit();
    }
}

$students = $controller->read();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Student CRUD</title>
</head>
<body>
    <?php include 'views/student_form.php'; ?>
    <?php include 'views/student_list.php'; ?>
</body>
</html>
