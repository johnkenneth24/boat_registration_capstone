@if (session('error'))
    <div class=" mt-5 alert alert-custom alert-danger bg-gradient-danger alert-dismissible fade show d-flex justify-content-start"
        role="alert">
        <div class="alert-icon me-2"><i class="fa fa-close"></i></div>
        <div class="alert-text">{{ session('error') }}</div>
        <button type="button" class="btn-close text-white" data-bs-dismiss="alert" aria-label="Close">
        </button>
    </div>
@endif
