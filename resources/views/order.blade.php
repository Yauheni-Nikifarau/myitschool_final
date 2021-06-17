@extends('layouts.common')

@section('title') Order @endsection

@section('content')

    @include('layouts.header')

    <main>

        @include('layouts.forOrderPage')

    </main>

    @include('layouts.footer')

@endsection