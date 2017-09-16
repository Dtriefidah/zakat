<div class="row">
    <div class="col-md-6 col-xs-6">
        <a class="btn btn-block btn-blue-grey" href="<?= $last_url; ?>">
            <i class="fa fa-arrow-circle-left"></i> <?= lang('back'); ?>
        </a>
    </div>
    <div class="col-md-6 col-xs-6">
        <a class="btn btn-block btn-warning" href="#answer_form">
            <i class="fa fa-pencil-square-o"></i> <?= lang('reply'); ?>
        </a>
    </div>
</div>
<hr />

<div class="media">
    <img class="d-flex mr-3 profile" data-name="<?= $question->user_name; ?>" width="64px" />
    <div class="media-body">
        <div class="card">
            <div class="card-header">
                <?= $question->title; ?>
                <br />
                <?= lang('by'); ?> <a href="#"><?= $question->user_name; ?></a> <?= date('d M Y H:i', strtotime($question->created_at)); ?>
            </div>
            <div class="card-body"><?= nl2br($question->content); ?></div>
        </div>
    </div>
</div>
<hr />

<?php foreach ($answers as $answer) : ?>
    <div class="media">
        <img class="d-flex mr-3 profile" data-name="<?= $answer->user_name; ?>" width="64px" />
        <div class="media-body">
            <div class="card">
                <div class="card-header">
                    <?= lang('by'); ?> <a href="#"><?= $answer->user_name; ?></a> <?= date('d M Y H:i', strtotime($answer->created_at)); ?>
                </div>
                <div class="card-body"><?= nl2br($answer->content); ?></div>
            </div>
        </div>
    </div>
    <hr />
<?php endforeach; ?>

<?= form_open(current_url_with_params(), ['id' => 'answer_form']); ?>
<div class="card card-sign-in text-center">
    <div class="card-header indigo white-text"><?= lang('reply'); ?></div>
    <div class="card-body">
        <div class="md-form">
            <?= form_label(lang('content'), 'content'); ?>
            <?= form_textarea(['class' => 'form-control md-textarea', 'id' => 'content', 'name' => 'content', 'required' => true, 'rows' => 3, 'value' => set_value('content')]); ?>
            <?= form_error('content', '<h6 class="text-danger"><small>', '</small></h6>'); ?>
        </div>
    </div>
    <div class="card-footer text-muted white-text">
        <a class="btn btn-blue-grey" href="<?= $last_url; ?>">
            <i class="fa fa-arrow-circle-left"></i> <?= lang('back'); ?>
        </a>
        <button class="btn btn-warning" name="reply" type="submit" value="reply">
            <i class="fa fa fa-pencil-square-o"></i> <?= lang('reply'); ?>
        </button>
    </div>
</div>
<?= form_close(); ?>
