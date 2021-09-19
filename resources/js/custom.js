editTask = function (id, task) {
    let formEdit = document.getElementById('formEditTask');
    let taskContent = document.getElementById('editTaskInput');

    formEdit.setAttribute('action', '/todo/' + id);
    taskContent.value = task;
}

check = function (id, completed) {
    let formEdit = document.getElementById('formEditTask');
    let taskContent = document.getElementById('editTaskInput');
    let isCompleted = document.getElementById('isCompleted');

    formEdit.setAttribute('action', '/todo/' + id);
    isCompleted.value = completed;
    taskContent.value = null;
    formEdit.submit();
}
