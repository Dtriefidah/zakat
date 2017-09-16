<div class="row">

    <!--Main column-->
    <div class="col-md-12">
        <!--Post-->
        <div class="post-wrapper wow fadeIn" data-wow-delay="0.2s">
            <!--Post data-->
            <h1 class="h1-responsive font-bold"><?= anchor($page->slug, $page->title); ?></h1>

            <!--Featured image -->
            <div align="center" class="view overlay hm-white-light z-depth-1-half">
                <img src="<?= $page->image; ?>" class="img-fluid " alt="" />
            </div>

            <!--Post excerpt-->
            <?= $page->content; ?>
        </div>
        <!--/.Post-->

        <hr />

        <div class="justify-content-center row">
            <div class="card col-md-6">
                <div class="card-body">
                    <?= form_open(current_url().'#contact_us_form', ['id' => 'contact_us_form']); ?>
                    <p><?= lang('contact_us'); ?></p>
                    <div class="md-form">
                        <i class="fa fa-user prefix grey-text"></i>
                        <?= form_label(lang('name'), 'name'); ?>
                        <?= form_input(['class' => 'form-control', 'id' => 'name', 'name' => 'name', 'required' => true, 'value' => set_value('name')]); ?>
                        <?= form_error('name', '<h6 class="text-danger"><small>', '</small></h6>'); ?>
                    </div>
                    <div class="md-form">
                        <i class="fa fa-phone prefix grey-text"></i>
                        <?= form_label(lang('phone_number'), 'phone_number'); ?>
                        <?= form_input(['class' => 'form-control', 'id' => 'phone_number', 'name' => 'phone_number', 'type' => 'number', 'required' => true, 'value' => set_value('phone_number')]); ?>
                        <?= form_error('phone_number', '<h6 class="text-danger"><small>', '</small></h6>'); ?>
                    </div>
                    <div class="md-form">
                        <i class="fa fa-envelope prefix grey-text"></i>
                        <?= form_label(lang('email'), 'email'); ?>
                        <?= form_input(['class' => 'form-control', 'id' => 'email', 'name' => 'email', 'required' => true, 'type' => 'email', 'value' => set_value('email')]); ?>
                        <?= form_error('email', '<h6 class="text-danger"><small>', '</small></h6>'); ?>
                    </div>
                    <div class="md-form">
                        <i class="fa fa-pencil prefix grey-text"></i>
                        <?= form_label(lang('message'), 'message'); ?>
                        <?= form_textarea(['class' => 'form-control md-textarea', 'id' => 'message', 'name' => 'message', 'required' => true, 'rows' => 5, 'value' => set_value('message')]); ?>
                        <?= form_error('message', '<h6 class="text-danger"><small>', '</small></h6>'); ?>
                    </div>
                    <button class="btn btn-block indigo" name="sign_in" type="submit"><?= lang('send'); ?><i class="fa fa-paper-plane-o ml-1"></i></button>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </div><!-- end of class row -->
</div>
