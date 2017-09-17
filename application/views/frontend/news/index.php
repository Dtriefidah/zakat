<div class="row">

    <!--Main column-->
    <div class="col-md-8">
        <?php foreach ($news as $post) : ?>
            <!--Post-->
            <div class="post-wrapper wow fadeIn" data-wow-delay="0.2s">
                <!--Post data-->
                <h1 class="h1-responsive font-bold"><?= anchor($post->slug, $post->title); ?></h1>
                <h6>
                    <?php $category = $Categories_Model->row(['id' => $post->category_id]);
                    if ($category) {
                        echo anchor('category/'.$category->name, $category->name).', ';
                    } ?>
                    <?= date('d M Y', strtotime($post->created_at)); ?>
                </h6>

                <!--Featured image -->
                <?php if ($post->image) : ?>
                    <div align="center" class="z-depth-1-half">
                        <a href="<?= site_url($post->slug); ?>">
                            <img class="feature-image img-fluid" src="<?= base_url($post->image); ?>" />
                        </a>
                    </div>
                <?php endif; ?>

                <!--Post excerpt-->
                <p><?= word_limiter(strip_tags($post->content), 50, ' ...'); ?></p>

                <!--"Read more" button-->
                <a class="btn btn-info" href="<?= site_url($post->slug); ?>"><?= lang('read_more'); ?></a>
            </div>
            <!--/.Post-->

            <hr />
        <?php endforeach; ?>

        <nav><ul class="flex-center pagination pg-dark"><?= $news_pagination; ?></ul></nav>
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
