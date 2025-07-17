@props(['element'])

<div class="p-2 mb-4">
    <h3 class="text-lg font-semibold mb-2">
        {{ $element['config']['question'] }}
    </h3>
    <ul class="space-y-2">
        @foreach ($element['config']['options'] as $key => $option)
            <li>
                <label class="flex items-center gap-2">
                    <input type="radio" name="answers[{{ $element['id'] }}]" value="{{ $key }}"
                        class="form-radio text-blue-600" {{ old("answers.{$element['id']}") == $key ? 'checked' : '' }}>
                    <span>{{ $option }}</span>
                </label>
            </li>
        @endforeach
    </ul>
</div>
