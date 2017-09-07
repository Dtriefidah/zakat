<ol class="breadcrumb">
    <li class="breadcrumb-item active"><?= lang('news'); ?></li>
</ol>

<?= anchor('backend/news/create', lang('create')); ?>
<br /><br />
<table class="dynatable table table-responsive">
    <thead class="thead-inverse">
        <tr>
            <th><?= lang('no'); ?></th>
            <th><?= lang('title'); ?></th>
            <th><?= lang('categories'); ?></th>
            <th><?= lang('created_at'); ?></th>
            <th><?= lang('actions'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($news as $i => $user) : ?>
            <tr>
                <td><?= $i + 1; ?></td>
                <td><?= $user->title; ?></td>
                <td><?= $user->category_name; ?></td>
                <td><?= $user->created_at; ?></td>
                <td>
                    <?= anchor('backend/news/update/'.$user->id, lang('update')); ?> |
                    <?= anchor('backend/news/delete/'.$user->id, lang('delete'), ['onclick' => "return confirm('".lang('are_you_sure_you_want_to_delete_this')."')"]); ?>
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
