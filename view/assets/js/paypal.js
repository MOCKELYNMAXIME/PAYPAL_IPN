(function($){
    $("#form-simple-payment").on('submit', function(e){
        e.preventDefault();
        var form = $(this);
        var url = form.attr('action');

        var btn = $("#btn-simple-payment");

        btn.html('Chargement...');

        $.post(url, form.serializeArray())
            .done(function(data){
                window.location='https://www.sandbox.paypal.com/webscr?cmd=_express-checkout&useraction=commit&token='+data;
            })
            .fail(function(jqxhr){
                $("#simple-payment").modal('hide');
                $("#payment-error").hide().html(jqxhr.responseText);
            })
            .always(function(){
                btn.html('Valider');
            })
    })
})(jQuery);