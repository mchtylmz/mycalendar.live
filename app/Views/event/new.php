<?= $this->extend("layout/header") ?>
<?= $this->section("page_content") ?>
<div class="content-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mb-2">
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
                        <?= view('event/form/event', [
                            'title' => old('title'),
                            'location_id' => old('location_id'),
                            'location' => old('location'),
                            'latlng' => old('latlng'),
                            'address' => old('address'),
                            'phone' => old('phone'),
                            'meet' => old('meet'),
                            'youtube' => old('youtube'),
                            'twitch' => old('twitch'),
                            'zoom' => old('zoom'),
                            'other' => old('other'),
                            'status' => old('status'),
                            'message_status' => old('message_status'),
                            'subscribe_status' => old('subscribe_status'),
                            'content' => html_entity_decode(old('content'))
                        ]) ?>
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
