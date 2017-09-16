<div class="row">
    <div class="col-md-12">
        <a class="btn btn-block btn-warning" href="<?= site_url('question/create?last_url='.base64_encode($last_url)); ?>">
            <i class="fa fa-pencil"></i> <?= lang('create_question'); ?>
        </a>
    </div>
</div>
<hr />

<?php foreach ($questions as $question) : ?>
    <div class="media">
        <img class="d-flex mr-3 profile" data-name="<?= $question->user_name; ?>" width="64px" />
        <div class="media-body">
            <div class="card">
                <div class="card-header">
                    <a href="<?= site_url('question/'.$question->slug.'?last_url='.base64_encode($last_url)); ?>"><?= $question->title; ?></a>
                    <br />
                    <?= lang('by'); ?> <a href="#"><?= $question->user_name; ?></a> <?= date('d M Y H:i', strtotime($question->created_at)); ?>
                </div>
                <div class="card-body"><?= character_limiter($question->content, 500, ' ...'); // text_helper ?></div>
            </div>
        </div>
    </div>
    <hr />
<?php endforeach; ?>

<nav><ul class="flex-center pagination pg-dark"><?= $questions_pagination; ?></ul></nav>
