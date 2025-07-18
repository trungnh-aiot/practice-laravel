@props([
    'isFilled' => false,
    'colorWhenHoverAndActiveAddClass' => 'text-blue-500',
])


<svg xmlns="http://www.w3.org/2000/svg"
    class="h-full w-full transition-colors duration-200 {{ $isFilled ? $colorWhenHoverAndActiveAddClass : 'text-gray-300' }}"
    viewBox="0 0 24 24" fill="{{ $isFilled ? 'currentColor' : 'none' }}" stroke="rgb(80, 160, 215)" stroke-width="3">
    <circle cx="12" cy="12" r="9" stroke-linecap="round" stroke-linejoin="round" />
</svg>
