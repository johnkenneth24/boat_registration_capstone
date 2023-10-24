<div class="btn-group">
    <button class="btn btn-info btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        EXPORT
    </button>
    <div class="dropdown-menu">
        <a class="dropdown-item" href="#" wire:click="export" wire:loading.attr="disabled">Export CERTIFICATE</a>
        <a class="dropdown-item" href="#" wire:click="exportPcic" wire:loading.attr="disabled">Export PCIC</a>
        {{-- <a class="dropdown-item" href="#" wire:click="exportAfn" wire:loading.attr="disabled">Export Afn</a> --}}
    </div>
</div>
