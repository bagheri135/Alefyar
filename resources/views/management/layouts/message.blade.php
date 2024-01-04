@if (session()->has('result'))
    <div id="alert" class="alert {{ session('result') ? 'alert-success' : 'alert-danger' }}" role="alert">
        {{ session('message') }}
    </div>
@endif
