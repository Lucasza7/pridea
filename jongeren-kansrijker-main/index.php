<?php 
session_start();
include 'config/db.php'; 
include 'public/assets/header/header.php'; 

$errors = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (empty($email) || empty($password)) {
        $errors[] = "Vul alstublieft zowel een e-mailadres als een wachtwoord in.";
    } else {
        $myDb = new DB('jongereninstituut');

        try {
            // Haal medewerker op uit database op basis van email
            $medewerker = $myDb->read('*', 'medewerkers', 'email = ?', [$email]);

            if (!empty($medewerker)) {
                // Controleer wachtwoord
                if (password_verify($password, $medewerker['password'])) {
                    // Sla medewerkersinformatie op in de sessie
                    $_SESSION['medewerker_id'] = $medewerker['medewerker_id'];
                    $_SESSION['email'] = $medewerker['email'];
                    $_SESSION['name'] = $medewerker['name'];
                    $_SESSION['surname'] = $medewerker['surname'];

                    // Redirect naar dashboard
                    header('Location: /jongeren-kansrijker/src/views/dashboard/index.php');
                    exit;
                } else {
                    $errors[] = "Onjuiste inloggegevens.";
                }
            } else {
                $errors[] = "Onjuiste inloggegevens.";
            }
        } catch (Exception $e) {
            $errors[] = "Er is een fout opgetreden. Probeer het later opnieuw.";
        }
    }
}
?>

<main class="container mt-5">
    <section class="login-form">
        <h2 class="text-center">Inloggen</h2>
        <?php if (!empty($errors)): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li><?= htmlspecialchars($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
        <form action="src/views/dashboard/index.php" method="POST" class="mt-4">
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Wachtwoord</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Inloggen</button>
            </div>
        </form>
    </section>
</main>

<?php 
include 'public/assets/header/footer.php'; 
?>
