<div class="row el-element-overlay">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6">
                <h4 class="card-title">{{ $title  }}</h4>
                <h6 class="card-subtitle m-b-20 text-muted">you can make gallery like this</h6></div>
            <div class="col-md-6">
                @include('components.items.action')
            </div>
        </div>
    </div>
    <!-- column -->
    @include('components.items.data-tables')
