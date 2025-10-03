<?php
/*
  Templates render the content of your pages.

  They contain the markup together with some control structures
  like loops or if-statements. The `$page` variable always
  refers to the currently active page.

  To fetch the content from each field we call the field name as a
  method on the `$page` object, e.g. `$page->title()`.

  This home template renders content from others pages, the children of
  the `photography` page to display a nice gallery grid.

  Snippets like the header and footer contain markup used in
  multiple templates. They also help to keep templates clean.

  More about templates: https://getkirby.com/docs/guide/templates/basics
*/

?>
<?php snippet('header') ?>

<!-- Hero Section -->
<section class="hero">
  <?php if ($page->bg_image()->isNotEmpty()): ?>
    <div class="hero-bg">
      <?= $page->bg_image()->toFile()->html(['alt' => 'Background image']) ?>
    </div>
  <?php endif ?>
</section>

<div class="background-vector-green">
  <div class="body-padding body-centered">
    <!-- Companies Section -->
    <?php if ($page->companies()->isNotEmpty()): ?>
      <section class="companies">
        <h2><?= $page->companies()->esc() ?></h2>
        <?php if ($page->companies_logo()->isNotEmpty()): ?>
          <div class="companies-logo">
            <?php foreach ($page->companies_logo()->toFiles() as $logo): ?>
              <?= $logo->html(['alt' => 'Logo entreprise']) ?>
            <?php endforeach ?>
          </div>
        <?php endif ?>
      </section>
    <?php endif ?>

    <section class="padding-section" />

    <img class="spot" src="/assets/images/spots/green-spot-1.png">

    <section class="padding-section" />

    <!-- Images and Texts Section -->
    <?php if ($page->images_texts()->isNotEmpty()): ?>
      <section class="images-texts">
        <?php foreach ($page->images_texts()->toStructure() as $item): ?>
          <div class="image-text-item">
            <?php if ($item->image()->isNotEmpty()): ?>
              <div class="image-text-image">
                <?= $item->image()->toFile()->html(['alt' => '']) ?>
              </div>
            <?php endif ?>
            <div class="image-text-content">
              <p><?= $item->texte()->esc() ?></p>
            </div>
          </div>
        <?php endforeach ?>
      </section>
    <?php endif ?>

    <section class="padding-section" />

    <div class="mvp-max-width">


      <!-- Construction Section -->
      <?php if ($page->construction_headline()->isNotEmpty() || $page->construction_text()->isNotEmpty()): ?>
        <section class="construction">
          <?php if ($page->construction_headline()->isNotEmpty()): ?>
            <h2><?= $page->construction_headline()->esc() ?></h2>
          <?php endif ?>
          <?php if ($page->construction_text()->isNotEmpty()): ?>
            <div class="construction-text">
              <?= $page->construction_text()->kirbytext() ?>
            </div>
          <?php endif ?>
        </section>
      <?php endif ?>

      <section class="padding-section" />

      <!-- MVP Section -->
      <?php if ($page->mvp_image()->isNotEmpty()): ?>
        <section class="mvp">
          <div class="mvp-image">
            <?= $page->mvp_image()->toFile()->html(['alt' => 'MVP Image']) ?>
          </div>
        </section>
      <?php endif ?>

      <section class="padding-section" />

      <!-- Team and Example Section -->
      <section class="team-example">
        <?php if ($page->team_text()->isNotEmpty()): ?>
          <div class="team-text">
            <p><?= $page->team_text()->esc() ?></p>
          </div>
        <?php endif ?>

        <section class="padding-section" />

        <?php if ($page->example_text()->isNotEmpty()): ?>
          <div class="example-text">
            <p><?= $page->example_text()->esc() ?></p>
          </div>
        <?php endif ?>
      </section>

    </div>

  </div>

  <!-- Transition Rectangle -->
  <div class="transition-rectangle"></div>
  <section class="purple-section">
    <div class="hourglass-container" style="text-align: center;">
      <img class="hourglass" src="/assets/images/other/hourglass.png">
    </div>

    <div style="text-align: center;">
      <div class="offre-decouverte text-white">
        <div class="offre-title">
          Une offre découverte imparable
        </div>
        <div class="offre-duree text-green">
          30H
        </div>
        <div class="offre-description" style="font-size: 1.1rem; text-align: center;">
          pour passer de l’idée au prototype<br>avec un max de valeur
        </div>
      </div>
    </div>
    <div class="arrow-container">
      <img class="purple-arrow" src="/assets/images/spots/purple-arrow.png" alt="Flèche violette">
      <div>
        La méthode utilisée :
      </div>
    </div>
    <section class="padding-section" />
    <?php if ($page->used_method()->isNotEmpty()): ?>
      <section class="used-method">
        <div class="method-steps">
          <?php foreach ($page->used_method()->toStructure() as $index => $step): ?>
            <div class="method-step">
              <div class="step-number"><?= $index + 1 ?></div>
              <div class="step-content">
                <h3 class="step-title"><?= $step->titre()->esc() ?></h3>
                <div class="step-description">
                  <?= $step->description()->kirbytext() ?>
                </div>
              </div>
            </div>
          <?php endforeach ?>
        </div>
      </section>
    <?php endif ?>


    <section class="padding-section" />


    <!-- Accompagnement Text Section -->
    <section class="accompagnement-text-section">
      <?php if ($page->accompagnement_text()->isNotEmpty()): ?>
        <div class="accompagnement-text-content">
          <?= $page->accompagnement_text()->kirbytext() ?>
        </div>
      <?php endif ?>


      <section class="padding-section" />

      <?php if ($page->accompagnement_text_images()->isNotEmpty()): ?>
        <div class="accompagnement-grid">
          <?php foreach ($page->accompagnement_text_images()->toStructure() as $item): ?>
            <div class="accompagnement-item">
              <?php if ($item->image()->isNotEmpty()): ?>
                <div class="accompagnement-icon">
                  <?= $item->image()->toFile()->html(['alt' => '']) ?>
                </div>
              <?php endif ?>
              <div class="accompagnement-text">
                <?= $item->texte()->kirbytext() ?>
              </div>
            </div>
          <?php endforeach ?>
        </div>
      <?php endif ?>
    </section>

    <section class="padding-section" />

    <div class="button-spots">
      <img class="button-spot-left" src="/assets/images/spots/button-spot-left.png" alt="Spot gauche">
      <img class="button-spot-right" src="/assets/images/spots/button-spot-right.png" alt="Spot droite">
    </div>

    <div class="cta-accompagnement">
      <a class="btn-launch" href="#contact">Lancez-vous !</a>
    </div>
    <section class="padding-section" />


    <!-- Used Method Section -->


  </section>


  <?php
  /*
    We always use an if-statement to check if a page exists to
    prevent errors in case the page was deleted or renamed before
    we call a method like `children()` in this case
  */
  ?>
</div>
<?php snippet('footer') ?>