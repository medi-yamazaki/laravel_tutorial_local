@extends('layouts.common')

@section('title', 'Todo　Detail')
@section('content')
<div class="title m-b-md">
    Detail
</div>

<div class="todoContent">
    <dl class="detailDl">
        <dt>タイトル</dt>
        <dd>
            {{ $todo->title }}
        </dd>

        <dt>内容</dt>
        <dd>
           {!! nl2br(e($todo->description)) !!}
            <div class="detailList">
                <span class="name">作成者：{{ $todo->user->name }}</span>
            </div>
        </dd>
    </dl>

    <div class="statusDetail">
        <dl>
            <dt>ステータス</dt>
            <dd>
                <div class="selectStatus {{$todo->status_class}}">
                    {{ $todo->status_label }}
                </div>

                <ul class="dateStatus">
                    <li>作成日：{{ $todo->created_at->format("Y年m月d日 H:i") }}</li>
                    <li>更新日：{{ $todo->updated_at->format("Y年m月d日 H:i") }}</li>
                </ul>
            </dd>
        </dl>
    </div>

    <ul class="btnList">
        <li><a href="{{ route('index') }}" class="btn btn-light">Back</a></li>
        <li><a href="/edit/{{$todo->id}}" class="btn btn-primary">Edit</a></li>
    </ul>
</div>
@endsection
