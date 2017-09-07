<ol class="breadcrumb">
    <li class="breadcrumb-item active"><?= lang('answers'); ?></li>
</ol>

<?= anchor('backend/answers/create', lang('create')); ?>
<br /><br />
<table class="dynatable table table-responsive">
    <thead class="thead-inverse">
        <tr>
            <th><?= lang('no'); ?></th>
            <th><?= lang('question'); ?></th>
            <th><?= lang('answer_by'); ?></th>
            <th><?= lang('content'); ?></th>
            <th><?= lang('created_at'); ?></th>
            <th><?= lang('actions'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($answers as $i => $question) : ?>
            <tr>
                <td><?= $i + 1; ?></td>
                <td><?= $question->question_title; ?></td>
                <td><?= $question->user_name; ?></td>
                <td><?= $question->content; ?></td>
                <td><?= $question->created_at; ?></td>
                <td>
                    <?= anchor('backend/answers/update/'.$question->id, lang('update')); ?> |
                    <?= anchor('backend/answers/delete/'.$question->id, lang('delete'), ['onclick' => "return confirm('".lang('are_you_sure_you_want_to_delete_this')."')"]); ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<script>
$(document).ready(function() {
    $('.dynatable').dynatable();
});
</script>
