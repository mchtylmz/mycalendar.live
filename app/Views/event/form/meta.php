<?php
$latlng  = $meta['maps'][0] ?? '';
$address = $meta['maps'][1] ?? '';
$phone   = $meta['phone']   ?? '';
$youtube = $meta['youtube'] ?? '';
$twitch  = $meta['twitch']  ?? '';
$zoom    = $meta['zoom']    ?? '';
$meet    = $meta['meet']    ?? '';
$instagram = $meta['instagram']  ?? '';
$website   = $meta['web']    ?? '';
?>
<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="maps-tab" data-toggle="tab" href="#maps" role="tab" aria-controls="maps"
           aria-selected="true">Konum</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="phone-tab" data-toggle="tab" href="#phone" role="tab" aria-controls="phone"
           aria-selected="false">Telefon</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="meet-tab" data-toggle="tab" href="#meet" role="tab" aria-controls="meet"
           aria-selected="false">Google Meet</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="youtube-tab" data-toggle="tab" href="#youtube" role="tab" aria-controls="youtube"
           aria-selected="false">Youtube</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="twitch-tab" data-toggle="tab" href="#twitch" role="tab" aria-controls="twitch"
           aria-selected="false">Twitch</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="zoom-tab" data-toggle="tab" href="#zoom" role="tab" aria-controls="zoom"
           aria-selected="false">Zoom</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="instagram-tab" data-toggle="tab" href="#instagram" role="tab" aria-controls="instagram"
           aria-selected="false">Instagram</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="website-tab" data-toggle="tab" href="#website" role="tab" aria-controls="website"
           aria-selected="false">Website</a>
    </li>
</ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="maps" role="tabpanel" aria-labelledby="maps-tab">
        <!-- Maps -->
        <div class="mb-3" id="maps">
            <div class="input-group mb-4">
                <input type="hidden" class="form-control" name="latlng" id="latlng" value="<?= old('latlng') ?? $latlng ?>">
                <input type="text" class="form-control" name="address" placeholder="Şehir, Bina, Adres Yazınz.."
                       value="<?= old('address') ?? $address ?>" autocomplete="off" id="address_location">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button" id="map_search">Haritada Ara</button>
                </div>
            </div>
            <div id="map" style="width: 100%; height: 300px;"></div>
        </div>
        <!-- Maps -->
    </div>
    <div class="tab-pane fade" id="phone" role="tabpanel" aria-labelledby="phone-tab">
        <div class="form-group mb-3" id="phone">
            <label class="title" for="other_location">Telefon Numarası</label>
            <input type="tel" class="form-control" name="phone" value="<?= old('phone') ?? $phone ?>" placeholder="905....."
                   autocomplete="off" id="phone_location">
        </div>
    </div>
    <div class="tab-pane fade" id="youtube" role="tabpanel" aria-labelledby="youtube-tab">
        <div class="mb-3" id="youtube">
            <?= view('event/form/url', [
                'label' => 'Youtube URL',
                'preUrl' => 'https://youtube.com/',
                'name' => 'youtube',
                'value' => old('youtube') ?? $youtube
            ]) ?>
        </div>
    </div>
    <div class="tab-pane fade" id="meet" role="tabpanel" aria-labelledby="meet-tab">
        <div class="mb-3" id="meet">
            <?= view('event/form/url', [
                'label' => 'Google Meet URL',
                'preUrl' => 'https://meet.google.com/',
                'name' => 'meet',
                'value' => old('meet') ?? $meet
            ]) ?>
        </div>
    </div>
    <div class="tab-pane fade" id="twitch" role="tabpanel" aria-labelledby="twitch-tab">
        <div class="mb-3" id="twitch">
            <?= view('event/form/url', [
                'label' => 'Twitch URL',
                'preUrl' => 'https://twitch.tv/',
                'name' => 'twitch',
                'value' => old('twitch') ?? $twitch
            ]) ?>
        </div>
    </div>
    <div class="tab-pane fade" id="zoom" role="tabpanel" aria-labelledby="zoom-tab">
        <div class="mb-3" id="zoom">
            <?= view('event/form/url', [
                'label' => 'Zoom URL',
                'preUrl' => 'https://zoom.us/j/',
                'name' => 'zoom',
                'value' => old('zoom') ?? $zoom
            ]) ?>
        </div>
    </div>
    <div class="tab-pane fade" id="instagram" role="tabpanel" aria-labelledby="instagram-tab">
        <div class="mb-3" id="instagram">
            <?= view('event/form/url', [
                'label' => 'Instagram Hesabı',
                'preUrl' => 'https://instagram.com/@',
                'name' => 'instagram',
                'value' => old('instagram') ?? $instagram
            ]) ?>
        </div>
    </div>
    <div class="tab-pane fade" id="website" role="tabpanel" aria-labelledby="website-tab">
        <div class="mb-3" id="website">
            <?= view('event/form/url', [
                'label' => 'Website URL',
                'preUrl' => 'https://',
                'name' => 'website',
                'value' => old('website') ?? $website
            ]) ?>
        </div>
    </div>
</div>