<?= form_open(''); ?>
<div class="card card-sign-in text-center">
    <div class="card-header indigo white-text"><?= lang('question'); ?></div>
    <div class="card-body">
        <div class="md-form">
            <?= form_label(lang('title'), 'title'); ?>
            <?= form_input(['class' => 'form-control', 'id' => 'title', 'name' => 'title', 'required' => true, 'value' => set_value('title')]); ?>
            <?= form_error('title', '<h6 class="text-danger"><small>', '</small></h6>'); ?>
        </div>
        <div class="md-form">
            <?= form_label(lang('content'), 'content'); ?>
            <?= form_textarea(['class' => 'form-control md-textarea', 'id' => 'content', 'name' => 'content', 'required' => true, 'rows' => 3, 'value' => set_value('content')]); ?>
            <?= form_error('content', '<h6 class="text-danger"><small>', '</small></h6>'); ?>
        </div>
    </div>
    <div class="card-footer">
        <a class="btn btn-blue-grey" href="<?= $last_url; ?>">
            <i class="fa fa-arrow-circle-left"></i> <?= lang('back'); ?>
        </a>
        <button class="btn btn-warning" name="create" type="submit">
            <i class="fa fa-pencil"></i> <?= lang('create'); ?>
        </button>
    </div>
</div>
<?= form_close(); ?>
