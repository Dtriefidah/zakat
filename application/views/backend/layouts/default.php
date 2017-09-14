<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="<?= base_url('web/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet" />
    <link href="<?= base_url('web/bootstrap4c-dropzone/component-dropzone.min.css'); ?>" rel="stylesheet" />
    <link href="<?= base_url('web/dynatable/jquery.dynatable.css'); ?>" rel="stylesheet" />
    <link href="<?= base_url('web/summernote/summernote-bs4.css'); ?>" rel="stylesheet" />
    <link href="<?= base_url('web/default/custom.css'); ?>" rel="stylesheet" />

    <?php $this->load->view('backend/_partials/head'); ?>
    <script src="<?= base_url('web/jquery/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('web/dropzone/dropzone.min.js'); ?>"></script>
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="<?= site_url('backend'); ?>">
            <img height="30" src="<?= base_url('uploads/media/logo.png'); ?>" width="30">
        </a>
        <a class="navbar-brand" href="<?= site_url('backend'); ?>"><?= lang('zakat'); ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= lang('posts'); ?></a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="<?= site_url('backend/news'); ?>"><?= lang('news'); ?></a>
                        <a class="dropdown-item" href="<?= site_url('backend/categories'); ?>"><?= lang('categories'); ?></a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Q & A</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="<?= site_url('backend/questions'); ?>"><?= lang('questions'); ?></a>
                        <a class="dropdown-item" href="<?= site_url('backend/answers'); ?>"><?= lang('answers'); ?></a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Zakat</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="<?= site_url('backend/products'); ?>"><?= lang('products'); ?></a>
                        <a class="dropdown-item" href="<?= site_url('backend/transactions'); ?>"><?= lang('transactions'); ?></a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('backend/users'); ?>"><?= lang('users'); ?></a>
                </li>
            </ul><!-- end of mr-auto -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= lang('language'); ?></a>
                    <div class="dropdown-menu">
                        <?php foreach ($this->config->item('language_options') as $language => $language_text) : ?>
                            <?= anchor('language/switch_language/'.$language, $language_text, ['class' => 'dropdown-item']); ?>
                        <?php endforeach; ?>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('backend/auth/sign_out'); ?>"><?= lang('sign_out'); ?></a>
                </li>
            </ul><!-- end of ml-auto -->
        </div>
    </nav>

    <div class="container">
        <?php $this->load->view('backend/_partials/messages'); ?>
        <?= $content; ?>
    </div>

    <?php $this->load->view('backend/_partials/foot'); ?>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?= base_url('web/popper.js/popper.min.js'); ?>"></script>
    <script src="<?= base_url('web/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <script src="<?= base_url('web/dynatable/jquery.dynatable.js'); ?>"></script>
    <script src="<?= base_url('web/summernote/summernote-bs4.min.js'); ?>"></script>
    <!-- Optional JavaScript -->
    <script src="<?= base_url('web/default/custom.js'); ?>"></script>
</body>
</html>
