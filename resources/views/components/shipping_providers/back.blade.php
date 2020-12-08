<input type="text" id="_backLink" hidden value="{{ route('shipping_providers.home')  }}" readonly>

@push('scripts')
    <script>
        const element = document.getElementById('_back');
        const back = document.getElementById('_backLink').value;

        element.addEventListener('click', () => window.location.href = back)
    </script>
@endpush
