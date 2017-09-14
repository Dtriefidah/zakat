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
                <br />

                <!--Featured image -->
                <div class="view overlay hm-white-light z-depth-1-half">
                    <img src="<?= $post->image; ?>" class="img-fluid " alt="" />
                </div>
                <br />

                <!--Post excerpt-->
                <p><?= $post->content; ?></p>
            </div>
            <!--/.Post-->

            <hr />
        <?php endforeach; ?>
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
