$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
function ajaxAddCart() {
    $('.add-cart').click(function () {
        let url = $(this).data('url');;
        $.ajax({
                url: url,
                dataType: "json",
                type: "get",
                async: true,
                data: {},
                success: function (data) {
                    alert(data.message);
                    const html = $(".number_cart");
                     url = "http://localhost/jkshop/gio-hang/number";
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                        }
                    });
                    $.ajax({
                        url: url,
                        dataType: "json",
                        type: "get",
                        async: true,
                        data: {},
                        success: function (data) {
                            console.log(data);
                            html.html(data.number);
                        },
                        error: function (xhr, exception) { }
                    });
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
                    const html = $(".number_cart");
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                        }
                    });
                    $.ajax({
                        url: url,
                        dataType: "json",
                        type: "get",
                        async: true,
                        data: {},
                        success: function (data) {
                            console.log(data);
                            html.html(data.number);
                        },
                        error: function (xhr, exception) {
                            console.log(exception);
                         }
                    });
                },
                error: function (xhr, exception) {
                    console.log(exception);
                },
            }
        )
    })
}
