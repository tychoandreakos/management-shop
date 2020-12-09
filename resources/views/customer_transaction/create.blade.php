@extends('components.main-wrapper')

@section('main')
    @include('components.customers.breadcrumbs')
    <div class="container-fluid">
        @include('components.items.error')
        @include('components.customer_transactions.form-layout')
    </div>
@endsection
