<?php
/*
  Snippets are a great way to store code snippets for reuse
  or to keep your templates clean.

  This footer snippet is reused in all templates.

  More about snippets:
  https://getkirby.com/docs/guide/templates/snippets
*/
?>
</main>

<footer class="footer purple-section">
  <div class="body-padding">
    <div class="grid">
      <div class="column" style="--columns: 3">
        <h2 class="h3 text-white">Le Blog</h2>
        <ul>
          <li><a class="text-white" href="#">Ressources</a></li>
          <li><a class="text-white" href="#">Témoignages</a></li>
          <li><a class="text-white" href="#">Podcasts</a></li>
          <li><a class="text-white" href="#">Articles</a></li>
        </ul>
      </div>

      <div class="column" style="--columns: 3">
        <h2 class="h3 text-white">Le Collectif</h2>
        <ul>
          <li><a class="text-white" href="#">Nous rencontrer</a></li>
          <li><a class="text-white" href="#">Notre réseau</a></li>
          <li><a class="text-white" href="#">FrenchTech</a></li>
          <li><a class="text-white" href="#">UNITEC</a></li>
          <li><a class="text-white" href="#">Auberge numérique</a></li>
        </ul>
      </div>

      <div class="column" style="--columns: 3">
        <h2 class="h3 text-white">Nos réalisations</h2>
        <ul>
          <?php foreach ($site->children()->listed() as $page): ?>
            <li><a class="text-white" href="<?= $page->url() ?>"><?= $page->title()->esc() ?></a></li>
          <?php endforeach ?>
        </ul>
      </div>

      <div class="column" style="--columns: 3">
        <h2 class="h3 text-white">Mentions légales</h2>
        <ul>
          <li><a class="text-white" href="#">CGV</a></li>
          <li><a class="text-white" href="#">À propos</a></li>
        </ul>
      </div>
    </div>


  </div>

  <div class="end-footer-container">
    <img class="end-footer-logo" src="/assets/images/other/logo-alone.png" alt="QualityTeam" />
    <p class="text-white text-small">© 2025 QualityTeam. Tous droits réservés.</p>
    <p class="text-white text-small">Toutes les photographies présentes sur ce site sont la propriété exclusive de QualityTeam.</p>
  </div>
</footer>

<?= js([
  'assets/js/prism.js',
  'assets/js/lightbox.js',
  'assets/js/index.js',
  '@auto'
]) ?>

</body>

</html>