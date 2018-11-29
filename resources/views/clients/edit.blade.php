@extends('layouts.app')

@section('content')

    @include('clients._form', ['formType' => 'edit'])

@endsection