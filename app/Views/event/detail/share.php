<div class="btn-group" role="group">
    <button id="btnGroupDrop1" type="button" class="btn btn-primary pr-5 position-relative dropdown-toggle after-none"
            data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false" style="height: 40px;">
        Paylaş
        <span class="event-add-btn" style="height: 40px;">
            <i class="ri-share-fill"></i>
        </span>
    </button>
    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
        <a target="_blank" class="dropdown-item d-flex flex-wrap align-items-center pl-3"
           href="https://www.facebook.com/sharer/sharer.php?u=<?= current_url() ?>">
            <i class="fab fa-facebook-f mr-3"></i>
            Facebook
        </a>
        <a target="_blank" class="dropdown-item d-flex flex-wrap align-items-center pl-3"
           href="https://twitter.com/intent/tweet?text=<?= current_url() ?>">
            <i class="fab fa-twitter mr-3"></i>
            Twitter
        </a>
        <a target="_blank" class="dropdown-item d-flex flex-wrap align-items-center pl-3"
           href="whatsapp://send?text=<?= $title ?? '' ?> <?= current_url() ?>">
            <i class="fab fa-whatsapp mr-3"></i>
            Whatsapp
        </a>
        <a target="_blank" class="dropdown-item d-flex flex-wrap align-items-center pl-3"
           href="https://telegram.me/share/url?url=<?= current_url() ?>&text=<?= $title ?? '' ?>">
            <i class="fab fa-telegram mr-3"></i>
            Telegram
        </a>
        <a target="_blank" class="dropdown-item d-flex flex-wrap align-items-center pl-3"
           href="https://www.linkedin.com/shareArticle?mini=true&url=<?= current_url() ?>&title=<?= $title ?? '' ?>">
            <i class="fab fa-linkedin-in mr-3"></i>
            Linkedin
        </a>
        <a class="dropdown-item d-flex flex-wrap align-items-center pl-3" href="javascript:void(0)">
            <i class="fa fa-link mr-3"></i>
            Linki Kopyala
        </a>
    </div>
</div>