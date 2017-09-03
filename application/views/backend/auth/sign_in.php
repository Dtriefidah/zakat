<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="<?= base_url('web/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet" />
    <link href="<?= base_url('web/default/backend/auth/sign_in.css'); ?>" rel="stylesheet" />
    <link href="<?= base_url('web/default/custom.css'); ?>" rel="stylesheet" />
</head>
<body>
    <div class="container">
        <?= form_open('', ['class' => 'form-signin']); ?>
        <?= validation_errors('<div class="alert alert-danger" role="alert">', '</div>'); ?>
        <h2 class="form-signin-heading">Please sign in</h2>

        <?= form_input('email', set_value('email'), ['class' => 'form-control', 'placeholder' => 'Email address', 'required' => true]); ?>
        <?= form_password('password', set_value('password'), ['class' => 'form-control', 'placeholder' => 'Password', 'required' => true]); ?>

        <?= form_submit('sign_in', 'Sign in', ['class' => 'btn btn-lg btn-primary btn-block']); ?>
        <?= form_close(); ?>
    </div> <!-- /container -->

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?= base_url('web/jquery/jquery.slim.min.js'); ?>"></script>
    <script src="<?= base_url('web/popper.js/popper.min.js'); ?>"></script>
    <script src="<?= base_url('web/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <!-- Optional JavaScript -->
    <script src="<?= base_url('web/default/custom.js'); ?>"></script>
</body>
</html>
