<div class="row">
    <div class="col-md-12">
        <a class="btn btn-block btn-warning" href="<?= site_url('question/create?last_url='.base64_encode($last_url)); ?>"><?= lang('create_question'); ?></a>
    </div>
</div>
<hr />

<div class="row">
    <div class="col-md-12">
        <?php foreach ($questions as $question) : ?>
            <div class="card">
                <div class="card-header">
                    <a href="<?= site_url('question/'.$question->slug.'?last_url='.base64_encode($last_url)); ?>"><?= $question->title; ?></a>
                    <br />
                    <?= lang('by'); ?> <a href="#"><?= $question->user_name; ?></a>
                </div>
                <div class="card-body"><?= character_limiter($question->content, 500, ' ...'); // text_helper ?></div>
            </div>
            <hr />
        <?php endforeach; ?>
    </div>
</div>
