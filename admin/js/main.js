

$(function () {
    $("#add_category_button").click(function (e) {
        e.preventDefault();

        $.post("ajax.php", {
            action: 'add_category',
            data: $("#add_category_form").serialize()
        },
        function (result) {
            if (result.status == 'success') {
                $(".modal-message").html('<div class="alert alert-success">'+ result.msg +' <i class="fas fa-sync fa-spin"></i></div>');

                setTimeout(() => {
                    location.reload();
                }, 1300);
            } else {
                $(".modal-message").html('<div class="alert alert-danger">'+ result.msg +'</div>');
            }
        }

        );
    });
    $(".delete-category").click(function (e) {
        let confirmation = confirm("Do you want to delete this category ?");
        if (!confirmation) {
            e.preventDefault();
        }
    });

    $('[data-target="#edit_category"]').click(function (e) {
        $button = $(e.currentTarget);

        $('[name="category_id"]').val($button.data('id'));
        $('[name="category_name"]').val($button.data('name'));
    });


    $("#update_category_button").click(function (e) {
        e.preventDefault();

        $.post("ajax.php", {
            action: 'update_category',
            data: $("#edit_category_form").serialize()
        },
        function (result) {
            if (result.status == 'success') {
                $(".modal-message").html('<div class="alert alert-success">'+ result.msg +' <i class="fas fa-sync fa-spin"></i></div>');

                setTimeout(() => {
                    location.reload();
                }, 1300);
            } else {
                $(".modal-message").html('<div class="alert alert-danger">'+ result.msg +'</div>');
            }
        }

        );
    });

    $("#add_product_button").click(function (e) {
        e.preventDefault();

        $.post("ajax.php", {
            action: 'add_product',
            data: $("#add_product_form").serialize()
        },
        function (result) {
            if (result.status == 'success') {
                $(".modal-message").html('<div class="alert alert-success">'+ result.msg +' <i class="fas fa-sync fa-spin"></i></div>');

                setTimeout(() => {
                    location.reload();
                }, 1300);
            } else {
                $(".modal-message").html('<div class="alert alert-danger">'+ result.msg +'</div>');
            }
        }

        );
    });
});