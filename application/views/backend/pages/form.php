<ol class="breadcrumb">
    <li class="breadcrumb-item"><?= anchor('backend/pages', lang('pages')); ?></li>
    <li class="breadcrumb-item active"><?= (isset($page) ? lang('update') : lang('create')); ?></li>
</ol>

<?= form_open(); ?>
<div class="form-group">
    <?= form_label(lang('title').' (*)'); ?>
    <?= form_input(['class' => 'form-control', 'name' => 'title', 'required' => true, 'value' => (isset($page) ? set_value('title', $page->title) : set_value('title'))]); ?>
    <?= form_error('title', '<div class="text-danger">', '</div>'); ?>
</div>
<?php if (isset($page)) : ?>
    <div class="form-group">
        <?= form_label(lang('slug').' (*)'); ?>
        <?= form_input(['class' => 'form-control', 'name' => 'slug', 'readonly' => true, 'required' => true, 'type' => 'slug', 'value' => (isset($page) ? set_value('slug', $page->slug) : set_value('slug'))]); ?>
        <?= form_error('slug', '<div class="text-danger">', '</div>'); ?>
    </div>
<?php endif; ?>
<div class="form-group">
    <?= form_label(lang('content')); ?>
    <?= form_textarea(['class' => 'form-control', 'id' => 'content_summernote', 'name' => 'content', 'rows' => 3, 'value' => (isset($page) ? set_value('content', $page->content) : set_value('content'))]); ?>
    <?= form_error('content', '<div class="text-danger">', '</div>'); ?>
</div>
<div class="form-group">
    <?= form_label(lang('image')); ?>
    <?= form_input(['name' => 'image', 'id' => 'image', 'type' => 'hidden', 'value' => (isset($page) ? set_value('image', $page->image) : set_value('image'))]); ?>
    <?= form_error('image', '<div class="text-danger">', '</div>'); ?>

    <div class="dropzone" id="image_dropzone"></div>
    <div class="text-danger" id="image_dropzone_error"></div>
</div>
<div class="form-group">
    <?= form_label(lang('template').' (*)'); ?>
    <?= form_dropdown(['class' => 'form-control', 'name' => 'template', 'options' => $Pages_Model->template_options(), 'selected' => (isset($page) ? set_value('template', $page->template) : set_value('template'))]); ?>
    <?= form_error('template', '<div class="text-danger">', '</div>'); ?>
</div>
<?= isset($page) ? form_input(['id' => 'id', 'name' => 'id', 'type' => 'hidden', 'value' => $page->id]) : ''; ?>
<?= form_submit('submit', (isset($page) ? lang('update') : lang('create')), ['class' => 'btn btn-block btn-success']); ?>
<?= form_close(); ?>

<?php $this->load->view('backend/pages/form.js.php'); // view ?>
