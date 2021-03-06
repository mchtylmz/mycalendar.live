<?php
$showOwner = $showOwner ?? true;
$showButtons = $showButtons ?? true;
$showCategory = $showCategory ?? false;
?>
<div class="card card-block card-stretch card-height">
    <div class="card-body rounded event-detail event-detail-danger">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <div>
                <!-- <h1 class="text-info"></h1> -->
                <h4 class="text-info"><?= $event->getLongStartDate() ?></h4>
            </div>
            <?php if ($showButtons && auth_check()) : ?>
                <div class="d-flex align-items-center list-action">
                    <a class="badge mr-3" data-toggle="tooltip" data-placement="top" title="Düzenle"
                       data-original-title="Edit" href="<?= site_url(route_to('event.edit', $event->id)) ?>">
                        <i class="ri-edit-box-line"></i>
                    </a>
                    <a class="badge" data-toggle="tooltip" data-placement="top" title="Sil" href="javascript:void(0)"
                       data-original-title="Sil" onclick="eventRemove('<?= $event->id ?>', '<?= $event->title ?>', '<?=route_to('event.remove', $event->id)?>')">
                        <i class="ri-delete-bin-line"></i>
                    </a>
                </div>
            <?php endif; ?>
        </div>
        <a href="<?=site_url($event->getRoute())?>">
            <h4 class="my-2 mb-3"><?= $event->title ?></h4>
        </a>
        <p class="mb-2">
            <i class="las la-users mr-1"></i>
            <?= $event->getSubscriberCount() ?> üye katılıyor
        </p>
        <p class="mb-2">
            <i class="las la-clock mr-1"></i>
            <?= $event->start_time ?> - <?= $event->end_time ?>
        </p>
        <?php if ($showOwner && $owner = $event->owner) : ?>
            <p class="mb-2 font-weight-500">
                <i class="las la-user mr-1"></i>
                <a class="link" href="<?= site_url(route_to('user.profile', $owner->username)) ?>">
                    <?= $owner->getFullname() ?>
                </a>
            </p>
        <?php endif; ?>
        <?php if ($location = $event->getLocation()) : ?>
            <p class="mb-2">
                <i class="las la-map-marker mr-1"></i>
                <?= $location ?>
            </p>
        <?php endif; ?>
    </div>
</div>