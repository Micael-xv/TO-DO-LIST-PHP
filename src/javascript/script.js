document.addEventListener("DOMContentLoaded", function () {
  // edita a tarefa
  document.querySelectorAll(".edit-button").forEach(function (button) {
    button.addEventListener("click", function () {
      var task = button.closest(".task");
      task.querySelector(".progress").classList.add("hidden");
      task.querySelector(".task-description").classList.add("hidden");
      task.querySelector(".task-actions").classList.add("hidden");
      task.querySelector(".edit-task").classList.remove("hidden");
    });
  });

  document.querySelectorAll(".progress").forEach(function (checkbox) {
    checkbox.addEventListener("click", function () {
      if (checkbox.checked) {
        checkbox.classList.add("done");
      } else {
        checkbox.classList.remove("done");
      }
    });

    checkbox.addEventListener("change", function () {
      const id = checkbox.dataset.taskId;
      const completed = checkbox.checked ? "true" : "false";

      fetch("../../actions/update-progress.php", {
        method: "POST",
        headers: {
          "Content-Type": "application/x-www-form-urlencoded",
        },
        body: `id=${encodeURIComponent(id)}&completed=${encodeURIComponent(
          completed
        )}`,
      })
        .then((response) => response.json())
        .then((data) => {
          if (!data.success) {
            alert("Erro ao editar a tarefa");
          }
        })
        .catch(() => {
          alert("Ocorreu um erro");
        });
    });
  });
});
