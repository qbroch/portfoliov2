<?php $publicPath = $publicPath ?? "../"; ?>
<nav aria-label="Navigation administration">
    <div class="bg-surface rounded-xl shadow-2xl px-4 py-2">
        <div class="flex flex-wrap items-center justify-between gap-4 min-h-16">
            <a href="<?= $publicPath ?>admin/index.php" class="flex items-center gap-4">
                <img src="<?= $publicPath ?>assets/image/logo.png" alt="Accueil administration" class="w-36 h-auto shrink-0">
                <span class="text-primary font-bold">Administration</span>
            </a>
            <ul class="flex flex-wrap items-center gap-6">
                <li><a href="<?= $publicPath ?>admin/index.php" class="text-text-primary hover:text-primary transition-colors">Tableau de bord</a></li>
                <li><a href="<?= $publicPath ?>index.php" class="text-text-secondary hover:text-primary transition-colors">Voir le portfolio</a></li>
            </ul>
        </div>
    </div>
</nav>
