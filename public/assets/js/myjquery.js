$(document).ready(function () {
    // Handle adding items to the order
    $('.add-item').click(function () {
        let itemName = $(this).siblings('p').text();
        let itemPrice = $(this).parent().data('price');
        $('#order-items').append(`<li>${itemName}</li>`);

        // Update total price (example logic, you can modify)
        let totalPrice = parseFloat($('#total-price').text().replace('Rp. ', ''));
        $('#total-price').text(`Rp. ${(totalPrice + itemPrice).toFixed(3)}`);
    });

    // Category filter functionality
    $('.category-btn').click(function () {
        let category = $(this).data('category');
        $('.category-btn').removeClass('active');
        $(this).addClass('active');

        if (category === 'all') {
            $('.menu-items .item').show();
        } else {
            $('.menu-items .item').hide();
            $(`.menu-items .item[data-category="${category}"]`).show();
        }
    });

    // Handling order submission
    $('#send-order').click(function () {
        alert("Order Sent!");
        // Logic to send the order data to the server
    });


});



