<?php snippet('header') ?>

<section class="background-white-with-green-vector">
  <div class="body-padding body-centered">

    <?php if ($page->about_subtitle()->isNotEmpty()): ?>
      <p class="text-green text-small page-subtitle">
        <?= mb_strtoupper($page->about_subtitle()->esc(), 'UTF-8') ?>
      </p>
    <?php endif ?>
    <?php if ($page->about_title()->isNotEmpty()): ?>
      <div class="about-title-container">
        <img class="thunder-left" src="/assets/images/spots/team/thunder-left.png" alt="Thunder left">
        <h2 class="text-purple-black"><?= $page->about_title()->kirbytext() ?></h2>
        <img class="thunder-right" src="/assets/images/spots/team/thunder-right.png" alt="Thunder right">
      </div>
    <?php endif ?>

    <section class="padding-section-small" />

    <?php if ($page->about_gallery()->isNotEmpty()): ?>
      <div class="about-gallery">
        <?php foreach ($page->about_gallery()->toFiles() as $img): ?>
          <?= $img->html(['alt' => '', 'class' => 'hover-animation-rotate']) ?>
        <?php endforeach ?>
      </div>
    <?php endif ?>

    <section class="padding-section" />

    <?php if ($page->team_description()->isNotEmpty()): ?>
      <div class="text-purple" style="max-width:52rem; margin:0 auto;">
        <?= $page->team_description()->kirbytext() ?>
      </div>
    <?php endif ?>

    <section class="padding-section" />

    <?php if ($page->teammates()->isNotEmpty()): ?>
      <div class="team-list">
        <?php $spots = [
          '/assets/images/spots/team/spot-1.png',
          '/assets/images/spots/team/spot-2.png',
          '/assets/images/spots/team/spot-3.png',
          '/assets/images/spots/team/spot-4.png',
          '/assets/images/spots/team/spot-5.png'
        ]; ?>
        <?php foreach ($page->teammates()->toStructure() as $idx => $t): ?>
          <div class="teammate <?= $idx % 2 === 0 ? 'is-even' : 'is-odd' ?>">
            <div class="teammate-image">
              <?php if ($t->image()->isNotEmpty()): ?>
                <?= $t->image()->toFile()->html(['alt' => $t->firstname()->esc(), 'class' => 'hover-animation-rotate']) ?>
              <?php endif ?>
            </div>
            <div class="teammate-content">
              <h3 class="teammate-name text-green">
                <?= $t->firstname()->esc() ?>
              </h3>
              <?php if ($t->nickname()->isNotEmpty()): ?>
                <h3 class="teammate-nickname text-purple" style="margin:0; text-align:center;">– <?= $t->nickname()->esc() ?> –</h3>
              <?php endif ?>

              <div class="teammate-details">
                <?php if ($t->role()->isNotEmpty()): ?>
                  <p class="teammate-detail-item" style="margin:0;"><span class="text-pink">• Poste :</span> <span class="text-purple"><?= $t->role()->esc() ?></span></p>
                <?php endif ?>
                <?php if ($t->specialty()->isNotEmpty()): ?>
                  <p class="teammate-detail-item" style="margin:0;"><span class="text-pink">• Spécialité :</span> <span class="text-purple"><?= $t->specialty()->esc() ?></span></p>
                <?php endif ?>
              </div>

              <?php if ($t->description()->isNotEmpty()): ?>
                <div class="teammate-description text-black" style="text-align:left;">
                  <?= $t->description()->kirbytext() ?>
                </div>
              <?php endif ?>
            </div>
          </div>
          <div class="team-spot-between<?= ($idx < count($page->teammates()->toStructure()) - 1) ? (($idx % 2 === 0) ? ' is-right' : ' is-left') : '' ?>">
            <img src="<?= $spots[$idx % count($spots)] ?>" alt="Spot équipe">
          </div>
        <?php endforeach ?>
      </div>
    <?php endif ?>

    <?php if ($page->last_firstname()->isNotEmpty() || $page->last_description()->isNotEmpty()): ?>
      <div class="teammate is-center">
        <div class="teammate-content">
          <h3 class="teammate-name text-green">
            <?= $page->last_firstname()->esc() ?>
          </h3>
          <?php if ($page->last_nickname()->isNotEmpty()): ?>
            <p class="teammate-nickname text-purple" style="margin:0; text-align:center;">– <?= $page->last_nickname()->esc() ?> –</p>
          <?php endif ?>

          <div class="teammate-details">
            <?php if ($page->last_role()->isNotEmpty()): ?>
              <p class="teammate-detail-item" style="margin:0;"><span class="text-pink">• Poste :</span> <span class="text-purple"><?= $page->last_role()->esc() ?></span></p>
            <?php endif ?>
            <?php if ($page->last_specialty()->isNotEmpty()): ?>
              <p class="teammate-detail-item" style="margin:0;"><span class="text-pink">• Spécialité :</span> <span class="text-purple"><?= $page->last_specialty()->esc() ?></span></p>
            <?php endif ?>
          </div>

          <?php if ($page->last_description()->isNotEmpty()): ?>
            <div class="teammate-description text-black" style="text-align:left; max-width:40rem; margin:0 auto;">
              <?= $page->last_description()->kirbytext() ?>
            </div>
          <?php endif ?>
        </div>
      </div>
    <?php endif ?>



    <?php if ($page->team_final_image()->isNotEmpty()): ?>
      <div class="team-final-image">
        <?= $page->team_final_image()->toFile()->html(['alt' => 'Team']) ?>
      </div>
    <?php endif ?>
  </div>
</section>


<div class="transition-spot">
  <img src="/assets/images/spots/spot-heart.png" alt="Transition coeur">
  <section class="padding-section-small" />
</div>


<section class="black-section">
  <div class="body-padding body-centered">
    <section class="padding-section" />

    <?php if ($page->values_title()->isNotEmpty()): ?>
      <h2 class="text-white-purple"><?= $page->values_title()->kirbytext() ?></h2>
    <?php endif ?>
    <?php if ($page->values_description()->isNotEmpty()): ?>
      <div class="text-white text-small">
        <?= mb_strtoupper($page->values_description()->kirbytext()) ?>
      </div>
    <?php endif ?>
    <?php if ($page->values_paragraph()->isNotEmpty()): ?>
      <h3 class="text-white" style="opacity:.85; max-width:52rem; margin:1.5rem auto 0;">
        <?= $page->values_paragraph()->kirbytext() ?>
      </h3>
    <?php endif ?>

    <section class="padding-section" />

    <?php if ($page->values_items()->isNotEmpty()): ?>
      <div class="values-list">
        <?php foreach ($page->values_items()->toStructure() as $v): ?>
          <div class="value-item">
            <?php if ($v->image()->isNotEmpty()): ?>
              <div class="value-icon">
                <?= $v->image()->toFile()->html(['alt' => '']) ?>
              </div>
            <?php endif ?>
            <div class="value-text text-white-green">
              <?= $v->text()->kirbytext() ?>
            </div>
          </div>
        <?php endforeach ?>
      </div>
    <?php endif ?>

    <section class="padding-section" />
  </div>
</section>

<?php snippet('footer') ?>