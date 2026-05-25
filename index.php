<?php require 'db_connect.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Library Book Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background: #f4f7fb;
            min-height: 100vh;
            font-family: Arial, sans-serif;
            color: #223142;
        }
        .sidebar {
            width: 260px;
            min-height: 100vh;
            background: #163b5c;
            position: fixed;
            left: 0;
            top: 0;
            padding: 24px 18px;
            color: #ffffff;
        }
        .sidebar-title {
            font-size: 20px;
            font-weight: 700;
            line-height: 1.3;
        }
        .student-box {
            background: rgba(255, 255, 255, 0.12);
            border-radius: 12px;
            padding: 12px;
            margin: 20px 0;
        }
        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #d9e8f5;
            text-decoration: none;
            padding: 11px 13px;
            border-radius: 10px;
            margin-bottom: 8px;
            transition: 0.2s ease;
        }
        .sidebar-link:hover,
        .sidebar-link.active {
            background: #ffffff;
            color: #163b5c;
        }
        .main-content {
            margin-left: 260px;
            min-height: 100vh;
        }
        .topbar {
            background: #ffffff;
            border-bottom: 1px solid #e6edf5;
            padding: 18px 30px;
        }
        .page-area {
            padding: 32px;
        }
        .dashboard-card {
            border: none;
            border-radius: 16px;
            height: 100%;
        }
        .icon-box {
            width: 52px;
            height: 52px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #e7f0f8;
            color: #1f4e79;
            font-size: 24px;
        }
        .btn-primary {
            background: #1f4e79;
            border-color: #1f4e79;
        }
        .btn-primary:hover {
            background: #183d5f;
            border-color: #183d5f;
        }
        @media (max-width: 991px) {
            .sidebar {
                position: static;
                width: 100%;
                min-height: auto;
            }
            .main-content {
                margin-left: 0;
            }
            .page-area {
                padding: 24px 15px;
            }
            .sidebar-nav {
                display: grid;
                grid-template-columns: 1fr;
                gap: 8px;
            }
            .sidebar-link {
                margin-bottom: 0;
                justify-content: center;
            }
        }
    </style>
</head>
<body>
    <aside class="sidebar">
        <div class="sidebar-title">
            <i class="bi bi-journal-bookmark-fill me-2"></i>
            Library Book<br>Management System
        </div>

        <div class="student-box">
            <div class="fw-semibold">Hizbullah</div>
            <div class="small text-white-50">CUSIT ID: 14936</div>
        </div>

        <nav class="sidebar-nav">
            <a href="index.php" class="sidebar-link active">
                <i class="bi bi-speedometer2"></i>
                Dashboard
            </a>
            <a href="add_book.php" class="sidebar-link">
                <i class="bi bi-plus-circle"></i>
                Add Book
            </a>
            <a href="view_books.php" class="sidebar-link">
                <i class="bi bi-table"></i>
                View Books
            </a>
        </nav>
    </aside>

    <main class="main-content">
        <div class="topbar d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-2 shadow-sm">
            <div>
                <h4 class="mb-0 text-primary fw-bold">Dashboard</h4>
                <span class="text-muted">Welcome to your library book management system.</span>
            </div>
            <a href="add_book.php" class="btn btn-primary">
                <i class="bi bi-plus-circle me-1"></i> Add New Book
            </a>
        </div>

        <div class="page-area">
            <div class="row g-4 mb-4">
                <div class="col-md-6 col-xl-4">
                    <div class="card dashboard-card shadow p-4">
                        <div class="d-flex align-items-center gap-3">
                            <div class="icon-box">
                                <i class="bi bi-bookshelf"></i>
                            </div>
                            <div>
                                <p class="text-muted mb-1">Total Books</p>
                                <h3 class="mb-0 text-primary">
                                    <?php
                                    $countSql = "SELECT COUNT(*) AS total FROM books";
                                    $countResult = $conn->query($countSql);
                                    $countRow = $countResult->fetch_assoc();
                                    echo $countRow['total'];
                                    ?>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-xl-4">
                    <div class="card dashboard-card shadow p-4">
                        <div class="d-flex align-items-center gap-3">
                            <div class="icon-box">
                                <i class="bi bi-person-badge"></i>
                            </div>
                            <div>
                                <p class="text-muted mb-1">Student</p>
                                <h5 class="mb-0 text-primary">Hizbullah</h5>
                                <span class="small text-muted">CUSIT ID: 14936</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-xl-4">
                    <div class="card dashboard-card shadow p-4">
                        <div class="d-flex align-items-center gap-3">
                            <div class="icon-box">
                                <i class="bi bi-database-check"></i>
                            </div>
                            <div>
                                <p class="text-muted mb-1">Database</p>
                                <h5 class="mb-0 text-primary">hizbullah_14936</h5>
                                <span class="small text-muted">Table: books</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card dashboard-card shadow">
                <div class="card-body p-4">
                    <h3 class="text-primary mb-2">Library Book Management System</h3>
                    <p class="text-muted mb-4">
                        This project allows you to add, view, edit, and delete library book records using PHP and MySQL.
                    </p>
                    <div class="d-flex flex-column flex-sm-row gap-2">
                        <a href="add_book.php" class="btn btn-primary">
                            <i class="bi bi-plus-circle me-1"></i> Add Book
                        </a>
                        <a href="view_books.php" class="btn btn-outline-primary">
                            <i class="bi bi-table me-1"></i> View Books
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
