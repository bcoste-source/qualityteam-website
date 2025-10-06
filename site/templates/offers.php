<?php snippet('header') ?>

<section class="green-section">
  <div class="body-padding body-centered">

    <!-- Hero Section -->
    <section class="padding-section" />
    <h1 class="text-white-purple"><?= $page->hero_title()->or('Une offre de qualité')->kirbytext() ?></h1>
    <p class="text-purple"><?= mb_strtoupper($page->hero_subtitle()->or("QualityTeam : l’alliance de l’expertise")->esc()) ?></p>
    <p class="text-white"><?= $page->hero_description()->or('Découvrez ce que nous vous apportons')->esc() ?></p>

    <?php if ($page->products()->isNotEmpty()): ?>
      <div class="offers-cards">
        <?php foreach ($page->products()->toStructure() as $prod): ?>
          <div class="offer-card">
            <h2 class="text-white-green"><?= $prod->title()->kirbytext() ?></h3>
              <img class="offer-spot" src="/assets/images/spots/pink-spot.png" alt="Spot" />
              <div class="text-white-green"><?= $prod->description()->kirbytext() ?></div>
          </div>
        <?php endforeach ?>
      </div>
    <?php endif ?>
    <section class="padding-section" />


  </div>


</section>

<div class="transition-spot">
  <img src="/assets/images/spots/black-to-white-spot.png" alt="Transition">
</div>

<!-- Product Starter Section -->
<section class="background-vector-green">
  <div class="body-padding body-centered">
    <div class="text-black-green">
      <?= $page->section2_title()->kirbytext() ?>
    </div>
    <p class="text-green"><?= $page->section2_subtitle()->esc() ?></p>

    <?php if ($page->section2_pairs()->isNotEmpty()): ?>
      <div class="pairs">
        <?php foreach ($page->section2_pairs()->toStructure() as $pair): ?>
          <div class="pair">
            <?php if ($pair->image()->isNotEmpty()): ?>
              <?= $pair->image()->toFile()->html(['alt' => '']) ?>
            <?php endif ?>
            <div class="pair-text "><?= $pair->text()->kirbytext() ?></div>
          </div>
        <?php endforeach ?>
      </div>
    <?php endif ?>

    <?php if ($page->section2_known()->isNotEmpty()): ?>
      <p><?= $page->section2_known()->esc() ?></p>
    <?php endif ?>

    <?php if ($page->section2_transform()->isNotEmpty()): ?>
      <h3><?= $page->section2_transform()->esc() ?></h3>
    <?php endif ?>

    <div class="text-mixed">
      <?= $page->section2_purple_black()->kirbytext() ?>
    </div>

    <?php if ($page->why_title()->isNotEmpty()): ?>
      <h3><?= $page->why_title()->esc() ?></h3>
    <?php endif ?>
    <?php if ($page->why_items()->isNotEmpty()): ?>
      <ul class="why-list">
        <?php foreach ($page->why_items()->toStructure() as $w): ?>
          <li><?= $w->text()->kirbytext() ?></li>
        <?php endforeach ?>
      </ul>
    <?php endif ?>

    <?php if ($page->how_title()->isNotEmpty()): ?>
      <h3><?= $page->how_title()->esc() ?></h3>
    <?php endif ?>
    <?php if ($page->steps()->isNotEmpty()): ?>
      <div class="steps">
        <?php foreach ($page->steps()->toStructure() as $s): ?>
          <div class="step">
            <h4><?= $s->title()->esc() ?></h4>
            <div><?= $s->description()->kirbytext() ?></div>
          </div>
        <?php endforeach ?>
      </div>
    <?php endif ?>

    <div class="deliverables">
      <?= $page->deliverables_intro()->kirbytext() ?>
      <?php if ($page->deliverables()->isNotEmpty()): ?>
        <ul>
          <?php foreach ($page->deliverables()->toStructure() as $d): ?>
            <li><?= $d->item()->esc() ?></li>
          <?php endforeach ?>
        </ul>
      <?php endif ?>
    </div>

    <div class="ready">
      <div class="text-black-green">
        <?= $page->ready_text()->kirbytext() ?>
      </div>
      <?php if ($page->cta_text()->isNotEmpty()): ?>
        <a href="<?= $page->cta_link()->or('#contact')->esc() ?>" class="btn-green" style="margin-top:1rem;"><?= $page->cta_text()->esc() ?></a>
      <?php endif ?>
    </div>
  </div>
</section>

<div class="transition-spot">
  <img src="/assets/images/spots/black-to-white-spot.png" alt="Transition">
</div>

<!-- AI Développement section (green) -->
<section class="green-section">
  <div class="body-padding body-centered">
    <h2 class="text-white"><?= $page->ai_title()->esc() ?></h2>
    <p class="text-white"><?= $page->ai_subtitle()->esc() ?></p>

    <div class="text-white"><?= $page->ai_paragraph1()->kirbytext() ?></div>
    <div class="text-white"><?= $page->ai_paragraph2()->kirbytext() ?></div>

    <h3 class="text-white" style="margin-top:2rem;"><?= $page->ai_why_title()->esc() ?></h3>
    <?php if ($page->ai_why_items()->isNotEmpty()): ?>
      <ul class="why-list">
        <?php foreach ($page->ai_why_items()->toStructure() as $i): ?>
          <li class="text-white"><?= $i->text()->kirbytext() ?></li>
        <?php endforeach ?>
      </ul>
    <?php endif ?>

    <h3 class="text-white" style="margin-top:1.5rem;"><?= $page->ai_how_title()->esc() ?></h3>
    <?php if ($page->ai_how_steps()->isNotEmpty()): ?>
      <ul class="why-list">
        <?php foreach ($page->ai_how_steps()->toStructure() as $s): ?>
          <li class="text-white"><?= $s->text()->kirbytext() ?></li>
        <?php endforeach ?>
      </ul>
    <?php endif ?>

    <div class="deliverables text-white">
      <?= $page->ai_benefits_intro()->kirbytext() ?>
      <?php if ($page->ai_benefits()->isNotEmpty()): ?>
        <ul>
          <?php foreach ($page->ai_benefits()->toStructure() as $b): ?>
            <li class="text-white"><?= $b->item()->esc() ?></li>
          <?php endforeach ?>
        </ul>
      <?php endif ?>
    </div>

    <div class="ready">
      <div class="text-white"><?= $page->ai_ready_text()->kirbytext() ?></div>
      <?php if ($page->ai_cta_text()->isNotEmpty()): ?>
        <a href="<?= $page->ai_cta_link()->or('#contact')->esc() ?>" class="btn-green" style="margin-top:1rem; background:var(--color-white); color:var(--color-code-green); border-color:var(--color-white);"><?= $page->ai_cta_text()->esc() ?></a>
      <?php endif ?>
    </div>
  </div>
</section>

<div class="transition-spot">
  <img src="/assets/images/spots/black-to-white-spot.png" alt="Transition">
</div>

<!-- Prestation sur mesure (purple) -->
<section class="purple-section">
  <div class="body-padding body-centered">
    <h2 class="text-white"><?= $page->custom_title()->esc() ?></h2>
    <p class="text-green" style="text-transform: uppercase; letter-spacing:.08em; font-weight:600;">
      <?= $page->custom_tagline()->esc() ?>
    </p>

    <div class="text-white" style="max-width:52rem; margin:0 auto;">
      <?= $page->custom_intro_emphase()->kirbytext() ?>
    </div>
    <div class="text-white" style="max-width:52rem; margin:1rem auto 0;">
      <?= $page->custom_intro_text()->kirbytext() ?>
    </div>

    <?php if ($page->custom_why_title()->isNotEmpty()): ?>
      <h3 class="why-chip"><?= $page->custom_why_title()->esc() ?></h3>
    <?php endif ?>
    <?php if ($page->custom_why_items()->isNotEmpty()): ?>
      <ul class="why-list text-white">
        <?php foreach ($page->custom_why_items()->toStructure() as $w): ?>
          <li><?= $w->text()->kirbytext() ?></li>
        <?php endforeach ?>
      </ul>
    <?php endif ?>

    <?php if ($page->custom_how_title()->isNotEmpty()): ?>
      <h3 class="why-chip"><?= $page->custom_how_title()->esc() ?></h3>
    <?php endif ?>
    <?php if ($page->custom_how_items()->isNotEmpty()): ?>
      <ul class="why-list text-white">
        <?php foreach ($page->custom_how_items()->toStructure() as $h): ?>
          <li><?= $h->text()->kirbytext() ?></li>
        <?php endforeach ?>
      </ul>
    <?php endif ?>

    <div class="text-white" style="max-width:52rem; margin:1.5rem auto 0;">
      <?= $page->custom_team_text()->kirbytext() ?>
    </div>
    <div class="text-white" style="max-width:52rem; margin:1rem auto 0; font-style: italic; opacity:.9;">
      <?= $page->custom_contact_text()->kirbytext() ?>
    </div>

    <div class="cta-accompaniment" style="margin-top:1.5rem;">
      <a href="<?= $page->custom_cta_link()->or('#contact')->esc() ?>" class="btn-expertise">
        <?= $page->custom_cta_text()->esc() ?>
        <span class="arrow">→</span>
      </a>
    </div>
  </div>
</section>



<?php snippet('footer') ?>