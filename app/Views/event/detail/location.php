<div class="row align-items-center">
    <?php if ($maps = $event->parseMeta('maps')) : ?>
    <div class="col-lg-4 col-sm-6 col-12 text-center p-2">
        <p class="mb-2">
            <img src="<?=assets_url('images/maps.png')?>" alt="Google Maps" width="30" height="30">
        </p>
        <h6 class="mb-2">
            <?= $maps ?>
        </h6>
    </div>
    <?php endif; ?>

    <?php if ($phone = $event->parseMeta('phone')) : ?>
    <div class="col-lg-4 col-sm-6 col-12 text-center p-2">
        <p class="mb-2">
            <img src="<?=assets_url('images/phone.png')?>" alt="Telefon" width="30" height="30">
        </p>
        <h6 class="mb-2">
            <?= $phone ?>
        </h6>
    </div>
    <?php endif; ?>

    <?php if ($meet = $event->parseMeta('meet')) : ?>
    <div class="col-lg-4 col-sm-6 col-12 text-center p-2">
        <p class="mb-2">
            <img src="<?=assets_url('images/meet.png')?>" alt="Google Meet" width="30" height="30">
        </p>
        <h6 class="mb-2">
            <?= $meet ?>
        </h6>
    </div>
    <?php endif; ?>

    <?php if ($youtube = $event->parseMeta('youtube')) : ?>
    <div class="col-lg-4 col-sm-6 col-12 text-center p-3">
        <p class="mb-2">
            <img src="<?=assets_url('images/youtube.png')?>" alt="Youtube" width="30" height="30">
        </p>
        <h6 class="mb-2">
            <?= $youtube ?>
        </h6>
    </div>
    <?php endif; ?>

    <?php if ($twitch = $event->parseMeta('twitch')) : ?>
    <div class="col-lg-4 col-sm-6 col-12 text-center p-2">
        <p class="mb-2">
            <img src="<?=assets_url('images/twitch.png')?>" alt="Twitch" width="30" height="30">
        </p>
        <h6 class="mb-2">
            <?= $twitch ?>
        </h6>
    </div>
    <?php endif; ?>

    <?php if ($zoom = $event->parseMeta('zoom')) : ?>
    <div class="col-lg-4 col-sm-6 col-12 text-center p-2">
        <p class="mb-2">
            <img src="<?=assets_url('images/zoom.png')?>" alt="Zoom" width="30" height="30">
        </p>
        <h6 class="mb-2">
            <?= $zoom ?>
        </h6>
    </div>
    <?php endif; ?>

    <?php if ($instagram = $event->parseMeta('instagram')) : ?>
    <div class="col-lg-4 col-sm-6 col-12 text-center p-2">
        <p class="mb-2">
            <img src="<?=assets_url('images/instagram.png')?>" alt="Instagram" width="30" height="30">
        </p>
        <h6 class="mb-2">
            <?= $instagram ?>
        </h6>
    </div>
    <?php endif; ?>

    <?php if ($website = $event->parseMeta('website')) : ?>
    <div class="col-lg-4 col-sm-6 col-12 text-center p-2">
        <p class="mb-2">
            <img src="<?=assets_url('images/site.png')?>" alt="Site" width="30" height="30">
        </p>
        <h6 class="mb-2">
            <?= $website ?>
        </h6>
    </div>
    <?php endif; ?>

</div>