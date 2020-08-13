@extends('adminlte.master')
@section('content')
<div class="mt-3 ml-3 mr-3">
    <h4> {{$question->title}} </h4>
    <p> {{$question->content}} </p>
</div>
@endsection