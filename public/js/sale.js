$(document).ready(function () {


    var i = 1;

    $('.add-product-btn').on('click', function (e) {
        e.preventDefault();
        var stock = $(this).data('stock');
        if (stock == 0) {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });

            Toast.fire({
                type: 'error',
                title: 'You Product Stock is Empty !! Please Update It'
            });
            // Swal('Oops...', 'You Product Stock is Empty !! Please Update It', 'error')
        } else {
            e.preventDefault();
            var name = $(this).data('name');
            var id = $(this).data('id');
            var price = $(this).data('price');

            $(this).addClass('disabled');
            var html =
                `<tr class="form-group items">
                <td>${i++}</td>
                <td class="namex">${name}</td>
                <input type="hidden" name="product[]" value="${id}">
                <td style="display: flex;">        
                <input id="qty" style="width: 60% !important;" type="number" name="quantity[]" data-price="${price}" data-stock="${stock}" class="form-control input-sm product-quantity" min="1" max="${stock}" value="1">
                </td>
                <td class="product-price">${price}</td>
                <td><button type="button" class="btn btn-danger btn-sm remove-product-btn" data-id="${id}"><span class="fa fa-trash"></span></button></td>
            </tr>`;
            $('.order-list').append(html);
            calculateTotal();
            calculateTotalAmount();

        }


    });

    //to calculate total price

    $('body').on('click', '.disabled', function (e) {

        e.preventDefault();

    }); //end of disabled

    $('body').on('click', '.remove-product-btn', function (e) {

        e.preventDefault();
        var id = $(this).data('id');

        $(this).closest('tr').remove();
        $('#product-' + id).removeClass('btn-default disabled').addClass('btn-success');

        //to calculate total price
        calculateTotal();
        calculateTotalAmount();

    }); //end of remove product btn

    $('body').on('keyup focus', '.product-quantity', function (e) {

        var quantity = parseInt($(this).val()); //2
        var unitPrice = $(this).data('price'); //150

        $(this).closest('tr').find('.product-price').html(quantity * unitPrice);
        calculateTotal();
        calculateTotalAmount();

    }); //end of product quantity change

    $('body').on('keyup focus', '.discount', function () {
        calculateTotalAmount();
    }); //end of product quantity change

    /// add input when selected debt
    $('#select').change(function () {
        if ($('#select option:selected').text() == "debt") {
            $('#rest').show();
        } else {
            $('#rest').hide();
        }
    });

}); //end of document ready

function calculateTotal() {

    var price = 0;

    $('.order-list .product-price').each(function (index) {

        price += parseInt($(this).html());

    }); //end of product price

    //$('.total-price').html(price);
    $('.total-price').val(price);

} //end of calculate total
function calculateTotalAmount() {

    var total = $('.total-price').val();
    var discount = $('#discount').val();
    var total_amount = total - discount;
    $('#total-amount').val(total_amount);

} //end of calculate total Amount
