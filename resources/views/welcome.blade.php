<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>BlogApp - Welcome</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}"> 
</head>
<body>
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <h1>Welcome to BlogApp</h1>
            <p>Your destination for creating and sharing amazing blog posts.</p>
            <a href="{{ route('login') }}" class="btn btn-light btn-lg me-2">Login</a>
            <a href="{{ route('register') }}" class="btn btn-outline-light btn-lg">Register</a>
        </div>
    </section>

    <section class="features-section">
        <div class="container">
            <h2>Why Choose BlogApp?</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <h5 class="card-title">Write with Ease</h5>
                            <p class="card-text">Our intuitive editor makes writing and publishing seamless.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <h5 class="card-title">Engage with Readers</h5>
                            <p class="card-text">Connect, comment, and engage with your audience like never before.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <h5 class="card-title">Grow Your Community</h5>
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem, provident perspiciatis. </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <p>© {{ date('Y') }} BlogApp. All rights reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
