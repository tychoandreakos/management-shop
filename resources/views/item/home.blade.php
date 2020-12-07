@extends('components.main-wrapper')

@section('main')
    @include('components.customers.breadcrumbs')
    <div class="container-fluid">
        @include('components.items.gallery-page')
    </div>
@endsection
