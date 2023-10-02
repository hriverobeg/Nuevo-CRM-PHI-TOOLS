@props(['name', 'label', 'multiple', 'files' => []])
<div>
    <div>
        <label for="{{ $name }}">{{ $label }}</label>
        <input
            id="{{ $name }}"
            type="file"
            name="{{ $name }}"
            class="rtl:file-ml-5 form-input p-0 file:border-0 file:bg-primary/90 file:py-2 file:px-4 file:font-semibold file:text-white file:hover:bg-primary ltr:file:mr-5"
            @isset($multiple)
            multiple
            @endisset
            >
    </div>
    @if (count($files) > 0)
    <div class="mt-4">
        <x-filetable :files="$files"/>
    </div>
    @endif
</div>
