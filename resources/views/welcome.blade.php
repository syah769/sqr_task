<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student QR 2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .feature-icon {
            font-size: 2.5rem;
            color: #0d6efd;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">Student QR 2</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    @if (Route::has('login'))
                        @auth
                            <li class="nav-item">
                                <a href="{{ url('/dashboard') }}" class="nav-link">Dashboard</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a href="{{ route('login') }}" class="nav-link">Log in</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a href="{{ route('register') }}" class="nav-link">Register</a>
                                </li>
                            @endif
                        @endauth
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <header class="bg-light py-5">
        <div class="container px-5">
            <div class="row gx-5 align-items-center justify-content-center">
                <div class="col-lg-8 col-xl-7 col-xxl-6">
                    <div class="my-5 text-center text-xl-start">
                        <h1 class="display-5 fw-bolder text-dark mb-2">Student Management System</h1>
                        <p class="lead fw-normal text-dark-50 mb-4">Streamline your educational institution with our
                            comprehensive student management solution.</p>
                        <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                            <a class="btn btn-primary btn-lg px-4 me-sm-3" href="#features">Learn More</a>
                            <a class="btn btn-outline-dark btn-lg px-4" href="{{ route('register') }}">Get Started</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center">
                    <img class="img-fluid rounded-3 my-5" src="https://via.placeholder.com/600x400" alt="Student Management System" />
                </div>
            </div>
        </div>
    </header>

    <section class="py-5" id="features">
        <div class="container px-5 my-5">
            <div class="row gx-5">
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <h2 class="fw-bolder mb-0">Features designed for educational excellence</h2>
                </div>
                <div class="col-lg-8">
                    <div class="row gx-5 row-cols-1 row-cols-md-2">
                        <div class="col mb-5 h-100">
                            <div class="feature-icon mb-3">
                                <i class="bi bi-person-vcard"></i>
                            </div>
                            <h2 class="h5">Student Records</h2>
                            <p class="mb-0">Efficiently manage student information, academic history, and personal details.</p>
                        </div>
                        <div class="col mb-5 h-100">
                            <div class="feature-icon mb-3">
                                <i class="bi bi-calendar-check"></i>
                            </div>
                            <h2 class="h5">Attendance Tracking</h2>
                            <p class="mb-0">Monitor and record student attendance with ease, generating insightful reports.</p>
                        </div>
                        <div class="col mb-5 mb-md-0 h-100">
                            <div class="feature-icon mb-3">
                                <i class="bi bi-graph-up"></i>
                            </div>
                            <h2 class="h5">Performance Analytics</h2>
                            <p class="mb-0">Analyze student performance with comprehensive dashboards and reports.</p>
                        </div>
                        <div class="col h-100">
                            <div class="feature-icon mb-3">
                                <i class="bi bi-chat-dots"></i>
                            </div>
                            <h2 class="h5">Communication Tools</h2>
                            <p class="mb-0">Facilitate seamless communication between staff, students, and parents.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 bg-light" id="about">
        <div class="container px-5 my-5">
            <div class="row gx-5 align-items-center">
                <div class="col-lg-6">
                    <h2 class="fw-bolder">About Our System</h2>
                    <p class="lead fw-normal text-muted mb-0">
                        Our Student Management System is designed to revolutionize how educational institutions handle administrative tasks.
                        By automating processes and providing powerful analytics, we empower schools to focus on what truly matters: education.
                    </p>
                </div>
                <div class="col-lg-6">
                    <img class="img-fluid rounded" src="https://via.placeholder.com/600x400" alt="About our system" />
                </div>
            </div>
        </div>
    </section>

    <section class="py-5" id="contact">
        <div class="container px-5">
            <div class="bg-light rounded-3 py-5 px-4 px-md-5 mb-5">
                <div class="text-center mb-5">
                    <h2 class="fw-bolder">Get in touch</h2>
                    <p class="lead fw-normal text-muted mb-0">We'd love to hear from you</p>
                </div>
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-8 col-xl-6">
                        <form>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="name" type="text" placeholder="Enter your name...">
                                <label for="name">Full name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="email" type="email" placeholder="name@example.com">
                                <label for="email">Email address</label>
                            </div>
                            <div class="form-floating mb-3">
                                <textarea class="form-control" id="message" placeholder="Enter your message here..." style="height: 10rem"></textarea>
                                <label for="message">Message</label>
                            </div>
                            <div class="d-grid">
                                <button class="btn btn-primary btn-lg" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="py-4 bg-dark">
        <div class="container px-5">
            <p class="m-0 text-center text-white">Copyright &copy; Syahril769 2024</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</body>

</html>
