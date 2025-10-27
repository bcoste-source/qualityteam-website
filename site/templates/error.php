<?php snippet('header') ?>

<section class="background-white-with-green-vector">
  <div class="body-padding body-centered">
    <section class="padding-section" />
    <section class="padding-section" />

    <div style="text-align: center; max-width: 600px; margin: 0 auto;">
      <!-- Numéro d'erreur 404 -->
      <h1 class="text-green" style="font-size: 8rem; margin: 0; line-height: 1;">
        404
      </h1>

      <section class="padding-section-small" />

      <!-- Titre de l'erreur -->
      <h2 class="text-purple-green" style="margin: 1rem 0;">
        Page introuvable
      </h2>

      <section class="padding-section-small" />

      <!-- Message d'erreur -->
      <div class="text-purple-black" style="font-size: 1.1rem; line-height: 1.6;">
        <p>
          Désolé, la page que vous recherchez n'existe pas ou a été déplacée.
        </p>
      </div>

      <section class="padding-section" />

      <!-- Bouton de retour à l'accueil -->
      <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
        <a href="<?= site()->url() ?>" class="btn-purple">
          <span class="arrow">←</span> Retour à l'accueil
        </a>
        <a href="<?= site()->find('contact')->url() ?>" class="btn-purple">
          Nous contacter <span class="arrow">→</span>
        </a>
      </div>

      <section class="padding-section-small" />

      <!-- Spot décoratif -->
      <img class="spot" src="/assets/images/spots/green-spot-1.avif" alt="" style="opacity: 0.3; margin-top: 2rem;">
    </div>

    <section class="padding-section" />
    <section class="padding-section" />
  </div>
</section>

<?php snippet('footer') ?>