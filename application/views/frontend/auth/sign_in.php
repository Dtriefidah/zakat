<div class="card card-sign-in text-center">
    <?= form_open(current_url_with_params()); ?>
    <div class="card-header indigo white-text"><?= lang('please_sign_in'); ?></div>
    <div class="card-footer">
        <?= lang('do_not_have_account'); ?>?
        <?= lang('sign_up'); ?>
        <?= anchor('auth/sign_up', strtolower(lang('here'))); ?>
    </div>
    <?= validation_errors() ? '<div class="alert alert-danger" role="alert">'.validation_errors().'</div>' : ''; ?>
    <div class="card-body">
        <div class="md-form">
            <?= form_label(lang('email'), 'email'); ?>
            <?= form_input(['class' => 'form-control', 'id' => 'email', 'name' => 'email', 'required' => true, 'type' => 'email', 'value' => set_value('email')]); ?>
            <?= form_error('email', '<h6 class="text-danger"><small>', '</small></h6>'); ?>
        </div>
        <div class="md-form">
            <?= form_label(lang('password'), 'password'); ?>
            <?= form_password(['class' => 'form-control', 'id' => 'password', 'name' => 'password', 'required' => true, 'value' => set_value('password')]); ?>
            <?= form_error('password', '<h6 class="text-danger"><small>', '</small></h6>'); ?>
        </div>
    </div>
    <div class="card-footer">
        <?= form_submit(['class' => 'btn btn-block btn-warning', 'name' => 'sign_in', 'value' => lang('sign_in')]); ?>
    </div>
    <div class="card-footer">
        <?= anchor('auth/forget_password', lang('forget_password').'?'); ?><br />
        <?= anchor('', lang('back')); ?>
    </div>
    <?= form_close(); ?>
</div>
