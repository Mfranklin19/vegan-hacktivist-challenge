@extends('layouts.master')

@section('content')
@include('partials.errors')
<h1>{{ $question->question }}</h1>
@if(count($question->answers) === 0)
    <p><b>Be the first to answer!</b></p>
@else
    <br />
    <b>Answers:</b>
    @foreach($question->answers as $answer)
        <hr>
        <p>{{ $answer->answer }}</p>
    @endforeach
@endif
<hr>
<form action="{{ route('question.question.answer', ['id' => $question->id]) }}" method="post">
    <div class="form-group">
        <label for="answer">Answer the question below!</label>
        <textarea class="form-control" id="answer" name="answer"></textarea> 
    </div>
    {{ csrf_field() }}
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection 
