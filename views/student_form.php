<!-- views/student_form.php -->

<div class="container">
    <h1>Add Student</h1>

    <?php if (isset($_SESSION['error'])): ?>
        <div style="color: red; text-align: center; margin-bottom: 20px; font-weight: bold;">
            <?php echo $_SESSION['error']; ?>
            <?php unset($_SESSION['error']); // Clear the error after displaying ?>
        </div>
    <?php endif; ?>

    <form action="index.php?action=create" method="POST" enctype="multipart/form-data">
        <input type="text" name="first_name" placeholder="First Name" required>
        <input type="text" name="last_name" placeholder="Last Name" required>
        <input type="text" name="phone" placeholder="Phone" required>
        <input type="file" name="image" required>
        <button type="submit">Add Student</button>
    </form>
</div>
