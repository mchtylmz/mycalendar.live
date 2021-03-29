<?= $this->extend("layout/header") ?>
<?= $this->section("page_content") ?>
<div class="container">
    <div class="row no-gutters height-self-center">
        <div class="col-sm-12 text-center align-self-center">
            <div class="iq-error position-relative">
                <img src="http://iqonic.design/themes/calendify/html/assets/images/error/404.png"
                     class="img-fluid iq-error-img" alt="">
                <h2 class="mb-0 mt-4">Oops! This Page is Not Found.</h2>
                <p>The requested page dose not exist.</p>
                <a class="btn btn-primary d-inline-flex align-items-center mt-3" href="<?= site_url() ?>">
                    <i class="ri-home-4-line mr-2"></i> Anasayfa
                </a>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
