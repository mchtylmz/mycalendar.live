<?php if ($subscribe->request_subscribe == '0') : ?>
<?= form_open('', ['id' => 'subscribe']) ?>
    <input type="hidden" name="user_id" value="<?=$user_id ?? 0?>">
    <input type="hidden" name="subscribe_id" value="<?=$subscribe->subscribe_id?>">
    <input type="hidden" name="action" value="join_by_owner">
    <button type="submit" class="btn btn-success position-relative">
        Onayla
    </button>
<?= form_close() ?>
<?php endif; ?>
<?= form_open('', ['id' => 'subscribe']) ?>
    <input type="hidden" name="user_id" value="<?=$user_id ?? 0?>">
    <input type="hidden" name="action" value="left_by_owner">
    <button type="submit" class="btn btn-danger position-relative">
        Çıkar
    </button>
<?= form_close() ?>