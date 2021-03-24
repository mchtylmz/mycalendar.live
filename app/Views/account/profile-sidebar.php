<?php $showPhone = $showPhone ?? false;?>
<div class="card card-block p-card">
    <div class="profile-box">
        <div class="profile-card rounded">
            <img src="<?= $User->getImage() ?>" alt="profile-bg"
                 class="avatar-100 rounded d-block mx-auto img-fluid mb-3">
            <h3 class="font-600 text-white text-center mb-5 pb-2"><?= $User->getFullname() ?></h3>
        </div>
        <div class="pro-content rounded">
            <div class="d-flex align-items-center mb-3">
                <div class="p-icon mr-3">
                    <i class="las la-envelope-open-text"></i>
                </div>
                <p class="mb-0 eml"><?= $User->email ?></p>
            </div>
            <?php if ($User->phone && $showPhone): ?>
                <div class="d-flex align-items-center mb-3">
                    <div class="p-icon mr-3">
                        <i class="las la-phone"></i>
                    </div>
                    <p class="mb-0"><?= $User->phone ?></p>
                </div>
            <?php endif; ?>
            <div class="d-flex justify-content-center">
                <div class="social-ic d-inline-flex rounded">
                    <?php if ($facebook = $User->facebook): ?>
                        <a target="_blank" href="https://facebook.com/<?= $facebook ?>">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    <?php endif; ?>
                    <?php if ($twitter = $User->twitter): ?>
                        <a target="_blank" href="https://twitter.com/<?= $twitter ?>">
                            <i class="fab fa-twitter"></i>
                        </a>
                    <?php endif; ?>
                    <?php if ($instagram = $User->instagram): ?>
                        <a target="_blank" href="https://instagram.com/<?= $instagram ?>">
                            <i class="fab fa-instagram"></i>
                        </a>
                    <?php endif; ?>
                    <?php if ($whatsapp = $User->whatsapp): ?>
                        <a target="_blank" href="https://wa.me/<?= $whatsapp ?>">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                    <?php endif; ?>
                    <?php if ($telegram = $User->telegram): ?>
                        <a target="_blank" href="https://t.me/<?= $telegram ?>">
                            <i class="fab fa-telegram"></i>
                        </a>
                    <?php endif; ?>
                    <?php if ($discord = $User->discord): ?>
                        <a target="_blank" href="https://discord.gg/<?= $discord ?>">
                            <i class="fab fa-discord"></i>
                        </a>
                    <?php endif; ?>
                    <?php if ($youtube = $User->youtube): ?>
                        <a target="_blank" href="https://youtube.com/<?= $youtube ?>">
                            <i class="fab fa-youtube"></i>
                        </a>
                    <?php endif; ?>
                    <?php if ($linkedin = $User->linkedin): ?>
                        <a target="_blank" href="https://www.linkedin.com/in/<?= $linkedin ?>">
                            <i class="fab fa-linkedin"></i>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>