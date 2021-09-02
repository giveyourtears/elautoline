function updatePrice() {
    $('#final_price').text('');
    let auctionPrice = $('#auction_price').val();
    let deliveryPrice = $('#delivery_price').val();
    if (isNaN(auctionPrice)) {
        auctionPrice = 0;
    }
    if (isNaN(deliveryPrice)) {
        deliveryPrice = 0;
    }
    let final_price = +auctionPrice + +deliveryPrice;
    console.log(final_price);
    $('#final_price').text(final_price);
}
$(".type").click(function(){
    $(this).closest('form').submit();
});

$("#auction-form").submit(function (event) {
    event.preventDefault();
    let form = $('#auction-form')[0];
    let data = new FormData(form);
    $.ajax({
        type: "POST",
        url: '/calc/resultAuction',
        data: data,
        processData: false,
        contentType: false,
        cache: false,
        timeout: 6000,
        success: function (response) {
            $('#auction_price').val(JSON.parse(response));
            updatePrice();
        },
        error: function (response) {
        }
    });
});
$("#online-form").submit(function (event) {
    event.preventDefault();
    let form = $('#online-form')[0];
    let data = new FormData(form);
    $.ajax({
        type: "POST",
        url: '/calc/resultDelivery',
        data: data,
        processData: false,
        contentType: false,
        cache: false,
        timeout: 6000,
        success: function (response) {
            $('#delivery_price').val(JSON.parse(response));
            updatePrice();
        },
        error: function (response) {
        }
    });
});
