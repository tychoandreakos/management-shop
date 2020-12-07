@extends('components.main-wrapper')

@section('main')
    @include('components.customers.breadcrumbs')
    @include('components.succes-message')
    <div class="container-fluid">
        @include('components.items.gallery-page')
    </div>
@endsection
