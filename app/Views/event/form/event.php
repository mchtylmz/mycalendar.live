<div class="row">
    <div class="col-lg-12 mb-3">
        <?= view('layout/alert.php'); ?>
    </div>
    <div class="col-lg-6 mb-4">
        <label class="title">Etkinlik Başlığı</label>
        <input type="text" class="form-control" placeholder="Başlık.." name="title" required>
    </div>
    <div class="col-lg-6 mb-4">
        <label class="title">Konum</label>
        <div class="search-dropdown-select device-search">
            <div class="input-prepend input-append">
                <div class="btn-group w-100">
                    <label class="mb-0 w-100 form-control dropdown-toggle"
                           data-toggle="dropdown">
                        <input class="dropdown-toggle search-query text search-input w-100 bg-transparent"
                               type="text" placeholder="Konum Seç" required><span
                                class="search-replace"></span>
                        <span class="caret"><!--icon--></span>
                    </label>
                    <ul class="dropdown-menu w-100 border-none">
                        <?= view('event/form/location') ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12 mb-4" id="address">
        <label class="title mb-3">Konum, Adres Seçiniz</label>
        <div class="input-group mb-4">
            <input type="hidden" class="form-control" name="latlng" id="latlng">
            <input type="text" class="form-control" name="address" placeholder="Şehir, Bina, Adres Yazınz.."
                   id="address_location">
            <div class="input-group-append">
                <button class="btn btn-primary" type="button" id="map_search">Haritada Ara</button>
            </div>
        </div>
        <div id="map" style="width: 100%; height: 400px;"></div>
    </div>
    <div class="col-lg-12 mb-4" id="phone">
        <label class="title" for="phone_location">Telefon Numarası</label>
        <input type="tel" class="form-control" name="phone" value="" placeholder="905....." id="phone_location">
    </div>
    <div class="col-lg-12 mb-4">
        <?= view('event/form/url', [
            'id' => 'googleMeet',
            'label' => 'Google Meet URL',
            'preUrl' => 'https://meet.google.com/',
            'name' => 'googleMeet'
        ]) ?>
    </div>
    <div class="col-lg-12 mb-4">
        <?= view('event/form/url', [
            'id' => 'youtube',
            'label' => 'Youtube URL',
            'preUrl' => 'https://youtube.com/',
            'name' => 'youtube'
        ]) ?>
    </div>
    <div class="col-lg-12 mb-4">
        <?= view('event/form/url', [
            'id' => 'twitch',
            'label' => 'Twitch URL',
            'preUrl' => 'https://twitch.tv/',
            'name' => 'twitch'
        ]) ?>
    </div>
    <div class="col-lg-12 mb-4">
        <?= view('event/form/url', [
            'id' => 'zoom',
            'label' => 'Zoom URL',
            'preUrl' => 'https://zoom.us/j/',
            'name' => 'zoom'
        ]) ?>
    </div>
    <div class="col-lg-12 mb-4">
        <div class="form-group" id="other">
            <label class="title" for="other_location">Konum Hakkında Bilgi</label>
            <textarea data-length="300" class="form-control" id="other_location" rows="3" maxlength="300"
                      name="other"
                      placeholder="..."></textarea>
        </div>
    </div>
    <div class="col-lg-12 mb-4">
        <label class="title mb-3">Açıklama</label>
        <div id="editor" style="height: 320px !important;"></div>
    </div>
    <div class="form-group col-md-4">
        <label class="form-control-label mb-3">Görünürlük</label>
        <div class="w-100 custom-control custom-radio custom-radio-color-checked custom-control-inline mb-1">
            <input type="radio" class="custom-control-input bg-dark" id="private"
                   name="status"
                   value="0" <?= old('status') == '0' ? 'checked' : '' ?> required>
            <label class="custom-control-label"
                   for="private">Kişisel, Gizli</label>
        </div>
        <div class="w-100 custom-control custom-radio custom-radio-color-checked custom-control-inline mb-1">
            <input type="radio" class="custom-control-input bg-purple" id="auth"
                   name="status"
                   value="1" <?= old('status') == '1' ? 'checked' : '' ?> required>
            <label class="custom-control-label"
                   for="auth">Üyelere Özel</label>
        </div>
        <div class="w-100 custom-control custom-radio custom-radio-color-checked custom-control-inline mb-1">
            <input type="radio" class="custom-control-input bg-primary" id="protected"
                   name="status"
                   value="2" <?= old('status') == '2' ? 'checked' : '' ?> required>
            <label class="custom-control-label"
                   for="protected">Katılımcılara Özel</label>
        </div>
        <div class="w-100 custom-control custom-radio custom-radio-color-checked custom-control-inline mb-1">
            <input type="radio" class="custom-control-input bg-success" id="public"
                   name="status"
                   value="3" <?= old('status') == '3' ? 'checked' : '' ?> required>
            <label class="custom-control-label"
                   for="public">Herkese Açık</label>
        </div>
    </div>
    <div class="form-group col-md-4">
        <label class="form-control-label mb-3">Mesaj Ekleme</label>
        <div class="w-100 custom-control custom-radio custom-radio-color-checked custom-control-inline mb-1">
            <input type="radio" class="custom-control-input bg-danger" id="private_msg"
                   name="message_status"
                   value="0" <?= old('message_status') == '0' ? 'checked' : '' ?> required>
            <label class="custom-control-label"
                   for="private_msg">Sadece Ben veya seçtiğim üyeler</label>
        </div>
        <div class="w-100 custom-control custom-radio custom-radio-color-checked custom-control-inline mb-1">
            <input type="radio" class="custom-control-input bg-success" id="public_msg"
                   name="message_status"
                   value="1" <?= old('message_status') == '1' ? 'checked' : '' ?> required>
            <label class="custom-control-label"
                   for="public_msg">Herkese Açık</label>
        </div>
    </div>
    <div class="form-group col-md-4">
        <label class="form-control-label mb-3">Etkinliğe Katılma</label>
        <div class="w-100 custom-control custom-radio custom-radio-color-checked custom-control-inline mb-1">
            <input type="radio" class="custom-control-input bg-danger" id="private_sub"
                   name="subscribe_status"
                   value="0" <?= old('subscribe_status') == '0' ? 'checked' : '' ?> required>
            <label class="custom-control-label"
                   for="private_sub">Üye, onaylandıktan sonra katılsın</label>
        </div>
        <div class="w-100 custom-control custom-radio custom-radio-color-checked custom-control-inline mb-1">
            <input type="radio" class="custom-control-input bg-success" id="public_sub"
                   name="subscribe_status"
                   value="1" <?= old('subscribe_status') == '1' ? 'checked' : '' ?> required>
            <label class="custom-control-label"
                   for="public_sub">Üye, otomatik katılsın</label>
        </div>
    </div>
    <div class="col-lg-12 mt-3 mb-3 text-center">
        <button class="btn btn-outline-primary">Oluştur</button>
    </div>
</div>