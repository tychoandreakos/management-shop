@extends('components.main-wrapper')

@section('main')
    @include('components.customers.breadcrumbs')
    @include('components.succes-message')
    <div class="container-fluid">
        @include('components.items.list-page')
    </div>
@endsection
