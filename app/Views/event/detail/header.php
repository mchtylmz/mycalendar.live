<div class="content-top">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mb-2">
                <div class="navbar-breadcrumb">
                    <div class="row align-items-center justify-content-between p-2">
                        <div class="col-sm-7 col-12 mb-3">
                            <h4 class="text-info mb-2"><?= $event->getLongStartDate() ?></h4>
                            <h3 class="mb-3"><?= $event->title ?></h3>
                            <div class="d-flex flex-wrap align-items-center">
                                <div class="iq-avatar mr-2">
                                        <img class="avatar-30 rounded" src="<?= $event->owner->getImage() ?>"
                                             alt="<?= $event->owner->getFullname() ?>"
                                             data-original-title="<?= $event->owner->getFullname() ?>"
                                             title="<?= $event->owner->getFullname() ?>">
                                    </div>
                                <a class="link"
                                       href="<?= site_url(route_to('user.profile', $event->owner->username)) ?>">
                                        <?= $event->owner->getFullname() ?>
                                    </a>
                            </div>
                        </div>
                        <div class="col-3 text-right">
                            <?=view('event/detail/share', ['title' => $event->title])?>
                        </div>
                        <div class="col-12">
                            <?=view('layout/alert.php')?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>