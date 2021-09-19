@extends('layouts.app')
@section('content')
    <h1 class="text-center">To Do</h1>
    @error('task')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div id="listTodos">
        <div class="card">
            <form method="post" action="/todo" class="add-todo">
                @csrf
                <input class="add-todo-task" type="text" name="task" id="addTodoTask" placeholder="Thêm công việc">
                <i class="bi bi-plus-lg add-icon"></i>
                <button type="submit" class="btn-todo-task">Thêm</button>
            </form>
        </div>
        <!-- list todo -->
        <?php /** @var array $todos */
        $countTaskCompleted = 0;
        foreach ($todos as $todo){
        if($todo['isCompleted'] == '0') { ?>
        <div class="card todo-item">
            <i class="bi bi-circle tick"></i>
            <i class="bi bi-check-circle tick hidden" onclick="check({{ $todo['id'] }},'1');"></i>
            <span class="task">{{ $todo->task }}</span>

            <div data-bs-toggle="modal" data-bs-target="#editTaskModal" role="button" aria-expanded="false"
                 aria-controls="collapseExample" onclick="editTask({{ $todo['id'] }}, '{{ $todo['task'] }}');">
                <i class="bi bi-pen btn-edit-task"></i>
            </div>
            <form action="/todo/{{ $todo->id }}" method="post">
                @csrf
                @method('delete')
                <button type="submit" class="btn-delete-task"><i class="bi bi-x-lg "></i></button>
            </form>

        </div>
        <?php }else {
            $countTaskCompleted++;
        }
        }?>
    </div>

    <!-- Modal edit task -->
    <div class="modal fade" id="editTaskModal" tabindex="-1" aria-labelledby="update-task-Label" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Sửa công việc</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/todo/" method="POST" id="formEditTask">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="completed" id="isCompleted" value="0">
                        <fieldset>
                            <div class="mb-3">
                                <label for="editTaskInput" class="form-label required">Công việc</label>
                                <input type="text" id="editTaskInput" name="task" class="form-control"
                                       value="lorem ipus">
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary" style="color: white">Lưu</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- completed -->
    <div class="completed accordion" id="completed">
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#listCompleted" aria-expanded="true" aria-controls="listCompleted">
                    Đã hoàn thành {{ $countTaskCompleted }}
                </button>
            </h2>
            <div id="listCompleted" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                 data-bs-parent="#completed">
            @foreach ($todos as $todo)

                @if($todo['isCompleted'] == '1')
                    <!-- list todo -->
                        <div class="card todo-item checked">
                            <i class="bi bi-check-circle-fill tick"></i>
                            <i class="bi bi-check-circle tick hidden" onclick="check({{ $todo['id'] }},'0');"></i>
                            <span class="title">{{ $todo->task }}</span>
                            <form action="/todo/{{ $todo->id }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn-delete-task"><i class="bi bi-x-lg "></i></button>
                            </form>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection
