<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#" id="toggleSidebar">MyApp</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item"><a class="nav-link" href="<?= route_to('students') ?>">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= site_url('students/670') ?>">Profile</a></li>
            </ul>
            <span class="navbar-text">Welcome, John Doe</span>
        </div>
    </div>
</nav>