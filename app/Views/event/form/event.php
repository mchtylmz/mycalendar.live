<?php
$status = $status ?? '2';
$message_status = $message_status ?? '1';
$subscribe_status = $subscribe_status ?? '1';
$location_id = $location_id ?? null;
$category = $category ?? null;
?>
<div class="row">
    <div class="col-lg-12 mb-3">
        <?= view('layout/alert.php'); ?>
    </div>
    <div class="col-lg-8 mb-4">
        <label class="title">Etkinlik Başlığı</label>
        <input type="text" class="form-control" placeholder="Başlık.." name="title" value="<?= $title ?? '' ?>" required>
    </div>
    <div class="col-lg-4 mb-4">
        <label class="title" for="category">Kategori</label>
        <select class="form-control" id="category" name="category" required>
            <option value="">Seçim Yapınız</option>
            <?php foreach (categories() as $key => $cat) : ?>
            <option value="<?=$cat['id']?>" <?=$category == $cat['id'] ? 'selected':''?>><?=$cat['name']?></option>
            <?php endforeach; ?>
        </select>
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
        <div id="editor" style="height: 360px !important;"><?= $content ?? ''?></div>
    </div>
    <div class="col-lg-12 mb-4">
        <?= view('event/form/meta', [
                'meta' => json_decode($meta ?? null, true)
        ])?>
    </div>
    <div class="col-lg-12 mb-4">
        <label class="title" for="tags">Etiketler</label>
        <input type="text" class="form-control" data-role="tagsinput" id="tags" name="tags" value="<?=$tags ?? 'myCalendar.live'?>">
        <small>Birden fazla etiket için virgül (,) kullanılabilir.</small>
    </div>
    <div class="form-group col-md-4">
        <label class="form-control-label mb-3">Görünürlük</label>
        <div class="w-100 custom-control custom-radio custom-radio-color-checked custom-control-inline mb-1">
            <input type="radio" class="custom-control-input bg-purple" id="auth"
                   name="status"
                   value="1" <?= $status == '1' ? 'checked' : '' ?> required>
            <label class="custom-control-label"
                   for="auth">Üyelere Özel</label>
        </div>
        <div class="w-100 custom-control custom-radio custom-radio-color-checked custom-control-inline mb-1">
            <input type="radio" class="custom-control-input bg-success" id="public"
                   name="status"
                   value="3" <?= $status == '2' ? 'checked' : '' ?> required>
            <label class="custom-control-label"
                   for="public">Herkese Açık</label>
        </div>
    </div>
    <div class="form-group col-md-4">
        <label class="form-control-label mb-3">Mesaj Ekleme</label>
        <div class="w-100 custom-control custom-radio custom-radio-color-checked custom-control-inline mb-1">
            <input type="radio" class="custom-control-input bg-danger" id="private_msg"
                   name="message_status"
                   value="0" <?= $message_status == '0' ? 'checked' : '' ?> required>
            <label class="custom-control-label"
                   for="private_msg">Sadece Ben, seçilen üyeler</label>
        </div>
        <div class="w-100 custom-control custom-radio custom-radio-color-checked custom-control-inline mb-1">
            <input type="radio" class="custom-control-input bg-success" id="public_msg"
                   name="message_status"
                   value="1" <?= $message_status == '1' ? 'checked' : '' ?> required>
            <label class="custom-control-label"
                   for="public_msg">Herkese Açık</label>
        </div>
    </div>
    <div class="form-group col-md-4">
        <label class="form-control-label mb-3">Etkinliğe Katılma</label>
        <div class="w-100 custom-control custom-radio custom-radio-color-checked custom-control-inline mb-1">
            <input type="radio" class="custom-control-input bg-danger" id="private_sub"
                   name="subscribe_status"
                   value="0" <?= $subscribe_status == '0' ? 'checked' : '' ?> required>
            <label class="custom-control-label"
                   for="private_sub">Üye, onaylandıktan sonra katılsın</label>
        </div>
        <div class="w-100 custom-control custom-radio custom-radio-color-checked custom-control-inline mb-1">
            <input type="radio" class="custom-control-input bg-success" id="public_sub"
                   name="subscribe_status"
                   value="1" <?= $subscribe_status == '1' ? 'checked' : '' ?> required>
            <label class="custom-control-label"
                   for="public_sub">Üye, otomatik katılsın</label>
        </div>
    </div>
</div>