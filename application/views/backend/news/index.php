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
        <?php foreach ($news as $i => $row) : ?>
            <tr>
                <td><?= $i + 1; ?></td>
                <td><?= $row->title; ?></td>
                <td><?= $row->category_name; ?></td>
                <td><?= $row->created_at; ?></td>
                <td>
                    <?= anchor('backend/news/update/'.$row->id, lang('update')); ?> |
                    <?= anchor('backend/news/delete/'.$row->id, lang('delete'), ['onclick' => "return confirm('".lang('are_you_sure_you_want_to_delete_this')."')"]); ?>
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
