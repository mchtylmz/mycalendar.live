<div class="card card-block card-stretch card-height">
    <div class="card-body rounded event-detail event-detail-danger">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <div>
                <!-- <h1 class="text-info"></h1> -->
                <h4 class="text-info"><?=$event->getStartDate()?> - <?=$event->getEndDate()?></h4>
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
        <h4 class="my-2 mb-4"><?= $event->title ?></h4>
        <p class="mb-2 text-dark"><i class="las la-clock mr-3"></i><?= $event->getStartTime() ?>
            - <?= $event->getEndTime() ?></p>
        <p class="mb-2 text-dark"><i class="las la-map-marker mr-3"></i><?= $event->getLocation() ?></p>
    </div>
</div>