<?php

/**
 * Snippet: offers-cards
 * Affiche les cartes d'offres depuis la page `offers`.
 * Optionnellement, on peut passer ['offers' => $pageOffers] pour surcharger la source.
 */

$offersPage = $offers ?? page('offers');

if ($offersPage && $offersPage->products()->isNotEmpty()): ?>
  <div class="body-padding body-centered">
    <div class="offers-cards">
      <?php foreach ($offersPage->products()->toStructure() as $index => $prod): ?>
        <?php
        $url = null;
        $slugs = ['product-starter', 'ai-developpement', 'prestation-sur-mesure'];

        if ($prod->link()->isNotEmpty()) {
          $p = $prod->link()->toPages()->first();
          if ($p) {
            $url = $p->url();
          }
        }

        if (!$url) {
          $child = $offersPage->children()->find($slugs[$index] ?? null);
          if ($child) {
            $url = $child->url();
          }
        }
        ?>
        <a class="offer-card" href="<?= $url ?? '#' ?>">
          <h2 class="text-white-green"><?= $prod->title()->kirbytext() ?></h2>
          <img class="offer-spot" src="/assets/images/spots/pink-spot.avif" alt="Spot" />
          <div class="text-white-green"><?= $prod->description()->kirbytext() ?></div>
        </a>
      <?php endforeach ?>
    </div>
  </div>
<?php endif ?>