<!-- resources/views/frontend/home.blade.php -->
@extends('layouts.frontend.app')

@section('content')

<main>
    @include('components.frontend.hero')
   
    @include('components.frontend.about')
    @include('components.frontend.service')
    @include('components.frontend.feature')
    @include('components.frontend.contact')
</main>

@endsection
