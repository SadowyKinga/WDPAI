function getWorkers() {
    const apiUrl = "http://localhost:8000";
    const $div = $('.wrap');

    $.ajax({
        url: apiUrl + '/?page=workers',
        dataType: 'json'
    })
        .done((res) => {
            $div.empty();
            res.forEach(el => {
                $div.append(`
<div>
<button class="delbut" type="button"
                onclick="deleteWorker(${el.id_worker})">
                <i class="fas fa-times"></i>
            </button>
                <div class="prof">
                <img src="${el.path}" alt="Brak zdjęcia">
                </div>
                <div class="opis">
            <h1>${el.name_surname}</h1>
            <p>${el.name}</p>
            </div>
            </div>
               `);
            });
        });
}

function deleteWorker(id_worker) {
    if (!confirm('Czy na pewno chcesz usunąć pracownika?')) {
        return;
    }
    const apiUrl = "http://localhost:8000";
    $.ajax({
        url: apiUrl + '/?page=delete_worker',
        method: "POST",
        data: {
            id_worker: id_worker
        },
        success: function () {
            alert('Wybrany pracownik został usunięty z bazy danych');
            getWorkers();
        }
    });
}

function AddWorker() {
    if (!confirm('Czy na pewno chcesz dodać pracownika?')) {
        return;
    }
    const apiUrl = "http://localhost:8000";
    $.ajax({
        url: apiUrl + '/?page=startworkers',
        method: "POST",
        data: {
            name_surname: name_surname,
            id_position: id_position,
            email: email,
            path_to_pic: path_to_pic,
            payment: payment
        },
        success: function () {
            alert('Wybrany pracownik został dodany');
            getWorkers();
        }
    });
}

function openModal() {
    document.getElementById('mod').style.display='block';
}

 function Delete() {
     var buttons = document.getElementsByClassName("delbut");

     Array.from(buttons).forEach(child => {
         child.style.visibility='visible';
     });
 }
