<footer class="page-footer center-on-small-only">

    <!--Footer links-->
    <div class="container-fluid">
        <div class="row">
            <!--First column-->
            <div class="col-md-4">
                <h5 class="title mb-3"><strong>About material design</strong></h5>
                <p>Material Design (codenamed Quantum Paper) is a design language developed by Google.</p>
                <p>Material Design for Bootstrap (MDB) is a powerful Material Design UI KIT for most popular HTML, CSS,
                    and JS framework - Bootstrap.
                </p>
            </div>
            <!--/.First column-->
            <hr class="w-100 clearfix d-sm-none">
            <!--Second column-->
            <div class="col-md-4">
                <h5 class="title mb-3"><strong>First column</strong></h5>
                <ul>
                    <li>
                        <a href="#!">Link 1</a>
                    </li>
                    <li>
                        <a href="#!">Link 2</a>
                    </li>
                    <li>
                        <a href="#!">Link 3</a>
                    </li>
                    <li>
                        <a href="#!">Link 4</a>
                    </li>
                </ul>
            </div>
            <!--/.Second column-->
            <hr class="w-100 clearfix d-sm-none">
            <!--Third column-->
            <div class="col-md-4">
                <h5 class="title mb-3"><strong>Second column</strong></h5>
                <ul>
                    <li>
                        <a href="#!">Link 1</a>
                    </li>
                    <li>
                        <a href="#!">Link 2</a>
                    </li>
                    <li>
                        <a href="#!">Link 3</a>
                    </li>
                    <li>
                        <a href="#!">Link 4</a>
                    </li>
                </ul>
            </div>
            <!--/.Third column-->
        </div>
    </div>
    <!--/.Footer links-->

    <div class="footer-copyright">
        <div class="container-fluid">&copy; <?= date('Y').' '.lang('copyright'); ?>: <?= anchor('', 'Zakat'); ?></div>
    </div>
</footer>
<div align="center">Page rendered in <strong>{elapsed_time}</strong> seconds. Memory Usage: <strong>{memory_usage}</strong>. <?= (ENVIRONMENT === 'development') ? 'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : ''; ?></div>
