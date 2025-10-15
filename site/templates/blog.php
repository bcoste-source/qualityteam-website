<?php

/**
 * Helper: calcul de similarité fuzzy (Levenshtein normalisée)
 */
function fuzzyMatch($needle, $haystack)
{
  $needle = strtolower($needle);
  $haystack = strtolower($haystack);

  if (stripos($haystack, $needle) !== false) return 1.0;

  $lev = levenshtein($needle, $haystack);
  $maxLen = max(strlen($needle), strlen($haystack));
  return $maxLen > 0 ? 1 - ($lev / $maxLen) : 0;
}

/**
 * Helper: highlight les termes de recherche
 */
function highlightText($text, $query)
{
  if (!$query) return $text;
  $pattern = '/(' . preg_quote($query, '/') . ')/i';
  return preg_replace($pattern, '<mark class="search-highlight">$1</mark>', $text);
}

snippet('header');
?>

<section class="pink-section">
  <div class="body-padding body-centered">
    <section class="padding-section" />

    <?php if ($page->hero_title()->isNotEmpty()): ?>
      <h1 class="text-white-purple"><?= $page->hero_title()->kirbytext() ?></h1>
    <?php endif ?>

    <?php if ($page->hero_subtitle()->isNotEmpty()): ?>
      <p class="text-purple text-small page-subtitle">
        <?= mb_strtoupper($page->hero_subtitle()->esc(), 'UTF-8') ?>
      </p>
    <?php endif ?>

    <?php if ($page->hero_paragraph()->isNotEmpty()): ?>
      <div class="text-white" style="max-width:52rem; margin:1rem auto 0;">
        <?= $page->hero_paragraph()->kirbytext() ?>
      </div>
    <?php endif ?>

    <section class="padding-section-small" />

    <form action="<?= $page->url() ?>" method="get" class="blog-search">
      <input type="text" name="q" value="<?= esc(get('q', '')) ?>" placeholder="<?= $page->search_placeholder()->or('Rechercher un article, une news...')->esc() ?>" />
      <button type="submit" class="btn-green">Rechercher</button>
    </form>

    <section class="padding-section" />
  </div>
</section>

<div class="transition-spot">
  <img src="/assets/images/spots/arrow-down.png" alt="Transition">
</div>

<section>
  <div class="body-padding body-centered">

    <?php
    // Source de données - inclure tous les articles listés
    $all = $page->children()->listed();

    // Filtrage par tag
    $selectedTag = trim((string)(get('tag') ?? ''));
    if ($selectedTag !== '') {
      $all = $all->filter(function ($p) use ($selectedTag) {
        $tags = $p->tags()->split();
        return in_array($selectedTag, $tags, true);
      });
    }

    // Recherche améliorée avec fuzzy matching
    $q = trim((string)(get('q') ?? ''));
    $fuzzyThreshold = 0.5; // seuil de similarité (0 à 1)

    if ($q !== '') {
      $all = $all->filter(function ($p) use ($q, $fuzzyThreshold) {
        $title = $p->title()->value();
        $desc = $p->description()->value();
        $text = $p->text()->value();
        $tags = implode(' ', $p->tags()->split());

        $haystack = strtolower($title . ' ' . $desc . ' ' . $text . ' ' . $tags);

        // Recherche exacte
        if (stripos($haystack, strtolower($q)) !== false) return true;

        // Fuzzy matching sur les mots
        $words = explode(' ', $q);
        foreach ($words as $word) {
          if (strlen($word) < 3) continue;
          $titleMatch = fuzzyMatch($word, $title);
          $descMatch = fuzzyMatch($word, $desc);
          if ($titleMatch >= $fuzzyThreshold || $descMatch >= $fuzzyThreshold) {
            return true;
          }
        }

        return false;
      });
    }

    // Tri pour "À la une" : par numéro croissant (premier article = plus petit numéro)
    $sortedByNum = ($q === '' && $selectedTag === '')
      ? $all->sortBy('num', 'asc')
      : $all->sortBy('date', 'desc');

    // À la une = premier article dans l'ordre de placement (plus petit numéro)
    $featured = ($q === '' && $selectedTag === '') ? $sortedByNum->first() : null;
    $rest = $featured ? $all->not($featured) : $all;

    // Les plus lus = tri par vues desc (top 5, en excluant le featured)
    $mostRead = ($q === '' && $selectedTag === '')
      ? $rest->sortBy('views', 'desc')->limit(5)
      : null;

    // Pour "Derniers articles" : tri par date décroissante
    $rest = $rest->sortBy('date', 'desc');

    // Récupérer tous les tags disponibles pour le nuage de tags
    $allTags = [];
    foreach ($page->children()->listed() as $article) {
      foreach ($article->tags()->split() as $tag) {
        if ($tag) $allTags[$tag] = ($allTags[$tag] ?? 0) + 1;
      }
    }
    arsort($allTags);

    // Derniers articles (afficher 6 puis bouton "voir plus" pour 6 de plus)
    $perPage = 6;
    $pageNum = (int)(get('page') ?? 1);
    $offset = ($pageNum - 1) * $perPage;
    $latest = $rest->offset($offset)->limit($perPage);
    $totalPages = (int)ceil($rest->count() / $perPage);
    ?>

    <?php if (!empty($allTags)): ?>
      <section class="padding-section-small" />
      <div class="blog-tags-filter">
        <h3 class="text-purple">Filtrer par tag :</h3>
        <div class="tags-cloud">
          <?php if ($selectedTag): ?>
            <a href="<?= $page->url() ?><?= $q ? '?q=' . urlencode($q) : '' ?>" class="tag-filter-item active">
              Tous les articles ✕
            </a>
          <?php endif ?>
          <?php foreach ($allTags as $tag => $count): ?>
            <a href="<?= $page->url() ?>?tag=<?= urlencode($tag) ?><?= $q ? '&q=' . urlencode($q) : '' ?>"
              class="tag-filter-item <?= $selectedTag === $tag ? 'active' : '' ?>">
              <?= esc($tag) ?> <span class="tag-count">(<?= $count ?>)</span>
            </a>
          <?php endforeach ?>
        </div>
      </div>
    <?php endif ?>

    <?php if ($featured): ?>
      <section class="padding-section" />
      <h2 class="text-purple">À la une</h2>
      <img class="wave-spot-large" src="/assets/images/spots/purple-wave-spot-double.png" alt="Spot vert équipe">
      <section class="padding-section-small" />

      <div class="blog-featured">
        <?php snippet('blog/card', ['article' => $featured]) ?>
      </div>
    <?php endif ?>

    <?php if ($mostRead && $mostRead->count()): ?>
      <section class="padding-section" />
      <h2 class="text-purple">Les plus lus</h2>
      <img class="wave-spot-large" src="/assets/images/spots/purple-wave-spot-double.png" alt="Spot vert équipe">
      <section class="padding-section-small" />
      <div class="blog-carousel">
        <?php foreach ($mostRead as $article): ?>
          <div class="blog-carousel-item">
            <?php snippet('blog/card', ['article' => $article]) ?>
          </div>
        <?php endforeach ?>
      </div>
    <?php endif ?>

    <?php if ($latest->count()): ?>
      <section class="padding-section" />
      <h2 class="text-purple">
        <?php if ($q !== ''): ?>
          Résultats de recherche pour "<?= highlightText(esc($q), '') ?>"
        <?php elseif ($selectedTag !== ''): ?>
          Articles avec le tag "<?= esc($selectedTag) ?>"
        <?php else: ?>
          Derniers articles
        <?php endif ?>
      </h2>
      <img class="wave-spot-large" src="/assets/images/spots/purple-wave-spot-double.png" alt="Spot vert équipe">
      <section class="padding-section-small" />

      <div class="blog-grid" id="blog-grid" data-page="<?= $pageNum ?>" data-total-pages="<?= $totalPages ?>" data-q="<?= esc($q) ?>" data-tag="<?= esc($selectedTag) ?>">
        <?php foreach ($latest as $index => $article): ?>
          <?php snippet('blog/card', ['article' => $article]) ?>
        <?php endforeach ?>
      </div>

      <?php if ($pageNum < $totalPages): ?>
        <div class="align-center">
          <button id="blog-load-more" class="blog-load-more" type="button" aria-label="Voir plus d'articles">
            <span>Voir plus d’articles</span>
            <span aria-hidden>↓</span>
          </button>
        </div>
      <?php endif ?>
    <?php else: ?>
      <div class="no-articles">
        <p class="text-grey">Aucun article trouvé.</p>
      </div>
    <?php endif ?>

    <section class="padding-section" />
  </div>
</section>

<?php snippet('footer') ?>

<script>
  (function() {
    const btn = document.getElementById('blog-load-more');
    const grid = document.getElementById('blog-grid');
    if (!btn || !grid) return;

    let page = parseInt(grid.dataset.page, 10) || 1;
    const totalPages = parseInt(grid.dataset.totalPages, 10) || 1;
    const q = grid.dataset.q || '';
    const tag = grid.dataset.tag || '';

    btn.addEventListener('click', async function() {
      if (page >= totalPages) return;
      const nextPage = page + 1;
      const url = `${window.location.pathname}?page=${nextPage}${q ? `&q=${encodeURIComponent(q)}` : ''}${tag ? `&tag=${encodeURIComponent(tag)}` : ''}`;
      try {
        const res = await fetch(url, {
          headers: {
            'X-Requested-With': 'XMLHttpRequest'
          }
        });
        const text = await res.text();
        const tmp = document.createElement('div');
        tmp.innerHTML = text;
        const newGrid = tmp.querySelector('#blog-grid');
        if (newGrid) {
          const cards = newGrid.children;
          for (const card of cards) grid.appendChild(card.cloneNode(true));
          page = nextPage;
          grid.dataset.page = page;
          if (page >= totalPages) btn.style.display = 'none';
        }
      } catch (e) {
        console.error(e);
      }
    });
  })();
</script>