<div class="row">

    <!--Main column-->
    <div class="col-md-12">
        <!--Post-->
        <div class="post-wrapper wow fadeIn" data-wow-delay="0.2s">
            <!--Post data-->
            <h1 class="h1-responsive font-bold"><?= anchor($page->slug, $page->title); ?></h1>

            <!--Featured image -->
            <?php if ($page->image) : ?>
                <div align="center" class="z-depth-1-half">
                    <img class="feature-image img-fluid" src="<?= base_url($page->image); ?>" />
                </div>
            <?php endif; ?>

            <!--Post excerpt-->
            <p><?= $page->content; ?></p>
        </div>
        <!--/.Post-->

        <hr />
    </div>

</div>

<div class="row">
    <div class="col-md-12">
        <?= form_open(); ?>
        <table class="table table-bordered table-hover table-sm">
            <tbody>
                <?php foreach ($products as $product) : ?>
                    <tr>
                        <td><?= $product->name; ?></td>
                        <td><?= $product->price; ?></td>
                        <td>
                            <?= form_hidden('product_id[]', $product->id); ?>
                            <div class="form-xs md-form">
                                <?= form_label(lang('quantity'), 'quantity'); ?>
                                <?= form_input(['class' => 'form-control', 'id' => 'quantity', 'name' => 'quantity[]', 'required' => true, 'type' => 'number', 'value' => set_value('quantity')]); ?>
                                <?= form_error('quantity[]', '<h6 class="text-danger"><small>', '</small></h6>'); ?>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <td colspan="3">
                    <button class="btn btn-warning pull-right" name="create" type="submit">
                        <i class="fa fa-pencil"></i> <?= lang('create'); ?>
                    </button>
                </td>
            </tfoot>
        </table>
        <?= form_close(); ?>
    </div>
</div>
