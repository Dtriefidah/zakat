<div class="card card-sign-up text-center">
    <?= form_open('', ['class' => '']); ?>
    <div class="card-header indigo white-text"><?= lang('sign_up'); ?></div>
    <?= validation_errors() ? '<div class="alert alert-danger" role="alert">'.validation_errors().'</div>' : ''; ?>
    <div class="card-body">
        <div class="md-form">
            <?= form_label(lang('name'), 'name'); ?>
            <?= form_input(['class' => 'form-control', 'id' => 'name', 'name' => 'name', 'required' => true, 'value' => set_value('name')]); ?>
            <?= form_error('name', '<h6 class="text-danger"><small>', '</small></h6>'); ?>
        </div>
        <div class="md-form">
            <?= form_label(lang('phone_number'), 'phone_number'); ?>
            <?= form_input(['class' => 'form-control', 'id' => 'phone_number', 'name' => 'phone_number', 'required' => true, 'value' => set_value('phone_number')]); ?>
            <?= form_error('phone_number', '<h6 class="text-danger"><small>', '</small></h6>'); ?>
        </div>
        <div class="md-form">
            <?= form_label(lang('email'), 'email'); ?>
            <?= form_input(['class' => 'form-control', 'id' => 'email', 'name' => 'email', 'type' => 'email', 'required' => true, 'value' => set_value('email')]); ?>
            <?= form_error('email', '<h6 class="text-danger"><small>', '</small></h6>'); ?>
        </div>
        <div class="md-form">
            <?= form_label(lang('password'), 'password'); ?>
            <?= form_password(['class' => 'form-control', 'id' => 'password', 'name' => 'password', 'required' => true, 'value' => set_value('password')]); ?>
            <?= form_error('password', '<h6 class="text-danger"><small>', '</small></h6>'); ?>
        </div>
    </div>
    <div class="card-footer">
        <?= form_submit(['class' => 'btn btn-block btn-warning', 'name' => 'sign_up_account', 'value' => lang('sign_up_account')]); ?>
    </div>
    <div class="card-footer"><?= anchor('', lang('back')); ?></div>
    <?= form_close(); ?>
</div>
