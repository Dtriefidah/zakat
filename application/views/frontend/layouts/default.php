<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="<?= base_url('web/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet" />
    <link href="<?= base_url('web/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet" />
    <link href="<?= base_url('web/MDBootstrap/css/mdb.min.css'); ?>" rel="stylesheet" />
    <link href="<?= base_url('web/MDBootstrap/css/mdb-custom.css'); ?>" rel="stylesheet" />
    <link href="<?= base_url('web/default/custom.css'); ?>" rel="stylesheet" />

    <script src="<?= base_url('web/jquery/jquery.min.js'); ?>"></script>

    <style rel="stylesheet">
    .extra-margins {
        margin-top: 1rem;
        margin-bottom: 2.5rem;
    }
    .jumbotron {
        text-align: center;
    }
    .navbar {
        background-color: #3b295a;
    }
    .navbar .dropdown-menu a:hover {
        color: #000 !important;
    }
    .navbar .btn-group .dropdown-menu a:active {
        color: #fff !important;
    }
    .is_stuck { padding-top: 4rem; }
    footer.page-footer {
        background-color: #3f51b5;
        margin-top: 2rem;
    }
    </style>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top indigo">
            <a class="navbar-brand" href="<?= site_url(); ?>">
                <img height="30" src="<?= base_url('uploads/media/logo.png'); ?>" width="30" />
            </a>
            <a class="navbar-brand" href="<?= site_url(); ?>"><?= lang('zakat'); ?></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= lang('profile'); ?></a>
                        <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="<?= site_url('page/sejarah-gyd'); ?>"><?= lang('history_gyd'); ?></a>
                            <a class="dropdown-item" href="<?= site_url('page/visi-dan-misi'); ?>"><?= lang('vision_and_mission'); ?></a>
                            <a class="dropdown-item" href="<?= site_url('page/program-kegiatan'); ?>"><?= lang('program_activities'); ?></a>
                            <a class="dropdown-item" href="<?= site_url('page/landasan-legal'); ?>"><?= lang('legal_basis'); ?></a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= lang('info'); ?></a>
                        <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="<?= site_url('page/info-zakat'); ?>"><?= lang('info_zakat'); ?></a>
                            <a class="dropdown-item" href="<?= site_url('news'); ?>"><?= lang('news'); ?></a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= lang('calculator'); ?></a>
                        <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="#">Zakat Fitrah</a>
                            <a class="dropdown-item" href="#">Zakat Mal</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url('question'); ?>"><?= lang('ask_us'); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url('page/hubungi-kami'); ?>"><?= lang('contact_us'); ?></a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Language</a>
                        <div class="dropdown-menu">
                            <?php foreach ($this->config->item('language_options') as $language => $language_text) : ?>
                                <?= anchor('language/switch_language/'.$language, $language_text, ['class' => 'dropdown-item']); ?>
                            <?php endforeach; ?>
                        </div>
                    </li>
                    <?php if (! $is_login) : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= site_url('auth/sign_up'); ?>"><?= lang('sign_up'); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= site_url('auth/sign_in'); ?>"><?= lang('sign_in'); ?></a>
                        </li>
                    <?php endif; ?>
                    <?php if ($is_login) : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= site_url('auth/sign_out'); ?>"><?= lang('sign_out'); ?></a>
                        </li>
                    <?php endif; ?>
                </ul><!-- end of ml-auto -->
            </div>
        </nav>
    </header><!--Main Navigation-->

    <main>
        <div class="container-fluid">
            <?php $this->load->view('frontend/_partials/messages'); ?><?= $content; ?>
        </div>
    </main>

    <?php $this->load->view('frontend/_partials/foot'); ?>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?= base_url('web/popper.js/popper.min.js'); ?>"></script>
    <script src="<?= base_url('web/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <script src="<?= base_url('web/bootstrap-autohidingnavbar/jquery.bootstrap-autohidingnavbar.min.js'); ?>"></script>
    <script src="<?= base_url('web/MDBootstrap/js/mdb.min.js'); ?>"></script>
    <script src="<?= base_url('web/sticky-kit/jquery.sticky-kit.min.js'); ?>"></script>
    <!-- Optional JavaScript -->
    <script src="<?= base_url('web/default/custom.js'); ?>"></script>
</body>
</html>
