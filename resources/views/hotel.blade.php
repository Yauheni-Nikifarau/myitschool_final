@extends('layouts.common')

@section('title') Hotel @endsection

@section('content')

    @include('layouts.header')

    <main>

        @include('layouts.forHotelPage')

    </main>

    @include('layouts.footer')

@endsection