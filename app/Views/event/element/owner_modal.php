<div class="d-flex flex-wrap align-items-center">
    <div class="iq-avatar mr-2">
        <img class="avatar-30 rounded" src="<?= $user->getImage() ?>"
             alt="<?= $user->getFullname() ?>">
    </div>
    <span class="link"><?= $user->getFullname() ?></span>
</div>