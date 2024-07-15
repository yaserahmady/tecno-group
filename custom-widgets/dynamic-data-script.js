jQuery(document).ready(function($) {
    function fetchDynamicData() {
        $.ajax({
            url: dynamicDataAjax.ajaxurl,
            type: 'POST',
            data: {
                action: 'fetch_dynamic_data'
            },
            success: function(response) {
                if (response.success) {
                    var html = '';

                    $.each(response.data, function(index, profile) {
                        html += '<div class="elementor-loop-item">';
                        html += '<h3>' + profile.job + '</h3>';
                        html += '<p>' + profile.contenuto + '</p>';
                        html += '<p><strong>Sede di lavoro:</strong> ' + profile.sede.nome_sede + '</p>';
                        html += '<a href="#" class="btn btn-primary">Vai all\'annuncio</a>';
                        html += '</div>';
                    });

                    $('#dynamic-data-container').html(html);

                    // Reinitialize the Elementor Loop Carousel
                    if ($.fn.owlCarousel) {
                        $('.owl-carousel').owlCarousel({
                            loop: true,
                            margin: 10,
                            nav: true,
                            responsive: {
                                0: {
                                    items: 1
                                },
                                600: {
                                    items: 2
                                },
                                1000: {
                                    items: 3
                                }
                            }
                        });
                    }

                } else {
                    $('#dynamic-data-container').html('<p>Error fetching data: ' + response.data + '</p>');
                }
            }
        });
    }

    // Fetch data on page load
    fetchDynamicData();
});