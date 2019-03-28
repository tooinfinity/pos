$(document).ready(function () {
    //var i = 1;
    $('.add-product-btn').on('click', function (e) {

        e.preventDefault();
        var name = $(this).data('name');
        var id = $(this).data('id');
        var price = $(this).data('price');

        $(this).removeClass('btn-success').addClass('btn-default disabled');
        var html =
            `<tr class="form-group">
                <td>${id}</td>
                <td class="namex">${name}</td>
                <input type="hidden" name="productids[]" value="${id}">
                <td><input type="number" name="quantities[]" data-price="${price}" id="qty" class="form-control input-sm product-quantity" min="1" value="1"></td>
                <td class="product-price">${price}</td>
                <td><button type="button" class="btn btn-danger btn-sm remove-product-btn" data-id="${id}"><span class="fa fa-trash"></span></button></td>
            </tr>`;
        $('.order-list').append(html);
        calculateTotal();
        calculateTotalAmount();
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

    $('body').on('keyup focus', '.product-quantity', function () {

        var quantity = parseInt($(this).val()); //2
        var unitPrice = $(this).data('price'); //150
        var discount = $('#discount').val();
        $(this).closest('tr').find('.product-price').html(quantity * unitPrice);
        calculateTotal();
        calculateTotalAmount();

    }); //end of product quantity change
    $('body').on('keyup focus', '.discount', function () {
        calculateTotalAmount();
    }); //end of product quantity change
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

} //end of calculate total
