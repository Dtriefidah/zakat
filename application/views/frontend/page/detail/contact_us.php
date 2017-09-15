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


        <div class="justify-content-center row col-md-12">
            <div class="card col-md-6">
                <div class="card-body">
                    <?= form_open('page/contact_us_post'); ?>
                    <p><?= lang('contact_us'); ?></p>
                    <div class="md-form">
                        <i class="fa fa-user prefix grey-text"></i>
                        <?= form_label(lang('name'), 'name'); ?>
                        <?= form_input(['class' => 'form-control', 'id' => 'name', 'name' => 'name', 'required' => true, 'value' => set_value('name')]); ?>
                    </div>
                    <div class="md-form">
                        <i class="fa fa-phone prefix grey-text"></i>
                        <?= form_label(lang('phone_number'), 'phone_number'); ?>
                        <?= form_input(['class' => 'form-control', 'id' => 'phone_number', 'name' => 'phone_number', 'type' => 'number', 'required' => true, 'value' => set_value('phone_number')]); ?>
                    </div>
                    <div class="md-form">
                        <i class="fa fa-envelope prefix grey-text"></i>
                        <?= form_label(lang('email'), 'email'); ?>
                        <?= form_input(['class' => 'form-control', 'id' => 'email', 'name' => 'email', 'required' => true, 'type' => 'email', 'value' => set_value('email')]); ?>
                    </div>
                    <div class="md-form">
                        <i class="fa fa-pencil prefix grey-text"></i>
                        <?= form_label(lang('message'), 'message'); ?>
                        <?= form_textarea(['class' => 'form-control md-textarea', 'id' => 'message', 'name' => 'message', 'required' => true, 'rows' => 5, 'value' => set_value('message')]); ?>
                    </div>
                    <button class="btn btn-block indigo" name="sign_in" type="submit"><?= lang('send'); ?><i class="fa fa-paper-plane-o ml-1"></i></button>
                    <?= form_close(); ?>
                </div>
            </div>
        </div><!-- end of class row -->
    </div>

</div>
