<div class="row">

    <!--Main column-->
    <div class="col-md-12">
        <!--Post-->
        <div class="post-wrapper wow fadeIn" data-wow-delay="0.2s">
            <!--Post data-->
            <h1 class="h1-responsive font-bold"><?= anchor($page->slug, $page->title); ?></h1>
            <br />

            <!--Featured image -->
            <div align="center" class="view overlay hm-white-light z-depth-1-half">
                <img src="<?= $page->image; ?>" class="img-fluid " alt="" />
            </div>
            <br />

            <!--Post excerpt-->
            <p><?= $page->content; ?></p>
        </div>
        <!--/.Post-->

        <hr />
    </div>
    
</div>
