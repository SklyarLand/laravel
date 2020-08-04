@extends('layouts.app')

@section('styles')
    <link href="{{ asset('css/tasks.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container">
        <h1>Список задач</h1>
        <div id="table" class='container'>
            <div class="row bg-dark text-light table-header">
                <?php
                use Illuminate\Http\Request;

                function getArrowhead(string $column)
                {
                    $arrowhead = '';
                    if (request('column') === $column) {
                        $arrowhead = '˅';
                        if (request('direct') === 'asc') {
                            $arrowhead = '˄';
                        }
                    }
                    return $arrowhead;
                }

                function getPageParam(string $column)
                {
                    $direct = (request('column') === $column && request('direct') === 'desc') ? 'asc' : 'desc';
                    return ['column' => $column, 'direct' => $direct, 'page' => request('page')];
                }
                ?>
                <div class="col-md-1"><a href="{{ route('tasks.index', getPageParam('id')) }}"># {{ getArrowhead('id') }}</a></div>
                <div class="col-md-2"><a href="{{ route('tasks.index', getPageParam('name')) }}">Пользователь {{ getArrowhead('name') }}</a></div>
                <div class="col-md-2"><a href="{{ route('tasks.index', getPageParam('email')) }}">E-mail {{ getArrowhead('email') }}</a></div>
                <div class="col-md-4"><a href="{{ route('tasks.index', getPageParam('body')) }}">Описание {{ getArrowhead('body') }}</a></div>
                <div class="col-md-1">Статус</div>
                <div class="col-md-2">Редактировано</div>
            </div>
            @foreach ($tasks as $task)
                <a href="/tasks/{{$task->id}}">
                    <div class="row task-row">
                        <div class="col-md-1 border">{{ $task->id }}</div>
                        <div class="col-md-2 border">{{ $task->name }}</div>
                        <div class="col-md-2 border">{{ $task->email }}</div>
                        <div class="col-md-4 border">{{ $task ->body }}</div>
                        <div class="col-md-1 border" style='text-align: center;' ><input type='checkbox' disabled></div>
                        <div class="col-md-2 border" style='text-align: center;'><input type='checkbox' disabled></div>
                    </div>
                </a>
            @endforeach
        </div>
        <div class="container mt-20">
            <div class="row d-flex justify-content-between">
                <a href="/tasks/create">
                    <button type="button" class="btn btn-primary">Создать задачу</button>
                </a>
                {{ $tasks->links() }}
                {{--<div class="container col-lg-6 row" style="">
                    <?php
                    /*$pageNumber = $data["page"];
                    $previosPage = $pageNumber - 1;
                    $nextPage = $pageNumber + 1;
                    foreach ($data as $key => $value) {
                        if (isset($value['row_number']) && $value['row_number'] == $data['count']) {
                            $nextPage = 0;
                        }
                    }
                    $get = isset($data['sort']) ? '?sort='.$data['sort'].'&direct='.$data['direct'] : '';
                    //var_dump();
                    $block = "<h3> $pageNumber </h3>";
                    if ($previosPage >= 0) {
                        $block = "<a href='/$previosPage$get'><h3><</h3></a>" . $block;
                    }
                    if ($nextPage) {
                        $block .= "<a href='/$nextPage$get'><h3>></h3></a>";
                    }
                    echo  $block;*/
                    ?>
                </div>--}}
            </div>
        </div>
    </div>
@endsection
