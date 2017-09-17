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
