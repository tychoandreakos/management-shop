@extends('components.main-wrapper')

@section('main')
    @include('components.customers.breadcrumbs')
    <div class="container-fluid">
        @include('components.items.error')
        @include('components.item_transactions.form-layout')
    </div>
@endsection
