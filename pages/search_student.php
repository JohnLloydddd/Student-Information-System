<?php include '../includes/header.php'; ?>
<?php include '../includes/db_conn.php'; ?>

<div class="container mt-5 pt-3">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h3 class="card-title mb-0">
                        <i class="fa fa-search mr-2"></i>Search Student
                    </h3>
                </div>
                <div class="card-body">
                    <form method="GET" action="search_student.php">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label><i class="fa fa-id-card mr-2"></i>Student ID</label>
                                    <input type="text" 
                                           name="student_id" 
                                           class="form-control" 
                                           placeholder="Enter Student ID"
                                           value="<?php echo isset($_GET['student_id']) ? htmlspecialchars($_GET['student_id']) : ''; ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label><i class="fa fa-user mr-2"></i>Name</label>
                                    <input type="text" 
                                           name="name" 
                                           class="form-control" 
                                           placeholder="Enter Name"
                                           value="<?php echo isset($_GET['name']) ? htmlspecialchars($_GET['name']) : ''; ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label><i class="fa fa-venus-mars mr-2"></i>Gender</label>
                                    <select name="gender" class="form-control">
                                        <option value="">All Genders</option>
                                        <option value="Male" <?php echo (isset($_GET['gender']) && $_GET['gender'] == 'Male') ? 'selected' : ''; ?>>Male</option>
                                        <option value="Female" <?php echo (isset($_GET['gender']) && $_GET['gender'] == 'Female') ? 'selected' : ''; ?>>Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label><i class="fa fa-heart mr-2"></i>Civil Status</label>
                                    <select name="civil_status" class="form-control">
                                        <option value="">All Status</option>
                                        <option value="Single" <?php echo (isset($_GET['civil_status']) && $_GET['civil_status'] == 'Single') ? 'selected' : ''; ?>>Single</option>
                                        <option value="Married" <?php echo (isset($_GET['civil_status']) && $_GET['civil_status'] == 'Married') ? 'selected' : ''; ?>>Married</option>
                                        <option value="Widowed" <?php echo (isset($_GET['civil_status']) && $_GET['civil_status'] == 'Widowed') ? 'selected' : ''; ?>>Widowed</option>
                                        <option value="Divorced" <?php echo (isset($_GET['civil_status']) && $_GET['civil_status'] == 'Divorced') ? 'selected' : ''; ?>>Divorced</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="text-right mt-3">
                            <button type="submit" class="btn btn-primary px-4">
                                <i class="fa fa-search mr-2"></i>Search
                            </button>
                            <a href="search_student.php" class="btn btn-secondary px-4">
                                <i class="fa fa-refresh mr-2"></i>Reset
                            </a>
                        </div>
                    </form>

                    <?php
                    if ($_SERVER['REQUEST_METHOD'] == 'GET' && !empty($_GET)) {
                        $conditions = [];
                        $params = [];
                        $types = "";

                        if (!empty($_GET['student_id'])) {
                            $conditions[] = "student_id LIKE ?";
                            $params[] = "%" . $_GET['student_id'] . "%";
                            $types .= "s";
                        }
                        if (!empty($_GET['name'])) {
                            $conditions[] = "name LIKE ?";
                            $params[] = "%" . $_GET['name'] . "%";
                            $types .= "s";
                        }
                        if (!empty($_GET['gender'])) {
                            $conditions[] = "gender = ?";
                            $params[] = $_GET['gender'];
                            $types .= "s";
                        }
                        if (!empty($_GET['civil_status'])) {
                            $conditions[] = "civil_status = ?";
                            $params[] = $_GET['civil_status'];
                            $types .= "s";
                        }

                        $sql = "SELECT * FROM student";
                        if (!empty($conditions)) {
                            $sql .= " WHERE " . implode(" AND ", $conditions);
                        }
                        $sql .= " ORDER BY student_id ASC";

                        $stmt = $conn->prepare($sql);
                        if (!empty($params)) {
                            $stmt->bind_param($types, ...$params);
                        }
                        $stmt->execute();
                        $result = $stmt->get_result();

                        if ($result->num_rows > 0) {
                            echo '<div class="table-responsive mt-4">
                                    <table class="table table-hover table-bordered mb-0">
                                        <thead class="bg-light">
                                            <tr>
                                                <th style="width: 120px;"><i class="fa fa-id-card mr-2"></i>Student ID</th>
                                                <th style="width: 200px;"><i class="fa fa-user mr-2"></i>Full Name</th>
                                                <th style="width: 120px;"><i class="fa fa-calendar mr-2"></i>Birthday</th>
                                                <th style="width: 100px;"><i class="fa fa-venus-mars mr-2"></i>Gender</th>
                                                <th style="width: 120px;"><i class="fa fa-heart mr-2"></i>Civil Status</th>
                                                <th style="width: 200px;"><i class="fa fa-home mr-2"></i>Address</th>
                                                <th style="width: 100px;" class="text-center"><i class="fa fa-cogs mr-2"></i>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>';
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>
                                        <td class='text-nowrap'>{$row['student_id']}</td>
                                        <td class='text-nowrap'>{$row['name']}</td>
                                        <td class='text-nowrap'>" . date('M d, Y', strtotime($row['birthday'])) . "</td>
                                        <td class='text-nowrap'>{$row['gender']}</td>
                                        <td class='text-nowrap'>{$row['civil_status']}</td>
                                        <td>{$row['address']}</td>
                                        <td class='text-center'>
                                            <div class='btn-group btn-group-sm'>
                                                <a href='edit_student.php?id={$row['id']}' 
                                                   class='btn btn-warning'
                                                   title='Edit Student'>
                                                    <i class='fa fa-edit'></i>
                                                </a>
                                                <a href='print_student.php?id={$row['id']}' 
                                                   class='btn btn-info'
                                                   title='Print Details'
                                                   target='_blank'>
                                                    <i class='fa fa-print'></i>
                                                </a>
                                                <a href='delete_student.php?id={$row['id']}' 
                                                   class='btn btn-danger'
                                                   onclick='return confirm(\"Are you sure?\")'
                                                   title='Delete Student'>
                                                    <i class='fa fa-trash'></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>";
                            }
                            echo '</tbody></table></div>';
                        } else {
                            echo '<div class="alert alert-info mt-4">
                                    <i class="fa fa-info-circle mr-2"></i>
                                    No students found matching your search criteria.
                                  </div>';
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.querySelectorAll('input[name="searchType"]').forEach(radio => {
    radio.addEventListener('change', function() {
        const searchInput = document.getElementById('search');
        if (this.value === 'id') {
            searchInput.placeholder = 'Enter student ID...';
        } else {
            searchInput.placeholder = 'Enter student name...';
        }
    });
});
</script>


