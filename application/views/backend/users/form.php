<ol class="breadcrumb">
    <li class="breadcrumb-item"><?= anchor('backend/users', 'Users'); ?></li>
    <li class="breadcrumb-item active">Create</li>
</ol>

<?= form_open(); ?>
<div class="form-group">
    <?= form_label('User Type'); ?>
    <?= form_dropdown(['class' => 'form-control', 'name' => 'user_type', 'options' => $Users_Model->get_user_type_options(), 'required' => true, 'value' => set_value('user_type')]); ?>
    <?= form_error('user_type', '<div class="text-danger">', '</div>'); ?>
</div>
<div class="form-group">
    <?= form_label('Email'); ?>
    <?= form_input(['class' => 'form-control', 'name' => 'email', 'required' => true, 'type' => 'email', 'value' => set_value('email')]); ?>
    <?= form_error('email', '<div class="text-danger">', '</div>'); ?>
</div>
<div class="form-group">
    <?= form_label('Password'); ?>
    <?= form_input(['class' => 'form-control', 'name' => 'password', 'required' => true, 'type' => 'password', 'value' => set_value('password')]); ?>
    <?= form_error('password', '<div class="text-danger">', '</div>'); ?>
</div>
<div class="form-group">
    <?= form_label('Name'); ?>
    <?= form_input(['class' => 'form-control', 'name' => 'name', 'required' => true, 'value' => set_value('name')]); ?>
    <?= form_error('name', '<div class="text-danger">', '</div>'); ?>
</div>
<div class="form-group">
    <?= form_label('Address'); ?>
    <?= form_input(['class' => 'form-control', 'name' => 'address', 'required' => true, 'value' => set_value('address')]); ?>
    <?= form_error('address', '<div class="text-danger">', '</div>'); ?>
</div>
<div class="form-group">
    <?= form_label('Phone Number'); ?>
    <?= form_input(['class' => 'form-control', 'name' => 'phone_number', 'required' => true, 'value' => set_value('phone_number')]); ?>
    <?= form_error('phone_number', '<div class="text-danger">', '</div>'); ?>
</div>
<?= form_submit('submit', 'Create', ['class' => 'btn btn-block btn-success']); ?>
<?= form_close(); ?>
