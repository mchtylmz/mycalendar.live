<?php if ($showInput) : ?>
    <?= form_open() ?>
    <div class="form-label-group">
        <textarea class="form-control" name="comment" rows="4" placeholder="Birşeyler yazın..." style="line-height: 24px;" required></textarea>
        <label>Textarea</label>
    </div>
    <div class="text-right mb-4">
        <button type="submit"
                class="btn btn-primary pr-5 position-relative"
                style="height: 40px;">
            Gönder
            <span class="event-add-btn" style="height: 40px;">
            <i class="fas fa-paper-plane"></i>
        </span>
        </button>
    </div>
    <?= form_close() ?>
<?php endif; ?>
