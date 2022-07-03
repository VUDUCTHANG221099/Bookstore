<script>
    var ww = $(window).width();

    function validate(evt) {
        var theEvent = evt || window.event;
        var key = theEvent.keyCode || theEvent.which;
        key = String.fromCharCode(key);
        var regex = /[0-9]|\./;
        if (!regex.test(key)) {
            theEvent.returnValue = false;
            if (theEvent.preventDefault) theEvent.preventDefault();
        }
    }

    var selectCallback = function (variant, selector) {
        if (variant) {
            $(".iwishAddWrapper").attr("data-variant", variant.id);
            var form = jQuery("#" + selector.domIdPrefix).closest("form");

            for (
                var i = 0, length = variant.options.length;
                i < length;
                i++
            ) {
                var radioButton = form.find(
                    '.swatch[data-option-index="' +
                    i +
                    '"] :radio[value="' +
                    variant.options[i] +
                    '"]'
                );
                if (radioButton.size()) {
                    radioButton.get(0).checked = true;
                }
            }
        }
       
        /*begin variant image*/
        if (variant && variant.image) {
            var originalImage = jQuery(".large-image img");
            var newImage = variant.image;
            var element = originalImage[0];
            Bizweb.Image.switchImage(
                newImage,
                element,
                function (newImageSizedSrc, newImage, element) {
                    jQuery(element)
                        .parents("a")
                        .attr("data-href", newImageSizedSrc);
                    jQuery(element).attr("src", newImageSizedSrc);
                    if (ww >= 1200) {
                        $("#img_01")
                            .data("zoom-image", newImageSizedSrc)
                            .elevateZoom({
                                responsive: true,
                                gallery: "gallery_02",
                                cursor: "pointer",
                                galleryActiveClass: "active",
                            });
                        $("#img_01").bind("click", function (e) {
                            var ez = $("#img_02").data("elevateZoom");
                        });
                    }
                }
            );

            setTimeout(function () {
                $(".checkurl").attr("href", $(this).attr("src"));
                if (ww >= 1200) {
                    $(".zoomContainer").remove();
                    $("#img_01").elevateZoom({
                        gallery: "gallery_02",
                        zoomWindowWidth: 420,
                        zoomWindowHeight: 500,
                        zoomWindowOffetx: 10,
                        easing: true,
                        scrollZoom: false,
                        cursor: "pointer",
                        galleryActiveClass: "active",
                        imageCrossfade: true,
                    });
                }
            }, 200);
        }
    };
    jQuery(function ($) {
        // Add label if only one product option and it isn't 'Title'. Could be 'Size'.

        // Hide selectors if we only have 1 variant and its title contains 'Default'.

        $(".selector-wrapper").hide();

        $(".selector-wrapper").css({
            "text-align": "left",
            "margin-bottom": "15px",
        });
    });

    jQuery(".swatch :radio").change(function () {
        var optionIndex = jQuery(this)
            .closest(".swatch")
            .attr("data-option-index");
        var optionValue = jQuery(this).val();
        jQuery(this)
            .closest("form")
            .find(".single-option-selector")
            .eq(optionIndex)
            .val(optionValue)
            .trigger("change");
    });
    if (ww >= 1200) {
        $(document).ready(function () {
            if ($(window).width() > 1200) {
                $("#img_01").elevateZoom({
                    gallery: "gallery_02",
                    zoomWindowWidth: 420,
                    zoomWindowHeight: 500,
                    zoomWindowOffetx: 10,
                    easing: true,
                    scrollZoom: true,
                    cursor: "pointer",
                    galleryActiveClass: "active",
                    imageCrossfade: true,
                });
            }
        });
    }
    $("#img_02").click(function (e) {
        e.preventDefault();
        var hr = $(this).attr("src");
        $("#img_01").attr("src", hr);
        $(".large_image_url").attr("href", hr);
        $("#img_01").attr("data-zoom-image", hr);
    });

    $(".not-dqtab").each(function (e) {
        $(this).find(".tabs-title li:first-child").addClass("current");
        $(this).find(".tab-content").first().addClass("current");

        $(this)
            .find(".tabs-title li")
            .click(function () {
                if ($(window).width() > 315) {
                    if ($(this).hasClass("current")) {
                        $(this).removeClass("current");
                    } else {
                        var tab_id = $(this).attr("data-tab");
                        var url = $(this).attr("data-url");
                        $(this)
                            .closest(".e-tabs")
                            .find(".tab-viewall")
                            .attr("href", url);

                        $(this)
                            .closest(".e-tabs")
                            .find(".tabs-title li")
                            .removeClass("current");
                        $(this)
                            .closest(".e-tabs")
                            .find(".tab-content")
                            .removeClass("current");

                        $(this).addClass("current");
                        $(this)
                            .closest(".e-tabs")
                            .find("#" + tab_id)
                            .addClass("current");
                    }
                } else {
                    var tab_id = $(this).attr("data-tab");
                    var url = $(this).attr("data-url");
                    $(this)
                        .closest(".e-tabs")
                        .find(".tab-viewall")
                        .attr("href", url);

                    $(this)
                        .closest(".e-tabs")
                        .find(".tabs-title li")
                        .removeClass("current");
                    $(this)
                        .closest(".e-tabs")
                        .find(".tab-content")
                        .removeClass("current");

                    $(this).addClass("current");
                    $(this)
                        .closest(".e-tabs")
                        .find("#" + tab_id)
                        .addClass("current");
                }
            });
    });
    /*For recent product*/
    var alias = "chung-ta-roi-se-on-thoi";
    /*end*/
    if (ww >= 1200) {
        $(document).ready(function () {
            $("#img_01").elevateZoom({
                gallery: "gallery_02",
                zoomWindowWidth: 420,
                zoomWindowHeight: 500,
                zoomWindowOffetx: 10,
                easing: true,
                scrollZoom: true,
                cursor: "pointer",
                galleryActiveClass: "active",
                imageCrossfade: true,
            });
        });
    }
    $("#gallery_00 img, .swatch-element label").click(function (e) {
        $(".checkurl").attr("href", $(this).attr("src"));
        if (ww >= 1200) {
            setTimeout(function () {
                $(".zoomContainer").remove();
                $("#zoom_01").elevateZoom({
                    gallery: "gallery_02",
                    zoomWindowWidth: 420,
                    zoomWindowHeight: 500,
                    zoomWindowOffetx: 10,
                    easing: true,
                    scrollZoom: true,
                    cursor: "pointer",
                    galleryActiveClass: "active",
                    imageCrossfade: true,
                });
            }, 300);
        }
    });
</script>