<ol class="breadcrumb">
    <li class="breadcrumb-item active"><?= lang('questions'); ?></li>
</ol>

<?= anchor('backend/questions/create', lang('create')); ?>
<br /><br />
<table class="dynatable table table-responsive">
    <thead class="thead-inverse">
        <tr>
            <th><?= lang('no'); ?></th>
            <th><?= lang('user'); ?></th>
            <th><?= lang('title'); ?></th>
            <th><?= lang('slug'); ?></th>
            <th><?= lang('created_at'); ?></th>
            <th><?= lang('actions'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($questions as $i => $question) : ?>
            <tr>
                <td><?= $i + 1; ?></td>
                <td><?= $question->user_name; ?></td>
                <td><?= $question->title; ?></td>
                <td><?= $question->slug; ?></td>
                <td><?= $question->created_at; ?></td>
                <td>
                    <?= anchor('backend/questions/update/'.$question->id, lang('update')); ?> |
                    <?= anchor('backend/questions/delete/'.$question->id, lang('delete'), ['onclick' => "return confirm('".lang('are_you_sure_you_want_to_delete_this')."')"]); ?>
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
