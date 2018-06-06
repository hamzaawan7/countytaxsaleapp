/* Stripe payment js*/

$(document).ready(function () {


    Stripe.setPublishableKey('pk_test_W2dNICB14cNJVxwyiuCM21z0');

    var $form = $('#checkoutform');

    //var $payments = $('$form input[type="radio"]:checked').val();

    $form.submit(function (event) {
        $('#charge-error').addClass('hidden');
        $form.find('button').prop('disabled', true);
        Stripe.card.createToken({
            name: $('#card-name').val(),
            number: $('#card-number').val(),
            exp_month: $('#card-expiry-month').val(),
            exp_year: $('#card-expiry-year').val(),
            cvc: $('#card-cvc').val(),
        }, stripeResponseHandler);
        return false;
    });

    function stripeResponseHandler(status, response) {

        if (response.error) {
            //alert($payments);
            $('#charge-error').removeClass('hidden');
            $('#charge-error').text(response.error.message);
            $form.find('button').prop('disabled', false);

        } else {
            var token = response.id;
            $form.append($('<input type="hidden" name="stripeToken" />').val(token));
            $form.get(0).submit();
        }
    }
});