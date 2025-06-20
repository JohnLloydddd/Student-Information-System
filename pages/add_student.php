<?php 
include('../includes/header.php');
include('../includes/db_conn.php');

// Initialize variables to store form data
$message = '';
$messageType = '';

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        
        
        // Prepare SQL statement
        $sql = "INSERT INTO student (student_id, name, birthday, age, gender, civil_status, 
                nationality, religion, email, contact, address) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        $stmt = $conn->prepare($sql);
        
        // Fix: Add one more 's' to match 11 parameters
        $stmt->bind_param("sssisssssss", 
            $_POST['student_id'],
            $_POST['name'],
            $_POST['birthday'],
            $_POST['age'],
            $_POST['gender'],
            $_POST['civil_status'],
            $_POST['nationality'],
            $_POST['religion'],
            $_POST['email'],
            $_POST['contact'],
            $_POST['address']
        );
        
        if ($stmt->execute()) {
            $message = "Student added successfully!";
            $messageType = "success";
        } else {
            throw new Exception("Error executing statement: " . $stmt->error);
        }
        
    } catch (Exception $e) {
        $message = "Error: " . $e->getMessage();
        $messageType = "danger";
    }
}
?>

<div class="container mt-5 pt-3">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <?php if ($message): ?>
            <div class="alert alert-<?php echo $messageType; ?> alert-dismissible fade show" role="alert">
                <?php echo $message; ?>
                <button type="button" class="close" data-dismiss="alert">
                    <span>&times;</span>
                </button>
            </div>
            <?php endif; ?>

            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h3 class="card-title mb-0">
                        <i class="fa fa-user-plus mr-2"></i>Add New Student
                    </h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="add_student.php">
                        <!-- Student ID -->
                        <div class="form-group mb-3">
                            <label for="student_id" class="form-label">
                                <i class="fa fa-id-card mr-2"></i>Student ID
                            </label>
                            <input type="text" id="student_id" name="student_id" 
                                   class="form-control" placeholder="Enter student ID"
                                   required>
                        </div>

                        <!-- Full Name -->
                        <div class="form-group mb-3">
                            <label for="name" class="form-label">
                                <i class="fa fa-user mr-2"></i>Full Name
                            </label>
                            <input type="text" id="name" name="name" 
                                   class="form-control" placeholder="Enter full name"
                                   required>
                        </div>

                        <!-- Birthday and Age Row -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="birthday" class="form-label">
                                    <i class="fa fa-calendar mr-2"></i>Birthday
                                </label>
                                <input type="date" id="birthday" name="birthday" 
                                       class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label for="age" class="form-label">
                                    <i class="fa fa-clock-o mr-2"></i>Age
                                </label>
                                <input type="number" id="age" name="age" 
                                       class="form-control" min="0" max="120"
                                       required>
                            </div>
                        </div>

                        <!-- Gender and Civil Status Row -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="gender" class="form-label">
                                    <i class="fa fa-venus-mars mr-2"></i>Gender
                                </label>
                                <select id="gender" name="gender" class="form-select" required>
                                    <option value="">Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="civil_status" class="form-label">
                                    <i class="fa fa-heart mr-2"></i>Civil Status
                                </label>
                                <select id="civil_status" name="civil_status" class="form-select" required>
                                    <option value="">Select Status</option>
                                    <option value="Single">Single</option>
                                    <option value="Married">Married</option>
                                    <option value="Widowed">Widowed</option>
                                    <option value="Divorced">Divorced</option>
                                </select>
                            </div>
                        </div>

                        <!-- Nationality and Religion Row -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="nationality" class="form-label">
                                    <i class="fa fa-globe mr-2"></i>Nationality
                                </label>
                                <input type="text" id="nationality" name="nationality" 
                                       class="form-control" placeholder="Enter nationality"
                                       required>
                            </div>
                            <div class="col-md-6">
                                <label for="religion" class="form-label">
                                    <i class="fa fa-pray mr-2"></i>Religion
                                </label>
                                <input type="text" id="religion" name="religion" 
                                       class="form-control" placeholder="Enter religion"
                                       required>
                            </div>
                        </div>

                        <!-- Contact Information -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="email" class="form-label">
                                    <i class="fa fa-envelope mr-2"></i>Email Address
                                </label>
                                <input type="email" id="email" name="email" 
                                       class="form-control" placeholder="Enter email address"
                                       required>
                            </div>
                            <div class="col-md-6">
                                <label for="contact" class="form-label">
                                    <i class="fa fa-phone mr-2"></i>Contact Number
                                </label>
                                <input type="tel" id="contact" name="contact" 
                                       class="form-control" placeholder="Enter contact number"
                                       required>
                            </div>
                        </div>

                        <!-- Address -->
                        <div class="form-group mb-4">
                            <label for="address" class="form-label">
                                <i class="fa fa-home mr-2"></i>Complete Address
                            </label>
                            <textarea id="address" name="address" 
                                     class="form-control" rows="3"
                                     placeholder="Enter complete address"
                                     required></textarea>
                        </div>

                        <!-- Submit Button -->
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="fa fa-save mr-2"></i>Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>




