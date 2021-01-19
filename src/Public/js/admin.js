function getUsers() {
    const apiUrl = "http://localhost:8000";
    const $list = $('.users-list');

    $.ajax({
        url : apiUrl + '/?page=users',
        dataType : 'json'
    })
        .done((res) => {
            $list.empty();

            res.forEach(el => {
                $list.append(`<tr>
                        <td>${el.id_user}</td>
                        <td>${el.email}</td>
                        <td>${el.name_surname}</td>
                        <td>${el.name}</td>
                        </tr>`);
            });
        });
}