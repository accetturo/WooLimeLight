(function($) {
    $(document).ready(function() {
        $('input[name=billing]').click(function() {
            var _this = $(this).val();
            $('#billingSameAsShipping').val(_this);
            if (_this == 'yes') {
                $('#billingwrapper').hide();
            }
            else {
                $('#billingwrapper').show();
            }
        })
    });
})(jQuery);