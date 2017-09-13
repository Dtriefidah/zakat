<div class="card card-sign-in text-center">
    <?= form_open('', ['class' => '']); ?>
    <div class="card-header indigo white-text">
        <?= lang('please_sign_in'); ?>
    </div>
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
        </div>
        <div class="md-form">
            <?= form_label(lang('password'), 'password'); ?>
            <?= form_password(['class' => 'form-control', 'id' => 'password', 'name' => 'password', 'required' => true, 'value' => set_value('password')]); ?>
        </div>
    </div>
    <div class="card-footer text-muted white-text">
        <?= form_submit(['class' => 'btn btn-block indigo', 'name' => 'sign_in', 'value' => lang('sign_in')]); ?>
    </div>
    <div class="card-footer text-muted white-text">
        <?= anchor('auth/forget_password', lang('forget_password').'?'); ?><br />
        <?= anchor('', lang('back')); ?>
    </div>
    <?= form_close(); ?>
</div>
