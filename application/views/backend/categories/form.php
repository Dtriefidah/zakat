<ol class="breadcrumb">
    <li class="breadcrumb-item"><?= anchor('backend/categories', lang('categories')); ?></li>
    <li class="breadcrumb-item active"><?= (isset($category) ? lang('update') : lang('create')); ?></li>
</ol>

<?= form_open(); ?>
<div class="form-group">
    <?= form_label(lang('name').' (*)'); ?>
    <?= form_input(['class' => 'form-control', 'name' => 'name', 'required' => true, 'value' => (isset($category) ? set_value('name', $category->name) : set_value('name'))]); ?>
    <?= form_error('name', '<div class="text-danger">', '</div>'); ?>
</div>
<?php if (isset($category)) : ?>
    <div class="form-group">
        <?= form_label(lang('slug').' (*)'); ?>
        <?= form_input(['class' => 'form-control', 'name' => 'slug', 'readonly' => true, 'required' => true, 'type' => 'slug', 'value' => (isset($category) ? set_value('slug', $category->slug) : set_value('slug'))]); ?>
        <?= form_error('slug', '<div class="text-danger">', '</div>'); ?>
    </div>
<?php endif; ?>
<?= isset($category) ? form_input(['name' => 'id', 'type' => 'hidden', 'value' => $category->id]) : ''; ?>
<?= form_submit('submit', (isset($category) ? lang('update') : lang('create')), ['class' => 'btn btn-block btn-success']); ?>
<?= form_close(); ?>
