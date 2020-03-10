@extends('layouts.master')

@section('content')
@include('partials.errors')
    <div class="row">
        <div class="col-sm-6">
            <form action="{{ route('question.create') }}" method="post">
                <div class=form-group">
                    <label for="question">Ask A Question!</label>
                    <textarea class="form-control" id="question" name="question"></textarea>
                </div>
                {{ csrf_field() }}
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Post Question</button>
                </div>
            </form>
        </div>
    </div>
    @foreach($questions as $question)
    <a href="{{ route('question.question', ['id' => $question->id]) }}">
        <div class="row">
            <div class="col-sm-6">
                <p>{{ $question->question }}</p>
            </div>
        </div>
    </a>
    @endforeach
@endsection
