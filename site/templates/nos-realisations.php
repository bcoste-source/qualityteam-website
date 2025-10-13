<?php snippet('header') ?>

<section class="purple-section">
  <div class="body-padding body-centered">
    <section class="padding-section" />

    <?php if ($page->hero_title()->isNotEmpty()): ?>
      <h1 class="text-white-green"><?= $page->hero_title()->kirbytext() ?></h1>
    <?php endif ?>

    <?php if ($page->hero_subtitle()->isNotEmpty()): ?>
      <p class="text-green text-small page-subtitle">
        <?= mb_strtoupper($page->hero_subtitle()->esc(), 'UTF-8') ?>
      </p>
    <?php endif ?>

    <section class="padding-section-small" />

    <?php if ($page->hero_paragraph1()->isNotEmpty()): ?>
      <div class="text-white" style="max-width:52rem; margin:0 auto;">
        <?= $page->hero_paragraph1()->kirbytext() ?>
      </div>
    <?php endif ?>

    <?php if ($page->hero_paragraph2()->isNotEmpty()): ?>
      <div class="text-white" style="max-width:52rem; margin:1rem auto 0;">
        <?= $page->hero_paragraph2()->kirbytext() ?>
      </div>
    <?php endif ?>

    <section class="padding-section" />
  </div>
</section>

<div class="transition-spot">
  <img src="/assets/images/spots/arrow-down.png" alt="Transition coeur">
</div>

<section>
  <div class="body-padding body-centered">

    <section class="padding-section-small" />

    <h2 class="text-purple">Nos projets :</h2>
    <img class="wave-spot-large" src="/assets/images/spots/purple-wave-spot-double.png" alt="Spot vert équipe">


    <section class="padding-section-small" />

    <?php
    $realisations = $page->children()->listed()->sortBy('date', 'desc');
    $perPage = 5;
    $currentPage = $page->request()->get('page', 1)->toInt();
    $offset = ($currentPage - 1) * $perPage;
    $paginatedRealisations = $realisations->offset($offset)->limit($perPage);
    $totalPages = ceil($realisations->count() / $perPage);
    ?>

    <?php if ($paginatedRealisations->count() > 0): ?>
      <div class="realisations-grid">
        <?php foreach ($paginatedRealisations as $realisation): ?>
          <div class="realisation-card">
            <div class="realisation-image">
              <?php if ($realisation->realisation_main_image()->isNotEmpty()): ?>
                <?= $realisation->realisation_main_image()->toFile()->html(['alt' => $realisation->realisation_title()->esc()]) ?>
              <?php endif ?>
            </div>

            <div class="realisation-content">
              <div class="realisation-category">
                <span class="text-green">ÉTUDE DE CAS</span>
              </div>

              <h3 class="realisation-title text-black-green"><?= $realisation->realisation_title()->kirbytext() ?></h3>

              <span class="realisation-description">
                <?= $realisation->realisation_description()->kirbytext()  ?>
              </span>


              <div class="realisation-meta">
                <?php if ($realisation->realisation_responsibles()->isNotEmpty()): ?>
                  <div class="realisation-responsibles">
                    <?php foreach ($realisation->realisation_responsibles()->toStructure() as $responsible): ?>
                      <div class="responsible-item">
                        <?php if ($responsible->image()->isNotEmpty()): ?>
                          <img src="<?= $responsible->image()->toFile()->url() ?>" alt="<?= $responsible->name()->esc() ?>" class="responsible-avatar">
                        <?php endif ?>
                        <span class="responsible-name"><?= $responsible->name()->esc() ?></span>
                      </div>
                    <?php endforeach ?>
                  </div>
                <?php endif ?>

                <?php if ($realisation->realisation_date()->isNotEmpty()): ?>
                  <div class="realisation-date">
                    <?= $realisation->realisation_date()->toDate('d/m/Y') ?>
                  </div>
                <?php endif ?>
              </div>

              <a href="<?= $realisation->url() ?>" class="realisation-link">
                Lire la suite →
              </a>
            </div>
          </div>
        <?php endforeach ?>
      </div>

      <?php if ($totalPages > 1): ?>
        <div class="pagination">
          <?php if ($currentPage > 1): ?>
            <a href="<?= $page->url() ?>?page=<?= $currentPage - 1 ?>" class="pagination-btn">← Précédent</a>
          <?php endif ?>

          <span class="pagination-info">
            Page <?= $currentPage ?> sur <?= $totalPages ?>
          </span>

          <?php if ($currentPage < $totalPages): ?>
            <a href="<?= $page->url() ?>?page=<?= $currentPage + 1 ?>" class="pagination-btn">Suivant →</a>
          <?php endif ?>
        </div>
      <?php endif ?>
    <?php else: ?>
      <div class="no-realisations">
        <p class="text-white">Aucune réalisation disponible pour le moment.</p>
      </div>
    <?php endif ?>

    <section class="padding-section" />
  </div>
</section>

<?php snippet('footer') ?>