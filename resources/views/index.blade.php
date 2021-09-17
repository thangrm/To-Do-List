@extends('layouts.app')
@section('content')
    <h1 class="text-center">Todos</h1>
    @if (count($todos) > 0)
        <div id="listTodos">
        @foreach ($todos as $todo)

            <!-- list todo -->
                <div class="card todo-item">
                    <i class="bi bi-circle tick"></i>
                    <i class="bi bi-check-circle tick hidden"></i>
                    <span class="title">{{ $todo->title }}</span>
                </div>
            @endforeach
        </div>

        <!-- completed -->
        <div class="completed accordion" id="completed">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#listCompleted" aria-expanded="false" aria-controls="listCompleted">
                        Đã hoàn thành {{ count($todos) }}
                    </button>
                </h2>
                <div id="listCompleted" class="accordion-collapse collapse" aria-labelledby="headingOne"
                     data-bs-parent="#completed">
                @foreach ($todos as $todo)
                    <!-- list todo -->
                        <div class="card todo-item checked">
                            <i class="bi bi-check-circle-fill tick"></i>
                            <span class="title">{{ $todo->title }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
@endsection
