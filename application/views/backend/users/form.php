<ol class="breadcrumb">
    <li class="breadcrumb-item"><?= anchor('backend/users', lang('users')); ?></li>
    <li class="breadcrumb-item active"><?= (isset($user) ? lang('update') : lang('create')); ?></li>
</ol>

<?= form_open(); ?>
<div class="form-group">
    <?= form_label(lang('user_type').' (*)'); ?>
    <?= form_dropdown(['class' => 'form-control', 'name' => 'user_type', 'options' => $Users_Model->get_user_type_options(), 'required' => true, 'selected' => (isset($user) ? set_value('user_type', $user->user_type) : set_value('user_type'))]); ?>
    <?= form_error('user_type', '<div class="text-danger">', '</div>'); ?>
</div>
<div class="form-group">
    <?= form_label(lang('email').' (*)'); ?>
    <?= form_input(['class' => 'form-control', 'name' => 'email', 'required' => true, 'type' => 'email', 'value' => (isset($user) ? set_value('email', $user->email) : set_value('email'))]); ?>
    <?= form_error('email', '<div class="text-danger">', '</div>'); ?>
</div>
<div class="form-group">
    <?= form_label(lang('password').(isset($user) ? '' : ' (*)')); ?>
    <?= form_input(['class' => 'form-control', 'name' => 'password', 'type' => 'password', 'value' => set_value('password')]); ?>
    <?= form_error('password', '<div class="text-danger">', '</div>'); ?>
</div>
<div class="form-group">
    <?= form_label(lang('name').' (*)'); ?>
    <?= form_input(['class' => 'form-control', 'name' => 'name', 'required' => true, 'value' => (isset($user) ? set_value('name', $user->name) : set_value('name'))]); ?>
    <?= form_error('name', '<div class="text-danger">', '</div>'); ?>
</div>
<div class="form-group">
    <?= form_label(lang('address').' (*)'); ?>
    <?= form_textarea(['class' => 'form-control', 'name' => 'address', 'required' => true, 'rows' => 3, 'value' => (isset($user) ? set_value('address', $user->address) : set_value('address'))]); ?>
    <?= form_error('address', '<div class="text-danger">', '</div>'); ?>
</div>
<div class="form-group">
    <?= form_label(lang('phone_number').' (*)'); ?>
    <?= form_input(['class' => 'form-control', 'name' => 'phone_number', 'required' => true, 'value' => (isset($user) ? set_value('phone_number', $user->phone_number) : set_value('phone_number'))]); ?>
    <?= form_error('phone_number', '<div class="text-danger">', '</div>'); ?>
</div>
<?= isset($user) ? form_input(['name' => 'id', 'type' => 'hidden', 'value' => $user->id]) : ''; ?>
<?= form_submit('submit', (isset($user) ? lang('update') : lang('create')), ['class' => 'btn btn-block btn-success']); ?>
<?= form_close(); ?>
