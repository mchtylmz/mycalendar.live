<div class="card card-block card-stretch card-height <?=$class ?? ''?>">
    <div class="card-body">
        <div class="subscriber-detail text-center">
            <div class="image mb-2 position-relative d-inline-block">
                <img src="<?= $user->getImage() ?>" alt="<?= $user->getFullname() ?>"
                     class="img-fluid rounded-circle avatar-100 text-center">
            </div>
            <h5 class="mb-1 mt-2">
                <a href="<?= site_url(route_to('user.profile', $user->username)) ?>">
                    <?= $user->getFullname() ?>
                </a>
            </h5>
            <p class="mb-2"><?= $user->username ?></p>
            <?php if (isset($showButtons) && $showButtons && auth_check()) : ?>
                <?php if (isset($subscribe) && $subscribe) : ?>
                    <?= view('event/detail/user_buttons', [
                            'subscribe' => $subscribe,
                        'user_id' => $user->id
                    ]) ?>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
</div>