<?php snippet('header') ?>

<section class="green-section">
    <div class="body-padding body-centered">
        <h2 class="text-white"><?= $page->ai_title()->esc() ?></h2>
        <p class="text-white"><?= $page->ai_subtitle()->esc() ?></p>

        <div class="text-white"><?= $page->ai_paragraph1()->kirbytext() ?></div>
        <div class="text-white"><?= $page->ai_paragraph2()->kirbytext() ?></div>

        <h3 class="text-white" style="margin-top:2rem;">
            <?= $page->ai_why_title()->esc() ?></h3>
        <?php if ($page->ai_why_items()->isNotEmpty()): ?>
            <ul class="why-list">
                <?php foreach ($page->ai_why_items()->toStructure() as $i): ?>
                    <li class="text-white"><?= $i->text()->kirbytext() ?></li>
                <?php endforeach ?>
            </ul>
        <?php endif ?>

        <h3 class="text-white" style="margin-top:1.5rem;">
            <?= $page->ai_how_title()->esc() ?></h3>
        <?php if ($page->ai_how_steps()->isNotEmpty()): ?>
            <ul class="why-list">
                <?php foreach ($page->ai_how_steps()->toStructure() as $s): ?>
                    <li class="text-white"><?= $s->text()->kirbytext() ?></li>
                <?php endforeach ?>
            </ul>
        <?php endif ?>

        <div class="deliverables text-white">
            <?= $page->ai_benefits_intro()->kirbytext() ?>
            <?php if ($page->ai_benefits()->isNotEmpty()): ?>
                <ul>
                    <?php foreach ($page->ai_benefits()->toStructure() as $b): ?>
                        <li class="text-white"><?= $b->item()->esc() ?></li>
                    <?php endforeach ?>
                </ul>
            <?php endif ?>
        </div>

        <div class="ready">
            <div class="text-white"><?= $page->ai_ready_text()->kirbytext() ?></div>
            <?php if ($page->ai_cta_text()->isNotEmpty()): ?>
                <a href="<?= $page->ai_cta_link()->or('#contact')->esc() ?>" class="btn-green" style="margin-top:1rem; background:var(--color-white); color:var(--color-code-green); border-color:var(--color-white);">
                    <?= $page->ai_cta_text()->esc() ?>
                </a>
            <?php endif ?>
        </div>

        <section class="padding-section" />
        <div class="text-white-purple">
            <?= $page->parent()->hero_title()->kirbytext() ?>
        </div>
    </div>
</section>

<?php snippet('footer') ?>