<div class="media mb-2 p-2 border border-light rounded">
    <img src="<?=$message->user->getImage()?>" class="align-self-top mr-2 mt-2 avatar-60 img-fluid rounded"
         alt="<?=$message->user->getFullname()?>">
    <div class="media-body">
        <h5 class="mt-0 mb-1"><?=$message->user->getFullname()?></h5>
        <p><?= $message->message ?></p>
        <div class="d-flex align-items-center justify-content-between mt-1">
            <small class="mb-0"><?=$message->getCreateDate()?></small>
            <?php if ($showButtons) : ?>
                <button type="button" class="btn btn-sm btn-danger position-relative" onclick="messageRemove('<?= $message->message_id ?>', '<?=route_to('eventDetail.messages', $event->slug, $event->id)?>')">
                    <i class="fas fa-trash"></i>
                </button>
            <?php endif; ?>
        </div>
    </div>
</div>