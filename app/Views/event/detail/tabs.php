<?php $active = $active ?? 'index'; ?>
<ul class="nav nav-tabs" role="tablist">
    <li class="nav-item rounded-0">
        <a class="nav-link <?= $active == 'index' ? 'active' : '' ?>" href="<?=site_url($route)?>">Detaylar</a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?= $active == 'message' ? 'active' : '' ?>"
           href="<?=site_url($route_messages)?>">Mesajlar</a>
    </li>
    <li class="nav-item">
        <a class="nav-link d-flex flex-wrap align-items-center <?= $active == 'users' ? 'active' : '' ?>"
           href="<?=site_url($route_users)?>">
            Üyeler <span class="ml-2 badge badge-pill badge-primary"><?=$count ?? 0?></span>
        </a>
    </li>
</ul>