<?php include '../includes/header.php'; ?>
<?php include '../includes/db_conn.php'; ?>

<div class="container mt-4">
    <h2>Delete Student</h2>
    <?php
    if (isset($_GET['id'])) {
        $id = intval($_GET['id']);

        $stmt = $conn->prepare("DELETE FROM student WHERE id = ?");
        $stmt->bind_param("i", $id);
        if ($stmt->execute()) {
            echo "<p class='text-success'>Student deleted successfully.</p>";
        } else {
            echo "<p class='text-danger'>Error deleting student.</p>";
        }
    }
    ?>
    <a href="view_students.php" class="btn btn-secondary">Back to List</a>
</div>


