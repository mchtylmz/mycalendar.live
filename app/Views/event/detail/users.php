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
                                'active' => 'users',
                                'route' => $event->getRoute(),
                            'route_messages' => $event->getRoute() . '/messages',
                            'route_users' => $event->getRoute() . '/users',
                            'count' => $event->getSubscriberCount()
                            ])?>
                        </div>
                        <div class="card-body m-0 p-3">
                            <div class="row mb-3">
                                <?php if ($Subscribers): ?>
                                    <?php foreach ($Subscribers as $key => $subscribe) : ?>
                                        <div class="col-lg-4 col-sm-6 col-6">
                                            <?= view('layout/user', [
                                            'user' => $subscribe->getUser(),
                                            'showButtons' => auth_check() && $event->owner->id == auth_user()->id,
                                            'class' => 'shadow-none',
                                            'subscribe' => $subscribe
                                            ]); ?>
                                        </div>
                                    <?php endforeach; ?>
                                    <div class="col-lg-12">
                                        <?= $pager->links() ?>
                                    </div>
                                <?php else: ?>
                                    <div class="col-lg-12">
                                        <?= view('layout/user_not_found'); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
