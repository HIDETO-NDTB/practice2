@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-header">Practises</div>

    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success')}}
            </div>
        @endif
        @if(count($practices) > 0)
            <ul class="list-group">
                @foreach($practices as $practice)
                    <li class="list-group-item">
                        {{ $practice->name }}
                        @if(Auth::check())
                            <form action="{{ route('practices.delete',['id'=>$practice->id])}}" method="POST">
                                @csrf
                                @method('DELETE')
                                    <button type="submit" class="btn btn-danger float-right">Delete</button>
                            </form>
                            <a href="{{ route('practices.edit',['id'=>$practice->id])}}" class="btn btn-secondary float-right mr-2">Edit</a>
                        @endif
                        <a href="{{ route('practices.show',['id'=>$practice->id])}}" class="btn btn-primary float-right mr-2">Details</a>
                        @if($practice->done)
                            <a href="{{ route('practices.not-done',['id'=>$practice->id] )}}" class="btn btn-warning float-right mr-2"><i class="fas fa-check"></i></a>
                        @else
                            <a href="{{ route('practices.done',['id'=>$practice->id] )}}" class="btn btn-danger float-right mr-2"><i class="fas fa-times"></i></a>
                        @endif
                @endforeach
            </ul>
        @endif
    </div>
</div>

@endsection
