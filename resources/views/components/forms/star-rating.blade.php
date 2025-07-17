@props(['element'])

@php
    $max = $element['config']['max'] ?? 5;
    $value = $element['config']['value'] ?? 0;
    $id = $element['id'];
@endphp

<div class="flex items-end">
    @isset($element['config']['start-value'])
        <h1 class="text-sm text-gray-600 mr-3">
            {{ $element['config']['start-value'] }}
        </h1>
    @endisset
    <div class="flex items-center space-x-1 rating" data-id="{{ $id }}">
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
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="h-full w-full transition-colors duration-200 {{ $isFilled ? 'text-yellow-400' : 'text-gray-300' }}"
                        fill="{{ $isFilled ? 'currentColor' : 'none' }}" viewBox="0 0 24 24" stroke="currentColor"
                        stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l2.073 6.373h6.708c.969 0 1.371 1.24.588 1.81l-5.424 3.944 2.073 6.373c.3.921-.755 1.688-1.539 1.118l-5.424-3.944-5.424 3.944c-.783.57-1.838-.197-1.539-1.118l2.073-6.373-5.424-3.944c-.783-.57-.38-1.81.588-1.81h6.708l2.073-6.373z" />
                    </svg>
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
            const stars = container.find('.star');
            stars.each(function() {
                const starValue = $(this).data('value');
                const starSvg = $(this).find('svg');

                if (starValue <= ratingValue) {
                    starSvg.attr('fill', 'currentColor').addClass('text-yellow-400').removeClass(
                        'text-gray-300');
                } else {
                    starSvg.attr('fill', 'none').removeClass('text-yellow-400').addClass(
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
