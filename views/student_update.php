

<div class="container">
    <h1>Update Student</h1>
    <form action="index.php?action=update" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($student['id']); ?>">
        <input type="text" name="first_name" value="<?php echo htmlspecialchars($student['first_name']); ?>" required>
        <input type="text" name="last_name" value="<?php echo htmlspecialchars($student['last_name']); ?>" required>
        <input type="text" name="phone" value="<?php echo htmlspecialchars($student['phone']); ?>" required>
        <input type="file" name="image">
        <button type="submit">Update Student</button>
    </form>
</div>
