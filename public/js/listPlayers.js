$(document).ready(function () {
    console.log('hello');
    
    let offset = 0;
    const $tbody = $('#tbody');
    $.ajax({
        url: "traitements/playerController.php",
        method: "POST",
        data: {limit: 10, offset: offset},
        dataType: "JSON",
        success: function (data) {
            console.log(data);    
            $tbody.html('');
            printData(data, $tbody);
            offset +=10
        },
        error: function (data) {
            console.log(data);   
        }
    })
})

//add row for players fetched from DB
function printData(data, tbody){
    $.each(data, function(player){
        tbody.append(`
        <tr class="text-center">
            <td>${player.surname}</td>
            <td>${player.firstname}</td>
            <td>${player.score}</td>
            <td class="center"><i class="fa fa-edit" aria-hidden="true"></td>
            <td class="center"><i class="fa fa-lock" aria-hidden="true"></i></td>
        </tr>
        `);
    });
}