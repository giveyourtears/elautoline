function updatePrice() {
    $('#final_price').text('');
    let auctionPrice = +$('#auction_price').text();
    let price_car = +$('#price').val();
    let deliveryPrice = +$('#delivery_price').text();
    if (isNaN(auctionPrice)) {
        auctionPrice = 0;
    }
    if (isNaN(price_car)) {
        price_car = 0;
    }
    if (isNaN(deliveryPrice)) {
        deliveryPrice = 0;
    }
    let final_price = +auctionPrice + +deliveryPrice + price_car;
    console.log(final_price);
    $('#final_price').text(final_price);
}

function auctionPrice() {
    if ($("#price").val() === "" || isNaN($("#price").val())) {
        $('#car_block').css("display", "none")
    }
    $('#final_price').text('');
    let auctionPrice = +$('#auction_price').text();
    if (isNaN(auctionPrice)) {
        auctionPrice = 0;
    }
    $('#auction_block').css("display", "flex")
    $('#auction_price').text(auctionPrice);
    $('#car_block').css("display", "flex")
    $('#car_price').text($("#price").val());
    if (!isNaN(+$('#delivery_price').text()) && $('#delivery_price').text() !== "" && $('#auction_price').text() !== "" && !isNaN(+$('#auction_price').text())) {
        updatePrice();
    }
}

function deliveryPrice() {
    $('#final_price').text('');
    let deliveryPrice = +$('#delivery_price').text();
    if (isNaN(deliveryPrice)) {
        deliveryPrice = 0;
    }
    $('#delivery_block').css("display", "flex")
    $('#delivery_price').text(deliveryPrice);
    if (!isNaN(+$('#delivery_price').text()) && $('#delivery_price').text() !== "" && $('#auction_price').text() !== "" && !isNaN(+$('#auction_price').text())) {
        updatePrice();
    }
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
            $('#auction_price').text(JSON.parse(response));
            auctionPrice();
        },
        error: function (response) {
            $('#auction_block').css("display", "none")
            $('#auction_price').text("")
            $('#final_price').text("")
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
            $('#delivery_price').text(JSON.parse(response));
            deliveryPrice();
        },
        error: function () {
            $('#delivery_block').css("display", "none")
            $('#delivery_price').text("")
            $('#final_price').text("")
        }
    });
});
