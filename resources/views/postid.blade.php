@extends('layout')
@section('title', 'Postagem')
@section('content')
    @include('includes.index')

        <div class="row">
            <div class="col-lg-6">
                <div class="">
                    <h4 class="">{{ $postid->post_date }}</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="">
                    <h1 class="">{{ $postid->title }}</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="">
                    <h2 class="">{{ $postid->summary }}</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="">
                    <h3 class="">{{ $postid->text }}</h1>
            </div>
        </div>