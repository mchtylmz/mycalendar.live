<div class="row align-items-center p-2">
    <div class="col-lg-3 mb-2">
        <div class="iq-search-bar search-device mb-0" style="width: 100%;">
            <select class="text search-input minimal" name="c">
                <option value="">Tüm Kategoriler</option>
                <?php foreach (categories() as $key => $category) : ?>
                    <option value="<?= $category->id ?>" <?= $c == $category->id ? 'selected' : '' ?>>
                        <?= $category->name ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div class="col-lg-7 mb-2">
        <div class="iq-search-bar search-device mb-0" style="width: 100%;">
            <input type="text" class="text search-input" placeholder="Ara..." name="q"
                   value="<?= $q ?? '' ?>">
        </div>
    </div>
    <div class="col-lg-2 mb-2">
        <button type="submit" class="btn btn-primary btn-block pr-5 position-relative" style="height: 40px;">
            Ara
            <span class="event-add-btn" style="height: 40px;"><i class="fas fa-search"></i></span>
        </button>
    </div>
</div>