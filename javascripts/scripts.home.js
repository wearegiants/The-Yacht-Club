// @codekit-prepend "../bower_components/superfish/dist/js/superfish.min.js";

SmartAjax_load('/x/wp-content/themes/splashtime/javascripts', function () {

    function yolo() {
    
      $('#menu-main-menu').superfish({
        speed: 'fast', 
        autoArrows:  false,
        delay:       400,  
        animation:   {opacity:'show',height:'show'},
      });

        $('#minisiteSlider').royalSlider({
            arrowsNav: true,
            loop: false,
            keyboardNavEnabled: true,
            controlsInside: false,
            imageScaleMode: 'fill',
            arrowsNavAutoHide: false,
            controlNavigation: 'bullets',
            thumbsFitInViewport: false,
            navigateByClick: true,
            startSlideId: 0,
            autoPlay: false,
            transitionType: 'fade',
            globalCaption: false,
            imgWidth: 1000,
            imgHeight: 667,
            autoPlay: {
                enabled: true,
                pauseOnHover: true
            }
        });
        
        $('#footerSlider').royalSlider({
            arrowsNav: true,
            loop: false,
            keyboardNavEnabled: true,
            controlsInside: false,
            imageScaleMode: 'fill',
            arrowsNavAutoHide: false,
            controlNavigation: 'bullets',
            thumbsFitInViewport: false,
            navigateByClick: true,
            startSlideId: 0,
            autoPlay: false,
            transitionType: 'fade',
            globalCaption: false,
            imgWidth: 1000,
            imgHeight: 667,
            autoPlay: {
                enabled: true,
                pauseOnHover: true
            }
        });

        var share_button_top = new Share(".share-button-top", {
            title: "Share Button Multiple Element Test",
            ui: {
                flyout: "top center"
            },
            networks: {}
        });

        var $container = $('.photos');

        $container.imagesLoaded(function () {
            $container.isotope({
                itemSelector: 'a',
                resizable: false,
                masonry: {
                    columnWidth: $container.width() / 4
                }
            });
        });

        $(window).smartresize(function () {
            $container.isotope({
                // update columnWidth to a percentage of container width
                masonry: {
                    columnWidth: $container.width() / 4
                }
            });
        });

        $('.photos').magnificPopup({
            delegate: 'a.lb',
            type: 'image',
            closeOnContentClick: false,
            closeBtnInside: false,
            mainClass: 'mfp-with-zoom mfp-img-mobile',
            image: {
                verticalFit: true,
                titleSrc: function (item) {
                    return item.el.attr('title') + ' &middot; <a class="image-source-link" href="' + item.el.attr('data-source') + '" target="_blank">image source</a>';
                }
            },
            gallery: {
                enabled: true
            },
            zoom: {
                enabled: true,
                duration: 300, // don't foget to change the duration also in CSS
                opener: function (element) {
                    return element.find('img');
                }
            }

        });

        $(".content").fitVids();

        $('header ul.menu').superfish();

        $('#post-420').click(function () {
            $('#subscribe').fadeIn('fast');
            $('body').addClass('blur');
        });

        $(function ($) {
            var scrollElement = 'html, body';
            $('html, body').each(function () {
                var initScrollTop = $(this).attr('scrollTop');
                $(this).attr('scrollTop', initScrollTop + 1);
                if ($(this).attr('scrollTop') == initScrollTop + 1) {
                    scrollElement = this.nodeName.toLowerCase();
                    $(this).attr('scrollTop', initScrollTop);
                    return false;
                }
            });

            // Smooth scrolling for internal links
            $("a[href^='#']").click(function (event) {
                event.preventDefault();

                var $this = $(this),
                    target = this.hash,
                    $target = $(target);

                $(scrollElement).stop().animate({
                    'scrollTop': $target.offset().top
                }, 300, 'swing', function () {
                    window.location.hash = target;
                });

            });
        });

        $('#subscribe .close').click(function () {
            $('#subscribe').fadeOut('fast');
            $('body').removeClass('blur');
        });

        if (Modernizr.touch) {
            $(function () {
                $('#post-404 h2 a').attr('href', 'https://m.facebook.com/theyachtclub?v=events&__user=134900198');
                $('body').addClass('mobile');
            });
        }

        var $container = $('.isotope');

        $container.css('opacity', 0);

        $container.imagesLoaded(function () {
            $container.isotope({
                itemSelector: '.item',
                columnWidth: 10,
            });
            $container.animate({
                opacity: 1
            }, 300);
        });


        var $optionSets = $('#nav'),
            $optionLinks = $optionSets.find('a');
        $wrapper = $('#wrapper');

        $optionLinks.click(function () {

            var $this = $(this);
            if ($this.hasClass('selected')) {
                return false;
            }

            var $optionSet = $this.parents('.option-set');
            $optionSet.find('.selected').removeClass('selected');
            $this.addClass('selected');
            $('#wrapper').addClass('sorted');

            var options = {},
                key = $optionSet.attr('data-option-key'),
                value = $this.attr('data-option-value');
            value = value === 'false' ? false : value;
            options[key] = value;
            if (key === 'layoutMode' && typeof changeLayoutMode === 'function') {
                changeLayoutMode($this, options)
            } else {
                $container.isotope(options);
            }

            return false;
        });

        $('#allBtn').click(function () {
            $('#wrapper').removeClass('sorted');
        });

        $.Isotope.prototype._getCenteredMasonryColumns = function () {
            this.width = this.element.width();

            var parentWidth = this.element.parent().width();

            var colW = this.options.masonry && this.options.masonry.columnWidth ||
                this.$filteredAtoms.outerWidth(true) ||
                parentWidth;

            var cols = Math.floor(parentWidth / colW);
            cols = Math.max(cols, 1);

            this.masonry.cols = cols;
            this.masonry.columnWidth = colW;
        };

        $.Isotope.prototype._masonryReset = function () {
            this.masonry = {};
            this._getCenteredMasonryColumns();
            var i = this.masonry.cols;
            this.masonry.colYs = [];
            while (i--) {
                this.masonry.colYs.push(0);
            }
        };

        $.Isotope.prototype._masonryResizeChanged = function () {
            var prevColCount = this.masonry.cols;
            this._getCenteredMasonryColumns();
            return (this.masonry.cols !== prevColCount);
        };

        $.Isotope.prototype._masonryGetContainerSize = function () {
            var unusedCols = 0,
                i = this.masonry.cols;
            while (--i) {
                if (this.masonry.colYs[i] !== 0) {
                    break;
                }
                unusedCols++;
            }

            return {
                height: Math.max.apply(Math, this.masonry.colYs),
                width: (this.masonry.cols - unusedCols) * this.masonry.columnWidth
            };
        };

        $('#slider').royalSlider({
            autoHeight: true,
            arrowsNav: true,
            fadeinLoadedSlide: false,
            controlNavigationSpacing: 0,
            controlNavigation: 'bullets',
            imageScaleMode: 'fill',
            imageAlignCenter: false,
            loop: false,
            loopRewind: true,
            numImagesToPreload: 6,
            keyboardNavEnabled: true,
            usePreloader: false,
            imgWidth: 640,
            imgHeight: 400
        });

    }

    yolo();

    SmartAjax.setOptions({
        cache: true,
        reload: false,
        containers: [{
            selector: '#content'
        }],

        before: function () {
            $('#anchor').addClass('spin');
            SmartAjax.proceed();
        },
        success: function () {
            $('#container').animate({
                opacity: 0
            }, 300, SmartAjax.proceed);
        },
        done: function () {
            $('#anchor').removeClass('spin');
            $('#container').animate({
                opacity: 1
            }, 300);
            yolo();
        }
    });

    SmartAjax.bind("a:not([href^='mailto'], .page-template-page-minisite-php a)");
    SmartAjax.bindForms('form');
    
}, true);