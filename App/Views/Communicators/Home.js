$(document).ready(function () {
  $(".add-btn").click((e) => {
    e.preventDefault();
    let task = $(".addTask").val();
    $.ajax({
      url: "add",
      type: `POST`,
      data: {
        newTask: task,
      },
      success: () => {
        window.location.href = "index";
      },
    });
  });

  $(".edit-btn").click((e) => {
    e.preventDefault();
    let target = e.currentTarget;
    let id = parseInt(target.id);
    if (!isNaN(id)) {
      let task = $(`.input${id}`).val();
      let url =
        `update/` +
        $.param({
          id: id,
        });
      $.ajax({
        url: url,
        type: `PUT`,
        data: {
          Task: task,
        },
        success: () => {
          window.location.href = "index";
        },
      });
    }
  });

  $(".delete-btn").click((e) => {
    e.preventDefault();
    let target = e.currentTarget;
    let id = parseInt(target.id);
    if (!isNaN(id)) {
      let url =
        `delete/` +
        $.param({
          id: id,
        });
      $.ajax({
        url: url,
        type: `DELETE`,
        success: () => {
          window.location.href = "index";
        },
      });
    }
  });
});
