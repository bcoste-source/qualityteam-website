<?php snippet('header') ?>

<section class="purple-section">
  <div class="body-padding body-centered">
    <section class="padding-section" />

    <h2 class="text-white-green"><?= $page->custom_title()->kirbytext() ?></h2>
    <p class="text-green text-small page-subtitle">
      <?= mb_strtoupper($page->custom_tagline()->esc(), 'UTF-8') ?>
    </p>

    <section class="padding-section" />

    <div class="text-white-pink offer-content-text">
      <?= $page->custom_intro_emphase()->kirbytext() ?>
    </div>

    <section class="padding-section" />

    <div class="adapt-text">
      <strong><?= $page->custom_intro_adapt_text()->esc() ?></strong>
      <img class="wave-spot-large" src="/assets/images/spots/purple-wave-spot-double.avif" alt="Spot vert équipe">
    </div>

    <section class="padding-section" />

    <div class="text-white-pink offer-content-text">
      <?= $page->custom_intro_text()->kirbytext() ?>
    </div>

    <section class="padding-section" />

    <?php if ($page->custom_why_title()->isNotEmpty()): ?>
      <div class="offer-title-container">
        <h4 class="offer-question-title"><?= $page->custom_why_title()->esc() ?></h4>
      </div>
    <?php endif ?>

    <section class="padding-section" />

    <div class="text-white-pink offer-content-text">
      <?= $page->custom_why_paragraph()->kirbytext() ?>
    </div>

    <?php if ($page->custom_why_items()->isNotEmpty()): ?>
      <ul class="why-list text-white">
        <?php foreach ($page->custom_why_items()->toStructure() as $w): ?>
          <li>
            <div class="why-item">
              <?php if ($w->icon()->isNotEmpty()): ?>
                <?= $w->icon()->toFile()->html(['alt' => '', 'class' => 'why-item-icon']) ?>
              <?php endif ?>
              <div class="why-item-text"><?= $w->text()->kirbytext() ?></div>
            </div>
          </li>
        <?php endforeach ?>
      </ul>
    <?php endif ?>


    <div class="text-white-pink offer-content-text">
      <?= $page->custom_why_paragraph_end()->kirbytext() ?>
    </div>

    <section class="padding-section" />

    <?php if ($page->custom_how_title()->isNotEmpty()): ?>
      <div class="offer-title-container">
        <h4 class="offer-question-title"><?= $page->custom_how_title()->esc() ?></h4>
      </div>
    <?php endif ?>

    <section class="padding-section" />

    <div class="text-white-pink offer-content-text">
      <?= $page->custom_how_paragraph()->kirbytext() ?>
    </div>

    <section class="padding-section" />

    <div class="text-white-pink offer-content-text" style="font-style: italic; opacity:.9; max-width: 52rem; margin: 0 auto;">
      <?= $page->custom_contact_text()->kirbytext() ?>
    </div>

    <section class="padding-section" />

    <div class="ready">
      <?php if ($page->custom_cta_text()->isNotEmpty()): ?>
        <a href="#contact" class="btn-black text-white-green"><?= mb_strtoupper($page->custom_cta_text()->kirbytext()) ?></a>
      <?php endif ?>
    </div>
  </div>

  <section class="padding-section" />
</section>

<?php snippet('offers-cards') ?>

<?php snippet('footer') ?>