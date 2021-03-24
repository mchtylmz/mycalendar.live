<?= $this->extend("layout/header") ?>
<?= $this->section("page_content") ?>
<div class="content-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mb-3">
                <div class="py-2 border-bottom">
                    <div class="form-title text-center">
                        <h3>Yeni Etkinlik Oluştur</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card card-block card-stretch create-workform">
                    <div class="card-body p-5">
                        <?php echo form_open(route_to('event.new')); ?>
                        <?= view('event/form/event') ?>
                        <div class="row">
                            <div class="col-lg-12 mt-3 mb-3 text-center">
                                <button type="submit" class="btn btn-outline-primary">Oluştur</button>
                            </div>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
