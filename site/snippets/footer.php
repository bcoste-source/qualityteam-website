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

<footer class="footer black-section">
  <div class="body-padding">
    <div class="grid">
      <div class="column" style="--columns: 3">
        <h2 class="h3 text-white">Le Blog</h2>
        <ul>
          <?php foreach ($site->footer_list1_links()->toStructure() as $item): ?>
            <li><a class="text-white" href="<?= $item->url()->esc() ?>"><?= $item->label()->esc() ?></a></li>
          <?php endforeach ?>
        </ul>
      </div>

      <div class="column" style="--columns: 3">
        <h2 class="h3 text-white">Le Collectif</h2>
        <ul>
          <?php foreach ($site->footer_list2_links()->toStructure() as $item): ?>
            <li><a class="text-white" href="<?= $item->url()->esc() ?>"><?= $item->label()->esc() ?></a></li>
          <?php endforeach ?>
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
          <?php foreach ($site->footer_list4_links()->toStructure() as $item): ?>
            <li><a class="text-white" href="<?= $item->url()->esc() ?>"><?= $item->label()->esc() ?></a></li>
          <?php endforeach ?>
        </ul>
      </div>
    </div>

    <div class="footer-socials">
      <?php foreach ($site->footer_socials()->toStructure() as $social): ?>
        <?php
        $icon = $social->icon()->value();
        $url = $social->url()->or('https://www.google.com/');
        $map = [
          'youtube' => '/assets/icons/youtube.svg',
          'instagram' => '/assets/icons/instagram.svg',
          'linkedin' => '/assets/icons/linkedin.svg',
          'discord' => '/assets/icons/discord.svg',
          'mastodon' => '/assets/icons/mastodon.svg',
        ];
        $src = $map[$icon] ?? null;
        ?>
        <?php if ($src): ?>
          <a class="footer-social-link" href="<?= esc($url) ?>" target="_blank" rel="noopener">
            <img src="<?= $src ?>" alt="<?= esc(ucfirst($icon)) ?>" class="social-icon" />
          </a>
        <?php endif ?>
      <?php endforeach ?>
    </div>

  </div>

  <div class="end-footer-container">
    <img class="end-footer-logo" src="/assets/images/other/logo-alone.avif" alt="QualityTeam" />
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