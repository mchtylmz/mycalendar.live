<div class="card card-block card-stretch card-height">
    <div class="card-body rounded event-detail event-detail-danger">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <div>
                <!-- <h1 class="text-info"></h1> -->
                <h4 class="text-info"><?= $event->start_date ?> - <?= $event->end_date ?></h4>
            </div>
            <div class="d-flex align-items-center list-action">
                <a class="badge mr-3" data-toggle="tooltip" data-placement="top" title="Düzenle"
                   data-original-title="Edit" href="<?= site_url(route_to('event.edit', $event->id)) ?>">
                    <i class="ri-edit-box-line"></i>
                </a>
                <a class="badge" data-toggle="tooltip" data-placement="top" title="Sil" href="javascript:void(0)"
                   data-original-title="Sil" onclick="eventRemove('<?=$event->id?>', '<?=$event->title?>')">
                    <i class="ri-delete-bin-line"></i>
                </a>
            </div>
        </div>
        <h4 class="my-2 mb-3"><?= $event->title ?></h4>
        <?php if ($event->owner) : ?>
            <p class="mb-2 font-weight-500">
                <i class="las la-user mr-1"></i>
                <a class="link" href="<?= site_url(route_to('user.profile', $event->owner->username)) ?>">
                    <?= $event->owner->getFullname() ?>
                </a>
            </p>
        <?php endif; ?>
        <p class="mb-2">
            <i class="las la-clock mr-1"></i>
            <?= $event->start_time ?> - <?= $event->end_time ?>
        </p>
        <?php if ($event->location) : ?>
            <p class="mb-2">
                <i class="las la-map-marker mr-1"></i>
                <?= $event->location ?>
            </p>
        <?php endif; ?>
    </div>
</div>