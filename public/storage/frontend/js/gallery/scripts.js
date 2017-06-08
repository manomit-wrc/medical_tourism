$(document).ready(function() {
    'use strict';
	/*-----------------------------------------------------------------------------------*/
    /*	STICKY HEADER
    /*-----------------------------------------------------------------------------------*/
    var options = {
        offset: 350,
        offsetSide: 'top',
        classes: {
            clone: 'banner--clone fixed',
            stick: 'banner--stick',
            unstick: 'banner--unstick'
        },
        onStick: function() {
            $($.SmartMenus.Bootstrap.init);
        }
    };
    var banner = new Headhesive('.navbar', options);
    $('.offset').css('padding-top', $('.navbar').height() + 'px');
    $(window).resize(function() {
        $('.offset').css('padding-top', $('.navbar').height() + 'px');
    });
    $('.onepage .navbar .nav li a').on('click', function() {
        $('.navbar .navbar-collapse.in').collapse('hide');
        $('.nav-bars').removeClass('is-active');
    });
    /*-----------------------------------------------------------------------------------*/
    /*	HAMBURGER MENU ICON
    /*-----------------------------------------------------------------------------------*/
    $(".nav-bars").on( "click", function() {
        $(".nav-bars").toggleClass("is-active");
    });
	/*-----------------------------------------------------------------------------------*/
    /*	CUBE PORTFOLIO
    /*-----------------------------------------------------------------------------------*/
    $('#js-grid-inline').cubeportfolio({
        filters: '#js-inline-filter',
        loadMore: '#js-inline-more',
        loadMoreAction: 'click',
        layoutMode: 'grid',
        mediaQueries: [{
            width: 1500,
            cols: 4
        }, {
            width: 1100,
            cols: 4
        }, {
            width: 800,
            cols: 3
        }, {
            width: 670,
            cols: 2
        }, {
            width: 320,
            cols: 1
        }],
        defaultFilter: '*',
        animationType: 'quicksand',
        gapHorizontal: 15,
        gapVertical: 15,
        gridAdjustment: 'responsive',
        caption: 'fadeIn',
        displayType: 'fadeIn',
        displayTypeSpeed: 100,

        // singlePageInline
        singlePageInlineDelegate: '.cbp-singlePageInline',
        singlePageInlinePosition: 'top',
        singlePageInlineInFocus: true,
        singlePageInlineCallback: function(url, element) {
            // to update singlePageInline content use the following method: this.updateSinglePageInline(yourContent)
            var t = this;

            $.ajax({
                    url: url,
                    type: 'GET',
                    dataType: 'html',
                    timeout: 30000
                })
                .done(function(result) {

                    t.updateSinglePageInline(result);

                })
                .fail(function() {
                    t.updateSinglePageInline('AJAX Error! Please refresh the page!');
                });
        },
    });
    $('#js-grid-lightbox').cubeportfolio({
        filters: '#js-lightbox-filter',
        loadMore: '#js-lightbox-more',
        loadMoreAction: 'click',
        layoutMode: 'grid',
        mediaQueries: [{
            width: 1500,
            cols: 4
        }, {
            width: 1100,
            cols: 3
        }, {
            width: 800,
            cols: 3
        }, {
            width: 670,
            cols: 2
        }, {
            width: 320,
            cols: 1
        }],
        defaultFilter: '*',
        animationType: 'quicksand',
        gapHorizontal: 15,
        gapVertical: 15,
        gridAdjustment: 'responsive',
        caption: 'fadeIn',
        displayType: 'fadeIn',
        displayTypeSpeed: 100,

    });
    $('#js-grid-lightbox').on('onAfterLoadMore.cbp', function(event, newItemsAddedToGrid) {
        // first destroy the gallery
        $('.light-gallery').data('lightGallery').destroy(true);

        // reinit the gallery
	    $('.light-gallery').lightGallery({
	        thumbnail: false,
	        selector: '.lgitem',
	        animateThumb: true,
	        showThumbByDefault: false,
	        download: false,
	        autoplayControls: false,
	        zoom: false,
	        videoAutoplay: false,
	        fullScreen: false,
	        thumbWidth: 100,
	        thumbContHeight: 80,
	        hash: false,
	        videoMaxWidth: '1000px'
	    });
	});
    $('#js-grid-slider-testimonials').cubeportfolio({
        layoutMode: 'slider',
        drag: true,
        auto: false,
        autoTimeout: 5000,
        autoPauseOnHover: true,
        showNavigation: false,
        showPagination: true,
        rewindNav: true,
        scrollByPage: false,
        gridAdjustment: 'responsive',
        mediaQueries: [{
            width: 1,
            cols: 1
        }],
        gapHorizontal: 0,
        gapVertical: 0,
        caption: '',
        displayType: 'default',
    });
    /*-----------------------------------------------------------------------------------*/
    /*	LIGHTGALLERY
	/*-----------------------------------------------------------------------------------*/
    $('.light-gallery').lightGallery({
        thumbnail: false,
        selector: '.lgitem',
        animateThumb: true,
        showThumbByDefault: false,
        download: false,
        autoplayControls: false,
        zoom: false,
	    fullScreen: false,
        thumbWidth: 100,
        thumbContHeight: 80,
        hash: false,
        videoMaxWidth: '1000px'
    });
    /*-----------------------------------------------------------------------------------*/
    /*	IMAGE ICON HOVER
    /*-----------------------------------------------------------------------------------*/
    $('.overlay a').prepend('<span class="over"><span></span></span>');
    /*-----------------------------------------------------------------------------------*/
    /*	INSTAGRAM
    /*-----------------------------------------------------------------------------------*/
    var instagramFeed = new Instafeed({
        target: 'instafeed-widget',
        get: 'user',
        limit: 6,
        userId: 1215763826,
        accessToken: '1215763826.f1627ea.512d3a9b334a4c91ac2e83d4f4d9b291',
        resolution: 'low_resolution',
        template: '<div class="item col-xs-4 col-sm-6 col-md-4"><figure class="overlay small"><a href="{{link}}" target="_blank"><img src="{{image}}" /></a></figure></div>',
        after: function() {
            $('#instafeed-widget figure.overlay a').prepend('<span class="over"><span></span></span>');
        }
    });
    $('#instafeed-widget').each(function() {
        instagramFeed.run();
    });
    var instagramFeed2 = new Instafeed({
        target: 'instafeed',
        get: 'user',
        limit: 6,
        userId: 1215763826,
        accessToken: '1215763826.f1627ea.512d3a9b334a4c91ac2e83d4f4d9b291',
        resolution: 'low_resolution',
        template: '<div class="item col-xs-6 col-sm-4 col-md-2"><figure class="overlay instagram"><a href="{{link}}" target="_blank"><img src="{{image}}" /></a></figure></div>',
        after: function() {
            $('#instafeed figure.overlay a').prepend('<span class="over"><span></span></span>');
        }
    });
    $('#instafeed').each(function() {
        instagramFeed2.run();
    });
    /*-----------------------------------------------------------------------------------*/
    /*	COUNTER UP
    /*-----------------------------------------------------------------------------------*/
    $('.fcounter').counterUp({
        delay: 50,
        time: 1000
    });
    /*-----------------------------------------------------------------------------------*/
    /*	PARALLAX MOBILE
    /*-----------------------------------------------------------------------------------*/
    if (navigator.userAgent.match(/Android/i) || navigator.userAgent.match(/webOS/i) || navigator.userAgent.match(/iPhone/i) || navigator.userAgent.match(/iPad/i) || navigator.userAgent.match(/iPod/i) || navigator.userAgent.match(/BlackBerry/i)) {
        $('.parallax').addClass('mobile');
    }
    /*-----------------------------------------------------------------------------------*/
    /*	BACKGROUND VIDEO PARALLAX
    /*-----------------------------------------------------------------------------------*/
    $('#video-fish').backgroundVideo({
        $outerWrap: $('.outer-wrap'),
        pauseVideoOnViewLoss: false,
        parallaxOptions: {
            effect: 1.9
        }
    });
    /*-----------------------------------------------------------------------------------*/
    /*	TAB COLLAPSE
    /*-----------------------------------------------------------------------------------*/
    $('#tab1').tabCollapse({
        tabsClass: 'hidden-sm hidden-xs',
        accordionClass: 'visible-sm visible-xs'
    });
    $('#tab1').on('shown-accordion.bs.tabcollapse', function() {
        $('.panel-group').find('.panel-default:has(".in")').addClass('panel-active');
        $('.panel-group').on('shown.bs.collapse', function(e) {
            $(e.target).closest('.panel-default').addClass(' panel-active');
        }).on('hidden.bs.collapse', function(e) {
            $(e.target).closest('.panel-default').removeClass(' panel-active');
        });
    });
    /*-----------------------------------------------------------------------------------*/
    /*	TOGGLE
    /*-----------------------------------------------------------------------------------*/
    $('.panel-group').find('.panel-default:has(".in")').addClass('panel-active');
    $('.panel-group').on('shown.bs.collapse', function(e) {
        $(e.target).closest('.panel-default').addClass(' panel-active');
    }).on('hidden.bs.collapse', function(e) {
        $(e.target).closest('.panel-default').removeClass(' panel-active');
    });
    /*-----------------------------------------------------------------------------------*/
    /*	PROGRESS BAR
    /*-----------------------------------------------------------------------------------*/
    $('.progress-list .progress .bar').progressBar({
        shadow: false,
        percentage: false,
        animation: true,
        height: 12
    });
    /*-----------------------------------------------------------------------------------*/
    /*	DATA REL
    /*-----------------------------------------------------------------------------------*/
    $('a[data-rel]').each(function() {
        $(this).attr('rel', $(this).data('rel'));
    });
    /*-----------------------------------------------------------------------------------*/
    /*	TOOLTIP
    /*-----------------------------------------------------------------------------------*/
    if ($("[rel=tooltip]").length) {
        $("[rel=tooltip]").tooltip();
    }
    /*-----------------------------------------------------------------------------------*/
    /*	PRETTIFY
    /*-----------------------------------------------------------------------------------*/
    window.prettyPrint && prettyPrint();
    /*-----------------------------------------------------------------------------------*/
    /*	LAZY LOAD GOOGLE MAPS
    /*-----------------------------------------------------------------------------------*/
    ;
    (function($, window, document, undefined) {
        var $window = $(window),
            mapInstances = [],
            $pluginInstance = $('.google-map').lazyLoadGoogleMaps({
                callback: function(container, map) {
                    var $container = $(container),
                        center = new google.maps.LatLng($container.attr('data-lat'), $container.attr('data-lng'));

                    map.setOptions({
                        center: center,
                        zoom: 15,
                        zoomControl: true,
                        zoomControlOptions: {
                            style: google.maps.ZoomControlStyle.DEFAULT,
                        },
                        disableDoubleClickZoom: false,
                        mapTypeControl: true,
                        mapTypeControlOptions: {
                            style: google.maps.MapTypeControlStyle.DROPDOWN_MENU,
                        },
                        scaleControl: true,
                        scrollwheel: false,
                        streetViewControl: true,
                        draggable: true,
                        overviewMapControl: false,
                        mapTypeId: google.maps.MapTypeId.ROADMAP
                    });
                    new google.maps.Marker({
                        position: center,
                        map: map
                    });

                    $.data(map, 'center', center);
                    mapInstances.push(map);

                    var updateCenter = function() {
                        $.data(map, 'center', map.getCenter());
                    };
                    google.maps.event.addListener(map, 'dragend', updateCenter);
                    google.maps.event.addListener(map, 'zoom_changed', updateCenter);
                    google.maps.event.addListenerOnce(map, 'idle', function() {
                        $container.addClass('is-loaded');
                    });
                }
            });

        $window.on('resize', $pluginInstance.debounce(1000, function() {
            $.each(mapInstances, function() {
                this.setCenter($.data(this, 'center'));
            });
        }));

    })(jQuery, window, document);
    /*-----------------------------------------------------------------------------------*/
    /*	LOADER
    /*-----------------------------------------------------------------------------------*/
    $(".pageloader").lsPreloader({

        backgroundColor: "#1b1b1b",
        logoImage: "style/images/logo.png",
        minimumTime: .5,
        progressHeight: "0",
        progressColor: "#fff",
        percentFontSize: "18px"

    });
    /*-----------------------------------------------------------------------------------*/
    /*	VANILLA
    /*-----------------------------------------------------------------------------------*/
    var myForm;
    myForm = new VanillaForm($("form.vanilla-form"));
    /*-----------------------------------------------------------------------------------*/
    /*	COLLAGEPLUS
    /*-----------------------------------------------------------------------------------*/
    collage();
    function collage() {
        $('.collage').removeWhitespace().collagePlus({
            'fadeSpeed': 5000,
            'targetHeight': 300,
            'effect': 'effect-2',
            'direction': 'vertical',
            'allowPartialLastRow': true
        });
    };
    // This is just for the case that the browser window is resized
    var resizeTimer = null;
    $(window).on('resize', function() {
        // hide all the images until we resize them
        $('.collage .collage-image-wrapper').css("opacity", 0);
        // set a timer to re-apply the plugin
        if (resizeTimer) clearTimeout(resizeTimer);
        resizeTimer = setTimeout(collage, 200);
    });
    
});