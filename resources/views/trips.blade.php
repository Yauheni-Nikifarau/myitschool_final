@extends('layouts.common')

@section('title') Trips @endsection

@section('content')

    @include('layouts.header')

    <main>

        @include('layouts.forTripsPage')

    </main>

    @include('layouts.footer')

@endsection
