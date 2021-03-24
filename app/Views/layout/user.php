<div class="card card-block card-stretch card-height">
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
                <div class="d-flex align-items-center justify-content-center">
                    <button class="btn btn-success rounded-small"><i class="ri-mail-line m-0"></i>
                    </button>
                    <div class="title bg-success-light rounded rounded-small ml-1">Enterprise</div>
                </div>
            <?php endif; ?>

        </div>
    </div>
</div>