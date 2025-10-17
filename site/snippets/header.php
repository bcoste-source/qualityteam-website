<?php
/*
  Snippets are a great way to store code snippets for reuse
  or to keep your templates clean.

  This header snippet is reused in all templates.
  It fetches information from the `site.txt` content file
  and contains the site navigation.

  More about snippets:
  https://getkirby.com/docs/guide/templates/snippets
*/
$preprod_url = 'https://preprod.qualityteam.fr';
$full_url = (string)($kirby->url('full') ?? '');
$is_preprod = str_starts_with($full_url, $preprod_url);
if ($is_preprod): ?>
  <meta name="robots" content="noindex, nofollow">
<?php endif ?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">

  <?php
  /*
    SEO Meta Tags
    - Meta title: utilise meta_title si défini, sinon fallback sur le titre de la page
    - Meta description: utilise meta_description si défini
  */
  $metaTitle = $page->meta_title()->isNotEmpty()
    ? $page->meta_title()->esc()
    : $site->title()->esc() . ' | ' . $page->title()->esc();

  $metaDescription = $page->meta_description()->isNotEmpty()
    ? $page->meta_description()->esc()
    : null;
  ?>

  <title><?= $metaTitle ?></title>

  <?php if ($metaDescription): ?>
    <meta name="description" content="<?= $metaDescription ?>">
  <?php endif ?>

  <!-- Open Graph / Facebook -->
  <meta property="og:type" content="website">
  <meta property="og:title" content="<?= $metaTitle ?>">
  <?php if ($metaDescription): ?>
    <meta property="og:description" content="<?= $metaDescription ?>">
  <?php endif ?>

  <!-- Twitter -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="<?= $metaTitle ?>">
  <?php if ($metaDescription): ?>
    <meta name="twitter:description" content="<?= $metaDescription ?>">
  <?php endif ?>

  <?php
  /*
    Stylesheets can be included using the `css()` helper.
    Kirby also provides the `js()` helper to include script file.
    More Kirby helpers: https://getkirby.com/docs/reference/templates/helpers
  */
  ?>
  <?= css([
    'assets/css/prism.css',
    'assets/css/lightbox.css',
    'assets/css/index.css',
    '@auto'
  ]) ?>

  <?php
  /*
    The `url()` helper is a great way to create reliable
    absolute URLs in Kirby that always start with the
    base URL of your site.
  */
  ?>
  <link rel="shortcut icon" type="image/x-icon" href="<?= url('favicon.ico') ?>">
</head>

<body>

  <header class="header">
    <div class="header-left">
      <?php
      /*
        We use `$site->url()` to create a link back to the homepage
        for the logo and `$site->title()` as a temporary logo. You
        probably want to replace this with an SVG.
      */
      ?>
      <a class="logo" href="<?= $site->url() ?>">
        <?php if ($site->logo_image()->isNotEmpty()): ?>
          <?= $site->logo_image()->toFile()->html(['alt' => $site->title()->esc()]) ?>
        <?php else: ?>
          <?= $site->title()->esc() ?>
        <?php endif ?>
      </a>

      <button class="menu-toggle" aria-label="Toggle menu" aria-expanded="false">
        <span class="hamburger">
          <span></span>
          <span></span>
          <span></span>
        </span>
      </button>
    </div>

    <nav class="menu">
      <div class="menu-center">
        <?php
        /*
        In the menu, we only fetch listed pages,
        i.e. the pages that have a prepended number
        in their foldername.

        We do not want to display links to unlisted
        `error`, `home`, or `sandbox` pages.

        More about page status:
        https://getkirby.com/docs/reference/panel/blueprints/page#statuses
      */
        ?>
        <?php foreach ($site->children()->listed() as $item): ?>
          <?php $children = $item->children()->listed(); ?>
          <?php if ($item->id() === 'offers' && $children->count()): ?>
            <div class="menu-item has-dropdown" tabindex="0">
              <a <?php e($item->isOpen(), 'aria-current="page"') ?> href="<?= $item->url() ?>"><?= $item->title()->esc() ?></a>
              <div class="dropdown">
                <?php foreach ($children as $child): ?>
                  <a href="<?= $child->url() ?>"><?= $child->title()->esc() ?></a>
                <?php endforeach ?>
              </div>
            </div>
          <?php else: ?>
            <a <?php e($item->isOpen(), 'aria-current="page"') ?> href="<?= $item->url() ?>"><?= $item->title()->esc() ?></a>
          <?php endif ?>
        <?php endforeach ?>
        <?php // CTA mobile dans le menu (affiché uniquement en mobile)
        $ctaLabel = $site->appointment_label()->or('PRENDRE RENDEZ-VOUS');
        $ctaUrl   = $site->appointment_url()->or('#');
        ?>
        <a class="header-cta-mobile btn-outline-green" href="<?= $ctaUrl->esc() ?>">
          <?= mb_strtoupper($ctaLabel->esc(), 'UTF-8') ?>
        </a>
      </div>
    </nav>
    <?php // CTA desktop à droite
    $ctaLabel = $site->appointment_label()->or('PRENDRE RENDEZ-VOUS');
    $ctaUrl   = $site->appointment_url()->or('#');
    ?>
    <div class="menu-cta">
      <a class="header-cta btn-outline-green" href="<?= $ctaUrl->esc() ?>">
        <?= mb_strtoupper($ctaLabel->esc(), 'UTF-8') ?>
      </a>
    </div>
  </header>

  <main class="main">