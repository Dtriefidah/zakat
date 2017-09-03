<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="<?= base_url('web/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet" />
    <link href="<?= base_url('web/default/custom.css'); ?>" rel="stylesheet" />
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="<?= site_url('backend/'); ?>">
            <img height="30" src="<?= base_url('uploads/media/logo.png'); ?>" width="30">
        </a>
        <a class="navbar-brand" href="#">Zakat</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('backend/'); ?>">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Posts</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="<?= site_url('backend/news'); ?>">News</a>
                        <a class="dropdown-item" href="<?= site_url('backend/category'); ?>">Category</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Q & A</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="<?= site_url('backend/questions'); ?>">Questions</a>
                        <a class="dropdown-item" href="<?= site_url('backend/answers'); ?>">Answers</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Zakat</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="<?= site_url('backend/products'); ?>">Products</a>
                        <a class="dropdown-item" href="<?= site_url('backend/transactions'); ?>">Transactions</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Users</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="<?= site_url('backend/users'); ?>">Users</a>
                        <a class="dropdown-item" href="<?= site_url('backend/admin'); ?>">Admin</a>
                    </div>
                </li>
            </ul><!-- end of ml-auto -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('backend/home/sign_in'); ?>">Sign In</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('backend/home/sign_out'); ?>">Sign Out</a>
                </li>
            </ul><!-- end of ml-auto -->
        </div>
    </nav>

    <div class="container"><?= $content; ?></div>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?= base_url('web/jquery/jquery.slim.min.js'); ?>"></script>
    <script src="<?= base_url('web/popper.js/popper.min.js'); ?>"></script>
    <script src="<?= base_url('web/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <!-- Optional JavaScript -->
    <script src="<?= base_url('web/default/custom.js'); ?>"></script>
</body>
</html>
