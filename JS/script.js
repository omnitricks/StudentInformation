// Allows only Numbers [0-9] and Dash [-]
function isNumberKey(evt){
    var key = event.key || event.keyCode;
    var charCode = (evt.which) ? evt.which : key;
    if (charCode != 45 && charCode > 31 && (charCode < 48 || charCode > 57)){
        return false;
    }

    return true;
}

// Allows only Numbers [0-9] and Dash [#]
function isHouseNumber(evt){
    var key = event.key || event.keyCode;
    var charCode = (evt.which) ? evt.which : key;
    if (charCode != 35 && charCode > 31 && (charCode < 48 || charCode > 57)){
        return false;
    }

    return true;
}

// When checkbox is ticked, copy current address to provincial address (Create Modal)
function SameAsCurrentCreate(cb) {
    var housenumber = cb.checked ? document.getElementById("student-house-number").value : '';
    var street = cb.checked ? document.getElementById("student-street").value : '';
    var subdivision = cb.checked ? document.getElementById("student-subdivision").value : '';
    var barangay = cb.checked ? document.getElementById("student-barangay").value : '';
    var town = cb.checked ? document.getElementById("student-town").value : '';
    var district = cb.checked ? document.getElementById("student-district").value : '';


    document.getElementById("student-provincial-house-number").value = housenumber;
    document.getElementById("student-provincial-street").value = street;
    document.getElementById("student-provincial-subdivision").value = subdivision;
    document.getElementById("student-provincial-barangay").value = barangay;
    document.getElementById("student-provincial-town").value = town;
    document.getElementById("student-provincial-district").value = district;
}

// When checkbox is ticked, copy current address to provincial address (Edit Modal)
function SameAsCurrentEdit(cb) {
    var housenumber = cb.checked ? document.getElementById("student-house-number-edit").value : '';
    var street = cb.checked ? document.getElementById("student-street-edit").value : '';
    var subdivision = cb.checked ? document.getElementById("student-subdivision-edit").value : '';
    var barangay = cb.checked ? document.getElementById("student-barangay-edit").value : '';
    var town = cb.checked ? document.getElementById("student-town-edit").value : '';
    var district = cb.checked ? document.getElementById("student-district-edit").value : '';


    document.getElementById("student-provincial-house-number-edit").value = housenumber;
    document.getElementById("student-provincial-street-edit").value = street;
    document.getElementById("student-provincial-subdivision-edit").value = subdivision;
    document.getElementById("student-provincial-barangay-edit").value = barangay;
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

// Changes format of date from YYYY-MM-DD to Month Day, Year
function BirthdateWord(data){
    var res = data.split("-"); // turn the date into a list format (Split by / if needed)
    var months = ["January", "February", "March", "April", "May", "June", "July", 
        "August", "September", "October", "November", "December"]; // empty first value because it starts at 0
    var wordMonth = months[res[1]-1] // month name 
    var date = wordMonth + " " + res[2] + ", " + res[0];
    return date;
}

// Checks if input is blank and if true changes blank into "N/A"
function isOptional(data){
    if(data == ""){
        data = "N/A";
    }

    return data;
}

// Checks if input contains "#", if true it returns it, if false it adds "#" to the data and returns it
function containsHashtag(data){
    if(data.indexOf("#") != -1){
        return data;
    }else{
        var newData = "#" + data;
        return newData;
    }
}

// When checkbox is ticked, input into "" remarks (Create Modal)
function AddressNotFoundCreate(cb) {
    var remark = document.getElementById("student-remark").value;

    var add = "•Address not found";
    var addressNotFound = cb.checked ? add : '';

    var newRemark = remark + addressNotFound + "\r\n";
    
    if(remark.indexOf(add) != -1){
        return;

    }else{
        return document.getElementById("student-remark").value = newRemark;

    }
}

// When checkbox is ticked, input into "" remarks (Create Modal)
function UnableToReachCreate(cb) {
    var remark = document.getElementById("student-remark").value;

    var add = "•Unable to reach Contact Number";
    var unableToReach = cb.checked ? add : '';

    var newRemark = remark + unableToReach + "\r\n";

    if(remark.indexOf(add) != -1){
        return;

    }else{
        return document.getElementById("student-remark").value = newRemark;

    }
}

// When checkbox is ticked, input into "" remarks (Update Modal)
function AddressNotFoundEdit(cb) {
    var remark = document.getElementById("student-remark-edit").value;

    var add = "•Address not found";
    var addressNotFound = cb.checked ? add : '';

    var newRemark = remark + addressNotFound + "\r\n";
    
    if(remark.indexOf(add) != -1){
        return;

    }else{
        return document.getElementById("student-remark-edit").value = newRemark;

    }
}

// When checkbox is ticked, input into "" remarks (Update Modal)
function UnableToReachEdit(cb) {
    var remark = document.getElementById("student-remark-edit").value;

    var add = "•Unable to reach Contact Number";
    var unableToReach = cb.checked ? add : '';

    var newRemark = remark + unableToReach + "\r\n";

    if(remark.indexOf(add) != -1){
        return;

    }else{
        return document.getElementById("student-remark-edit").value = newRemark;

    }
}

// Detect changes in form
function DetectChanges(unmodified, modified){
    if(unmodified == modified){
        return false;
    } else{
        return true;
    }
}


$(document).ready(function(){
    // Checks for changes in the Edit/ Update Form
    function Changes(){
        var $blank = "";

        var $studentNumber = "";
        var $studentCourse = "";
        var $studentSurname = "";
        var $studentFirstName = "";
        var $studentMiddleInitial = "";
        var $studentBirthdate = "";
        var $studentGender = "";
        var $studentHouseNumber = "";
        var $studentStreet = "";
        var $studentSubdivision = "";
        var $studentBarangay = "";
        var $studentTown = "";
        var $studentDistrict = "";
        var $studentProvincialHouseNumber = "";
        var $studentProvincialStreet = "";
        var $studentProvincialSubdivision = "";
        var $studentProvincialBarangay = "";
        var $studentProvincialTown = "";
        var $studentProvincialDistrict = "";
        var $studentContactNumber = "";
        var $studentEmail = "";
        var $guardianName = "";
        var $guardianContactNumber = "";
        var $studentRemark = "";
        var $studentSponsor = "";
        var $studentHighSchoolAddress = "";
        var $studentCompanyName = "";
        var $studentCompanyAddress = "";
        var $studentCompanyPosition = "";
        var $studentCompanyContactNumber = "";



        $studentNumber = DetectChanges($('#student-number-edit').val(), $('#student-number-edit-hidden').val());
        $studentCourse = DetectChanges($('#student-course-edit').val(), $('#student-course-edit-hidden').val());
        $studentSurname = DetectChanges($('#student-surname-edit').val(), $('#student-surname-edit-hidden').val());
        $studentFirstName = DetectChanges($('#student-first-name-edit').val(), $('#student-first-name-edit-hidden').val());
        $studentMiddleInitial = DetectChanges($('#student-middle-initial-edit').val(), $('#student-middle-initial-edit-hidden').val());
        $studentBirthdate = DetectChanges($('#student-birthdate-edit').val(), $('#student-birthdate-edit-hidden').val());
        $studentGender = DetectChanges($("input[name='student-house-number-edit']:checked").val(), $("#student-gender-edit-hidden").val());
        $studentHouseNumber = DetectChanges($('#student-house-number-edit').val(), $('#student-house-number-edit-hidden').val());
        $studentStreet = DetectChanges($('#student-street-edit').val(), $('#student-street-edit-hidden').val());
        $studentSubdivision = DetectChanges($('#student-subdivision-edit').val(), $('#student-subdivision-edit-hidden').val());
        $studentBarangay = DetectChanges($('#student-barangay-edit').val(), $('#student-barangay-edit-hidden').val());
        $studentTown = DetectChanges($('#student-town-edit').val(), $('#student-town-edit-hidden').val());
        $studentDistrict = DetectChanges($('#student-district-edit').val(), $('#student-district-edit-hidden').val());
        $studentProvincialHouseNumber = DetectChanges($('#student-provincial-house-number-edit').val(), $('#student-provincial-house-number-edit-hidden').val());
        $studentProvincialStreet = DetectChanges($('#student-provincial-street-edit').val(), $('#student-provincial-street-edit-hidden').val());
        $studentProvincialSubdivision = DetectChanges($('#student-provincial-subdivision-edit').val(), $('#student-provincial-subdivision-edit-hidden').val());
        $studentProvincialBarangay = DetectChanges($('#student-provincial-barangay-edit').val(), $('#student-provincial-barangay-edit-hidden').val());
        $studentProvincialTown = DetectChanges($('#student-provincial-town-edit').val(), $('#student-provincial-town-edit-hidden').val());
        $studentProvincialDistrict = DetectChanges($('#student-provincial-district-edit').val(), $('#student-provincial-district-edit-hidden').val());
        $studentContactNumber = DetectChanges($('#student-contact-number-edit').val(), $('#student-contact-number-edit-hidden').val());
        $studentEmail = DetectChanges($('#student-email-edit').val(), $('#student-email-edit-hidden').val());
        $guardianName = DetectChanges($('#guardian-name-edit').val(), $('#guardian-name-edit-hidden').val());
        $guardianContactNumber = DetectChanges($('#guardian-contact-number-edit').val(), $('#guardian-contact-number-edit-hidden').val());
        $studentRemark = DetectChanges($('#student-remark-edit').val(), $('#student-remark-edit-hidden').val());
        $studentSponsor = DetectChanges($('#student-sponsor-edit').val(), $('#student-sponsor-edit-hidden').val());
        $studentHighSchoolAddress = DetectChanges($('#student-hs-address-edit').val(), $('#student-hs-address-edit-hidden').val());

        $studentCompanyName = DetectChanges($('#student-company-name-edit').val(), $('#student-company-name-edit-hidden').val());
        $studentCompanyAddress = DetectChanges($('#student-company-address-edit').val(), $('#student-company-address-edit-hidden').val());
        $studentCompanyPosition = DetectChanges($('#student-company-position-edit').val(), $('#student-company-position-edit-hidden').val());
        $studentCompanyContactNumber = DetectChanges($('#student-company-contact-number-edit').val(), $('#student-company-contact-number-edit-hidden').val());


        if($studentNumber || $studentCourse || $studentSurname || $studentFirstName || $studentMiddleInitial || $studentBirthdate || $studentGender || $studentHouseNumber ||$studentStreet || $studentSubdivision || $studentBarangay || $studentTown || $studentDistrict || $studentProvincialHouseNumber || $studentProvincialStreet || $studentProvincialSubdivision || $studentProvincialBarangay || $studentProvincialTown || $studentProvincialDistrict || $studentContactNumber || $studentEmail || $guardianName || $guardianContactNumber || $studentRemark || $studentSponsor || $studentHighSchoolAddress || $studentCompanyName || $studentCompanyAddress || $studentCompanyPosition || $studentCompanyContactNumber){
            return true;
        } else{
            return false;
        }
    }

    // Gets page number, alternative to $_GET method for pagination function in search.php
    function CheckPage(){
        // Gets current url
        var url = window.location.href;
        // Gets page number from the url
        var res = url.split("http://localhost/StudentInformation/PHP/CRUD/index.php?page=");
        var result;
        // if page number is undetected it is equivalent to one
        if(res[1]===undefined){
            result = 1;
        }

        if(res[1]!=undefined){
            if(res[1].indexOf("#") != -1){
                result = res[1].slice(0, res[1].length - 1);
            } else{
                result = res[1];
            }
        }

        return result;
    }



    // jQuery Version of change icon when there is input detected
    $('.data-searchbox').on('input', function() {
        if($(this).val().length) {
            $('.fa-solid:first').removeClass('fa-magnifying-glass');
            $('.fa-solid:first').addClass('fa-arrows-rotate');
        } else {
            $('.fa-solid:first').removeClass('fa-arrows-rotate');
            $('.fa-solid:first').addClass('fa-magnifying-glass');
        }
    });



    // jQuery Version of autohide alerts after 5 seconds
    $('.alert-error').delay(5000).fadeOut('slow');
    $('.alert-success').delay(5000).fadeOut('slow');


    
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
                    "student-course":{
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
                    "student-house-number":{
                        required: true,
                        number: true
                    },
                    "student-street":{
                        required: true
                    },
                    "student-barangay":{
                        required: true
                    },
                    "student-town":{
                        required: true
                    },
                    "student-district":{
                        required: true
                    },
                    "student-provincial-house-number":{
                        required: true,
                        number: true
                    },
                    "student-provincial-street":{
                        required: true
                    },
                    "student-provincial-barangay":{
                        required: true
                    },
                    "student-provincial-town":{
                        required: true
                    },
                    "student-provincial-district":{
                        required: true
                    },
                    "student-contact-number":{
                        required: true
                    },
                    "student-email":{
                        required: true,
                        email: true
                    },
                    "guardian-name":{
                        required: true
                    },
                    "guardian-contact-number":{
                        required: true
                    },
                },
                groups:{
                    "student-name": "student-surname student-first-name student-middle-initial",

                    "student-address":  "student-house-number student-street student-barangay student-town student-district",

                    "student-provincial-address": "student-provincial-house-number student-provincial-street student-provincial-barangay student-provincial-town student-provincial-district",

                    "student-guardian": "guardian-name guardian-contact-number"
                },
                messages:{
                    "student-number":{
                        required: ' Student Number is required'
                    },
                    "student-course":{
                        required: ' Student Course is required'
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
                    "student-house-number":{
                        required: ' Student Address is required',
                        number: ' Student House Number should be numeric only'
                    },
                    "student-street":{
                        required: ' Student Address is required'
                    },
                    "student-barangay":{
                        required: ' Student Address is required'
                    },
                    "student-town":{
                        required: ' Student Address is required'
                    },
                    "student-district":{
                        required: ' Student Address is required'
                    },
                    "student-provincial-house-number":{
                        required: ' Student Provincial Address is required',
                        number: ' Student Provincial House Number should be numeric only'
                    },
                    "student-provincial-street":{
                        required: ' Student Provincial Address is required'
                    },
                    "student-provincial-barangay":{
                        required: ' Student Provincial Address is required'
                    },
                    "student-provincial-town":{
                        required: ' Student Provincial Address is required'
                    },
                    "student-provincial-district":{
                        required: ' Student Provincial Address is required'
                    },
                    "student-contact-number":{
                        required: ' Student Contact Number is required'
                    },
                    "student-email":{
                        required: ' Student Email is required',
                        email: " Student Email is invalid"
                    },
                    "guardian-name":{
                        required: ' Guardian Details is required'
                    },
                    "guardian-contact-number":{
                        required: ' Guardian Details is required'
                    },
                },
                errorPlacement: function(error, element) {
                    if (element.attr("name") == "student-surname" || element.attr("name") == "student-first-name" || element.attr("name") == "student-middle-initial") {
                        error.insertAfter(".student-name-label");

                    } else if(element.is(":radio") ) {
                        error.insertAfter(".student-gender-label");

                    } else if (element.attr("name") == "student-house-number" || element.attr("name") == "student-street" || element.attr("name") == "student-barangay" || element.attr("name") == "student-town" || element.attr("name") == "student-district") {
                        error.insertAfter(".student-address-label");

                    } else if (element.attr("name") == "student-provincial-house-number" || element.attr("name") == "student-provincial-street" || element.attr("name") == "student-provincial-barangay" || element.attr("name") == "student-provincial-town" || element.attr("name") == "student-provincial-district") {
                        error.insertAfter(".student-provincial-address-label");

                    } else if (element.attr("name") == "guardian-name" || element.attr("name") == "guardian-contact-number") {
                        error.insertAfter(".student-guardian-label");

                    } else {
                        error.insertAfter(element);

                    }

                }
            })
        }

        //Serialize form as array
        var form = $('#studentInformationCreate');
        var serializedForm = form.serializeArray();
        //trim values
        serializedForm.forEach(o => o.value = jQuery.trim(o.value));
        //turn it into a string if you wish
        serializedForm = $.param(serializedForm);

        $.ajax({
            url: 'insert.php',
            type: 'POST',
            data: serializedForm,
            error: function() {
                alert('Insert: Something is wrong');
            },
            success: function(data) {
                // Needs this because there's a bug that does not show message when not refreshed
                
            }
        });
    });

    $(".close").click(function(){
        $(".bg-modal").hide();
        $('body').css('overflow', 'auto');
    });



    // jQuery Version of the Delete Pop-up Modal & Delete function
    $('.delete').click(function(){
        var id = $("#id-edit").val();

        $(".bg-modal-delete").css('display', 'flex');
        $('body').css('overflow', 'hidden');

        $('.confirm').attr('id', id); //set the data attribute on the modal button
    });

    $('.confirm').click(function(){
        var id = $(this).attr('id');
        var formDataEdit = $('#studentInformationEdit').serialize();
        Obj = new Object();
        Obj.activityType = "DELETE";
        var Data = formDataEdit + "&" + $.param(Obj);

        //Archive Deleted Data
        $.ajax({
            url: 'archive.php',
            type: 'POST',
            data: formDataEdit,
            error: function() {
                alert('Archive: Something is wrong arcive');
            },
            success: function(data) {
                
                //Update Activity Log
                $.ajax({
                    url: 'activityLog.php',
                    type: 'POST',
                    data: Data,
                    error: function() {
                        alert('Log: Something is wrong log');
                    },
                    success: function(data) {
                        
                        //Delete Data
                        $.ajax({
                            url: 'delete.php',
                            type: 'GET',
                            data: 'id=' + id,
                            error: function() {
                                alert('Delete: Something is wrong');
                            },
                            success: function(data) {
                                $("#"+ id).remove();
                                
                            }
                        });

                        window.location.href = "http://localhost/StudentInformation/PHP/CRUD/index.php";
                    }
                });
            }
        });
        $(".bg-modal-delete").hide();
    });

    $("#cancel").click(function(){
        $(".bg-modal-delete").hide();
        $('body').css('overflow', 'auto');
    });



    // jQuery Version of the Edit Pop-up Modal & Edit function
    $('#result').on("click", '.edit', function(){
        var id = $(this).parents("tr").attr("id");

        $(".bg-modal-edit").css('display', 'flex');
        $('body').css('overflow', 'hidden');

        //Poupulates Update/ Edit Form Inputs
        $.ajax({
            url: 'fetch.php',
            type: 'get',
            data: {id: id},
            dataType: 'json',
            error: function() {
                alert('Fetch: Something is wrong');
            },
            success: function(data) {
                $('#id-edit').val(data[0]);
                $('#student-number-edit').val(data[1]);
                $('#student-course-edit').val(data[2]);
                $('#student-surname-edit').val(data[3]);
                $('#student-first-name-edit').val(data[4]);
                $('#student-middle-initial-edit').val(data[5]);
                $('#student-birthdate-edit').val(data[6]);
                $('input[name^="student-gender-edit"][value="'+data[7]+'"').prop('checked',true);
                $('#student-house-number-edit').val(data[8]);
                $('#student-street-edit').val(data[9]);
                $('#student-subdivision-edit').val(data[10]);
                $('#student-barangay-edit').val(data[11]);
                $('#student-town-edit').val(data[12]);
                $('#student-district-edit').val(data[13]);
                $('#student-provincial-house-number-edit').val(data[14]);
                $('#student-provincial-street-edit').val(data[15]);
                $('#student-provincial-subdivision-edit').val(data[16]);
                $('#student-provincial-barangay-edit').val(data[17]);
                $('#student-provincial-town-edit').val(data[18]);
                $('#student-provincial-district-edit').val(data[19]);
                $('#student-contact-number-edit').val(data[20]);
                $('#student-email-edit').val(data[21]);
                $('#guardian-name-edit').val(data[22]);
                $('#guardian-contact-number-edit').val(data[23]);
                $('#student-remark-edit').val(data[24]);
                $('#student-sponsor-edit').val(data[25]);
                $('#student-hs-address-edit').val(data[26]);
                $('#student-company-name-edit').val(data[27]);
                $('#student-company-address-edit').val(data[28]);
                $('#student-company-position-edit').val(data[29]);
                $('#student-company-contact-number-edit').val(data[30]);

                // hidden
                $('#student-number-edit-hidden').val(data[1]);
                $('#student-course-edit-hidden').val(data[2]);
                $('#student-surname-edit-hidden').val(data[3]);
                $('#student-first-name-edit-hidden').val(data[4]);
                $('#student-middle-initial-edit-hidden').val(data[5]);
                $('#student-birthdate-edit-hidden').val(data[6]);
                $('#student-gender-edit-hidden').val(data[7]);
                $('#student-house-number-edit-hidden').val(data[8]);
                $('#student-street-edit-hidden').val(data[9]);
                $('#student-subdivision-edit-hidden').val(data[10]);
                $('#student-barangay-edit-hidden').val(data[11]);
                $('#student-town-edit-hidden').val(data[12]);
                $('#student-district-edit-hidden').val(data[13]);
                $('#student-provincial-house-number-edit-hidden').val(data[14]);
                $('#student-provincial-street-edit-hidden').val(data[15]);
                $('#student-provincial-subdivision-edit-hidden').val(data[16]);
                $('#student-provincial-barangay-edit-hidden').val(data[17]);
                $('#student-provincial-town-edit-hidden').val(data[18]);
                $('#student-provincial-district-edit-hidden').val(data[19]);
                $('#student-contact-number-edit-hidden').val(data[20]);
                $('#student-email-edit-hidden').val(data[21]);
                $('#guardian-name-edit-hidden').val(data[22]);
                $('#guardian-contact-number-edit-hidden').val(data[23]);
                $('#student-remark-edit-hidden').val(data[24]);
                $('#student-sponsor-edit-hidden').val(data[25]);
                $('#student-hs-address-edit-hidden').val(data[26]);
                $('#student-company-name-edit-hidden').val(data[27]);
                $('#student-company-address-edit-hidden').val(data[28]);
                $('#student-company-position-edit-hidden').val(data[29]);
                $('#student-company-contact-number-edit-hidden').val(data[30]);
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
                    "student-course-edit":{
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
                    "student-house-number-edit":{
                        required: true,
                        number: true
                    },
                    "student-street-edit":{
                        required: true
                    },
                    "student-subdivision-edit":{
                        required: false
                    },
                    "student-barangay-edit":{
                        required: true
                    },
                    "student-town-edit":{
                        required: true
                    },
                    "student-district-edit":{
                        required: true
                    },
                    "student-provincial-house-number-edit":{
                        required: true,
                        number: true
                    },
                    "student-provincial-street-edit":{
                        required: true
                    },
                    "student-provincial-subdivision-edit":{
                        required: false
                    },
                    "student-provincial-barangay-edit":{
                        required: true
                    },
                    "student-provincial-town-edit":{
                        required: true
                    },
                    "student-provincial-district-edit":{
                        required: true
                    },
                    "student-contact-number-edit":{
                        required: true
                    },
                    "student-email-edit":{
                        required: true,
                        email: true
                    },
                    "guardian-name-edit":{
                        required: true
                    },
                    "guardian-contact-number-edit":{
                        required: true
                    },
                },
                groups:{
                    "student-name-edit": "student-surname-edit student-first-name-edit student-middle-initial-edit",

                    "student-address-edit":  "student-house-number-edit student-street-edit student-subdivision-edit student-barangay-edit student-town-edit student-district-edit",

                    "student-provincial-address-edit": "student-provincial-house-number-edit student-provincial-street-edit student-provincial-subdivision-edit student-provincial-barangay-edit student-provincial-town-edit student-provincial-district-edit",

                    "student-guardian-edit": "guardian-name-edit guardian-contact-number-edit"
                },
                messages:{
                    "student-number-edit":{
                        required: ' Student Number is required'
                    },
                    "student-course-edit":{
                        required: ' Student Course is required'
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
                    "student-house-number-edit":{
                        required: ' Student Address is required',
                        number: ' Student House Number should be numeric only'
                    },
                    "student-street-edit":{
                        required: ' Student Address is required'
                    },
                    "student-barangay-edit":{
                        required: ' Student Address is required'
                    },
                    "student-town-edit":{
                        required: ' Student Address is required'
                    },
                    "student-district-edit":{
                        required: ' Student Address is required'
                    },
                    "student-provincial-house-number-edit":{
                        required: ' Student Provincial Address is required',
                        number: ' Student Provincial House Number should be numeric only'
                    },
                    "student-provincial-street-edit":{
                        required: ' Student Provincial Address is required'
                    },
                    "student-provincial-barangay-edit":{
                        required: ' Student Provincial Address is required'
                    },
                    "student-provincial-town-edit":{
                        required: ' Student Provincial Address is required'
                    },
                    "student-provincial-district-edit":{
                        required: ' Student Provincial Address is required'
                    },
                    "student-contact-number-edit":{
                        required: ' Student Contact Number is required'
                    },
                    "student-email-edit":{
                        required: ' Student Email is required',
                        email: " Student Email is invalid"
                    },
                    "guardian-name-edit":{
                        required: ' Guardian Details is required'
                    },
                    "guardian-contact-number-edit":{
                        required: ' Guardian Details is required'
                    },
                },
                errorPlacement: function(error, element) {
                    if (element.attr("name") == "student-surname-edit" || element.attr("name") == "student-first-name-edit" || element.attr("name") == "student-middle-initial-edit") {
                        error.insertAfter(".student-name-label-edit");

                    } else if(element.is(":radio") ) {
                        error.insertAfter(".student-gender-label-edit");

                    } else if (element.attr("name") == "student-house-number-edit" || element.attr("name") == "student-street-edit" || element.attr("name") == "student-barangay-edit" || element.attr("name") == "student-town-edit" || element.attr("name") == "student-district-edit") {
                        error.insertAfter(".student-address-label-edit");

                    } else if (element.attr("name") == "student-provincial-house-number-edit" || element.attr("name") == "student-provincial-street-edit" || element.attr("name") == "student-provincial-barangay-edit" || element.attr("name") == "student-provincial-town-edit" || element.attr("name") == "student-provincial-district-edit") {
                        error.insertAfter(".student-provincial-address-label-edit");

                    } else if (element.attr("name") == "guardian-name-edit" || element.attr("name") == "guardian-contact-number-edit") {
                        error.insertAfter(".student-guardian-label-edit");

                    } else {
                        error.insertAfter(element);

                    }

                }
            })
        }

        // var formDataEdit = $('#studentInformationEdit').serialize();

        //Serialize form as array
        var form = $('#studentInformationEdit');
        var serializedForm = form.serializeArray();
        //trim values
        serializedForm.forEach(o => o.value = jQuery.trim(o.value));
        //turn it into a string if you wish
        serializedForm = $.param(serializedForm);


        Obj = new Object();
        Obj.activityType = "UPDATE";
        var Data = serializedForm + "&" + $.param(Obj);

        // Checks if there is any changes made, if not no data is inserted into the database
        if(Changes()){

            //Update Activity Log
            $.ajax({
                url: 'activityLog.php',
                type: 'POST',
                data: Data,
                error: function() {
                    alert('Log: Something is wrong');
                },
                success: function(data) {

                    // Update Data in Database
                    $.ajax({
                        url: 'update.php',
                        type: 'GET',
                        data: serializedForm,
                        error: function() {
                            alert('Update: Something is wrong');
                        },
                        success: function (data) {
                            window.location.href = "http://localhost/StudentInformation/PHP/CRUD/index.php";

                        }
                    });

                    window.location.href = "http://localhost/StudentInformation/PHP/CRUD/index.php";

                }
            });
        } else{
            window.location.href = "http://localhost/StudentInformation/PHP/CRUD/index.php";

        }

    });

    $(".close").click(function(){
        $(".bg-modal-edit").hide();
        $('body').css('overflow', 'auto');
    });



    // jQuery Version of the View Pop-up Modal
    $('#result').on("click", '.view', function(){
        var id = $(this).parents("tr").attr("id");

        $(".bg-modal-view").css('display', 'flex');
        $('body').css('overflow', 'hidden');

        //Poupulates Update/ Edit Form Inputs
        $.ajax({
            url: 'fetch.php',
            type: 'get',
            data: {id: id},
            dataType: 'json',
            error: function() {
                alert('Fetch: Something is wrong');
            },
            success: function(data) {


                $('#id-view').val(data[0]);
                $('.student-number-view').text(data[1]);
                $('.student-course-view').text(data[2]);
                $('.student-name-view').text(data[3] + ", " + data[4] + " " + data[5] + ".");
                $('.student-birthdate-view').text(BirthdateWord(data[6]));
                $('.student-gender-view').text(data[7]);
                $('.student-address-view').text(containsHashtag(data[8]) + " " + data[9] + " " + data[10] + ", " + data[11] + " " + data[12] + ", " + data[13]);
                $('.student-provincial-address-view').text(containsHashtag(data[14]) + " " + data[15] + " " + data[16] + ", " + data[17] + " " + data[18] + ", " + data[19]);
                $('.student-contact-number-view').text(data[20]);
                $('.student-email-view').text(data[21]);
                $('.student-guardian-view').text(data[22]);
                $('.guardian-contact-number-view').text(data[23]);
                $('.student-remark-view').text(isOptional(data[24]));
                $('.student-sponsor-view').text(isOptional(data[25]));
                $('.student-hs-address-view').text(isOptional(data[26]));


                $('.student-company-name-view').text(isOptional(data[27]));
                $('.student-company-address-view').text(isOptional(data[28]));
                $('.student-company-position-view').text(isOptional(data[29]));
                $('.student-company-contact-number-view').text(isOptional(data[30]));

            }
        });
    });

    $(".close").click(function(){
        $(".bg-modal-view").hide();
        $('body').css('overflow', 'auto');
    });



    // jQuery Version of Search function
    search_data();

    function search_data(query, queryType){

        var page = CheckPage();

        $.ajax({
            url: 'search.php',
            method:'POST',
            data:{query:query, queryType:queryType, page:page},
            error: function() {
                alert('Search: Something is wrong');

            },
            success:function(data) {
                $('#result').html(data);
            }
        });

    }

    $('.data-searchbox').keyup(function(){
        var search = $('.data-searchbox').val();
        var searchType = $('.data-filter :selected').val();

        if(search != '' && searchType != ''){
            search_data(search, searchType);

        } else{
            search_data();
        }
    });

    count_data();
    
    function count_data(){

        $.ajax({
            url: 'count.php',
            method:'POST',
            data:{chartType:'gender'},
            dataType:"JSON",
            error: function() {
                alert('Count: Something is wrong');

            },
            success:function(data) {
                // $('#count').html(data);
                var gender = [];
				var total = [];
				var color = [];

				for(var count = 0; count < data.length; count++)
				{
					gender.push(data[count].gender);
					total.push(data[count].total);
					color.push(data[count].color);
				}

				var chart_data = {
					labels:gender,
					datasets:[
						{
							label:'Students',
							backgroundColor:color,
							color:'#fff',
							data:total
						}
					]
				};

				var options = {
                    plugins:{   
                        legend: {
                            display: false
                        }
                    },
					responsive:true,
                    maintainAspectRatio: false,
                    scales:{
                        yAxes:{
                            ticks:{
                                min:0,
                                precision:0,
                                font: {
                                    size: 20,
                                }
                            }
                        },
                        xAxes:{
                            ticks:{
                                font: {
                                    size: 20,
                                }
                            }
                        }
                    }
				};

				var group_chart = $('#gender_chart');

				var graph = new Chart(group_chart, {
					type:"bar",
					data:chart_data,
                    options:options
				});

            }
        });


        $.ajax({
            url: 'count.php',
            method:'POST',
            data:{chartType:'city'},
            dataType:"JSON",
            error: function() {
                alert('Count: Something is wrong');

            },
            success:function(data) {

                var city = [];
				var total = [];
				var color = [];

				for(var count = 0; count < data.length; count++)
				{
					city.push(data[count].city);
					total.push(data[count].total);
					color.push(data[count].color);
				}

				var chart_data = {
					labels:city,
					datasets:[
						{
							label:'Students',
							backgroundColor:color,
							color:'#fff',
							data:total
						}
					]
				};

				var options = {
					responsive:true,
                    maintainAspectRatio: false,
                    scales:{
                        yAxes:{
                            ticks:{
                                min:0,
                                precision:0,
                                font: {
                                    size: 20,
                                }
                            }
                        },
                        xAxes:{
                            ticks:{
                                font: {
                                    size: 20,
                                }
                            }
                        }
                    }
				};

				var group_chart = $('#city_chart');

				var graph = new Chart(group_chart, {
					type:"doughnut",
					data:chart_data,
				});



            }
        });


        $.ajax({
            url: 'count.php',
            method:'POST',
            data:{chartType:'province'},
            dataType:"JSON",
            error: function() {
                alert('Count: Something is wrong');

            },
            success:function(data) {

                var province = [];
				var total = [];
				var color = [];

				for(var count = 0; count < data.length; count++)
				{
					province.push(data[count].province);
					total.push(data[count].total);
					color.push(data[count].color);
				}

				var chart_data = {
					labels:province,
					datasets:[
						{
							label:'Students',
							backgroundColor:color,
							color:'#fff',
							data:total
						}
					]
				};

				var options = {
					responsive:true,
                    maintainAspectRatio: false,
                    scales:{
                        yAxes:{
                            ticks:{
                                min:0,
                                precision:0,
                                font: {
                                    size: 20,
                                }
                            }
                        },
                        xAxes:{
                            ticks:{
                                font: {
                                    size: 20,
                                }
                            }
                        }
                    }
				};

				var group_chart = $('#province_chart');

				var graph = new Chart(group_chart, {
					type:"doughnut",
					data:chart_data,
				});



            }
        });

    }









    // Logout
	$('.logout-btn').click(function(){
        id = $('.logout-btn').attr('id')

		$.ajax({
			url: '../LoginRegister/Logout.php',
			type: 'GET',
            // data: {id:id},
			error: function() {
				alert('Logout: Something is wrong');

			},
			success: function(data) {
				if(data.location){
					window.location.href = data.location;
				}
				
			}
		});
	});

});