<?php snippet('header') ?>

<section class="background-white-with-green-vector">
  <div class="body-padding body-centered">
    <section class="padding-section-small" />
    <h2 class="text-purple-green">
      <?= $page->section2_title()->kirbytext() ?>
    </h2>
    <p class="text-green text-small" style="font-weight: bold;"><?= mb_strtoupper($page->section2_subtitle()->esc(), 'UTF-8') ?></p>

    <?php if ($page->section2_pairs()->isNotEmpty()): ?>
      <div class="pairs">
        <?php foreach ($page->section2_pairs()->toStructure() as $pair): ?>
          <div class="pair">
            <?php if ($pair->image()->isNotEmpty()): ?>
              <?= $pair->image()->toFile()->html(['alt' => '']) ?>
            <?php endif ?>
            <div class="pair-text text-purple"><?= $pair->text()->kirbytext() ?></div>
          </div>
        <?php endforeach ?>
      </div>
    <?php endif ?>

    <div class="section2-known">
      <?php if ($page->section2_known()->isNotEmpty()): ?>
        <p class="text-purple"><?= $page->section2_known()->esc() ?></p>
        <img class="wave-spot" src="/assets/images/spots/purple-wave-spot.png" alt="Spot vert équipe">
      <?php endif ?>
    </div>

    <section class="padding-section-small" />

    <?php if ($page->section2_transform()->isNotEmpty()): ?>
      <div>
        <h3 style="margin: 0;">
          <img src="/assets/images/spots/green-arrow-to-right.png" alt="Flèche verte vers la gauche" style="height: 20px; width: auto; margin-right: 0.5rem;">
          <?= $page->section2_transform()->esc() ?>
        </h3>
      </div>
    <?php endif ?>

    <section class="padding-section" />

    <div class="text-purple-black" style="text-align: left;">
      <?= $page->section2_purple_black()->kirbytext() ?>
    </div>

    <section class="padding-section" />

    <?php if ($page->why_title()->isNotEmpty()): ?>
      <div class="offer-title-container">
        <h4 class="offer-question-title"><?= $page->why_title()->esc() ?></h4>
      </div>
    <?php endif ?>

    <?php if ($page->why_items()->isNotEmpty()): ?>
      <ul class="why-list">
        <?php foreach ($page->why_items()->toStructure() as $w): ?>
          <li><?= $w->text()->kirbytext() ?></li>
        <?php endforeach ?>
      </ul>
    <?php endif ?>

    <section class="padding-section" />

    <?php if ($page->how_title()->isNotEmpty()): ?>
      <div class="offer-title-container">
        <h4 class="offer-question-title"><?= $page->how_title()->esc() ?></h4>
      </div>
    <?php endif ?>

    <?php if ($page->steps()->isNotEmpty()): ?>
      <div class="steps">
        <?php foreach ($page->steps()->toStructure() as $i => $s): ?>
          <div class="step">
            <p class="text-purple step-title"><?= ($i + 1) . '. ' . mb_strtoupper($s->title()->esc()) ?></p>
            <div><?= $s->description()->kirbytext() ?></div>
          </div>
        <?php endforeach ?>
      </div>
    <?php endif ?>

    <section class="padding-section" />


    <div style="text-align: left;">
      <?= $page->deliverables_intro()->kirbytext() ?>
    </div>

    <div class="deliverables">
      <?php if ($page->deliverables()->isNotEmpty()): ?>
        <ul>
          <?php foreach ($page->deliverables()->toStructure() as $d): ?>
            <li>• <?= $d->item()->esc() ?></li>
          <?php endforeach ?>
        </ul>
      <?php endif ?>
    </div>

    <section class="padding-section" />

    <div class="ready">
      <div class="text-purple-black"><?= $page->ready_text()->kirbytext() ?></div>
      <section class="padding-section" />

      <?php if ($page->cta_text()->isNotEmpty()): ?>
        <button class="btn-purple"><?= $page->cta_text()->esc() ?></button>
      <?php endif ?>
    </div>
  </div>
</section>

<?php snippet('offers-cards') ?>

<section class="padding-section" />

<?php snippet('footer') ?>