<ol class="breadcrumb">
    <li class="breadcrumb-item active"><?= lang('categories'); ?></li>
</ol>

<?= anchor('backend/categories/create', lang('create')); ?>
<br /><br />
<table class="dynatable table table-responsive">
    <thead class="thead-inverse">
        <tr>
            <th><?= lang('no'); ?></th>
            <th><?= lang('name'); ?></th>
            <th><?= lang('slug'); ?></th>
            <th><?= lang('actions'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($categories as $i => $user) : ?>
            <tr>
                <td><?= $i + 1; ?></td>
                <td><?= $user->name; ?></td>
                <td><?= $user->slug; ?></td>
                <td>
                    <?= anchor('backend/categories/update/'.$user->id, lang('update')); ?> |
                    <?= anchor('backend/categories/delete/'.$user->id, lang('delete'), ['onclick' => "return confirm('".lang('are_you_sure_you_want_to_delete_this')."')"]); ?>
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
