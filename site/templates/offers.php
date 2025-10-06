<?php snippet('header') ?>

<section class="green-section">
  <div class="body-padding body-centered">
    <section class="padding-section-small" />
    <h1 class="text-white-purple"><?= $page->hero_title()->or('Une offre de qualité')->kirbytext() ?></h1>
    <p class="text-purple"><?= mb_strtoupper($page->hero_subtitle()->or("QualityTeam : l’alliance de l’expertise")->esc()) ?></p>
    <p class="text-white"><?= $page->hero_description()->or('Découvrez ce que nous vous apportons')->esc() ?></p>

    <?php if ($page->products()->isNotEmpty()): ?>
      <div class="offers-cards">
        <?php foreach ($page->products()->toStructure() as $index => $prod): ?>
          <?php $url = null;
          $slugs = ['product-starter', 'ai-developpement', 'prestation-sur-mesure'];
          if ($prod->link()->isNotEmpty()) {
            $p = $prod->link()->toPages()->first();
            if ($p) {
              $url = $p->url();
            }
          }
          if (!$url) {
            $child = $page->children()->find($slugs[$index] ?? null);
            if ($child) {
              $url = $child->url();
            }
          }
          ?>
          <a class="offer-card" href="<?= $url ?? '#' ?>">
            <h2 class="text-white-green"><?= $prod->title()->kirbytext() ?></h2>
            <img class="offer-spot" src="/assets/images/spots/pink-spot.png" alt="Spot" />
            <div class="text-white-green"><?= $prod->description()->kirbytext() ?></div>
          </a>
        <?php endforeach ?>
      </div>
    <?php endif ?>
    <section class="padding-section" />
  </div>
</section>

<?php snippet('footer') ?>