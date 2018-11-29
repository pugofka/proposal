@extends('layouts.app')

@section('content')

    @include('clients._form', ['formType' => 'create'])

@endsection
