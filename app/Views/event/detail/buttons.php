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
        <?php elseif ($isSubscribe == '0') : ?>
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