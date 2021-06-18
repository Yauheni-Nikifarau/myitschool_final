@extends('layouts.common')

@section('title') My Orders @endsection

@section('content')

    @include('layouts.header')

    <main>

        @include('layouts.forMyOrdersPage')

    </main>

    @include('layouts.footer')

@endsection