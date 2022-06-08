$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function ajaxAddCart() {
    $('.add-cart').click(function () {
        let url = $(this).data('url');
        let productId = $(this).data('id');
        $.ajax({
                url: url,
                dataType: "json",
                type: "get",
                async: true,
                data: {},
                success: function (data) {
                    alert(data.message);
                    document.getElementById(productId).value = data.number;
                    $('.number_cart').html(data.number);
                },
                error: function (xhr, exception) {
                    console.log(exception);
                },
            }
        )
    })
}

function ajaxRemoveCart(url) {
    $('.icon_close').click(function () {
        const productId = $(this).data('id');
        const url = $(this).data('url');
        $.ajax({
                url: url,
                dataType: "json",
                type: "post",
                async: true,
                data: {
                    productId: productId,
                },
                success: function (data) {
                    alert(data.message);
                    document.getElementById(productId).value = data.number;
                    $('.number_cart').html(data.number);
                },
                error: function (xhr, exception) {
                    console.log(exception);
                },
            }
        )
    })
}
