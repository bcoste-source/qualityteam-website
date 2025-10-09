<?php snippet('header') ?>

<section class="background-white-with-green-vector">
  <div class="body-padding body-centered">

    <div class="realisation-header">
      <h1 class="text-black-green"><?= $page->realisation_title()->kirbytext() ?></h1>

      <?php if ($page->realisation_description()->isNotEmpty()): ?>
        <span class="text-purple-black" style="max-width:52rem; margin:1rem auto 0;">
          <?= $page->realisation_description()->kirbytext() ?>
        </span>
      <?php endif ?>

      <?php if ($page->realisation_date()->isNotEmpty()): ?>
        <div class="realisation-date-header">
          <span class="text-green">Date :</span>
          <span class="text-purple"><?= $page->realisation_date()->toDate('d/m/Y') ?></span>
        </div>
      <?php endif ?>
    </div>


    <?php if ($page->realisation_main_image()->isNotEmpty()): ?>
      <div class="realisation-main-image">
        <a href="<?= $page->realisation_main_image()->toFile()->url() ?>" data-lightbox="main-image" data-title="<?= $page->realisation_title()->esc() ?>">
          <?= $page->realisation_main_image()->toFile()->html(['alt' => $page->realisation_title()->esc()]) ?>
        </a>
      </div>
    <?php endif ?>

    <section class="padding-section" />

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