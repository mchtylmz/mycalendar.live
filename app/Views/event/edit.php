<?= $this->extend("layout/header") ?>
<?= $this->section("page_content") ?>
<div class="content-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mb-2">
                <div class="py-2 border-bottom">
                    <div class="form-title text-center">
                        <h3>Etkinliği Düzenle</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card card-block card-stretch create-workform">
                    <div class="card-body p-5">
                        <?php echo form_open(route_to('event.edit', $event->id)); ?>
                        <?= view('event/form/event', [
                            'title' => $event->title,
                            'category' => $event->category->id,
                            'start_date' => date('d.m.Y', strtotime($event->edit('start_datetime'))),
                            'end_date' => date('d.m.Y', strtotime($event->edit('end_datetime'))),
                            'start_time' => date('H:i', strtotime($event->edit('start_datetime'))),
                            'end_time' => date('H:i', strtotime($event->edit('end_datetime'))),
                            'location' => $event->edit('location'),
                            'tags' => $event->tags,
                            'status' => $event->status,
                            'message_status' => $event->message_status,
                            'subscribe_status' => $event->subscribe_status,
                            'content' => html_entity_decode($event->content)
                        ]) ?>
                        <div class="row">
                            <div class="col-lg-12 mt-3 mb-3 text-center">
                                <button type="submit" class="btn btn-outline-success">Güncelle</button>
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
