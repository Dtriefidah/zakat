<ol class="breadcrumb">
    <li class="breadcrumb-item"><?= anchor('backend/products', lang('products')); ?></li>
    <li class="breadcrumb-item active"><?= (isset($product) ? lang('update') : lang('create')); ?></li>
</ol>

<?= form_open(); ?>
<div class="form-group">
    <?= form_label(lang('type').' (*)'); ?>
    <?= form_dropdown(['class' => 'form-control', 'name' => 'type', 'options' => $Products_Model->get_type_options(), 'required' => true, 'selected' => (isset($product) ? set_value('type', $product->type) : set_value('type'))]); ?>
    <?= form_error('type', '<div class="text-danger">', '</div>'); ?>
</div>
<div class="form-group">
    <?= form_label(lang('name').' (*)'); ?>
    <?= form_input(['class' => 'form-control', 'name' => 'name', 'required' => true, 'value' => (isset($product) ? set_value('name', $product->name) : set_value('name'))]); ?>
    <?= form_error('name', '<div class="text-danger">', '</div>'); ?>
</div>
<?php if (isset($product)) : ?>
    <div class="form-group">
        <?= form_label(lang('slug').' (*)'); ?>
        <?= form_input(['class' => 'form-control', 'name' => 'slug', 'readonly' => true, 'required' => true, 'type' => 'slug', 'value' => (isset($product) ? set_value('slug', $product->slug) : set_value('slug'))]); ?>
        <?= form_error('slug', '<div class="text-danger">', '</div>'); ?>
    </div>
<?php endif; ?>
<div class="form-group">
    <?= form_label(lang('price').' (*)'); ?>
    <?= form_input(['class' => 'form-control', 'name' => 'price', 'required' => true, 'type' => 'number', 'value' => (isset($product) ? set_value('price', $product->price) : set_value('price'))]); ?>
    <?= form_error('price', '<div class="text-danger">', '</div>'); ?>
</div>
<div class="form-group">
    <?= form_label(lang('content')); ?>
    <?= form_textarea(['class' => 'form-control', 'id' => 'content_summernote', 'name' => 'content', 'rows' => 3, 'value' => (isset($page) ? set_value('content', $page->content) : set_value('content'))]); ?>
    <?= form_error('content', '<div class="text-danger">', '</div>'); ?>
</div>
<div class="form-group">
    <?= form_label(lang('images')); ?>
    <?= form_input(['class' => 'images', 'name' => 'images[]', 'type' => 'hidden']); ?>
    <?= form_error('images', '<div class="text-danger">', '</div>'); ?>

    <?php if (isset($product)) {
        $images = json_decode($product->images);
        foreach ($images as $image) {
            echo form_input(['class' => 'images', 'name' => 'images[]', 'type' => 'hidden', 'value' => $image]);
        }
    } ?>

    <div class="dropzone" id="images_dropzone"></div>
    <div class="text-danger" id="images_dropzone_error"></div>
</div>
<?= isset($product) ? form_input(['id' => 'id', 'name' => 'id', 'type' => 'hidden', 'value' => $product->id]) : ''; ?>
<?= form_submit('submit', (isset($product) ? lang('update') : lang('create')), ['class' => 'btn btn-block btn-success']); ?>
<?= form_close(); ?>

<?php $this->load->view('backend/products/form.js.php'); // view ?>
