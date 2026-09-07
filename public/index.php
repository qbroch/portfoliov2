<!DOCTYPE html>
<html lang="en">
<?php 
    $title = "Accueil";
    require "../components/head.php";
?>
<body class="bg-background">
    <header>
        <?php
            require "../components/navbar.php";
        ?>
    </header>
    <main class="relative isolate overflow-hidden">
        <div aria-hidden="true" class="pointer-events-none absolute right-[5%] bottom-[-250px] h-[600px] w-[500px] rounded-full bg-primary opacity-25 blur-[180px]"></div>
        <div class="relative z-10 flex flex-col items-start gap-20 ml-[25%] p-20">
            <div class="bg-surface rounded-xl flex items-center">
                <p class="flex items-center text-lg text-text-primary w-[450px] h-[60px] p-6 gap-3">
                    <span class="inline-block w-3 h-3 rounded-full bg-primary shrink-0"></span>
                    Disponible pour de nouvelle opportunité
                </p>
            </div>
            <div>
                <p class="flex items-center text-xl text-text-secondary">
                    Salut moi c'est Quentin
                </p>
            </div>
            <div>
                <p class="font-bold text-5xl">
                    Je développe des
                </p>
                <p class="text-primary font-bold text-5xl">
                    applications web modernes
                </p>
            </div>
            <div class="w-full md:w-[40%]">
                <p class="text-text-secondary">
                    Étudiant en informatique, je conçois des applications web, des API et des outils backend avec une attention particulière portée à leur conception.
                </p>
            </div>
            <div class="flex gap-6">
                <?php
                    $btnLabel = "Voir mes projets";
                    $btnHref = "projects/index.php";
                    require "../components/button.php";

                    $btnLabel = "GitHub";
                    $btnHref = "https://github.com/qbroch";
                    require "../components/button_second.php";
                ?>
            </div>
        </div>
    </main>
</body>
</html>
