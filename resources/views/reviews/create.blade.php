@extends('layouts.app')

@section('content')

    @include('reviews._form', ['formType' => 'create'])

@endsection
