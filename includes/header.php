\includes\header.php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Information System</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-primary navbar-dark fixed-top">
            <div class="container">
                <a class="navbar-brand text-white" href="index.php">
                    <i class="fa fa-graduation-cap fa-lg mr-2"></i>Student Information System
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nvbCollapse" aria-controls="nvbCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="nvbCollapse">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item pl-1">
                            <a class="nav-link text-white" href="index.php">
                                <i class="fa fa-home fa-fw mr-1"></i>Home
                            </a>
                        </li>
                        <li class="nav-item pl-1">
                            <a class="nav-link text-white" href="add_student.php">
                                <i class="fa fa-user-plus fa-fw mr-1"></i>Add Student
                            </a>
                        </li>
                        <li class="nav-item pl-1">
                            <a class="nav-link text-white" href="search_student.php">
                                <i class="fa fa-search fa-fw mr-1"></i>Search Student
                            </a>
                        </li>
                        <li class="nav-item pl-1">
                            <a class="nav-link text-white" href="view_students.php">
                                <i class="fa fa-th-list fa-fw mr-1"></i>View All Students
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main class="container mt-4">