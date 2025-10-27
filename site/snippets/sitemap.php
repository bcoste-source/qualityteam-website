<?= '<?xml version="1.0" encoding="utf-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
  <?php
  // Fonction pour afficher une URL dans le sitemap
  function outputSitemapUrl($page, $priority = 0.5)
  {
    echo '<url>';
    echo '<loc>' . html($page->url()) . '</loc>';
    echo '<lastmod>' . $page->modified('c', 'date') . '</lastmod>';
    echo '<priority>' . number_format($priority, 1) . '</priority>';
    echo '</url>' . "\n";
  }

  // 1. PAGE D'ACCUEIL
  $homePage = site()->homePage();
  if ($homePage && !in_array($homePage->uri(), $ignore)) {
    outputSitemapUrl($homePage, 1.0);
  }

  // 2. PAGES PRINCIPALES (le-collectif, contact)
  $mainPages = ['le-collectif', 'contact'];
  foreach ($mainPages as $pageUri) {
    $page = site()->find($pageUri);
    if ($page && !in_array($page->uri(), $ignore)) {
      outputSitemapUrl($page, 0.9);
    }
  }

  // 3. OFFRES - Page principale + sous-pages
  $offersPage = site()->find('nos-offres');
  if ($offersPage && !in_array($offersPage->uri(), $ignore)) {
    outputSitemapUrl($offersPage, 0.8);

    // Sous-pages des offres
    foreach ($offersPage->children()->listed() as $offer) {
      if (!in_array($offer->uri(), $ignore)) {
        outputSitemapUrl($offer, 0.7);
      }
    }
  }

  // 4. RÉALISATIONS - Page principale + projets
  $realisationsPage = site()->find('nos-realisations');
  if ($realisationsPage && !in_array($realisationsPage->uri(), $ignore)) {
    outputSitemapUrl($realisationsPage, 0.8);

    // Projets/réalisations
    foreach ($realisationsPage->children()->listed() as $realisation) {
      if (!in_array($realisation->uri(), $ignore)) {
        outputSitemapUrl($realisation, 0.6);
      }
    }
  }

  // 5. BLOG - Page principale + articles
  $blogPage = site()->find('le-blog');
  if ($blogPage && !in_array($blogPage->uri(), $ignore)) {
    outputSitemapUrl($blogPage, 0.8);

    // Articles de blog (triés par date décroissante)
    foreach ($blogPage->children()->listed()->sortBy('date', 'desc') as $article) {
      if (!in_array($article->uri(), $ignore)) {
        outputSitemapUrl($article, 0.5);
      }
    }
  }

  // 6. PAGES LÉGALES (CGV, À propos)
  $legalPages = ['cgv', 'a-propos'];
  foreach ($legalPages as $pageUri) {
    $page = site()->find($pageUri);
    if ($page && !in_array($page->uri(), $ignore)) {
      outputSitemapUrl($page, 0.3);
    }
  }

  // 7. AUTRES PAGES (celles qui n'ont pas été traitées ci-dessus)
  $handledUris = array_merge(
    [$homePage ? $homePage->uri() : ''],
    $mainPages,
    ['nos-offres', 'nos-realisations', 'le-blog'],
    $legalPages
  );

  foreach ($pages as $p) {
    // Ignorer les pages déjà traitées et celles dans la liste d'ignore
    if (in_array($p->uri(), $ignore) || in_array($p->uri(), $handledUris)) {
      continue;
    }

    // Ignorer les enfants des sections déjà traitées
    $parent = $p->parent();
    if ($parent && in_array($parent->uri(), ['nos-offres', 'nos-realisations', 'le-blog'])) {
      continue;
    }

    // Afficher les autres pages avec une priorité basse
    outputSitemapUrl($p, 0.4);
  }
  ?>
</urlset>