<?= $this->extend("layout/header") ?>
<?= $this->section("page_content") ?>
<div class="content-page">
    <?= view('event/detail/header', ['event' => $event]) ?>
    <div class="container">
        <div class="event-content">
            <div class="row">
                <div class="col-lg-4 order-xl-2">
                    <?=view('event/detail/sidebar', ['event' => $event])?>
                </div>
                <div class="col-lg-8 order-xl-1">
                    <div class="card">
                        <div class="card-header border-0 m-0 pt-3 pl-3 pr-3 pb-0">
                            <?=view('event/detail/tabs', [
                             'active' => 'index',
                            'route' => $event->getRoute(),
                            'route_messages' => $event->getRoute() . '/messages',
                            'route_users' => $event->getRoute() . '/users',
                            'count' => $event->getSubscriberCount()
                            ])?>
                        </div>
                        <div class="card-body m-0 p-3">
                            <?= html_entity_decode($event->content) ?>
                            <br>
                            <?= $event->instagramTags() ?>
                        </div>
                        <div class="card-footer m-0 p-0">
                            <?=view('event/detail/location', ['event' => $event])?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
