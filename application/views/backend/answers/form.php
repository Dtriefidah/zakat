<ol class="breadcrumb">
    <li class="breadcrumb-item"><?= anchor('backend/answers', lang('answers')); ?></li>
    <li class="breadcrumb-item active"><?= (isset($answer) ? lang('update') : lang('create')); ?></li>
</ol>

<?= form_open(); ?>
<div class="form-group">
    <?= form_label(lang('question').' (*)'); ?>
    <?= form_dropdown(['class' => 'form-control', 'name' => 'question_id', 'options' => $Questions_Model->questions_options(), 'required' => true, 'selected' => (isset($answer) ? set_value('question_id', $answer->question_id) : set_value('question_id'))]); ?>
    <?= form_error('question_id', '<div class="text-danger">', '</div>'); ?>
</div>
<div class="form-group">
    <?= form_label(lang('user').' (*)'); ?>
    <?= form_dropdown(['class' => 'form-control', 'name' => 'user_id', 'options' => $Users_Model->users_options(), 'required' => true, 'selected' => (isset($answer) ? set_value('user_id', $answer->user_id) : set_value('user_id'))]); ?>
    <?= form_error('user_id', '<div class="text-danger">', '</div>'); ?>
</div>
<div class="form-group">
    <?= form_label(lang('content')); ?>
    <?= form_textarea(['class' => 'form-control', 'name' => 'content', 'rows' => 3, 'value' => (isset($answer) ? set_value('content', $answer->content) : set_value('content'))]); ?>
    <?= form_error('content', '<div class="text-danger">', '</div>'); ?>
</div>
<?= isset($answer) ? form_input(['name' => 'id', 'type' => 'hidden', 'value' => $answer->id]) : ''; ?>
<?= form_submit('submit', (isset($answer) ? lang('update') : lang('create')), ['class' => 'btn btn-block btn-success']); ?>
<?= form_close(); ?>
