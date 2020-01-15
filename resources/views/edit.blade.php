@extends('layouts.common')

@section('title', 'Todo　Edit')
@section('content')
<div class="title m-b-md">
    Edit
</div>

<form action="{{ route('edit', ['id' => $todo->id]) }}" id="myForm" method="POST" class="todoForm">
    {{ csrf_field() }}

    <dl class="formDl">
        <dt>タイトル</dt>
        <dd>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') ?? $todo->title }}"/>
            @error('title')
            <small class="form-text textError">{{$message}}</small>
            @enderror
        </dd>

        <dt>内容</dt>
        <dd>
            <textarea class="form-control" name="description" id="description" rows="3">{{ old('description') ?? $todo->description }}</textarea>
            <small class="form-text textError"></small>
            <div class="detailList">
                <span class="name">作成者：{{ $todo->user->name }}</span>
            </div>
        </dd>
    </dl>

    <div class="statusEdit">
        <dl>
            <dt>ステータス</dt>
            <dd>
                <div class="selectStatus">
                    <select class="form-control" name="status" id="status">
                        @foreach(\App\Todo::STATUS as $key => $val)
                            <option value="{{ $key }}"{{ $key == old('status', $todo->status) ? ' selected' : '' }}>{{ $val['label'] }}</option>
                        @endforeach
                    </select>


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
        <li><input type="submit" class="btn btn-primary" id="submit" value="Submit"/></li>
        <li><input type="submit" name="destroy" class="btn btn-danger" id="delete" value="Delete"/></li>
    </ul>
</form>
@endsection
