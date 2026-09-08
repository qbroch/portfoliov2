<?php
    require_once __DIR__ . "/../../src/Auth.php";
    require_once __DIR__ . "/../../src/Database.php";
    require_once __DIR__ . "/../../src/Projects.php";

    $auth = new Auth();

    header("Cache-Control: no-store");

    if (!$auth->isLoggedIn()){
        header("Location: ../login.php", true, 302);
        exit;
    }

    $error = "";

    if($_SERVER["REQUEST_METHOD"] === "POST"){
        $nom = is_string($_POST['nom'] ?? null) ? trim($_POST['nom']) : '';
        $desc = is_string($_POST["desc"] ?? null) ? trim($_POST["desc"]) : '';
        if($nom === '' || $desc === '' ){
            $error = "Le nom et la description sont obligatoires";
        }
        else {
            try{
                $db = (new Database()) -> getConnection();
                (new Projects($db))->create($nom, $desc);
                header("Location: index.php?created=1", true, 303);
                exit;
            }
            catch(PDOException $e){
                http_response_code(500);
                error_log("create project: SQLSTATE " . $e->getCode() . " ; code MySQL " . ($e->errorInfo[1] ?? "inconnu") . " ; " . $e->getFile() . ":" . $e->getLine());
                $error = "Erreur de base de données. Consulte les journaux PHP";
            }
            catch(Throwable $e){
                error_log("create: " . get_class($e) . " dans " . $e->getFile() . " Ligne : " . $e->getLine());
                $error = "Erreur interne pendant le traitement du formulaire. Consulte les journaux PHP";
            }
        }


    }
?>



<!DOCTYPE html>
<html lang="fr">
<?php
    $title = "Accueil Admin";
    $publicPath = "../";
    require __DIR__ . "/../../components/admin/head.php";
?>
<body>
    <header>
        <?php
            require __DIR__ . "/../../components/admin/navbar.php";
        ?>
    </header>
    <main class="p-6 ">
        <div class="flex gap-6">
            <form action="index.php" method="POST" class="flex flex-col justify-center ml-[25%]">
                <h1 class="text-text-primary text-5xl" >Projet</h1>
                <?php if (($_GET['created'] ?? '') === '1'): ?>
                    <p role="status" class="text-green-400">Projet créé.</p>
                <?php endif; ?>
                <div class="py-6 flex gap-6 items-center">
                    <label for="nom">Nom : </label>
                    <input id="nom" name="nom" required maxlength="50" autocomplete="nom" type="text" placeholder="Ex : Site web HTML ..." class="bg-surface shadow-md rounded-md p-2">
                </div>
                <div class="py-6 flex gap-6 items-center">
                    <label for="desc">Description : </label>
                    <input id="desc" name="desc" required autocomplete="desc" type="text" placeholder="Ex : Un Site web en HTML ..." class="bg-surface h-[400px] shadow-md rounded-md p-2">
                </div>
                <?php if ($error !== ''): ?>
                    <p role="alert" class="text-red-400"><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></p>
                <?php endif; ?>
                <button type="submit">Envoyer</button>
            </form>
            <form action="index.php" method="POST" class="ml-[30%]">
                <h1 class="text-text-primary text-5xl" >Technologie</h1>
            </form>
        </div>
    </main>

</body>
</html>