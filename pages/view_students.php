<?php include('../includes/header.php'); ?>
<?php include '../includes/db_conn.php'; ?>

<div class="container-fluid mt-5 pt-3">
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h3 class="card-title mb-0">
                        <i class="fa fa-users mr-2"></i>Student List
                    </h3>
                    <a href="add_student.php" class="btn btn-light">
                        <i class="fa fa-plus mr-2"></i>Add New Student
                    </a>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0 table-bordered">
                            <thead class="bg-light">
                                <tr>
                                    <th class="w-25"><span>Student ID</span></th>
                                    <th style="min-width: 100px;"><span>Full Name</span></th>
                                    <th class="w-25"><span>Birthday</span></th>
                                    <th class="w-75"><span>Gender</span></th>
                                    <th class="w-50"><span>Civil Status</span></th>
                                    <th class="w-25"><span>Nationality</span></th>
                                    <th class="w-25"><span>Contact</span></th>
                                    <th style="min-width: 100px;"><span>Email</span></th>
                                    <th class="w-25"><span>Address</span></th>
                                    <th class="w-25 justify-content-center"><span>Actions</span></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM student ORDER BY student_id ASC";
                                $result = $conn->query($sql);
                                
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>
                                            <td>{$row['student_id']}</td>
                                            <td>{$row['name']}</td>
                                            <td>" . date('M d, Y', strtotime($row['birthday'])) . "</td>
                                            <td>{$row['gender']}</td>
                                            <td>{$row['civil_status']}</td>
                                            <td>{$row['nationality']}</td>
                                            <td class='text-nowrap'>{$row['contact']}</td>
                                            <td style='width: 120px;'>{$row['email']}</td>
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
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


