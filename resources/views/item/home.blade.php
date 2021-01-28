@extends('components.main-wrapper')

@section('main')
    @include('components.customers.breadcrumbs')
    @include('components.succes-message')
    <div class="container-fluid" id="item">
        @if($list_type === "grid")
            @include('components.items.gallery-page')
        @else
            @include('components.items.list-page')
        @endif
    </div>
@endsection
