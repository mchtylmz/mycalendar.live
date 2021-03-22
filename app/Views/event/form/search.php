<div class="d-flex flex-wrap align-items-center mb-4">
    <div class="iq-search-bar search-device mb-0 pr-3">
        <input type="text" class="text search-input" placeholder="Ara..." name="q"
               value="<?= service('request')->getGet('q') ?? '' ?>" required>
    </div>
    <div class="float-sm-right">
        <button type="submit" class="btn btn-primary pr-5 position-relative" style="height: 40px;">
            Ara
            <span class="event-add-btn" style="height: 40px;"><i class="fas fa-search"></i></span>
        </button>
    </div>
</div>