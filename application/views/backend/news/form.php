<ol class="breadcrumb">
    <li class="breadcrumb-item"><?= anchor('backend/news', lang('news')); ?></li>
    <li class="breadcrumb-item active"><?= (isset($news) ? lang('update') : lang('create')); ?></li>
</ol>

<?= form_open(); ?>
<div class="form-group">
    <?= form_label(lang('category')); ?>
    <?= form_dropdown(['class' => 'form-control', 'name' => 'category_id', 'options' => $Categories_Model->categories_options(), 'selected' => (isset($news) ? set_value('category_id', $news->category_id) : set_value('category_id'))]); ?>
    <?= form_error('category_id', '<div class="text-danger">', '</div>'); ?>
</div>
<div class="form-group">
    <?= form_label(lang('title').' (*)'); ?>
    <?= form_input(['class' => 'form-control', 'name' => 'title', 'required' => true, 'value' => (isset($news) ? set_value('title', $news->title) : set_value('title'))]); ?>
    <?= form_error('title', '<div class="text-danger">', '</div>'); ?>
</div>
<?php if (isset($news)) : ?>
    <div class="form-group">
        <?= form_label(lang('slug').' (*)'); ?>
        <?= form_input(['class' => 'form-control', 'name' => 'slug', 'readonly' => true, 'required' => true, 'type' => 'slug', 'value' => (isset($news) ? set_value('slug', $news->slug) : set_value('slug'))]); ?>
        <?= form_error('slug', '<div class="text-danger">', '</div>'); ?>
    </div>
<?php endif; ?>
<div class="form-group">
    <?= form_label(lang('content')); ?>
    <?= form_textarea(['class' => 'form-control', 'name' => 'content', 'rows' => 3, 'value' => (isset($news) ? set_value('content', $news->content) : set_value('content'))]); ?>
    <?= form_error('content', '<div class="text-danger">', '</div>'); ?>
</div>
<?= isset($news) ? form_input(['name' => 'id', 'type' => 'hidden', 'value' => $news->id]) : ''; ?>
<?= form_submit('submit', (isset($news) ? lang('update') : lang('create')), ['class' => 'btn btn-block btn-success']); ?>
<?= form_close(); ?>
