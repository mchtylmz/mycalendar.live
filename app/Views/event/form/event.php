<?php $location_id = $location_id ?? ''; ?>
<div class="row">
    <div class="col-lg-12 mb-3">
        <?= view('layout/alert.php'); ?>
    </div>
    <div class="col-lg-6 mb-4">
        <label class="title">Etkinlik Başlığı</label>
        <input type="text" class="form-control" placeholder="Başlık.." name="title" value="<?= $title ?? '' ?>" required>
    </div>
    <div class="col-lg-6 mb-4">
        <label class="title">Konum</label>
        <div class="search-dropdown-select device-search">
            <div class="input-prepend input-append">
                <div class="btn-group w-100">
                    <label class="mb-0 w-100 form-control dropdown-toggle"
                           data-toggle="dropdown">
                        <input type="hidden" name="location_id" value="<?= $location_id ?>">
                        <input class="dropdown-toggle search-query text search-input w-100 bg-transparent" name="location"
                               type="text" placeholder="Konum Seç" autocomplete="off" value="<?= $location ?? '' ?>" required>
                        <span class="search-replace"></span>
                        <span class="caret"><!--icon--></span>
                    </label>
                    <ul class="dropdown-menu w-100 border-none">
                        <?= view('event/form/location') ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12 mb-4 location-detail <?=$location_id != 'maps' ? 'd-none':''?>" id="maps">
        <label class="title mb-3">Konum, Adres Seçiniz</label>
        <div class="input-group mb-4">
            <input type="hidden" class="form-control" name="latlng" id="latlng" value="<?= $latlng ?? '' ?>">
            <input type="text" class="form-control" name="address" placeholder="Şehir, Bina, Adres Yazınz.." value="<?= $address ?? '' ?>" autocomplete="off"
                   id="address_location">
            <div class="input-group-append">
                <button class="btn btn-primary" type="button" id="map_search">Haritada Ara</button>
            </div>
        </div>
        <div id="map" style="width: 100%; height: 400px;"></div>
    </div>
    <div class="col-lg-12 mb-4 location-detail <?=$location_id != 'phone' ? 'd-none':''?>" id="phone">
        <label class="title" for="phone_location">Telefon Numarası</label>
        <input type="tel" class="form-control" name="phone" value="<?= $phone ?? '' ?>" placeholder="905....." autocomplete="off" id="phone_location">
    </div>
    <div class="col-lg-12 mb-4 location-detail <?=$location_id != 'meet' ? 'd-none':''?>" id="meet">
        <?= view('event/form/url', [
            'label' => 'Google Meet URL',
            'preUrl' => 'https://meet.google.com/',
            'name' => 'meet',
            'value' => $meet ?? ''
        ]) ?>
    </div>
    <div class="col-lg-12 mb-4 location-detail <?=$location_id != 'youtube' ? 'd-none':''?>" id="youtube">
        <?= view('event/form/url', [
            'label' => 'Youtube URL',
            'preUrl' => 'https://youtube.com/',
            'name' => 'youtube',
            'value' => $youtube ?? ''
        ]) ?>
    </div>
    <div class="col-lg-12 mb-4 location-detail <?=$location_id != 'twitch' ? 'd-none':''?>" id="twitch">
        <?= view('event/form/url', [
            'label' => 'Twitch URL',
            'preUrl' => 'https://twitch.tv/',
            'name' => 'twitch',
            'value' => $twitch ?? ''
        ]) ?>
    </div>
    <div class="col-lg-12 mb-4 location-detail <?=$location_id != 'zoom' ? 'd-none':''?>" id="zoom">
        <?= view('event/form/url', [
            'label' => 'Zoom URL',
            'preUrl' => 'https://zoom.us/j/',
            'name' => 'zoom',
            'value' => $zoom ?? ''
        ]) ?>
    </div>
    <div class="col-lg-12 mb-4 location-detail <?=$location_id != 'other' ? 'd-none':''?>" id="other">
        <div class="form-group">
            <label class="title" for="other_location">Konum Hakkında Bilgi</label>
            <textarea data-length="300" class="form-control" id="other_location" autocomplete="off" rows="3" maxlength="300"
                      name="other"
                      placeholder="..."><?= $other ?? ''?></textarea>
        </div>
    </div>
    <div class="col-lg-6 mb-4">
        <label class="start_dt">Başlangıç - Bitiş Tarihi</label>
        <input type="text" id="start_dt" class="form-control" data-input="daterange" value="<?= $date ?? ''?>" required>
        <input type="hidden" class="form-control" name="start_date" value="<?= $start_date ?? date('d.m.Y')?>">
        <input type="hidden" class="form-control" name="end_date" value="<?= $end_date ?? date('d.m.Y')?>">
    </div>
    <div class="col-lg-3 mb-4">
        <label class="start_time">Başlangıç Saati</label>
        <div class="input-group clockpicker">
            <input type="text" id="start_time" class="form-control" name="start_time" value="<?= $start_time ?? date('H:i')?>" required>
            <span class="input-group-addon">
                <span class="glyphicon glyphicon-time"></span>
            </span>
        </div>
    </div>
    <div class="col-lg-3 mb-4">
        <label class="end_time">Bitiş Saati</label>
        <div class="input-group clockpicker">
            <input type="text" id="end_time" class="form-control" name="end_time" value="<?= $end_time ?? date('H:i', strtotime('+15 minutes'))?>" required>
            <span class="input-group-addon">
                <span class="glyphicon glyphicon-time"></span>
            </span>
        </div>
    </div>
    <div class="col-lg-12 mb-4">
        <label class="title mb-3">Açıklama</label>
        <div id="editor" name="content" style="height: 360px !important;"><?= $content ?? ''?></div>
    </div>
    <div class="form-group col-md-4">
        <label class="form-control-label mb-3">Görünürlük</label>
        <div class="w-100 custom-control custom-radio custom-radio-color-checked custom-control-inline mb-1">
            <input type="radio" class="custom-control-input bg-dark" id="private"
                   name="status"
                   value="0" <?= isset($status) && $status == '0' ? 'checked' : '' ?> required>
            <label class="custom-control-label"
                   for="private">Kişisel, Gizli</label>
        </div>
        <div class="w-100 custom-control custom-radio custom-radio-color-checked custom-control-inline mb-1">
            <input type="radio" class="custom-control-input bg-purple" id="auth"
                   name="status"
                   value="1" <?= isset($status) && $status == '1' ? 'checked' : '' ?> required>
            <label class="custom-control-label"
                   for="auth">Üyelere Özel</label>
        </div>
        <div class="w-100 custom-control custom-radio custom-radio-color-checked custom-control-inline mb-1">
            <input type="radio" class="custom-control-input bg-primary" id="protected"
                   name="status"
                   value="2" <?= isset($status) && $status == '2' ? 'checked' : '' ?> required>
            <label class="custom-control-label"
                   for="protected">Katılımcılara Özel</label>
        </div>
        <div class="w-100 custom-control custom-radio custom-radio-color-checked custom-control-inline mb-1">
            <input type="radio" class="custom-control-input bg-success" id="public"
                   name="status"
                   value="3" <?= isset($status) && $status == '3' ? 'checked' : '' ?> required>
            <label class="custom-control-label"
                   for="public">Herkese Açık</label>
        </div>
    </div>
    <div class="form-group col-md-4">
        <label class="form-control-label mb-3">Mesaj Ekleme</label>
        <div class="w-100 custom-control custom-radio custom-radio-color-checked custom-control-inline mb-1">
            <input type="radio" class="custom-control-input bg-danger" id="private_msg"
                   name="message_status"
                   value="0" <?= isset($message_status) && $message_status == '0' ? 'checked' : '' ?> required>
            <label class="custom-control-label"
                   for="private_msg">Sadece Ben veya seçtiğim üyeler</label>
        </div>
        <div class="w-100 custom-control custom-radio custom-radio-color-checked custom-control-inline mb-1">
            <input type="radio" class="custom-control-input bg-success" id="public_msg"
                   name="message_status"
                   value="1" <?= isset($message_status) && $message_status == '1' ? 'checked' : '' ?> required>
            <label class="custom-control-label"
                   for="public_msg">Herkese Açık</label>
        </div>
    </div>
    <div class="form-group col-md-4">
        <label class="form-control-label mb-3">Etkinliğe Katılma</label>
        <div class="w-100 custom-control custom-radio custom-radio-color-checked custom-control-inline mb-1">
            <input type="radio" class="custom-control-input bg-danger" id="private_sub"
                   name="subscribe_status"
                   value="0" <?= isset($subscribe_status) && $subscribe_status == '0' ? 'checked' : '' ?> required>
            <label class="custom-control-label"
                   for="private_sub">Üye, onaylandıktan sonra katılsın</label>
        </div>
        <div class="w-100 custom-control custom-radio custom-radio-color-checked custom-control-inline mb-1">
            <input type="radio" class="custom-control-input bg-success" id="public_sub"
                   name="subscribe_status"
                   value="1" <?= isset($subscribe_status) && $subscribe_status == '1' ? 'checked' : '' ?> required>
            <label class="custom-control-label"
                   for="public_sub">Üye, otomatik katılsın</label>
        </div>
    </div>
</div>