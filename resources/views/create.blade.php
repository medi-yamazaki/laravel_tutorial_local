@extends('layouts.common')
@section('title','Todo　Create')
@section('content')

<div class="title m-b-md">
    Create
</div>

<form action="{{ route('create') }}" method="POST" id="myForm" class="todoForm">
    {{ csrf_field() }}

    <dl class="formDl">
        <dt>タイトル</dt>
        <dd>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}"/>
            @error('title')
            <small class="form-text textError">{{$message}}</small>
            @enderror
        </dd>

        <dt>内容</dt>
        <dd>
            <textarea class="form-control" name="description" id="description" rows="3"></textarea>
            <small class="form-text textError"></small>
        </dd>
    </dl>
    <ul class="btnList">
        <li><a href="{{ route('index') }}" class="btn btn-light">Back</a></li>
        <li><input type="submit" class="btn btn-primary" id="submit" value="Submit"/></li>
    </ul>
</form>
@endsection
