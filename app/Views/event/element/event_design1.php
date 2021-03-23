<div class="card card-block card-stretch">
    <div class="card-body">
        <div class="d-flex flex-wrap align-items-center justify-content-between">
            <div class="d-flex flex-wrap align-items-center">
                <div class="date mr-2">
                    <h5 class="text-info">
                        <?= $event->getStartDate() ?> <br> <?= $event->getEndDate() ?>
                    </h5>
                </div>
                <div class="border-left pl-2">
                    <div class="media align-items-top">
                        <h5 class="mb-3"><?= $event->title ?></h5>
                    </div>
                    <div class="media align-items-center">
                        <?php if ($user = $event->getUser()) : ?>
                            <p class="mb-0 font-weight-500 d-xl-block d-lg-block d-none pr-3">
                                <i class="las la-user mr-1"></i>
                                <a class="link" href="<?= site_url(route_to('guest.profile', $user->username)) ?>">
                                    <?= $user->getFullname() ?>
                                </a>
                            </p>
                        <?php endif; ?>
                        <p class="mb-0 pr-3">
                            <i class="las la-clock mr-1"></i>
                            <?= $event->getStartTime() ?> - <?= $event->getEndTime() ?>
                        </p>
                        <?php if ($location = $event->getLocation()) : ?>
                            <p class="mb-0">
                                <i class="las la-map-marker mr-1"></i>
                                <?= $location ?>
                            </p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="d-flex align-items-center list-action">
                <a class="badge mr-3" data-toggle="tooltip" data-placement="top" title="Düzenle"
                   data-original-title="Edit" href="<?= site_url(route_to('event.edit', $event->id)) ?>">
                    <i class="ri-edit-box-line"></i>
                </a>
                <a class="badge" data-toggle="tooltip" data-placement="top" title="Sil"
                   data-original-title="Delete" href="<?= site_url(route_to('event.remove', $event->id)) ?>">
                    <i class="ri-delete-bin-line"></i>
                </a>
            </div>
        </div>
    </div>
</div>