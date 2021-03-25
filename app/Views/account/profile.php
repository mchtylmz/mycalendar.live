<?= $this->extend("layout/header") ?>
<?= $this->section("page_content") ?>
<div class="content-page">
    <div class="container-fluid container">
        <div class="row mt-3">
            <div class="col-lg-4">
                <?= view('account/profile-sidebar', [
                    'User' => $User,
                    'showPhone' => auth_check()
                ]) ?>
            </div>
            <div class="col-lg-8">
                <?php if ($User->about) : ?>
                    <div class="card card-block mb-3">
                        <div class="card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title mb-0">Hakkında</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <?= html_entity_decode($User->about) ?>
                        </div>
                    </div>
                <?php endif; ?>
                <!-- Oluşturduğu Etkinlikler -->
                <div class="card card-block mb-3">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-lg-8">
                                <div class="iq-header-title">
                                    <h4 class="card-title mb-0">Etkinlikler</h4>
                                </div>
                            </div>
                            <div class="col-lg-4 text-right">
                                <div class="badge badge-color text-center ml-3">Oluşturdu</div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <?php if ($events = $User->myEvents(3)): ?>
                            <?php foreach ($events as $key => $event): ?>
                                <?= view('event/element/event_design1', [
                                'event' => $event,
                                'showButtons' => false,
                                'showOwner' => false,
                                'class' => 'shadow-none mb-1 border'
                            ]); ?>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <?= view('event/element/event_not_found'); ?>
                        <?php endif; ?>
                    </div>
                </div>
                <!-- Oluşturduğu Etkinlikler -->
                <!-- Katıldığı Etkinlikler -->
                <div class="card card-block mb-3">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-lg-8">
                                <div class="iq-header-title">
                                    <h4 class="card-title mb-0">Etkinlikler</h4>
                                </div>
                            </div>
                            <div class="col-lg-4 text-right">
                                <div class="badge badge-color text-center ml-3">Katıldı</div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <?php if ($events = $User->mySubscribers(3)): ?>
                            <?php foreach ($events as $key => $event): ?>
                                <?= view('event/element/event_design1', [
                                'event' => $event,
                                'showButtons' => false,
                                'showOwner' => true,
                                'class' => 'shadow-none mb-1 border'
                            ]); ?>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <?= view('event/element/event_not_found'); ?>
                        <?php endif; ?>
                    </div>
                </div>
                <!-- Katıldığı Etkinlikler -->
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
