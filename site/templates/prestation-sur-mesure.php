<?php snippet('header') ?>

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

        <section class="padding-section" />
        <div class="text-white-purple">
            <?= $page->parent()->hero_title()->kirbytext() ?>
        </div>
    </div>
</section>

<?php snippet('footer') ?>