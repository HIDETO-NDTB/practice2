@extends('layouts.app')
@section('content')

<div class="card">
        <div class="card-header">{{ $practice->name }}</div>

        <div class="card-body">
            <div>{{ $practice->content }}</div>
            <a href="{{ route('practices.index')}}" class="btn btn-secondary float-right">Go Back</a>
        </div>
</div>


@endsection
