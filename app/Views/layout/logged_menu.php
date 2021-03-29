<button class="navbar-toggler" type="button" data-toggle="collapse"
        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
        aria-label="Toggle navigation">
    <i class="ri-menu-3-line"></i>
</button>
<div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto navbar-list align-items-center">
        <li class="nav-item nav-icon dropdown">
            <a href="javascript:void(0)" class="search-toggle dropdown-toggle notification-bell"
               id="dropdownMenuButton" data-toggle="dropdown" data-count="<?=auth_user()->notification_count?>"
               aria-haspopup="true" aria-expanded="false">
                <i class="las la-bell"></i>
                <span class="badge badge-primary count-mail rounded-circle"><?=auth_user()->notification_count?></span>
                <span class="bg-primary"></span>
            </a>
            <div class="iq-sub-dropdown dropdown-menu" aria-labelledby="dropdownMenuButton">
                <div class="card shadow-none m-0">
                    <div class="card-body p-0">
                        <div class="cust-title p-3 text-center">
                            <h5 class="mb-0">Bildirimler</h5>
                        </div>
                        <div class="p-0 list-group">
                            <?php if ($notifications = auth_user()->notifications) : ?>
                                <?php foreach ($notifications as $notification): ?>
                                    <a href="<?= $notification->link ?>"
                                       class="list-group-item list-group-item-action border border-bottom p-2">
                                        <div class="d-flex w-100 justify-content-between text-right">
                                            <small><?= $notification->timeago ?></small>
                                        </div>
                                        <p class="mb-1"><?= $notification->message ?></p>
                                    </a>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <a class="list-group-item list-group-item-action border border-bottom p-2">
                                    <p class="mt-1 mb-1 text-center">Gösterilecek bildirim yok!.</p>
                                </a>
                            <?php endif; ?>
                        </div>
                        <a class="right-ic btn-block position-relative p-3 border-top text-center"
                           href="<?=site_url(route_to('account.notifications'))?>">
                            Tüm Bildirimler
                        </a>
                    </div>
                </div>
            </div>
        </li>
        <li class="caption-content">
            <a href="#" class="search-toggle dropdown-toggle d-flex align-items-center"
               id="dropdownMenuButton3" data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false">
                <img src="<?= auth_user()->getImage() ?>" class="avatar-40 img-fluid rounded"
                     alt="<?= auth_user()->getFullname() ?>">
                <div class="caption ml-3">
                    <h6 class="mb-0 line-height">
                        <?= auth_user()->getFullname() ?>
                        <i class="las la-angle-down ml-3"></i>
                    </h6>
                </div>
            </a>
            <div class="iq-sub-dropdown dropdown-menu user-dropdown"
                 aria-labelledby="dropdownMenuButton3">
                <div class="card m-0">
                    <div class="card-body p-0">
                        <div class="py-3">
                            <a href="<?= site_url(route_to('event.new')) ?>" class="iq-sub-card">
                                <div class="media align-items-center">
                                    <i class="fas fa-plus mr-3"></i>
                                    <h6>Yeni Etkinlik</h6>
                                </div>
                            </a>
                            <a href="<?= site_url(route_to('my.events')) ?>" class="iq-sub-card">
                                <div class="media align-items-center">
                                    <i class="ri-calendar-event-line mr-3"></i>
                                    <h6>Etkinliklerim</h6>
                                </div>
                            </a>
                            <a href="<?= site_url(route_to('my.calendar')) ?>" class="iq-sub-card">
                                <div class="media align-items-center">
                                    <i class="ri-calendar-check-fill mr-3"></i>
                                    <h6>Takvimim</h6>
                                </div>
                            </a>
                            <a href="<?= site_url(route_to('account.notifications')) ?>" class="iq-sub-card">
                                <div class="media align-items-center">
                                    <i class="ri-notification-line mr-3"></i>
                                    <h6>Bildirimlerim</h6>
                                </div>
                            </a>
                            <a href="<?= site_url(route_to('user.profile', auth_user()->username)) ?>" class="iq-sub-card">
                                <div class="media align-items-center">
                                    <i class="ri-group-line mr-3"></i>
                                    <h6>Hesabım</h6>
                                </div>
                            </a>
                            <a href="<?= site_url(route_to('account.updateProfile')) ?>" class="iq-sub-card">
                                <div class="media align-items-center">
                                    <i class="ri-settings-5-line mr-3"></i>
                                    <h6>Profili Güncelle</h6>
                                </div>
                            </a>
                            <a href="<?= site_url(route_to('account.changePassword')) ?>" class="iq-sub-card">
                                <div class="media align-items-center">
                                    <i class="ri-lock-password-line mr-3"></i>
                                    <h6>Şifre Değiştir</h6>
                                </div>
                            </a>
                            <?php if (auth_user()->role == 'admin'): ?>
                                <!--
                                <a href="<?= site_url(route_to('admin')) ?>" class="iq-sub-card">
                                    <div class="media align-items-center">
                                        <i class="ri-dashboard-fill mr-3"></i>
                                        <h6>Yönetim Paneli</h6>
                                    </div>
                                </a>
                                -->
                            <?php endif; ?>
                        </div>
                        <a class="right-ic p-3 border-top btn-block position-relative text-center"
                           href="<?= site_url(route_to('account.logout')) ?>" role="button">
                            Çıkış Yap
                        </a>
                    </div>
                </div>
            </div>
        </li>
    </ul>
</div>