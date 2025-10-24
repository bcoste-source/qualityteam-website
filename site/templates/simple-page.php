<?php snippet('header') ?>

<section class="background-white-with-green-vector">
  <div class="body-padding body-centered">
    <section class="padding-section" />

    <?php if ($page->title()->isNotEmpty()): ?>
      <h1 class="text-purple-green"><?= $page->title()->esc() ?></h1>
    <?php endif ?>

    <section class="padding-section" />

    <?php if ($page->text()->isNotEmpty()): ?>
      <div class="simple-page-content">
        <?= $page->text()->kirbytext() ?>
      </div>
    <?php endif ?>

    <section class="padding-section" />
  </div>
</section>

<?php snippet('footer') ?>