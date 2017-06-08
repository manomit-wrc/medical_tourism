$(document).ready(function() {

    //var $input = $('input');
    $('.space').each(function() {
        var $space = $(this);
        $space.css({
            'color': $space.data('color'),
            'background-color': $space.data('bg'),
        });
    });

    var options = {
        scrollbar: '.scrollbar',
        onSpaceChange: function(ctrl) {
            $input.val(ctrl.space);
            var $space = $('.space:nth-child(' + ctrl.space + ')');
            ctrl.scrollbar.css({
                'border-color': $space.data('color'),
                'background-color': $space.data('bg'),
            });
            ctrl.$wrapper.css('background-color', $space.data('bg'));
        },
        spaceLimits: ['.space'],
    };

    $('#myScrollWrapper').doScroll(options);

});
