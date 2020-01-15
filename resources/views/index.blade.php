@extends('layouts.common')
@section('title', 'Todo　Index')

@section('content')
<div class="title m-b-md">
    Todo
</div>
<form method="POST" action="{{ route('index') }}" id="myForm" class="searchForm">
    {{ csrf_field() }}

    <ul class="{{ isset($keyword) ? 'searchDesc' : '' }}">
        <li><input type="text" class="form-control" id="description" name="description" value="{{ $keyword }}"/></li>
        <li><input type="submit" class="btn btn-primary" id="submit" value="Sreach"/></li>
        @if(isset($keyword))
        <li><a href="{{ route('index') }}" class="btn btn-light">Back</a></li>
        @endif
    </ul>
</form>
<form class="todoForm">
    @if (count($todos) != 0)

        @if($todos->total() > $todos->perPage())
        <div class="paginationContainer">
            {{$todos->links()}}
        </div>
        @endif


        <ul class="todoList">
            @foreach ($todos as $todo)
            <li class="{{$todo->status_class}}">
                <dl>
                    <dt>
                        <a href="/detail/{{$todo->id}}">
                            <span>{{$todo->title}}</span>
                        </a>

                    </dt>
                    <dd>
                        <div class="status">{{$todo->status_label}}</div>
                        <div class="editLink">
                            @if(Auth::user()->id == $todo->user_id)
                            <a href="/edit/{{$todo->id}}">
                                <span>Edit</span>
                            </a>
                            @endif
                        </div>
                    </dd>
                </dl>
                <div class="detailList">
                    <span class="name">作成者：{{ $todo->user->name }}</span>
                    <span class="upDate">最終更新日時：{{ $todo->updated_at->format("Y年m月d日 H:i") }}</span>
                </div>
            </li>
            @endforeach
        </ul>
    @else
        <p class="emptyTxt">表示するTodoリストはありません</p>
    @endif

    <ul class="btnList">
        <li><a href="/create" class="btn btn-primary">Create</a></li>
    </ul>
</form>

@endsection
