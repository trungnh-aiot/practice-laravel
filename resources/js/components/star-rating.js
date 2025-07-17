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
