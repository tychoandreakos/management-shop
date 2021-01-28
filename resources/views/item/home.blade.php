@extends('components.main-wrapper')

@section('main')
    @include('components.customers.breadcrumbs')
    @include('components.succes-message')
    <div class="container-fluid" id="item">
        @include('components.items.gallery-page')
{{--        @include('components.items.list-page')--}}
    </div>
@endsection
