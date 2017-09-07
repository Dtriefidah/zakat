<ol class="breadcrumb">
    <li class="breadcrumb-item active"><?= lang('users'); ?></li>
</ol>

<?= anchor('backend/users/create', lang('create')); ?>
<br /><br />
<table class="dynatable table table-responsive">
    <thead class="thead-inverse">
        <tr>
            <th><?= lang('no'); ?></th>
            <th><?= lang('user_type'); ?></th>
            <th><?= lang('email'); ?></th>
            <th><?= lang('name'); ?></th>
            <th><?= lang('phone_number'); ?></th>
            <th><?= lang('actions'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $i => $user) : ?>
            <tr>
                <td><?= $i + 1; ?></td>
                <td><?= $user->user_type; ?></td>
                <td><?= $user->email; ?></td>
                <td><?= $user->name; ?></td>
                <td><?= $user->phone_number; ?></td>
                <td>
                    <?= anchor('backend/users/update/'.$user->id, lang('update')); ?> |
                    <?= anchor('backend/users/delete/'.$user->id, lang('delete'), ['onclick' => "return confirm('".lang('are_you_sure_you_want_to_delete_this')."')"]); ?>
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
