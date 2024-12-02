<sectiod id="thumbnail-carousel" class="splide"
    aria-label="The carousel with thumbnails. Selecting a thumbnail will change the Beautiful Gallery carousel.">
    <div class="splide__track">
        <ul class="splide__list">
            <li class="splide__slide">
                <img src="{{ asset('assets/images/batu 1.jpg') }}" alt="">
            </li>
            <li class="splide__slide">
                <img src="{{ asset('assets/images/batu 2.jpg') }}" alt="">
            </li>
            <li class="splide__slide">
                <img src="{{ asset('assets/images/kayu 4.jpg') }}" alt="">
            </li>
        </ul>
    </div>
</sectiod

<style>
    .splide__slide img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .splide__slide {
        opacity: 0.6;
    }


    .splide__slide.is-active {
        opacity: 1;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var main = new Splide('#main-carousel', {
            type: 'fade',
            rewind: true,
            pagination: false,
            arrows: false,
        });


        var thumbnails = new Splide('#thumbnail-carousel', {
            fixedWidth: 100,
            fixedHeight: 60,
            gap: 10,
            rewind: true,
            pagination: false,
            isNavigation: true,
            breakpoints: {
                600: {
                    fixedWidth: 60,
                    fixedHeight: 44,
                },
            },
        });


        main.sync(thumbnails);
        main.mount();
        thumbnails.mount();
    });
</script>
