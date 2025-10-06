<?php snippet('header') ?>

<section class="purple-section">
  <div class="body-padding body-centered">
    <section class="padding-section-small" />

    <h2 class="text-black-green"><?= $page->custom_title()->kirbytext() ?></h2>
    <p class="text-green text-small" style="text-transform: uppercase; letter-spacing:.08em; font-weight:600; margin:0;">
      <?= $page->custom_tagline()->esc() ?>
    </p>

    <section class="padding-section-small" />

    <div class="text-white" style="max-width:52rem; margin:0 auto;">
      <?= $page->custom_intro_emphase()->kirbytext() ?>
    </div>

    <div class="adapt-text">
      <strong><?= $page->custom_intro_adapt_text()->esc() ?></strong>
      <img class="wave-spot-large" src="/assets/images/spots/purple-wave-spot-double.png" alt="Spot vert équipe">
    </div>


    <div class="text-white" style="max-width:52rem; margin:1rem auto 0; text-align: left;">
      <?= $page->custom_intro_text()->kirbytext() ?>
    </div>


    <section class="padding-section" />

    <?php if ($page->custom_why_title()->isNotEmpty()): ?>
      <div class="offer-title-container">
        <h4 class="offer-question-title"><?= $page->custom_why_title()->esc() ?></h4>
      </div>
    <?php endif ?>
    <?php if ($page->custom_why_items()->isNotEmpty()): ?>
      <ul class="why-list text-white">
        <?php foreach ($page->custom_why_items()->toStructure() as $w): ?>
          <li><?= $w->text()->kirbytext() ?></li>
        <?php endforeach ?>
      </ul>
    <?php endif ?>

    <section class="padding-section-small" />

    <?php if ($page->custom_how_title()->isNotEmpty()): ?>
      <div class="offer-title-container">
        <h4 class="offer-question-title"><?= $page->custom_how_title()->esc() ?></h4>
      </div>
    <?php endif ?>
    <?php if ($page->custom_how_items()->isNotEmpty()): ?>
      <ul class="why-list text-white">
        <?php foreach ($page->custom_how_items()->toStructure() as $h): ?>
          <li><?= $h->text()->kirbytext() ?></li>
        <?php endforeach ?>
      </ul>
    <?php endif ?>

    <section class="padding-section" />

    <div class="text-white" style="max-width:52rem; margin:0 auto; text-align: left;">
      <?= $page->custom_team_text()->kirbytext() ?>
    </div>

    <section class="padding-section" />

    <div class="text-white-pink" style="max-width:52rem; margin:1rem auto 0; font-style: italic; opacity:.9;">
      <?= $page->custom_contact_text()->kirbytext() ?>
    </div>

    <section class="padding-section-small" />

    <div class="ready">
      <?php if ($page->custom_cta_text()->isNotEmpty()): ?>
        <button class="btn-black text-white-green"><?= mb_strtoupper($page->custom_cta_text()->kirbytext()) ?></button>
      <?php endif ?>
    </div>
  </div>

  <section class="padding-section" />
</section>

<?php snippet('footer') ?>