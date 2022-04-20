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
function SameAsCurrentCreate(cb) {
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
$(".create").click(function(){
    $(".bg-modal").css('display', 'flex');
    $('body').css('overflow', 'hidden');
});

$('.submit').click(function(){
    var $registerFormCreate = $('#studentInformationCreate');
    if($registerFormCreate.length){
        $registerFormCreate.validate({
            rules:{
                "student-number":{
                    required: true
                },
                "student-surname":{
                    required: true
                },
                "student-first-name":{
                    required: true
                },
                "student-middle-initial":{
                    required: true
                },
                "student-birthdate":{
                    required: true
                },
                "student-gender":{
                    required: true
                },
                "student-street":{
                    required: true
                },
                "student-town":{
                    required: true
                },
                "student-district":{
                    required: true
                },
                "student-provincial-street":{
                    required: true
                },
                "student-provincial-town":{
                    required: true
                },
                "student-provincial-district":{
                    required: true
                },
                "student-phone-number":{
                    required: true
                },
                "student-telephone-number":{
                    required: false
                },
                "student-email":{
                    required: true,
                    email: true
                },
                "guardian-name":{
                    required: true
                },
                "guardian-phone-number":{
                    required: true
                },
                "guardian-telephone-number":{
                    required: false
                },
            },
            groups:{
                "student-name": "student-surname student-first-name student-middle-initial",

                "student-address":  "student-street student-town student-district",

                "student-provincial-address": "student-provincial-street student-provincial-town student-provincial-district",

                "student-guardian": "guardian-name guardian-phone-number"
            },
            messages:{
                "student-number":{
                    required: ' Student Number is required'
                },
                "student-surname":{
                    required: ' Student Name is required'
                },
                "student-first-name":{
                    required: ' Student Name is required'
                },
                "student-middle-initial":{
                    required: ' Student Name is required'
                },
                "student-birthdate":{
                    required: ' Student Birthdate is required'
                },
                "student-gender":{
                    required: ' Student Gender is required'
                },
                "student-street":{
                    required: ' Student Address is required'
                },
                "student-town":{
                    required: ' Student Address is required'
                },
                "student-district":{
                    required: ' Student Address is required'
                },
                "student-provincial-street":{
                    required: ' Student Provincial Address is required'
                },
                "student-provincial-town":{
                    required: ' Student Provincial Address is required'
                },
                "student-provincial-district":{
                    required: ' Student Provincial Address is required'
                },
                "student-phone-number":{
                    required: ' Student Phone Number is required'
                },
                "student-email":{
                    required: ' Student Email is required',
                    email: " Student Email is invalid"
                },
                "guardian-name":{
                    required: ' Guardian Details is required'
                },
                "guardian-phone-number":{
                    required: ' Guardian Details is required'
                },
            },
            errorPlacement: function(error, element) {
                if (element.attr("name") == "student-surname" || element.attr("name") == "student-first-name" || element.attr("name") == "student-middle-initial") {
                    error.insertAfter(".student-name-label");

                } else if(element.is(":radio") ) {
                    error.insertAfter(".student-gender-label");

                }else if (element.attr("name") == "student-street" || element.attr("name") == "student-town" || element.attr("name") == "student-district") {
                    error.insertAfter(".student-address-label");

                } else if (element.attr("name") == "student-provincial-street" || element.attr("name") == "student-provincial-town" || element.attr("name") == "student-provincial-district") {
                    error.insertAfter(".student-provincial-address-label");

                } else if (element.attr("name") == "student-phone-number") {
                    error.insertAfter("#student-telephone-number");

                } else if (element.attr("name") == "guardian-name" || element.attr("name") == "guardian-phone-number") {
                    error.insertAfter(".student-guardian-label");

                } else {
                    error.insertAfter(element);

                }

            }
        })
    }

    var formDataCreate = $('#studentInformationCreate').serialize();
    $.ajax({
        url: 'insert.php',
        type: 'POST',
        data: formDataCreate,
        error: function() {
            alert('Something is wrong');
        },
        success: function(data) {
            
        }
    });
});

$(".close").click(function(){
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

$("#cancel").click(function(){
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

$('.update').click(function(){
    var $registerFormEdit = $('#studentInformationEdit');
    if($registerFormEdit.length){
        $registerFormEdit.validate({
            rules:{
                "student-number-edit":{
                    required: true
                },
                "student-surname-edit":{
                    required: true
                },
                "student-first-name-edit":{
                    required: true
                },
                "student-middle-initial-edit":{
                    required: true
                },
                "student-birthdate-edit":{
                    required: true
                },
                "student-gender-edit":{
                    required: true
                },
                "student-street-edit":{
                    required: true
                },
                "student-town-edit":{
                    required: true
                },
                "student-district-edit":{
                    required: true
                },
                "student-provincial-street-edit":{
                    required: true
                },
                "student-provincial-town-edit":{
                    required: true
                },
                "student-provincial-district-edit":{
                    required: true
                },
                "student-phone-number-edit":{
                    required: true
                },
                "student-telephone-number-edit":{
                    required: false
                },
                "student-email-edit":{
                    required: true,
                    email: true
                },
                "guardian-name-edit":{
                    required: true
                },
                "guardian-phone-number-edit":{
                    required: true
                },
                "guardian-telephone-number-edit":{
                    required: false
                },
            },
            groups:{
                "student-name-edit": "student-surname-edit student-first-name-edit student-middle-initial-edit",

                "student-address-edit":  "student-street-edit student-town-edit student-district-edit",

                "student-provincial-address-edit": "student-provincial-street-edit student-provincial-town-edit student-provincial-district-edit",

                "student-guardian-edit": "guardian-name-edit guardian-phone-number-edit"
            },
            messages:{
                "student-number-edit":{
                    required: ' Student Number is required'
                },
                "student-surname-edit":{
                    required: ' Student Name is required'
                },
                "student-first-name-edit":{
                    required: ' Student Name is required'
                },
                "student-middle-initial-edit":{
                    required: ' Student Name is required'
                },
                "student-birthdate-edit":{
                    required: ' Student Birthdate is required'
                },
                "student-gender-edit":{
                    required: ' Student Gender is required'
                },
                "student-street-edit":{
                    required: ' Student Address is required'
                },
                "student-town-edit":{
                    required: ' Student Address is required'
                },
                "student-district-edit":{
                    required: ' Student Address is required'
                },
                "student-provincial-street-edit":{
                    required: ' Student Provincial Address is required'
                },
                "student-provincial-town-edit":{
                    required: ' Student Provincial Address is required'
                },
                "student-provincial-district-edit":{
                    required: ' Student Provincial Address is required'
                },
                "student-phone-number-edit":{
                    required: ' Student Phone Number is required'
                },
                "student-email-edit":{
                    required: ' Student Email is required',
                    email: " Student Email is invalid"
                },
                "guardian-name-edit":{
                    required: ' Guardian Details is required'
                },
                "guardian-phone-number-edit":{
                    required: ' Guardian Details is required'
                },
            },
            errorPlacement: function(error, element) {
                if (element.attr("name") == "student-surname-edit" || element.attr("name") == "student-first-name-edit" || element.attr("name") == "student-middle-initial-edit") {
                    error.insertAfter(".student-name-label-edit");

                } else if(element.is(":radio") ) {
                    error.insertAfter(".student-gender-label-edit");

                }else if (element.attr("name") == "student-street-edit" || element.attr("name") == "student-town-edit" || element.attr("name") == "student-district-edit") {
                    error.insertAfter(".student-address-label-edit");

                } else if (element.attr("name") == "student-provincial-street-edit" || element.attr("name") == "student-provincial-town-edit" || element.attr("name") == "student-provincial-district-edit") {
                    error.insertAfter(".student-provincial-address-label-edit");

                } else if (element.attr("name") == "student-phone-number-edit") {
                    error.insertAfter("#student-telephone-number-edit");

                } else if (element.attr("name") == "guardian-name-edit" || element.attr("name") == "guardian-phone-number-edit") {
                    error.insertAfter(".student-guardian-label-edit");

                } else {
                    error.insertAfter(element);

                }

            }
        })
    }

    var formDataEdit = $('#studentInformationEdit').serialize();
    $.ajax({
        url: 'update.php',
        type: 'GET',
        data: formDataEdit,
        error: function() {
            alert('Something is wrong');
        },
        success: function(data) {

        }
    });
});

$(".close").click(function(){
    $(".bg-modal-edit").hide();
    $('body').css('overflow', 'auto');
});