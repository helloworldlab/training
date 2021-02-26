@if (session()->has('notifikasi_sistem'))
    <div class="container">
        <div class="alert {{ session()->has('class_notifikasi_sistem') ? session()->get('class_notifikasi_sistem') : 'alert-info' }} alert-dismissible fade show mt-3 mb-0">
            {{ session()->get('notifikasi_sistem') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
    {{-- Fix bug pada Windows --}}
    {{ session()->forget('notifikasi_sistem') }}
@endif