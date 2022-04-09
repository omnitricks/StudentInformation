/* function hide(){
    if (document.getElementById('current-address').checked) {
        document.getElementById("hide").style.display = 'none';
    } else {
        document.getElementById("hide").style.display = 'block';
    }   
} */

// Allows only Numbers [0-9] and Dash [-]
function isNumberKey(evt){
    var key = event.key || event.keyCode;
    var charCode = (evt.which) ? evt.which : key;
    if (charCode != 45 && charCode > 31 && (charCode < 48 || charCode > 57)){
        return false;
    }

    return true;
}

// When checkbox is ticked, copy current address to provincial address
function SameAsCurrent(cb) {
    var street = cb.checked ? document.getElementById("student-street").value : '';
    var town = cb.checked ? document.getElementById("student-town").value : '';
    var district = cb.checked ? document.getElementById("student-district").value : '';


    document.getElementById("student-provincial-street").value = street;
    document.getElementById("student-provincial-town").value = town;
    document.getElementById("student-provincial-district").value = district;
}

// Allows only Numbers [0-9] and Plus [+]
function isPhone(evt){
    var key = event.key || event.keyCode;
    var charCode = (evt.which) ? evt.which : key;
    if (charCode != 43 && charCode > 31 && (charCode < 48 || charCode > 57)){
        return false;
    }

    return true;
}

// document.getElementById('create').addEventListener("click", function() {
// 	document.querySelector('.bg-modal').style.display = "flex";
// });

// document.querySelector('.close').addEventListener("click", function() {
// 	document.querySelector('.bg-modal').style.display = "none";
// });

// jQuery Version of the Pop-up Modal (JS Version Above)
$(".create").on("click", function(){
    $(".bg-modal").css('display', 'flex');;
});

$(".close").on("click", function(){
    $(".bg-modal").hide();
});





// $(".delete").click(function(){
//     var ID = $(this).parents("tr").attr("id");

//     alert(ID);

//     // $(".bg-modal-delete").css('display', 'flex');;



//     if(confirm('Are you sure to remove this record ?'))
//     {
//         $.ajax({
//            url: 'delete.php',
//            type: 'GET',
//            data: {id: ID},
//            error: function() {
//               alert('Something is wrong');
//            },
//            success: function(data) {
//                 $("#"+ID).remove();
//                 alert("Record removed successfully");  
//            }
//         });
//     }
// });


$('.delete').click(function(){
    var id = $(this).parents("tr").attr("id");

    $(".bg-modal-delete").css('display', 'flex');

    $('.confirm').data('id', id); //set the data attribute on the modal button
});



$('.confirm').click(function(){
    var id = $(this).data('id');
    

    $.ajax({
        url: 'delete.php',
        type: 'GET',
        data: {id: id},
        error: function() {
            alert('Something is wrong');
        },
        success: function(data) {
                $(".bg-modal-delete").hide();
                $("#"+ id).remove();
                // alert("Record removed successfully");  
        }
        });

});



$("#cancel").on("click", function(){
    $(".bg-modal-delete").hide();
});