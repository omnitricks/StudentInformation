// Allows only Numbers [0-9] and Dash [-]
function isNumberKey(evt){
    var key = event.key || event.keyCode;
    var charCode = (evt.which) ? evt.which : key;
    if (charCode != 45 && charCode > 31 && (charCode < 48 || charCode > 57)){
        return false;
    }

    return true;
}

// When checkbox is ticked, copy current address to provincial address (Create Modal)
function SameAsCurrent(cb) {
    var street = cb.checked ? document.getElementById("student-street").value : '';
    var town = cb.checked ? document.getElementById("student-town").value : '';
    var district = cb.checked ? document.getElementById("student-district").value : '';


    document.getElementById("student-provincial-street").value = street;
    document.getElementById("student-provincial-town").value = town;
    document.getElementById("student-provincial-district").value = district;
}

// When checkbox is ticked, copy current address to provincial address (Edit Modal)
function SameAsCurrentEdit(cb) {
    var street = cb.checked ? document.getElementById("student-street-edit").value : '';
    var town = cb.checked ? document.getElementById("student-town-edit").value : '';
    var district = cb.checked ? document.getElementById("student-district-edit").value : '';


    document.getElementById("student-provincial-street-edit").value = street;
    document.getElementById("student-provincial-town-edit").value = town;
    document.getElementById("student-provincial-district-edit").value = district;
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



// jQuery Version of the Insert Pop-up Modal
$(".create").on("click", function(){
    $(".bg-modal").css('display', 'flex');
    $('body').css('overflow', 'hidden');
});

$('#submit').click(function(){
    var formData1 = $('#studentInformation').serialize();

    $.ajax({
        url: 'insert.php',
        type: 'POST',
        data: formData1,
        error: function() {
            alert('Something is wrong');
        },
        success: function(data) {

        }
    });

    // e.preventDefault();
});

$(".close").on("click", function(){
    $(".bg-modal").hide();
    $('body').css('overflow', 'auto');
});




// jQuery Version of the Delete Pop-up Modal & Delete function
$('.delete').click(function(){
    var id = $(this).parents("tr").attr("id");

    $(".bg-modal-delete").css('display', 'flex');
    $('body').css('overflow', 'hidden');

    $('.confirm').data('id', id); //set the data attribute on the modal button
});

$('.confirm').click(function(){
    var id = $(this).data('id');

    $.ajax({
        url: 'delete.php',
        type: 'GET',
        data: 'id=' + id,
        error: function() {
            alert('Something is wrong');
        },
        success: function(data) {
            $("#"+ id).remove();
            // Needs this because there's a bug that does not show message when not refreshed
            location.reload(true);
        }
    });
    // e.preventDefault();
    $(".bg-modal-delete").hide();
});

$("#cancel").on("click", function(){
    $(".bg-modal-delete").hide();
    $('body').css('overflow', 'auto');
});



// jQuery Version of the Edit Pop-up Modal & Edit function
$('.edit').click(function(){
    var id = $(this).parents("tr").attr("id");

    $(".bg-modal-edit").css('display', 'flex');
    $('body').css('overflow', 'hidden');

    $.ajax({
        url: 'fetch.php',
        type: 'get',
        data: {id: id},
        dataType: 'json',
        error: function() {
            alert('Something is wrong');
        },
        success: function(data) {
            $('#id-edit').val(data[0]);
            $('#student-number-edit').val(data[1]);
            $('#student-surname-edit').val(data[2]);
            $('#student-first-name-edit').val(data[3]);
            $('#student-middle-initial-edit').val(data[4]);
            $('#student-birthdate-edit').val(data[5]);
            $('input[name^="student-gender-edit"][value="'+data[6]+'"').prop('checked',true);
            $('#student-street-edit').val(data[7]);
            $('#student-town-edit').val(data[8]);
            $('#student-district-edit').val(data[9]);
            $('#student-provincial-street-edit').val(data[10]);
            $('#student-provincial-town-edit').val(data[11]);
            $('#student-provincial-district-edit').val(data[12]);
            $('#student-phone-number-edit').val(data[13]);
            $('#student-telephone-number-edit').val(data[14]);
            $('#student-email-edit').val(data[15]);
            $('#guardian-name-edit').val(data[16]);
            $('#guardian-phone-number-edit').val(data[17]);
            $('#guardian-telephone-number-edit').val(data[18]);
            $('#student-remark-edit').val(data[19]);
            $('#student-sponsor-edit').val(data[20]);
            $('#student-hs-address-edit').val(data[21]);

        }
    });
});

$('#update').click(function(){
    var formData = $('#studentInformation-edit').serialize();

    $.ajax({
        url: 'update.php',
        type: 'GET',
        data: formData,
        error: function() {
            alert('Something is wrong');
        },
        success: function(data) {

        }
    });
});

$(".close").on("click", function(){
    $(".bg-modal-edit").hide();
    $('body').css('overflow', 'auto');
});