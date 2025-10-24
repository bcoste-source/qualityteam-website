<?php

/**
 * Contact Template
 * 
 * Handles contact form submission and email sending
 */

$success = false;
$error = false;
$errors = [];
$errorMessage = '';

// Handle form submission
if (kirby()->request()->method() === 'POST') {

  // Get form data from POST
  $name = $_POST['name'] ?? '';
  $email = $_POST['email'] ?? '';
  $phone = $_POST['phone'] ?? '';
  $message = $_POST['message'] ?? '';
  $csrfToken = $_POST['csrf'] ?? '';

  // Validate CSRF token
  if (!csrf($csrfToken)) {
    $error = true;
    $errorMessage = 'Token de sécurité invalide. Veuillez réessayer.';
  }

  // Validate form data
  if (empty($name) || strlen($name) < 2) {
    $errors['name'] = 'Veuillez entrer votre nom';
  }

  if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = 'Veuillez entrer une adresse email valide';
  }

  if (empty($message) || strlen($message) < 10) {
    $errors['message'] = 'Veuillez entrer un message (minimum 10 caractères)';
  }

  // If no errors, send email
  if (empty($errors) && !$error) {
    try {
      $emailRecipient = $page->email_recipient()->isNotEmpty()
        ? $page->email_recipient()->value()
        : 'b.coste@qualityteam.fr';

      kirby()->email([
        'from' => 'b.coste@qualityteam.fr',
        'replyTo' => $email,
        'to' => $emailRecipient,
        'subject' => 'Nouveau message de contact - QualityTeam',
        'body' => "Nouveau message de contact\n\n" .
          "Nom: " . $name . "\n" .
          "Email: " . $email . "\n" .
          "Téléphone: " . ($phone ?: 'Non renseigné') . "\n\n" .
          "Message:\n" . $message
      ]);

      $success = true;
    } catch (Exception $e) {
      $error = true;
      $errorMessage = 'Erreur lors de l\'envoi : ' . $e->getMessage();
    }
  } elseif (!empty($errors)) {
    $error = true;
  }
}

snippet('header');
?>

<?php if (option('debug') && kirby()->request()->method() === 'POST'): ?>
  <div style="background: #fff; color: #000; padding: 1rem; margin: 1rem; border: 2px solid red;">
    <strong>Debug Info:</strong><br>
    Method: <?= kirby()->request()->method() ?><br>
    CSRF Token: <?= $_POST['csrf'] ?? 'not set' ?><br>
    CSRF valid: <?= csrf($_POST['csrf'] ?? '') ? 'yes' : 'no' ?><br>
    Success: <?= $success ? 'yes' : 'no' ?><br>
    Error: <?= $error ? 'yes' : 'no' ?><br>
    Error Message: <?= $errorMessage ?: 'none' ?><br>
    Errors: <?= json_encode($errors) ?><br>
    Email recipient: <?= $page->email_recipient()->or('b.coste@qualityteam.fr') ?><br>
    Name: <?= $_POST['name'] ?? 'empty' ?><br>
    Email: <?= $_POST['email'] ?? 'empty' ?><br>
    Message length: <?= strlen($_POST['message'] ?? '') ?><br>
    POST data: <?= json_encode($_POST) ?><br>
  </div>
<?php endif ?>

<section class="purple-section">
  <div class="body-padding body-centered">
    <section class="padding-section" />

    <?php if ($page->title()->isNotEmpty()): ?>
      <h1 class="text-white-green"><?= $page->title()->esc() ?></h1>
    <?php endif ?>

    <?php if ($page->subtitle()->isNotEmpty()): ?>
      <p class="text-green text-small page-subtitle">
        <?= mb_strtoupper($page->subtitle()->esc(), 'UTF-8') ?>
      </p>
    <?php endif ?>
    <section class="padding-section-small" />

    <?php if ($page->intro_text()->isNotEmpty()): ?>
      <div class="contact-intro text-white-pink">
        <?= $page->intro_text()->kirbytext() ?>
      </div>
    <?php endif ?>

    <section class="padding-section" />

    <div class="contact-container">

      <?php if ($success): ?>
        <div class="contact-message contact-success">
          <div class="message-icon">✓</div>
          <p><?= $page->success_message()->or('Merci pour votre message ! Nous vous répondrons dans les plus brefs délais.')->esc() ?></p>
        </div>
      <?php elseif ($error): ?>
        <div class="contact-message contact-error">
          <div class="message-icon">✕</div>
          <div>
            <p><?= !empty($errorMessage) ? esc($errorMessage) : $page->error_message()->or('Une erreur est survenue lors de l\'envoi de votre message. Veuillez réessayer.')->esc() ?></p>
            <?php if (!empty($errors)): ?>
              <ul class="error-list">
                <?php foreach ($errors as $errorMsg): ?>
                  <li><?= esc($errorMsg) ?></li>
                <?php endforeach ?>
              </ul>
            <?php endif ?>
          </div>
        </div>
      <?php endif ?>

      <form class="contact-form" method="post" action="<?= $page->url() ?>">

        <div class="form-grid">
          <div class="form-field">
            <label for="name" class="form-label">Nom *</label>
            <input
              type="text"
              id="name"
              name="name"
              class="form-input"
              value="<?= esc($success ? '' : ($_POST['name'] ?? '')) ?>"
              required>
          </div>

          <div class="form-field">
            <label for="email" class="form-label">Email *</label>
            <input
              type="email"
              id="email"
              name="email"
              class="form-input"
              value="<?= esc($success ? '' : ($_POST['email'] ?? '')) ?>"
              required>
          </div>
        </div>

        <div class="form-field">
          <label for="phone" class="form-label">Téléphone (optionnel)</label>
          <input
            type="tel"
            id="phone"
            name="phone"
            class="form-input"
            value="<?= esc($success ? '' : ($_POST['phone'] ?? '')) ?>">
        </div>

        <div class="form-field">
          <label for="message" class="form-label">Message *</label>
          <textarea
            id="message"
            name="message"
            class="form-textarea"
            rows="6"
            required><?= esc($success ? '' : ($_POST['message'] ?? '')) ?></textarea>
        </div>

        <input type="hidden" name="csrf" value="<?= csrf() ?>">

        <div class="form-submit">
          <button type="submit" name="submit" class="btn-purple">
            Envoyer le message
          </button>
        </div>
      </form>
    </div>

    <section class="padding-section" />
  </div>
  <section class="padding-section" />
</section>

<?php snippet('footer') ?>