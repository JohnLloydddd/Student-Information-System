<?php include '../includes/db_conn.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Print Student Details</title>
    <style>
        @page {
            size: A4;
            margin: 0;
        }
        body { 
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 30px;
            background: #fff;
        }
        .student { 
            max-width: 800px;
            margin: 0 auto;
            padding: 40px;
            border: 2px solid #333;
            border-radius: 10px;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 2px solid #333;
        }
        .header h1 {
            margin: 0;
            color: #333;
            font-size: 24px;
        }
        .header h2 {
            margin: 10px 0 0;
            color: #666;
            font-size: 18px;
        }
        .logo {
            max-width: 100px;
            margin-bottom: 15px;
        }
        .field { 
            margin-bottom: 15px;
            display: flex;
            border-bottom: 1px solid #eee;
            padding-bottom: 10px;
        }
        .label {
            font-weight: bold;
            width: 150px;
            color: #333;
        }
        .value {
            flex: 1;
            color: #666;
        }
        .footer {
            margin-top: 40px;
            text-align: center;
            color: #666;
            font-size: 12px;
        }
        @media print {
            body {
                padding: 20px;
            }
            .student {
                border: none;
                padding: 0;
            }
            .no-print {
                display: none;
            }
        }
    </style>
</head>
<body>
<?php
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $stmt = $conn->prepare("SELECT * FROM student WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($student = $result->fetch_assoc()) {
        echo "<div class='student'>
                <div class='header'>
                    
                    <h1>Student Information System</h1>
                    <h2>Student Details</h2>
                </div>
                
                <div class='field'>
                    <div class='label'>Student ID:</div>
                    <div class='value'>{$student['student_id']}</div>
                </div>
                <div class='field'>
                    <div class='label'>Name:</div>
                    <div class='value'>{$student['name']}</div>
                </div>
                <div class='field'>
                    <div class='label'>Birthday:</div>
                    <div class='value'>" . date('F d, Y', strtotime($student['birthday'])) . "</div>
                </div>
                <div class='field'>
                    <div class='label'>Age:</div>
                    <div class='value'>{$student['age']}</div>
                </div>
                <div class='field'>
                    <div class='label'>Gender:</div>
                    <div class='value'>{$student['gender']}</div>
                </div>
                <div class='field'>
                    <div class='label'>Civil Status:</div>
                    <div class='value'>{$student['civil_status']}</div>
                </div>
                <div class='field'>
                    <div class='label'>Nationality:</div>
                    <div class='value'>{$student['nationality']}</div>
                </div>
                <div class='field'>
                    <div class='label'>Religion:</div>
                    <div class='value'>{$student['religion']}</div>
                </div>
                <div class='field'>
                    <div class='label'>Email:</div>
                    <div class='value'>{$student['email']}</div>
                </div>
                <div class='field'>
                    <div class='label'>Contact:</div>
                    <div class='value'>{$student['contact']}</div>
                </div>
                <div class='field'>
                    <div class='label'>Address:</div>
                    <div class='value'>{$student['address']}</div>
                </div>

                <div class='footer'>
                    <p>Printed on: " . date('F d, Y') . "</p>
                    <p>This is a computer-generated document. No signature is required.</p>
                </div>
              </div>";
        echo "<script>window.print();</script>";
    } else {
        echo "<div class='student'><h2>Student not found.</h2></div>";
    }
}
?>
</body>
</html>
