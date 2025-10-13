<?php
// Incrémenter le compteur de vues
$currentViews = $page->views()->toInt();
try {
    $page->update(['views' => $currentViews + 1], 'fr');
} catch (Exception $e) {
    // Silencieusement ignorer l'erreur si l'update échoue
}

snippet('header');
?>

<section class="background-white-with-green-vector">
    <div class="body-padding body-centered">

        <div class="article-header">
            <h1 class="text-black-green"><?= $page->title()->kirbytext() ?></h1>

            <?php if ($page->description()->isNotEmpty()): ?>
                <span class="text-purple-black" style="max-width:52rem; margin:1rem auto 0;">
                    <?= $page->description()->kirbytext() ?>
                </span>
            <?php endif ?>

            <div class="article-meta-header">
                <?php if ($page->date()->isNotEmpty()): ?>
                    <div class="article-date-header">
                        <span class="text-green">Date :</span>
                        <span class="text-purple"><?= $page->date()->toDate('d/m/Y') ?></span>
                    </div>
                <?php endif ?>

                <?php if ($page->tags()->isNotEmpty()): ?>
                    <div class="article-tags-header">
                        <?php foreach ($page->tags()->split() as $tag): ?>
                            <a href="<?= $page->parent()->url() ?>?tag=<?= urlencode($tag) ?>" class="article-tag"><?= esc($tag) ?></a>
                        <?php endforeach ?>
                    </div>
                <?php endif ?>
            </div>
        </div>

        <section class="padding-section" />

        <?php if ($page->main_image()->isNotEmpty()): ?>
            <div class="article-main-image">
                <a href="<?= $page->main_image()->toFile()->url() ?>" data-lightbox="main-image" data-title="<?= $page->title()->esc() ?>">
                    <?= $page->main_image()->toFile()->html(['alt' => $page->title()->esc()]) ?>
                </a>
            </div>
        <?php endif ?>

        <section class="padding-section" />

        <?php if ($page->text()->isNotEmpty()): ?>
            <div class="article-content">
                <?= $page->text()->kirbytext() ?>
            </div>
        <?php endif ?>

        <section class="padding-section" />

        <div class="article-cta">
            <a href="<?= $site->find('offers')?->url() ?? url('/') ?>" class="btn-green">Découvrir nos offres →</a>
        </div>

        <section class="padding-section" />

        <div class="back-to-blog">
            <a href="<?= $page->parent()->url() ?>" class="btn-green">← Retour au blog</a>
        </div>

    </div>
</section>

<?php snippet('footer') ?>