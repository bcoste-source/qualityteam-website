<?php
/*
  Home Template - QualityTeam Website
  
  This template renders the homepage with all sections:
  - Hero Section
  - Companies Section  
  - Problem Section
  - Construction Section
  - MVP Section
  - Method Section (Purple)
  - Accompaniment Section
  - Expertise Section (Black)
  - FAQ Section (White)
  - CTA Section (Green)
*/

?>
<?php snippet('header') ?>

<!-- Hero Section -->
<section class="hero">
  <?php if ($page->hero_image()->isNotEmpty()): ?>
    <div class="hero-bg">
      <?= $page->hero_image()->toFile()->html(['alt' => 'Background image']) ?>
    </div>
  <?php endif ?>
</section>

<!-- Green Background Section -->
<div class="background-white-with-green-vector">
  <div class="body-padding body-centered">

    <!-- Companies Section -->
    <?php if ($page->companies_title()->isNotEmpty()): ?>
      <section class="companies text-purple">
        <h3><?= $page->companies_title()->esc() ?></h3>
        <?php if ($page->companies_logos()->isNotEmpty()): ?>
          <div class="companies-logo">
            <?php foreach ($page->companies_logos()->toFiles() as $logo): ?>
              <?= $logo->html(['alt' => 'Logo entreprise']) ?>
            <?php endforeach ?>
          </div>
        <?php endif ?>
      </section>
    <?php endif ?>

    <section class="padding-section" />
    <img class="spot" src="/assets/images/spots/green-spot-1.png">
    <section class="padding-section-small" />

    <!-- Problem Section -->
    <?php if ($page->problem_items()->isNotEmpty()): ?>
      <section class="problem-section">
        <div class="problem-grid">
          <?php foreach ($page->problem_items()->toStructure() as $item): ?>
            <div class="problem-item">
              <?php if ($item->icon()->isNotEmpty()): ?>
                <div class="problem-icon">
                  <?= $item->icon()->toFile()->html(['alt' => '']) ?>
                </div>
              <?php endif ?>
              <div class="problem-text">
                <?= $item->text()->kirbytext() ?>
              </div>
            </div>
          <?php endforeach ?>
        </div>
      </section>
    <?php endif ?>

    <section class="padding-section" />

    <div class="mvp-max-width">
      <!-- Construction Section -->
      <?php if ($page->construction_title()->isNotEmpty() || $page->construction_text()->isNotEmpty()): ?>
        <section class="construction">
          <?php if ($page->construction_title()->isNotEmpty()): ?>
            <h2 class="text-black"><?= $page->construction_title()->esc() ?></h2>
          <?php endif ?>
          <?php if ($page->construction_text()->isNotEmpty()): ?>
            <h2 class="construction-text text-black-green">
              <strong>QualityTeam</strong> s’occupe de tout
            </h2>
          <?php endif ?>
        </section>
      <?php endif ?>

      <section class="padding-section" />

      <!-- MVP Section -->
      <?php if ($page->mvp_image()->isNotEmpty()): ?>
        <section class="mvp">
          <?php if ($page->mvp_button_link()->isNotEmpty()): ?>
            <a href="<?= $page->mvp_button_link()->esc() ?>" class="btn-mvp">
              <div class="mvp-image">
                <?= $page->mvp_image()->toFile()->html(['alt' => 'MVP Image']) ?>
              </div>
            </a>
          <?php endif ?>
        </section>
      <?php endif ?>

      <section class="padding-section" />

      <!-- Team Section -->
      <section class="team-section">
        <?php if ($page->team_text()->isNotEmpty()): ?>
          <div class="team-text text-purple">
            <p><?= $page->team_text()->esc() ?></p>
          </div>
          <img class="team-spot" src="/assets/images/spots/green-spot-4.png" alt="Spot vert équipe">
        <?php endif ?>

        <section class="padding-section" />

        <?php if ($page->example_text()->isNotEmpty()): ?>
          <div class="example-text text-purple">
            <p><?= $page->example_text()->esc() ?></p>
          </div>
        <?php endif ?>
      </section>
    </div>
  </div>
</div>

<!-- Transition Rectangle -->
<div class="transition-rectangle"></div>

<!-- Purple Section - Method -->
<section class="purple-section">
  <div class="hourglass-container">
    <img class="hourglass" src="/assets/images/other/hourglass.png">
  </div>

  <div class="method-header">
    <?php if ($page->method_title()->isNotEmpty()): ?>
      <p class="text-pink"><?= $page->method_title()->esc() ?></p>
    <?php endif ?>
    <?php if ($page->method_duration()->isNotEmpty()): ?>
      <h1 class="method-duration text-green"><?= $page->method_duration()->esc() ?></h1>
    <?php endif ?>
    <?php if ($page->method_description()->isNotEmpty()): ?>
      <h4 class="method-description text-white"><?= $page->method_description()->esc() ?></h4>
    <?php endif ?>
  </div>

  <div class="arrow-container">
    <img class="purple-arrow" src="/assets/images/spots/purple-arrow.png" alt="Flèche violette">
    <div class="text-white">La méthode utilisée :</div>
  </div>

  <section class="padding-section" />

  <?php if ($page->method_steps()->isNotEmpty()): ?>
    <section class="method-steps">
      <?php foreach ($page->method_steps()->toStructure() as $index => $step): ?>
        <div class="method-step">
          <h1 class="step-number text-green"><?= $index + 1 ?></h1>
          <div class="step-content">
            <h3 class="step-title text-green"><?= $step->title()->esc() ?></h3>
            <div class="step-description text-white">
              <?= $step->description()->kirbytext() ?>
            </div>
          </div>
        </div>
      <?php endforeach ?>
    </section>
  <?php endif ?>

  <section class="padding-section" />

  <!-- Accompaniment Section -->
  <?php if ($page->accompaniment_title()->isNotEmpty()): ?>
    <section class="accompaniment-section">
      <div class="accompaniment-header">
        <h3 class="text-white-green"><?= $page->accompaniment_title()->kirbytext() ?></h3>
      </div>

      <?php if ($page->accompaniment_items()->isNotEmpty()): ?>
        <div class="accompaniment-grid">
          <?php foreach ($page->accompaniment_items()->toStructure() as $item): ?>
            <div class="accompaniment-item">
              <?php if ($item->icon()->isNotEmpty()): ?>
                <div class="accompaniment-icon">
                  <?= $item->icon()->toFile()->html(['alt' => '']) ?>
                </div>
              <?php endif ?>
              <div class="accompaniment-text text-white">
                <?= $item->text()->kirbytext() ?>
              </div>
            </div>
          <?php endforeach ?>
        </div>
      <?php endif ?>

      <section class="padding-section" />

      <div class="button-spots">
        <img class="button-spot-left" src="/assets/images/spots/button-spot-left.png" alt="Spot gauche">
        <img class="button-spot-right" src="/assets/images/spots/button-spot-right.png" alt="Spot droite">
      </div>

      <?php if ($page->accompaniment_button_text()->isNotEmpty()): ?>
        <div class="cta-accompaniment">
          <a href="<?= $page->accompaniment_button_link()->esc() ?>" class="btn-launch">
            <?= $page->accompaniment_button_text()->esc() ?>
          </a>
        </div>
      <?php endif ?>

      <section class="padding-section" />
    </section>
  <?php endif ?>
</section>

<!-- Transition Image -->
<div class="transition-spot">
  <img src="/assets/images/spots/purple-to-black-spot.png" alt="Transition spot">
</div>

<!-- Black Section - Expertise -->
<section class="black-section">
  <div class="body-padding body-centered">
    <section class="padding-section" />

    <div class="expertise-section">
      <h2 class="expertise-title">
        <span class="expertise-title-line1 text-white"><?= $page->expertise_title_line1()->esc() ?></span>
        <span class="expertise-title-line2 text-green"><?= $page->expertise_title_line2()->esc() ?></span>
      </h2>

      <div class="expertise-content">
        <div class="expertise-icon">
          <img src="/assets/images/other/lightning-bolt.png" alt="Expertise icon">
        </div>
        <div class="expertise-text">
          <?php if ($page->expertise_text1()->isNotEmpty()): ?>
            <div class="text-white-green">
              <?= $page->expertise_text1()->kirbytext() ?>
            </div>
          <?php endif ?>
          <?php if ($page->expertise_text2()->isNotEmpty()): ?>
            <div class="text-white">
              <?= $page->expertise_text2()->kirbytext() ?>
            </div>
          <?php endif ?>
        </div>
      </div>

      <?php if ($page->expertise_button_text()->isNotEmpty()): ?>
        <div class="expertise-cta">
          <a href="<?= $page->expertise_button_link()->esc() ?>" class="btn-expertise">
            <?= $page->expertise_button_text()->esc() ?>
            <span class="arrow">→</span>
          </a>
        </div>
      <?php endif ?>
    </div>

    <section class="padding-section" />
  </div>
</section>

<!-- Transition Image -->
<div class="double-transition-spot">
  <img src="/assets/images/spots/black-to-white-spot.png" alt="Transition spot">
</div>

<!-- FAQ Section -->
<section class="faq-section">
  <div class="body-padding body-centered">
    <section class="padding-section" />

    <div class="faq-header">
      <h2 class="faq-title">
        <span class="faq-title-part1 text-black"><?= $page->faq_title_line1()->esc() ?></span>
        <span class="faq-title-part2 text-green"><?= $page->faq_title_line2()->esc() ?></span>
      </h2>
      <?php if ($page->faq_subtitle()->isNotEmpty()): ?>
        <p class="faq-subtitle"><?= $page->faq_subtitle()->esc() ?></p>
      <?php endif ?>
    </div>

    <?php if ($page->faq_items()->isNotEmpty()): ?>
      <div class="faq-accordion">
        <?php foreach ($page->faq_items()->toStructure() as $index => $item): ?>
          <div class="faq-item">
            <div class="faq-question" data-faq-toggle="<?= $index ?>">
              <span class="faq-number text-purple"><?= $index + 1 ?>.</span>
              <span class="faq-question-text text-black"><?= $item->question()->esc() ?></span>
              <span class="faq-arrow text-purple">▼</span>
            </div>
            <?php if ($item->answer()->isNotEmpty()): ?>
              <div class="faq-answer" data-faq-content="<?= $index ?>">
                <div class="faq-answer-content">
                  <span class="faq-checkmark text-green">✓</span>
                  <span class="faq-answer-text text-small">
                    <?= $item->answer()->kirbytext() ?>
                  </span>
                </div>
              </div>
            <?php endif ?>
          </div>
        <?php endforeach ?>
      </div>
    <?php endif ?>

    <section class="padding-section" />
  </div>
</section>

<!-- Green Section - CTA -->
<section class="green-section">
  <div class="body-padding body-centered">
    <section class="padding-section" />

    <div class="green-cta-section">
      <h2 class="green-title">
        <span class="green-title-part1 text-white"><?= $page->cta_title_line1()->esc() ?></span>
        <span class="green-title-part2 text-purple"><?= $page->cta_title_line2()->esc() ?></span>
      </h2>

      <?php if ($page->cta_subtitle()->isNotEmpty()): ?>
        <p class="green-subtitle text-white"><?= $page->cta_subtitle()->esc() ?></p>
      <?php endif ?>

      <div class="green-buttons">
        <?php if ($page->cta_button1_text()->isNotEmpty()): ?>
          <div class="green-button-container">
            <a href="<?= $page->cta_button1_link()->esc() ?>" class="btn-green">
              <?= $page->cta_button1_text()->esc() ?>
              <span class="arrow">→</span>
            </a>
            <img class="pink-arrow-right" src="/assets/images/spots/pink-arrow-to-left.png" alt="Flèche droite">
          </div>
        <?php endif ?>

        <?php if ($page->cta_button2_text()->isNotEmpty()): ?>
          <div class="green-button-container">
            <img class="pink-arrow-left" src="/assets/images/spots/pink-arrow-to-right.png" alt="Flèche gauche">
            <a href="<?= $page->cta_button2_link()->esc() ?>" class="btn-green">
              <?= $page->cta_button2_text()->esc() ?>
              <span class="arrow">→</span>
            </a>
          </div>
        <?php endif ?>
      </div>

      <div class="scroll-to-top">
        <button class="scroll-top-btn" onclick="window.scrollTo({top: 0, behavior: 'smooth'})">
          ↑
        </button>
      </div>
    </div>

    <section class="padding-section" />
  </div>
</section>

<?php snippet('footer') ?>