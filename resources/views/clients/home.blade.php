@extends('layouts.client')

@section('title')
    {{ $title }}
@endsection

@section('css')
@endsection

@section('content')
    @include('clients.blocks.home_section1')
    @include('clients.blocks.home_section2')
    @include('clients.blocks.home_section3')
    @include('clients.blocks.home_section4')
    @include('clients.blocks.home_section5')
@endsection

@section('js')
@endsection
