<button class="navbar-toggler" type="button" data-toggle="collapse"
        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
        aria-label="Toggle navigation">
    <i class="ri-menu-3-line"></i>
</button>
<div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto navbar-list align-items-center">
        <li class="nav-item nav-icon dropdown">
            <a href="#" class="search-toggle dropdown-toggle" id="dropdownMenuButton"
               data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false">
                <i class="las la-bell"></i>
                <span class="badge badge-primary count-mail rounded-circle">2</span>
                <span class="bg-primary"></span>
            </a>
            <div class="iq-sub-dropdown dropdown-menu" aria-labelledby="dropdownMenuButton">
                <div class="card shadow-none m-0">
                    <div class="card-body p-0 ">
                        <div class="cust-title p-3">
                            <h5 class="mb-0">Notifications</h5>
                        </div>
                        <div class="p-2">
                            <a href="#" class="iq-sub-card">
                                <div class="media align-items-center cust-card p-2">
                                    <div class="">
                                        <img class="avatar-40 rounded-small"
                                             src="../assets/images/user/u-1.jpg" alt="01">
                                    </div>
                                    <div class="media-body ml-3">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <h6 class="mb-0">Anne Effit</h6>
                                            <small class="mb-0">02 Min Ago</small>
                                        </div>
                                        <small class="mb-0">Manager</small>
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="iq-sub-card">
                                <div class="media align-items-center cust-card p-2">
                                    <div class="">
                                        <img class="avatar-40 rounded-small"
                                             src="../assets/images/user/u-2.jpg" alt="02">
                                    </div>
                                    <div class="media-body ml-3">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <h6 class="mb-0">Eric Shun</h6>
                                            <small class="mb-0">05 Min Ago</small>
                                        </div>
                                        <small class="mb-0">Manager</small>
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="iq-sub-card">
                                <div class="media align-items-center cust-card p-2">
                                    <div class="">
                                        <img class="avatar-40 rounded-small"
                                             src="../assets/images/user/u-3.jpg" alt="03">
                                    </div>
                                    <div class="media-body ml-3">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <h6 class="mb-0">Ken Tucky</h6>
                                            <small class="mb-0">10 Min Ago</small>
                                        </div>
                                        <small class="mb-0">Employee</small>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <a class="right-ic btn-block position-relative p-3 border-top text-center"
                           href="#" role="button">
                            See All Notification
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
                            <a href="<?= site_url(route_to('account.profile')) ?>" class="iq-sub-card">
                                <div class="media align-items-center">
                                    <i class="ri-group-line mr-3"></i>
                                    <h6>Hesabım</h6>
                                </div>
                            </a>
                            <a href="<?= site_url(route_to('account.changePassword')) ?>" class="iq-sub-card">
                                <div class="media align-items-center">
                                    <i class="ri-lock-password-line mr-3"></i>
                                    <h6>Şifre Değiştir</h6>
                                </div>
                            </a>
                            <a href="<?= site_url(route_to('account.updateProfile')) ?>" class="iq-sub-card">
                                <div class="media align-items-center">
                                    <i class="ri-settings-5-line mr-3"></i>
                                    <h6>Profili Güncelle</h6>
                                </div>
                            </a>
                            <?php if (auth_user()->role == 'admin'): ?>
                                <a href="<?= site_url(route_to('admin')) ?>" class="iq-sub-card">
                                    <div class="media align-items-center">
                                        <i class="ri-dashboard-fill mr-3"></i>
                                        <h6>Yönetim Paneli</h6>
                                    </div>
                                </a>
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