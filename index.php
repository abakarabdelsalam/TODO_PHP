<?php
const ERROR_REQUIRED = 'Veuillez sesir un text';
const ERROR_TOO_SHORT = 'Veuillez entrer au moins 5 caractères';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $todo = $_POST['todo'] ?? '';

    if (!$todo) {
        $error = ERROR_REQUIRED;
    } else if (mb_strlen($todo) < 5) {
        $error = ERROR_TOO_SHORT;
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <?php require_once 'inc/head.php' ?>

    <title>TODO_PHP</title>
</head>

<body>
    <div class="container">
        <?php require_once 'inc/header.php' ?>
        <div class="content">
            <div class="todo-container">
                <h1>Ma Todo</h1><br>
                <div class="todo-form">
                    <form class="todo-form" action="./" method="post">
                        <input name="todo" type="text">
                        <button class="btn btn-primary">Ajouter</button>
                    </form>

                </div>
                <?php if ($error) : ?>
                <p class="text-danger"><?= $error ?></p>
                <?php endif; ?>
                <div class="todo-list"></div>
            </div>
        </div>
        <?php require_once 'inc/footer.php' ?>

    </div>
</body>

</html>