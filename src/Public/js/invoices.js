function showInvoices() {
    const apiUrl = "http://localhost:8000";
    const $list = $('.invoices-list');

    $.ajax({
        url : apiUrl + '/?page=invoices',
        dataType : 'json'
    })
        .done((res) => {
            $list.empty();

            res.forEach(el => {
                $list.append(`<tr>
                        <td>
                            <button><i class="far fa-file-pdf"></i></button>
                        </td>
                        <td>${el.name}</td>
                        <td>${el.making_date}</td>
                        <td>${el.amount}</td>
                        <td>${el.payment_date}</td>
                        <td>
                            <button><i class="fas fa-angle-right"></i></button>
                        </td>
                    </tr>
                    <tr>`);
            });
        });
}