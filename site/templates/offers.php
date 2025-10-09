<?php snippet('header') ?>

<section class="green-section">
  <div class="body-padding body-centered">
    <section class="padding-section-small" />
    <h1 class="text-white-purple"><?= $page->hero_title()->or('Une offre de qualité')->kirbytext() ?></h1>
    <p class="text-purple page-subtitle"><?= mb_strtoupper($page->hero_subtitle()->or("QualityTeam : l’alliance de l’expertise")->esc()) ?></p>
    <p class="text-white"><?= $page->hero_description()->or('Découvrez ce que nous vous apportons')->esc() ?></p>

    <?php snippet('offers-cards', ['offers' => $page]) ?>
    <section class="padding-section" />
  </div>
</section>

<?php snippet('footer') ?>