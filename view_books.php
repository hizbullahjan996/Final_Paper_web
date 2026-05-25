<?php require 'db_connect.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Books - Library Book Management System</title>
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
        .table-card {
            border: none;
            border-radius: 16px;
            overflow: hidden;
        }
        .card-header {
            background: #ffffff;
            border-bottom: 1px solid #e9ecef;
        }
        .table thead th {
            background: #1f4e79;
            color: #ffffff;
            border-color: #1f4e79;
            white-space: nowrap;
            padding-top: 14px;
            padding-bottom: 14px;
        }
        .table td {
            vertical-align: middle;
            padding-top: 14px;
            padding-bottom: 14px;
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
            <a href="index.php" class="sidebar-link">
                <i class="bi bi-speedometer2"></i>
                Dashboard
            </a>
            <a href="add_book.php" class="sidebar-link">
                <i class="bi bi-plus-circle"></i>
                Add Book
            </a>
            <a href="view_books.php" class="sidebar-link active">
                <i class="bi bi-table"></i>
                View Books
            </a>
        </nav>
    </aside>

    <main class="main-content">
        <div class="topbar d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-2 shadow-sm">
            <div>
                <h4 class="mb-0 text-primary fw-bold">Book Records</h4>
                <span class="text-muted">Manage all saved library books.</span>
            </div>
            <a href="add_book.php" class="btn btn-primary">
                <i class="bi bi-plus-circle me-1"></i> Add New Book
            </a>
        </div>

        <div class="page-area">
            <div class="card table-card shadow">
                <div class="card-header p-4">
                    <h3 class="mb-1 text-primary">Library Books</h3>
                    <p class="mb-0 text-muted">All library books are listed below.</p>
                </div>

                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Book Title</th>
                                    <th>Author</th>
                                    <th>Price</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM books";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        $id = $row['id'];
                                        $title = $row['title'];
                                        $author = $row['author'];
                                        $price = $row['price'];
                                ?>
                                <tr>
                                    <td><?php echo $id; ?></td>
                                    <td class="fw-semibold"><?php echo $title; ?></td>
                                    <td><?php echo $author; ?></td>
                                    <td><?php echo $price; ?></td>
                                    <td class="text-center">
                                        <a href="edit.php?id=<?php echo $id; ?>" class="btn btn-warning btn-sm">
                                            <i class="bi bi-pencil-square"></i> Edit
                                        </a>
                                        <a href="delete.php?id=<?php echo $id; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this book?');">
                                            <i class="bi bi-trash"></i> Delete
                                        </a>
                                    </td>
                                </tr>
                                <?php
                                    }
                                } else {
                                    echo "<tr><td colspan='5' class='text-center py-4 text-muted'>No books found.</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
