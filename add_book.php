<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Book - Library Book Management System</title>
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
        .form-card {
            max-width: 680px;
            border: none;
            border-radius: 16px;
        }
        .card-header {
            background: #ffffff;
            border-bottom: 1px solid #e9ecef;
            border-radius: 16px 16px 0 0 !important;
        }
        .form-control {
            padding: 12px 14px;
            border-radius: 10px;
        }
        .form-control:focus {
            border-color: #1f4e79;
            box-shadow: 0 0 0 0.2rem rgba(31, 78, 121, 0.15);
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
            <a href="add_book.php" class="sidebar-link active">
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
                <h4 class="mb-0 text-primary fw-bold">Add New Book</h4>
                <span class="text-muted">Create a new library book record.</span>
            </div>
            <a href="view_books.php" class="btn btn-outline-primary">
                <i class="bi bi-eye me-1"></i> View Books
            </a>
        </div>

        <div class="page-area">
            <div class="card form-card shadow mx-auto">
                <div class="card-header p-4">
                    <h3 class="mb-1 text-primary">Book Information</h3>
                    <p class="mb-0 text-muted">Please fill all required fields.</p>
                </div>
                <div class="card-body p-4">
                    <form action="insert.php" method="POST">
                        <div class="mb-3">
                            <label for="title" class="form-label fw-semibold">Book Title</label>
                            <input type="text" id="title" name="title" class="form-control" placeholder="Enter book title" required>
                        </div>

                        <div class="mb-3">
                            <label for="author" class="form-label fw-semibold">Author</label>
                            <input type="text" id="author" name="author" class="form-control" placeholder="Enter author name" required>
                        </div>

                        <div class="mb-4">
                            <label for="price" class="form-label fw-semibold">Price</label>
                            <input type="number" id="price" name="price" step="0.01" class="form-control" placeholder="Enter price" required>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="bi bi-check-circle me-1"></i> Add Book
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
