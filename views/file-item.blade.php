@if($file instanceof Livewire\TemporaryUploadedFile)
    @if($file->isPreviewable())
        <a href="{{ $file->temporaryUrl() }}" target="_blank"
            class="list-group-item list-group-item-action {{ $hasErrors ? 'border-danger' : '' }}">
            {{ $file->getClientOriginalName() }}
        </a>
    @else
        <div class="list-group-item {{ $hasErrors ? 'border-danger' : '' }}">
            {{ $file->getClientOriginalName() }}
        </div>
    @endif
@else
    <a href="{{ Storage::disk($props['disk'])->url($file) }}" target="_blank"
        class="list-group-item list-group-item-action {{ $hasErrors ? 'border-danger' : '' }}">
        {{ $file }}
    </a>
@endif
