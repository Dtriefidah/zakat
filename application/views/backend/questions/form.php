<ol class="breadcrumb">
    <li class="breadcrumb-item"><?= anchor('backend/questions', lang('questions')); ?></li>
    <li class="breadcrumb-item active"><?= (isset($question) ? lang('update') : lang('create')); ?></li>
</ol>

<?= form_open(); ?>
<div class="form-group">
    <?= form_label(lang('user').' (*)'); ?>
    <?= form_dropdown(['class' => 'form-control', 'name' => 'user_id', 'options' => $Users_Model->users_options(), 'required' => true, 'selected' => (isset($question) ? set_value('user_id', $question->user_id) : set_value('user_id'))]); ?>
    <?= form_error('user_id', '<div class="text-danger">', '</div>'); ?>
</div>
<div class="form-group">
    <?= form_label(lang('title').' (*)'); ?>
    <?= form_input(['class' => 'form-control', 'name' => 'title', 'required' => true, 'value' => (isset($question) ? set_value('title', $question->title) : set_value('title'))]); ?>
    <?= form_error('title', '<div class="text-danger">', '</div>'); ?>
</div>
<div class="form-group">
    <?= form_label(lang('content')); ?>
    <?= form_textarea(['class' => 'form-control', 'name' => 'content', 'rows' => 3, 'value' => (isset($question) ? set_value('content', $question->content) : set_value('content'))]); ?>
    <?= form_error('content', '<div class="text-danger">', '</div>'); ?>
</div>
<?= isset($question) ? form_input(['name' => 'id', 'type' => 'hidden', 'value' => $question->id]) : ''; ?>
<?= form_submit('submit', (isset($question) ? lang('update') : lang('create')), ['class' => 'btn btn-block btn-success']); ?>
<?= form_close(); ?>
