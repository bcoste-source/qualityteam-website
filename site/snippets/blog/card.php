<?php

use Kirby\Cms\Page;

/** @var Kirby\Cms\Page $article */
if (!isset($article) || !$article instanceof Page) return;
?>

<a class="blog-card" href="<?= $article->url() ?>">
  <div class="blog-image">
    <?php if ($article->main_image()->isNotEmpty()): ?>
      <?= $article->main_image()->toFile()->html(['alt' => $article->title()->esc()]) ?>
    <?php endif ?>
  </div>

  <div class="blog-content">
    <div class="blog-category">
      <span class="text-green">ARTICLE</span>
    </div>

    <h3 class="blog-title text-black-green"><?= $article->title()->kirbytext() ?></h3>

    <?php if ($article->description()->isNotEmpty()): ?>
      <span class="blog-description"><?= $article->description()->kirbytext() ?></span>
    <?php endif ?>

    <?php if ($article->tags()->isNotEmpty()): ?>
      <div class="blog-tags">
        <?php foreach ($article->tags()->split() as $tag): ?>
          <span class="blog-tag"><?= esc($tag) ?></span>
        <?php endforeach ?>
      </div>
    <?php endif ?>

    <div class="blog-meta">
      <?php if ($article->date()->isNotEmpty()): ?>
        <div class="blog-date"><?= $article->date()->toDate('d/m/Y') ?></div>
      <?php endif ?>
      <?php if ($article->views()->isNotEmpty() && $article->views()->toInt() > 0): ?>
        <div class="blog-views"><?= $article->views()->toInt() ?> vues</div>
      <?php endif ?>
    </div>

    <span class="blog-link">Lire l'article →</span>
  </div>
</a>