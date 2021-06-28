<?php
const ERROR_REQUIRED = 'Veuillez sesir un text';
const ERROR_TOO_SHORT = 'Veuillez entrer au moins 5 caractères';
$filname = __DIR__ . "/data/todos.json";
$error = '';
$todo = '';
$todos = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $todo = $_POST['todo'] ?? '';

    if (!$todo) {
        $error = ERROR_REQUIRED;
    } else if (mb_strlen($todo) < 5) {
        $error = ERROR_TOO_SHORT;
    }
    // condition sur pour remplir le form

    if (file_exists($filname)) {
        $data = file_get_contents($filname);
        $todos = json_decode($data, true) ?? [];
    }

    //condition sur la vérification et sauvegarde de la nouvelle todo

    if (!$error) {
        $todos = [...$todos, [
            'name' => $todo,
            'done' => false,
            'id' => time()
        ]];
        file_put_contents($filname, json_encode($todos));
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
                        <input value="<?= $todo ?>" name="todo" type="text">
                        <button class="btn btn-primary">Ajouter</button>
                    </form>

                </div>
                <?php if ($error) : ?>
                <p class="text-danger"><?= $error ?></p>
                <?php endif; ?>

                <ul class="todo-list"><br>
                    <?php foreach ($todos as $st) : ?>
                    <li class="todo-item">
                        <span class="todo-name"><?= $st['name'] ?> </span>
                        <button class="btn btn-primary btn-small">Valider</button>
                        <button class="btn btn-denger btn-small">Supprimer</button>
                    </li>
                    <?php endforeach; ?>

                </ul>
            </div>
        </div>
        <?php require_once 'inc/footer.php' ?>

    </div>
</body>

</html>