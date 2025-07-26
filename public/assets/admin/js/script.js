(function ($) {
    /*======================================
        Preloader activation
    ========================================*/
    $(window).on("load", function (event) {
        $("#preloader").delay(1000).fadeOut(500);
        // Text Animation
        setTimeout(() => {
            var hasAnim = $(".anim-text");
            hasAnim.each(function () {
                var $this = $(this);
                var splitto = new SplitType($this, {
                    types: "lines, chars",
                    className: "char",
                });
                var chars = $this.find(".char");
                gsap.fromTo(
                    chars,
                    { y: "100%" },
                    {
                        y: "0%",
                        duration: 0.9,
                        stagger: 0.03,
                        ease: "power2.out",
                    }
                );
            });
        }, 1000);
    });

    $(".preloader-close").on("click", function () {
        $("#preloader").delay(0).fadeOut(500);
    });

    window.addEventListener("load", (event) => {
        textAnimationEffect();
    });

    window.onload = scrollPercentage;
})(jQuery);
