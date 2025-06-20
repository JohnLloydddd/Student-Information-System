<?php include '../includes/header.php'; ?>
<?php include '../includes/db_conn.php'; ?>

<div class="container mt-5 pt-3">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h3 class="card-title mb-0">
                        <i class="fa fa-edit mr-2"></i>Edit Student
                    </h3>
                </div>
                <div class="card-body">
                    <?php
                    if (isset($_GET['id'])) {
                        $id = intval($_GET['id']);
                        $stmt = $conn->prepare("SELECT * FROM student WHERE id = ?");
                        $stmt->bind_param("i", $id);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        $student = $result->fetch_assoc();

                        if ($student) {
                    ?>
                    <form method="POST" action="edit_student.php?id=<?= $id ?>">
                        <div class="form-group mb-3">
                            <label for="student_id" class="form-label">
                                <i class="fa fa-id-card mr-2"></i>Student ID
                            </label>
                            <input type="text" id="student_id" name="student_id" 
                                   class="form-control" value="<?= $student['student_id'] ?>" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="name" class="form-label">
                                <i class="fa fa-user mr-2"></i>Name
                            </label>
                            <input type="text" id="name" name="name" 
                                   class="form-control" value="<?= $student['name'] ?>" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="birthday" class="form-label">
                                <i class="fa fa-calendar mr-2"></i>Birthday
                            </label>
                            <input type="date" id="birthday" name="birthday" 
                                   class="form-control" value="<?= $student['birthday'] ?>" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="age" class="form-label">
                                <i class="fa fa-calendar-alt mr-2"></i>Age
                            </label>
                            <input type="number" id="age" name="age" 
                                   class="form-control" value="<?= $student['age'] ?>" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="gender" class="form-label">
                                <i class="fa fa-venus-mars mr-2"></i>Gender
                            </label>
                            <select id="gender" name="gender" class="form-select" required>
                                <option value="Male" <?= $student['gender'] == 'Male' ? 'selected' : '' ?>>Male</option>
                                <option value="Female" <?= $student['gender'] == 'Female' ? 'selected' : '' ?>>Female</option>
                                <option value="Other" <?= $student['gender'] == 'Other' ? 'selected' : '' ?>>Other</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="civil_status" class="form-label">
                                <i class="fa fa-heart mr-2"></i>Civil Status
                            </label>
                            <select id="civil_status" name="civil_status" class="form-select" required>
                                <option value="Single" <?= $student['civil_status'] == 'Single' ? 'selected' : '' ?>>Single</option>
                                <option value="Married" <?= $student['civil_status'] == 'Married' ? 'selected' : '' ?>>Married</option>
                                <option value="Divorced" <?= $student['civil_status'] == 'Divorced' ? 'selected' : '' ?>>Divorced</option>
                                <option value="Widowed" <?= $student['civil_status'] == 'Widowed' ? 'selected' : '' ?>>Widowed</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="nationality" class="form-label">
                                <i class="fa fa-flag mr-2"></i>Nationality
                            </label>
                            <input type="text" id="nationality" name="nationality" 
                                   class="form-control" value="<?= $student['nationality'] ?>" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="religion" class="form-label">
                                <i class="fa fa-praying-hands mr-2"></i>Religion
                            </label>
                            <input type="text" id="religion" name="religion" 
                                   class="form-control" value="<?= $student['religion'] ?>" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="email" class="form-label">
                                <i class="fa fa-envelope mr-2"></i>Email
                            </label>
                            <input type="email" id="email" name="email" 
                                   class="form-control" value="<?= $student['email'] ?>" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="contact" class="form-label">
                                <i class="fa fa-phone mr-2"></i>Contact
                            </label>
                            <input type="text" id="contact" name="contact" 
                                   class="form-control" value="<?= $student['contact'] ?>" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="address" class="form-label">
                                <i class="fa fa-home mr-2"></i>Address
                            </label>
                            <input type="text" id="address" name="address" 
                                   class="form-control" value="<?= $student['address'] ?>" required>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="fa fa-save mr-2"></i>Update Student
                            </button>
                        </div>
                    </form>
                    <?php
                        } else {
                            echo "<div class='alert alert-danger'>Student not found.</div>";
                        }
                    }

                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $stmt = $conn->prepare("UPDATE student SET 
                            student_id = ?, name = ?, birthday = ?, age = ?,
                            gender = ?, civil_status = ?, nationality = ?,
                            religion = ?, email = ?, contact = ?, address = ?
                            WHERE id = ?");
                        $stmt->bind_param("sssisssssssi", 
                            $_POST['student_id'], $_POST['name'], $_POST['birthday'],
                            $_POST['age'], $_POST['gender'], $_POST['civil_status'],
                            $_POST['nationality'], $_POST['religion'], $_POST['email'],
                            $_POST['contact'], $_POST['address'], $id);
                        
                        if ($stmt->execute()) {
                            echo "<div class='alert alert-success'>Student updated successfully.</div>";
                        } else {
                            echo "<div class='alert alert-danger'>Error updating student.</div>";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>


