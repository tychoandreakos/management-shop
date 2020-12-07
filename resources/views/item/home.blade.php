@extends('components.main-wrapper')

@section('main')
    @include('components.customers.breadcrumbs')
    @include('components.succes-message')
    <div class="container-fluid">
        @if(session('list'))
            @include('components.items.list-page')
        @else
            @endif
            @include('components.items.gallery-page')
    </div>
@endsection
