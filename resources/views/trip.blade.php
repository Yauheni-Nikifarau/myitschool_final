@extends('layouts.common')

@section('title') Trips @endsection

@section('content')

    @include('layouts.header')

    <main>

        @include('layouts.forTripPage')

    </main>

    @include('layouts.footer')

@endsection