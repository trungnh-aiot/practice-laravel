@props(['element'])

@php
    $isRadio = $element['config']['type'] === 'radio';
    $classAddMap = [
        'radio' => 'rounded-full',
        'checkbox' => '',
    ];
    $classAdd = $classAddMap[$element['config']['type']] ?? '';
@endphp

<div class="p-2 mb-4">
    <h3 class="text-lg font-semibold mb-2">
        {{ $element['config']['question'] }}
    </h3>
    <ul class="space-y-2">
        @foreach ($element['config']['options'] as $key => $option)
            <li>
                <label class="relative inline-flex items-center cursor-pointer">
                    <input type={{ $element['config']['type'] }} name="answers[{{ $element['id'] }}]"
                        value="{{ $key }}" class="hidden peer "
                        {{ old("answers.{$element['id']}") == $key ? 'checked' : '' }} />
                    <span class="w-5 h-5  border-2 border-blue-600 mr-2 {{ $classAdd }}"></span>
                    <span
                        class="w-2 h-2 bg-blue-600 {{ $classAdd }} scale-0
                             peer-checked:scale-100 transition-transform duration-200
                             absolute top-2 left-[9px] -translate-x-1/3">
                    </span>
                    <span>{{ $option }}</span>
                </label>
            </li>
        @endforeach
    </ul>
</div>
