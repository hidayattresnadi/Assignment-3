<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyApp</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        /* Sidebar */
        .sidebar {
            width: 250px;
            max-width: 100%;
            height: 100vh;
            background: #343a40;
            color: white;
            position: fixed;
            left: -250px;
            top: 0;
            transition: all 0.3s ease;
            padding: 15px;
        }

        .sidebar.show {
            left: 0;
        }

        /* Responsive sidebar */
        @media (max-width: 768px) {
            .sidebar {
                width: 60%;
                left: -60%;
            }

            .sidebar.show {
                left: 0;
            }
        }

        /* Navbar & content shift */
        .content {
            transition: margin-left 0.3s ease;
            margin-left: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .content.shifted {
            margin-left: 250px;
        }

        @media (max-width: 768px) {
            .content.shifted {
                margin-left: 60%;
            }
        }

        /* Sticky footer */
        .footer {
            background: #343a40;
            color: white;
            text-align: center;
            padding: 10px;
            margin-top: auto;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <div class="content" id="mainContent">
        <header>
            <?= $this->include('partials/navbar') ?>
        </header>
        <!-- Konten utama -->
        <div class="container mt-4 flex-grow-1">
            <main>
                <?= $this->renderSection('content') ?>
            </main>
        </div>

        <!-- Footer -->
        <footer class="footer mt-5">
            <?= $this->include('partials/footer') ?>
        </footer>
    </div>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <?= $this->include('partials/sidebar') ?>
    </div>

    <script>
        document.getElementById("toggleSidebar").addEventListener("click", function(event) {
            event.preventDefault();
            document.getElementById("sidebar").classList.toggle("show");
            document.getElementById("mainContent").classList.toggle("shifted");
        });
    </script>

</body>

</html>