document.addEventListener("DOMContentLoaded", function(event) {
    const headers = document.getElementsByClassName("select");

    [].forEach.call(headers, el => {
        el.addEventListener("click", e => {
            let list = $(e.currentTarget).next().find('ul');

            $.ajax({
                type: "GET",
                url: '/ProducerFilter',
                data: {
                    id: e.currentTarget.value
                },
                success: function(data) {
                    list.html(data);
                    e.target.nextElementSibling.classList.toggle("hidden");
                }
            });
        });
    });
});