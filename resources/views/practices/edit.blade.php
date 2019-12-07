@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-header">Edit Practice</div>

    <div class="card-body">
        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="list-group">
                    @foreach($errors->all() as $error)
                        <li class="list-group-item">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('practices.update',['id'=>$practice->id])}}" method="post">
            @csrf
            <div class="form-group">
                <input type="text" name="name" class="form-control" value="{{ $practice->name }}" placeholder="Please enter your name here..">
            </div>
            <div class="form-group">
                <textarea name="content" id="" cols="30" rows="10" class=form-control placeholder="Please enter your content here..">{{ $practice->content }}</textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-block btn-success">Update Practice</button>
            </div>
        </form>
    </div>
</div>


@endsection
