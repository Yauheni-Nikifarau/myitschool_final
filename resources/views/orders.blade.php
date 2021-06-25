@extends('layouts.common')

@section('title') My Orders @endsection

@section('content')

    @include('layouts.header')

    <main>

        @include('layouts.forOrdersPage')

    </main>

    @include('layouts.footer')

@endsection
