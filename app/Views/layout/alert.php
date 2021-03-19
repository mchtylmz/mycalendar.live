<?php if (session()->has('success')) : ?>
    <div class="alert text-white bg-success mb-3" role="alert">
        <div class="iq-alert-text text-left"><?= session('success') ?></div>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <i class="ri-close-line"></i>
        </button>
    </div>
<?php endif ?>

<?php if (session()->has('error')) : ?>
    <div class="alert text-white bg-danger mb-3" role="alert">
        <div class="iq-alert-text text-left"><?= session('error') ?></div>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <i class="ri-close-line"></i>
        </button>
    </div>
<?php endif ?>

<?php if (session()->has('errors')) : ?>
    <div class="alert text-white bg-danger mb-3" role="alert">
        <div class="iq-alert-text text-left">
            <?php foreach (session('errors') as $error) : ?>
            <p><?= $error ?></p>
            <?php endforeach ?>
        </div>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <i class="ri-close-line"></i>
        </button>
    </div>
<?php endif ?>
