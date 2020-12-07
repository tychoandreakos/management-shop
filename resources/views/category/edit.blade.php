@extends('components.main-wrapper')

@section('main')
    @include('components.customers.breadcrumbs')
    <div class="container-fluid">
        @include('components.items.error')
        @include('components.categories.edit')
    </div>
@endsection
