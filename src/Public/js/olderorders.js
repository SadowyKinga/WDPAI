function getAllOrders() {
    const apiUrl = "http://localhost:8000";
    const $list = $('.olderorders-list');

    $.ajax({
        url : apiUrl + '/?page=olderorders',
        dataType : 'json'
    })
        .done((res) => {
            $list.empty();

            res.forEach(el => {
                $list.append(`<tr>
                        <td>${el.id_order}</td>
                        <td>${el.making_date}</td>
                        <td>${el.delivery_date}</td>
                        <td>${el.shop_name}</td>
                        <td>${el.name_surname}</td>
                        <td>${el.name}</td>
                        </tr>`);
            });
        });
}