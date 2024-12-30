@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>403</h1>
        <p>Sorry, you are not authorized to access this page.</p>
        <a href="{{ route('home') }}" class="btn btn-primary">Go Home</a>
    </div>
@endsection
