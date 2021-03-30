<div class="card border border-success">
    <div class="card-body pt-4 pb-4">
        <div class="mb-4">
            <p class="mb-1">
                <i class="las la-clock mr-1"></i> Başlangıç
            </p>
            <h5 class="mb-1"><?= $event->getFullStartDate() ?></h5>
            <h5 class="mb-1"><?= $event->start_time ?></h5>
        </div>
        <div class="mb-4">
            <p class="mb-1">
                <i class="las la-clock mr-1"></i> Bitiş
            </p>
            <h5 class="mb-1"><?= $event->getFullEndDate() ?></h5>
            <h5 class="mb-1"><?= $event->end_time ?></h5>
        </div>
        <div class="mb-4">
            <p class="mb-1">
                <i class="las la-calendar-alt mr-1"></i> Kategori
            </p>
            <h5 class="mb-1">
                <a href="<?= site_url(route_to('category', $event->category->slug)) ?>">
                    <?= $event->category->name ?>
                </a>
            </h5>
        </div>
        <?php if ($location = $event->getLocation()) : ?>
            <div class="mb-1">
                <p class="mb-1">
                    <i class="las la-map-marker mr-1"></i> Konum
                </p>
                <h5 class="mb-1">
                    <?= $location ?>
                </h5>
            </div>
        <?php endif; ?>
    </div>
    <?php if (!$event->isPast()) : ?>
        <div class="card-footer bg-secondary border-0 p-0">
            <?=view('event/detail/buttons', ['event' => $event])?>
        </div>
    <?php endif; ?>
</div>