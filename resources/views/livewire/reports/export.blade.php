<div>
    <form wire:submit.prevent="export">
        @csrf
        <div class="input-group me-2">
            <input type="date" class="form-control" id="startDate" wire:model="startDate"
                value="{{ date('Y-') . '01-01' }}" required>
            <div class="input-group-text">to</div>
            <input type="date" class="form-control" id="endDate" wire:model="endDate"
                value="{{ date('Y-') . '12-31' }}" required>
        </div>
        <div class="input-group mt-2">
            <select class="form-control" id="type" wire:model="type" required>
                <option value="">Select Type</option>
                <option value="all">All</option>
                <option value="pending">Pending</option>
                <option value="registered">Registered</option>
                <option value="disapproved">Disapproved</option>
                <option value="expired">Expired</option>
                <option value="motorized">Motorized Boats</option>
                <option value="non-motorized">Non-Motorized Boats</option>
            </select>
            <button type="submit" class="btn btn-sm form-control btn-primary">
                <span><i class="fa fa-download" aria-hidden="true"></i></span> Export
            </button>
        </div>
    </form>
</div>
