<ol class="breadcrumb">
    <li class="breadcrumb-item active">Users</li>
</ol>

<?= anchor('backend/users/create', 'Create'); ?>
<br /><br />
<table class="dynatable table">
    <thead class="thead-inverse">
        <tr>
            <th>No</th>
            <th>User Type</th>
            <th>Email</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Actions</th>
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
                    <?= anchor('backend/users/update'.$user->id, 'Update'); ?> |
                    <?= anchor('backend/users/delete/'.$user->id, 'Delete'); ?>
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
