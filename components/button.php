<?php
$btnLabel = $btnLabel ?? 'Bouton';
$btnHref = $btnHref ?? '#';
?>
<a href="<?= htmlspecialchars($btnHref) ?>"
   class="btn-primary inline-flex items-center justify-center gap-3 h-[50px] px-6 rounded-xl text-white font-medium transition-colors duration-200">
    <?= htmlspecialchars($btnLabel) ?>
    <img src="assets/image/flecheIcon.png" alt="" class="w-4 h-4">
</a>
