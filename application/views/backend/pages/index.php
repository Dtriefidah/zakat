<ol class="breadcrumb">
    <li class="breadcrumb-item active"><?= lang('pages'); ?></li>
</ol>

<?= anchor('backend/pages/create', lang('create')); ?>
<br /><br />
<table class="dynatable table table-responsive">
    <thead class="thead-inverse">
        <tr>
            <th><?= lang('no'); ?></th>
            <th><?= lang('title'); ?></th>
            <th><?= lang('slug'); ?></th>
            <th><?= lang('template'); ?></th>
            <th><?= lang('created_at'); ?></th>
            <th><?= lang('actions'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($pages as $i => $page) : ?>
            <tr>
                <td><?= $i + 1; ?></td>
                <td><?= $page->title; ?></td>
                <td><?= $page->slug; ?></td>
                <td><?= $page->template; ?></td>
                <td><?= $page->created_at; ?></td>
                <td>
                    <?= anchor('backend/pages/update/'.$page->id, lang('update')); ?> |
                    <?= anchor('backend/pages/delete/'.$page->id, lang('delete'), ['onclick' => "return confirm('".lang('are_you_sure_you_want_to_delete_this')."')"]); ?>
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
