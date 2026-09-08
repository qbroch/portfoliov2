<?php
require_once __DIR__ . '/../src/Database.php';
require_once __DIR__ . '/../src/Auth.php';

$auth = new Auth();
$error = '';
$user = '';
if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST') {
    $user = is_string($_POST['user'] ?? null) ? trim($_POST['user']) : '';
    $password = is_string($_POST['password'] ?? null) ? $_POST['password'] : '';
    if ($user === '' || $password === '') {
        $error = 'Renseigne ton nom et ton mot de passe.';
    } else {
        try {
            $pdo = (new Database())->getConnection();
            if ($auth->createUser($pdo, $user, $password)) {
                header('Location: login.php', true, 303);
                exit;
            }
            $error = 'Nom déjà utilisé ou saisie invalide (nom : 50 caractères maximum ; mot de passe : 8 à 72 octets).';
        } catch (PDOException $e) {
            error_log('create: ' . get_class($e) . ' (code ' . $e->getCode() . ')');
            $error = 'Erreur de base de données. Consulte les journaux PHP.';
        } catch (Throwable $e) {
            error_log('create: ' . get_class($e) . ' dans ' . $e->getFile() . ':' . $e->getLine());
            $error = 'Erreur interne pendant le traitement du formulaire. Consulte les journaux PHP.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<?php 
    $title = "Partie admin";
    $publicPath = "./";
    require __DIR__ . "/../components/admin/head.php";
?>
<body>
    <header>
        <?php require __DIR__ . "/../components/admin/navbar.php"; ?>
    </header>
    <main>
        <div class="flex justify-center p-12">
            <form action="create.php" method="POST" class="p-6 border border-surface w-[450px] flex flex-col items-center gap-8 ">
                <h1 class="font-bold text-text-primary text-4xl">Page admin</h1>
                <h2 class="font-bold text-text-primary text-2xl">-- Crée un compte --</h2>
                <div>
                    <label for="user" class="p-4 text-text-primary font-bold">Username : </label>
                    <input id="user" name="user" required maxlength="50" autocomplete="username" value="<?= htmlspecialchars($user, ENT_QUOTES, 'UTF-8') ?>" type="text" placeholder="Ex : abroce" class="bg-surface shadow-md rounded-md p-2"> 
                </div>
                <div>
                    <label for="password" class="p-4 text-text-primary font-bold">Password : </label>
                    <input id="password" name="password" required autocomplete="new-password" type="password" placeholder="Ex : Pass1234" class="bg-surface shadow-md rounded-md p-2"> 
                </div>

                <?php if ($error !== ''): ?>
                    <p role="alert" class="text-red-400"><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></p>
                <?php endif; ?>
                <button type="submit" class="bg-primary w-full rounded-xl p-2 hover:bg-[#3843ac] duration-200 transitions-colors">Créer le compte</button>
            </form>

        </div>
    </main>
</body>
</html>