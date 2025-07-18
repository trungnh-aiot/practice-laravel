@props(['element'])

@php
    $max = $element['config']['max'] ?? 5;
    $value = $element['config']['value'] ?? 0;
    $id = $element['id'];
    $ratingComponentMap = [
        'starRating' => 'icons.star',
        'circleRating' => 'icons.circle',
    ];
    $colorWhenHoverAndActiveAddClassMap = [
        'starRating' => 'text-yellow-400',
        'circleRating' => 'text-blue-500',
    ];
    $ratingComponent = $ratingComponentMap[$element['config']['type']] ?? null;
    $colorWhenHoverAndActiveAddClass = $colorWhenHoverAndActiveAddClassMap[$element['config']['type']] ?? null;
@endphp

<div class="flex items-end">
    @isset($element['config']['start-value'])
        <h1 class="text-sm text-gray-600 mr-3">
            {{ $element['config']['start-value'] }}
        </h1>
    @endisset
    <div class="flex items-center space-x-1 rating" data-id="{{ $id }}"
        data-color="{{ $colorWhenHoverAndActiveAddClass }}">
        @for ($i = 1; $i <= $max; $i++)
            @php
                $isFilled = $value >= $i;
            @endphp
            <div class="flex flex-col  items-center">
                <h3>
                    {{ $i }}
                </h3>
                <label class="block h-6 w-6 cursor-pointer star" data-value="{{ $i }}"
                    title="Rate {{ $i }} out of {{ $max }}">
                    <x-dynamic-component :component="$ratingComponent" :isFilled="$isFilled" :colorWhenHoverAndActiveAddClass="$colorWhenHoverAndActiveAddClass" />
                </label>
            </div>
        @endfor
    </div>
    @isset($element['config']['end-value'])
        <h1 class="text-sm text-gray-600 ml-3">
            {{ $element['config']['end-value'] }}
        </h1>
    @endisset
    <input type="hidden" name="{{ $id }}" id="rating-{{ $id }}" value="{{ $value }}" />
</div>


<script>
    $(function() {
        const setStars = (container, ratingValue) => {
            const colorClass = container.data('color');
            const stars = container.find('.star');
            stars.each(function() {
                const starValue = $(this).data('value');
                const starSvg = $(this).find('svg');

                if (starValue <= ratingValue) {
                    starSvg.attr('fill', 'currentColor').addClass(
                            colorClass)
                        .removeClass(
                            'text-gray-300');
                } else {
                    starSvg.attr('fill', 'none').removeClass(colorClass)
                        .addClass(
                            'text-gray-300');
                }
            });
        };

        $('.rating').on('click', '.star', function() {
            const container = $(this).closest('.rating');
            const inputId = container.data('id');
            const input = $('#rating-' + inputId);
            const selectedValue = $(this).data('value');
            input.val(selectedValue);
            setStars(container, selectedValue);
        });


        $('.rating').on('mouseenter', '.star', function() {
            const container = $(this).closest('.rating');
            const hoverValue = $(this).data('value');
            setStars(container, hoverValue);
        });

        $('.rating').on('mouseleave', function() {
            const container = $(this);
            const inputId = container.data('id');
            const input = $('#rating-' + inputId);
            const currentRating = input.val();
            setStars(container, currentRating);
        });
    });
</script>
