<div class="row">

    <!--Main column-->
    <div class="col-md-8">
        <!--Post-->
        <div class="post-wrapper wow fadeIn" data-wow-delay="0.2s">
            <!--Post data-->
            <h1 class="h1-responsive font-bold"><?= anchor($news->slug, $news->title); ?></h1>
            <h6>
                <?php $category = $Categories_Model->row(['id' => $news->category_id]);
                if ($category) {
                    echo anchor('category/'.$category->name, $category->name).', ';
                } ?>
                <?= date('d M Y', strtotime($news->created_at)); ?>
            </h6>

            <!--Featured image -->
            <?php if ($news->image) : ?>
                <div align="center" class="z-depth-1-half">
                    <img class="feature-image img-fluid" src="<?= base_url($news->image); ?>" />
                </div>
            <?php endif; ?>

            <!--Post excerpt-->
            <p><?= $news->content; ?></p>
        </div>
        <!--/.Post-->

        <hr />
    </div>

    <!--Sidebar-->
    <div class="col-md-4">
        <div class="sticky widget-wrapper wow fadeIn" data-wow-delay="0.4s">
            <h4 class="font-bold"><?= lang('categories'); ?>:</h4>
            <br />
            <div class="list-group">
                <?php foreach ($categories as $category) {
                    echo anchor('category/'.$category->slug, $category->name, ['class' => 'list-group-item']);
                } ?>
            </div>

            <hr />
        </div>
    </div>
    <!--/.Sidebar-->
</div>

<?php $this->load->view('frontend/news/index.js.php'); // view ?>
