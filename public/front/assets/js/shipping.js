// Shipping
document.addEventListener('DOMContentLoaded', function() {
    const subtotalGet = document.getElementById('subtotal');
    const vatAmountGet = document.getElementById('vatAmount');
    const shippingFeeGet = document.getElementById('shipping_fee');
    const totalGet = document.getElementById('total');
    const radioChecked = document.querySelectorAll('input[name="shipping_method"]');

    const shippingPrices = {
        'Standard Shipping': 10,
        'Express Shipping': 30
    };

    function updateTotal() {
        const subtotal = parseFloat(subtotalGet.textContent.replace('$', ''));
        const vatAmount = parseFloat(vatAmountGet.textContent.replace('$', ''));
        const checkedShipping = document.querySelector('input[name="shipping_method"]:checked').value;
        const shippingPrice = shippingPrices[checkedShipping];
        const total = subtotal + vatAmount + shippingPrice;
        totalGet.textContent = '$' + total.toFixed(2);
        shippingFeeGet.textContent = '$' + shippingPrice.toFixed(2);

        const data = {
            shipping_fee: shippingPrice,
            total: total,
            _token: $('meta[name="csrf-token"]').attr('content'),
        };

        // console.log(data);

        $.ajax({
            url: '/checkout/update-total',
            method: 'POST',
            data: data,
        });
    }

    radioChecked.forEach(function(radio) {
        radio.addEventListener('change', function() {
            updateTotal();
        });
    });

    const defaultShippingMethod = document.querySelector('input[name="shipping_method"]:checked');
    if (defaultShippingMethod) {
        updateTotal();
    }

});
