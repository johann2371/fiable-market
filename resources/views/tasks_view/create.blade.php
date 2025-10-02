@extends('tasks_view.app')
@section('content')
<h2>@if(empty($task)) creation @else modification @endif de tache</h2>
<form action="{{ empty($task) ? route('store'): route('update',$task->id)  }}" method="post">

    @csrf
    @if(!empty($task))
    @method('PUT')

    @endif
    <div class="mb-3">
        <label for="title" class="form-label">Titre</label>
        <input type="text" @if(!empty($task)) value="{{ old('title',$task->title) }}"@endif    name="title" class="form-control" id="title">
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" name="description" id="description">{{ !empty($task) ?  old('description',$task->description) :"" }} </textarea>
    </div>


    <div class="mb-3">
        <label for="form-check-label" class="form-label">Terminer</label>
        <input type="checkbox" {{ !empty($task) && $task->status ? 'checked': "" }}   name="status" class="form-check-input" id="form-check-label">
    </div>

    <button type="submit" class="btn btn-info"> @if(empty($task)) ajouter @else modfier

    @endif</button>
</form>
@endsection

