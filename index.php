<?php
require_once 'database/conn.php';

$tasks = [];

$sql = $pdo->query("SELECT * FROM task ORDER BY id ASC");

if ($sql->rowCount() > 0) {
  $tasks = $sql->fetchAll(PDO::FETCH_ASSOC);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="src/styles/style.css">
  <title>TO DO LIST IN PHP</title>
</head>

<body>
  <div id="to_do">
    <h1>Things to do</h1>

    <form action="actions/create.php" method="POST" class="to-do-form">
      <input type="text" name="description" placeholder="White your task here" required>
      <button type="submit" class="form-button">
        <i class="fa-solid fa-plus"></i>
      </button>
    </form>

    <div id="task">
      <?php foreach ($tasks as $task) : ?>
        <div class="task">
          <input
            type="checkbox"
            name="progress"
            class="progress <?= $task['completed'] ? 'done' : '' ?>"
            data-task-id="<?= $task['id'] ?>"
            <?= $task['completed'] ? 'checked' : '' ?>>

          <p class="task-description">
            <?= $task['description'] ?>
          </p>

          <div class="task-actions">
            <a class="action-button edit-button">
              <i class="fa-regular fa-pen-to-square"></i>
            </a>

            <a href="actions/delete.php?id=<?= $task['id'] ?>" class="action-button delete-button">
              <i class="fa-regular fa-trash-can"></i>
            </a>
          </div>

          <form action="actions/update.php" method="POST" class="to-do-form edit-task hidden">
            <input type="hidden" name="id" value="<?= $task['id'] ?>">
            <input
              type="text"
              name="description"
              placeholder="Edit your task here"
              value="<?= $task['description'] ?>">
            <button type="submit" class="form-button confirm-button">
              <i class="fa-solid fa-check"></i>
            </button>
          </form>
        </div>
      <?php endforeach; ?>
    </div>
  </div>

  <script src="src/javascript/script.js"></script>
</body>

</html>