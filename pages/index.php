<?php include('../includes/header.php'); ?>

<div class="container mt-5 pt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg">
                <div class="card-body text-center">
                    <h2 class="card-title mb-4">Welcome to the Student Information System</h2>
                    <p class="lead mb-4">Manage student records easily with the following options:</p>
                    
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <a href="add_student.php" class="card h-100 text-decoration-none">
                                <div class="card-body text-primary hover-shadow">
                                    <i class="fa fa-user-plus fa-3x mb-3"></i>
                                    <h5 class="card-title">Add Student</h5>
                                    <p class="card-text text-muted">Register a new student</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 mb-3">
                            <a href="search_student.php" class="card h-100 text-decoration-none">
                                <div class="card-body text-primary hover-shadow">
                                    <i class="fa fa-search fa-3x mb-3"></i>
                                    <h5 class="card-title">Search Student</h5>
                                    <p class="card-text text-muted">Find student records</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 mb-3">
                            <a href="view_students.php" class="card h-100 text-decoration-none">
                                <div class="card-body text-primary hover-shadow">
                                    <i class="fa fa-th-list fa-3x mb-3"></i>
                                    <h5 class="card-title">View All</h5>
                                    <p class="card-text text-muted">Browse all students</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('../includes/footer.php'); ?>
