<div class="form-group" id="<?=$id ?? 'input_url'?>">
    <label class="title mb-3" for="url"><?=$label ?? 'URL'?></label>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="url"><?=$preUrl ?? site_url()?></span>
        </div>
        <input type="text" class="form-control pl-3" name="<?=$name ?? 'url'?>" value="<?=$value ?? ''?>" id="url" aria-describedby="url">
    </div>
</div>