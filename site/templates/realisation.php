<?php snippet('header') ?>

<section class="background-white-with-green-vector">
  <div class="body-padding body-centered">

    <div class="realisation-header">
      <h1 class="text-black-green"><?= $page->realisation_title()->kirbytext() ?></h1>

      <?php if ($page->realisation_date()->isNotEmpty()): ?>
        <div class="realisation-date-header">
          <span class="text-green">Date :</span>
          <span class="text-purple"><?= $page->realisation_date()->toDate('d/m/Y') ?></span>
        </div>
      <?php endif ?>
    </div>

    <?php if ($page->realisation_content()->isNotEmpty()): ?>
      <div class="realisation-content">
        <?= $page->realisation_content()->kirbytext() ?>
      </div>
    <?php endif ?>

    <section class="padding-section" />

    <?php if ($page->realisation_gallery()->isNotEmpty()): ?>
      <div class="realisation-gallery">
        <h3 class="text-purple">Galerie d'images</h3>
        <div class="gallery-grid">
          <?php foreach ($page->realisation_gallery()->toFiles() as $img): ?>
            <div class="gallery-item">
              <a href="<?= $img->url() ?>" data-lightbox="gallery" data-title="<?= $img->alt()->or($img->filename()) ?>">
                <?= $img->html(['alt' => $img->alt()->or($img->filename())]) ?>
              </a>
            </div>
          <?php endforeach ?>
        </div>
      </div>
    <?php endif ?>

    <section class="padding-section" />

    <div class="back-to-realisations">
      <a href="<?= $page->parent()->url() ?>" class="btn-green">
        ← Retour aux réalisations
      </a>
    </div>
  </div>
</section>



<?php snippet('footer') ?>