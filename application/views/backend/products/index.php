<ol class="breadcrumb">
    <li class="breadcrumb-item active"><?= lang('products'); ?></li>
</ol>

<?= anchor('backend/products/create', lang('create')); ?>
<br /><br />
<table class="dynatable table table-responsive">
    <thead class="thead-inverse">
        <tr>
            <th><?= lang('no'); ?></th>
            <th><?= lang('type'); ?></th>
            <th><?= lang('name'); ?></th>
            <th><?= lang('price'); ?></th>
            <th><?= lang('actions'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($products as $i => $product) : ?>
            <tr>
                <td><?= $i + 1; ?></td>
                <td><?= lang($product->type); ?></td>
                <td><?= $product->name; ?></td>
                <td><?= $product->price; ?></td>
                <td>
                    <?= anchor('backend/products/update/'.$product->id, lang('update')); ?> |
                    <?= anchor('backend/products/delete/'.$product->id, lang('delete'), ['onclick' => "return confirm('".lang('are_you_sure_you_want_to_delete_this')."')"]); ?>
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
