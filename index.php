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
                    <form class="todo-form" action="/" method="post">
                        <input type="text">
                        <button class="btn btn-primary">Ajouter</button>
                    </form>
                </div>
                <div class="todo-list"></div>
            </div>
        </div>
        <?php require_once 'inc/footer.php' ?>

    </div>
</body>

</html>