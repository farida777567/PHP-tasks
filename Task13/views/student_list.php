

<div class="container">
    <h1>Student List</h1>
    <table>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Phone</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($students as $student): ?>
        <tr>
            <td><?php echo htmlspecialchars($student['first_name']); ?></td>
            <td><?php echo htmlspecialchars($student['last_name']); ?></td>
            <td><?php echo htmlspecialchars($student['phone']); ?></td>
            <td><img src="<?php echo htmlspecialchars($student['image']); ?>" alt="Image"></td>
            <td>
                <a href="index.php?action=edit&id=<?php echo $student['id']; ?>">Edit</a>
                <a href="index.php?action=delete&id=<?php echo $student['id']; ?>">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>
