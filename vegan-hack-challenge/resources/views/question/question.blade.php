@extends('layouts.master')

@section('content')
@include('partials.errors')
<div class="main-wrapper">
    <div class="row">
        <div class="col-md-9">
             <h1>{{ $question->question }}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-9">
            @if(count($question->answers) === 0)
                <p><b>Be the first to answer!</b></p>
            @else
                @foreach($question->answers as $answer)
                    <hr>
                    <p>{{ $answer->answer }}</p>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-md-9">
            <form action="{{ route('question.question.answer', ['id' => $question->id]) }}" method="post">
                <div class="form-group">
                    <label for="answer">Answer the question below!</label>
                    <textarea class="form-control" id="answer" name="answer"></textarea> 
                </div>
                {{ csrf_field() }}
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection 
