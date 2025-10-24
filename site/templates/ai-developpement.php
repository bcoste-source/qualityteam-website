<?php snippet('header') ?>

<section class="green-section">
  <div class="body-padding body-centered">
    <section class="padding-section" />

    <h1 class="text-white-purple"><?= $page->ai_title()->kirbytext() ?></h1>

    <h1 class="text-purple text-small page-subtitle">
      <?= mb_strtoupper($page->ai_subtitle()->esc(), 'UTF-8') ?>
    </h1>

    <section class="padding-section" />

    <div class="offer-intro-flex">
      <img src="/assets/images/spots/purple-flash-left.avif" alt="Flash violet gauche" class="offer-intro-flash">
      <div class="text-white offer-content-text" style="margin-bottom: 0;">
        <?= $page->ai_paragraph1()->kirbytext() ?>
      </div>
      <img src="/assets/images/spots/purple-flash-right.avif" alt="Flash violet droite" class="offer-intro-flash">
    </div>

    <section class="padding-section" />

    <?php if ($page->ai_paragraph2_title()->isNotEmpty()): ?>
      <div class="offer-title-container">
        <h2 class="offer-question-title"><?= $page->ai_paragraph2_title()->esc() ?></h2>
      </div>
    <?php endif ?>

    <div class="text-white-purple offer-content-text">
      <?= $page->ai_paragraph2()->kirbytext() ?>
    </div>

    <section class="padding-section-small" />

    <?php if ($page->ai_why_title()->isNotEmpty()): ?>
      <div class="offer-title-container">
        <h2 class="offer-question-title"><?= $page->ai_why_title()->esc() ?></h2>
      </div>
    <?php endif ?>


    <?php if ($page->ai_why_items()->isNotEmpty()): ?>
      <ul class="why-list">
        <?php foreach ($page->ai_why_items()->toStructure() as $i): ?>
          <li>
            <div class="why-item">
              <?php if ($i->icon()->isNotEmpty()): ?>
                <?= $i->icon()->toFile()->html(['alt' => '', 'class' => 'why-item-icon']) ?>
              <?php endif ?>
              <div class="text-white why-item-text"><?= $i->text()->kirbytext() ?></div>
            </div>
          </li>
        <?php endforeach ?>
      </ul>
    <?php endif ?>

    <div class="text-white-purple offer-content-text">
      <?= $page->ai_why_paragraph()->kirbytext() ?>
    </div>

    <section class="padding-section-small" />

    <?php if ($page->ai_how_title()->isNotEmpty()): ?>
      <div class="offer-title-container">
        <h2 class="offer-question-title"><?= $page->ai_how_title()->esc() ?></h2>
      </div>
    <?php endif ?>

    <div class="text-white-purple offer-content-text">
      <?= $page->ai_how_paragraph()->kirbytext() ?>
    </div>


    <?php $steps = $page->ai_how_steps()->toStructure();
    $total = $steps->count(); ?>
    <div class="timeline">
      <img class="timeline-arrow" src="/assets/images/other/arrow-down-timeline.avif" alt="Flèche timeline" />
      <ul class="timeline-list">
        <?php foreach ($steps as $i => $s): $isLast = ($i === $total - 1); ?>
          <li class="timeline-item<?= $isLast ? ' is-last' : '' ?>">
            <span class="timeline-connector<?= $isLast ? ' is-last' : '' ?>">
              <span class="connector-dot"></span>
              <span class="connector-line"></span>
            </span>
            <div class="text-black-purple timeline-bubble<?= $isLast ? ' is-last' : '' ?>"><?= $s->text()->kirbytext() ?></div>
          </li>
        <?php endforeach ?>
      </ul>
    </div>

    <section class="padding-section-small" />

    <div class="deliverables-box">
      <div class="deliverables-box-content">
        <div class="deliverables-box-intro">
          <?= $page->ai_benefits_intro()->kirbytext() ?>
        </div>

        <?php if ($page->ai_benefits()->isNotEmpty()): ?>
          <ul>
            <?php foreach ($page->ai_benefits()->toStructure() as $d): ?>
              <li><?= $d->item()->esc() ?></li>
            <?php endforeach ?>
          </ul>
        <?php endif ?>
      </div>
    </div>

    <section class="padding-section-small" />

    <div class="ready">
      <div class="text-white-purple offer-content-text offer-content-emphasis">
        <?= $page->ai_ready_text()->kirbytext() ?>
      </div>
      <section class="padding-section" />
      <?php if ($page->ai_cta_text()->isNotEmpty()): ?>
        <a href="#contact" class="btn-purple text-white-green"><?= mb_strtoupper($page->ai_cta_text()->kirbytext()) ?></a>
      <?php endif ?>
    </div>
  </div>
  <section class="padding-section" />
</section>

<?php snippet('offers-cards') ?>

<?php snippet('footer') ?>