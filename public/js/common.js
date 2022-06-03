$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
function ajaxAddCart() {
    $('.add-cart').click(function () {
        const url = $(this).data('url');
        console.log(url);
        $.ajax({
                url: url,
                dataType: "json",
                type: "get",
                async: true,
                data: {},
                success: function (data) {
                    alert(data.message);
                    setTimeout(
                        function () {
                            location.reload();
                        }, 500);
                },
                error: function (xhr, exception) {
                    console.log(exception);
                },
            }
        )
    })
}

function ajaxRemoveCart() {
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
                    setTimeout(
                        function () {
                            location.reload();
                        }, 500);
                },
                error: function (xhr, exception) {
                    console.log(exception);
                },
            }
        )
    })
}
