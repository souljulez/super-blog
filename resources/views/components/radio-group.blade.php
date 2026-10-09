<div>
    <label for="{{ $formId }}" class="mb-1 flex items-center">
        <input type="radio" name="{{ $name }}" value=""
            @checked(!request($name))
            onchange="this.form.submit()" />
        <span class="ml-2">All ({{ $postsCount[1] }})</span>
    </label>

    @foreach ($optionsWithLabels as $label => $option)
        <label for="{{ $formId }}" class="mb-1 flex items-center">
            <input type="radio" name="{{ $name }}" value="{{ $option }}"
                @checked($option === request($name))
                onchange="this.form.submit()" />
            <span class="ml-2">{{ str_replace('_', ' ', ucfirst($label)) }} ({{  $postsCount[0][$option] }})</span>
        </label>
    @endforeach
</div>
