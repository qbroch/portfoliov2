<?php
$btnLabel = $btnLabel ?? 'Bouton';
$btnHref = $btnHref ?? '#';
?>
<a href="<?= htmlspecialchars($btnHref) ?>"
   class="inline-flex items-center justify-center gap-3 h-[50px] px-6 rounded-xl bg-transparent border border-[#3F3F46] text-text-primary font-medium hover:bg-surface hover:border-[#52525B] transition-colors">
    <?= htmlspecialchars($btnLabel) ?>
    <img src="assets/image/flecheIcon.png" alt="" class="w-4 h-4">
</a>
