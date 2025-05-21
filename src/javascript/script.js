document.addEventListener("DOMContentLoaded", function () {
  document.querySelectorAll(".edit-button").forEach(function (button) {
    button.addEventListener("click", function () {
      const task = this.closest(".task");
      task.querySelector(".progress").classList.add("hidden");
      task.querySelector(".task-description").classList.add("hidden");
      task.querySelector(".task-actions").classList.add("hidden");
      task.querySelector(".edit-task").classList.remove("hidden");
    });
  });

  document.querySelectorAll(".progress").forEach(function (checkbox) {
    checkbox.addEventListener("click", function () {
      if (this.checked) {
        this.classList.add("done");
      } else {
        this.classList.remove("done");
      }
    });
  });
});
