document.addEventListener("DOMContentLoaded", function(event) {
    const elm = document.getElementsByClassName("select");

    [].forEach.call(elm, el => {
        el.addEventListener("click", e => {
            let list = $(e.currentTarget).find('option');

            $.ajax({
                type: "GET",
                url: '/Movies/',
                data: {
                    producer_id: e.currentTarget.value
                },
                success: function(data) {
                    list.html(data);
                }
            });
        });
    });
});
