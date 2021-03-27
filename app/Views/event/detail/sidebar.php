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
    <div class="card-footer bg-secondary border-0 p-0">
        <?php if (auth_check()) : ?>
            <?= form_open(route_to('eventDetail.users', $event->slug, $event->id), ['id' => 'subscribe']) ?>
            <?php if ($event->owner->id != auth_user()->id) : ?>
                <?php $isSubscribe = $event->isSubscriber(); ?>
                <?php if ($isSubscribe === false) : ?>
                    <input type="hidden" name="action" value="join">
                    <button type="submit"
                       class="btn btn-success btn-block pr-5 position-relative"
                       style="height: 48px; line-height: 36px;">
                        Etkinliğe Katıl
                        <span class="event-add-btn bg-success" style="height: 48px;">
                            <i class="fas fa-check"></i>
                        </span>
                    </button>
                <?php elseif($isSubscribe == '0') : ?>
                    <a href="javascript:void(0)"
                       class="btn btn-warning btn-block pr-5 position-relative"
                       style="height: 48px; line-height: 36px;">
                        Onay Bekleniyor
                        <span class="event-add-btn bg-warning" style="height: 48px;">
                            <i class="fas fa-spinner fa-pulse"></i>
                        </span>
                    </a>
                <?php else : ?>
                    <input type="hidden" name="action" value="left">
                    <button type="submit"
                       class="btn btn-danger btn-block pr-5 position-relative"
                       style="height: 48px; line-height: 36px;">
                        Katılmaktan Vazgeç
                        <span class="event-add-btn bg-danger" style="height: 48px;">
                            <i class="fas fa-times-circle"></i>
                        </span>
                    </button>
                <?php endif; ?>
            <?php endif; ?>
            <?= form_close() ?>
        <?php else : ?>
            <a href="<?= site_url(route_to('auth.login')) ?>"
               class="btn btn-primary btn-block pr-5 position-relative"
               style="height: 48px; line-height: 36px;">
                Giriş Yap
                <span class="event-add-btn bg-primary" style="height: 48px;">
                    <i class="fas fa-sign-in-alt"></i>
                </span>
            </a>
        <?php endif; ?>
    </div>
</div>