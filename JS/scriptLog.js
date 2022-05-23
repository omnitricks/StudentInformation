// Checks if input contains "#", if true it returns it, if false it adds "#" to the data and returns it
function containsHashtag(data){
    if(data.indexOf("#") != -1){
        return data;
    }else{
        var newData = "#" + data;
        return newData;
    }
}

// Checks if input is blank and if true changes blank into "N/A"
function isOptional(data){
    if(data == ""){
        data = "N/A";
    }

    return data;
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

// Checks if input contains any change
function anyChange(data1, data2){
    if(data1 != data2){
        data = " <i class='fa-solid fa-arrow-right-long'></i> " + data2;
        return data;
    }
    var blank = "";
    return blank;
}

// Resets Color
function resetColor(){
    $('.student-number-view-label').css("color", "var(--green-9)");
    $('.student-number-view').css("color", "var(--green-9)");

    $('.student-course-view-label').css("color", "var(--green-9)");
    $('.student-course-view').css("color", "var(--green-9)");

    $('.student-name-view-label').css("color", "var(--green-9)");
    $('.student-name-view').css("color", "var(--green-9)");

    $('.student-birthdate-view-label').css("color", "var(--green-9)");
    $('.student-birthdate-view').css("color", "var(--green-9)");

    $('.student-gender-view-label').css("color", "var(--green-9)");
    $('.student-gender-view').css("color", "var(--green-9)");

    $('.student-address-view-label').css("color", "var(--green-9)");
    $('.student-address-view').css("color", "var(--green-9)");
                    
    $('.student-provincial-address-view-label').css("color", "var(--green-9)");
    $('.student-provincial-address-view').css("color", "var(--green-9)");

    $('.student-contact-number-view-label').css("color", "var(--green-9)");
    $('.student-contact-number-view').css("color", "var(--green-9)");

    $('.student-email-view-label').css("color", "var(--green-9)");
    $('.student-email-view').css("color", "var(--green-9)");

    $('.student-guardian-view-label').css("color", "var(--green-9)");
    $('.student-guardian-view').css("color", "var(--green-9)");

    $('.guardian-contact-number-view-label').css("color", "var(--green-9)");
    $('.guardian-contact-number-view').css("color", "var(--green-9)");

    $('.student-remark-view-label').css("color", "var(--green-9)");
    $('.student-remark-view').css("color", "var(--green-9)");

    $('.student-sponsor-view-label').css("color", "var(--green-9)");
    $('.student-sponsor-view').css("color", "var(--green-9)");

    $('.student-hs-address-view-label').css("color", "var(--green-9)");
    $('.student-hs-address-view').css("color", "var(--green-9)");
}

$(document).ready(function(){
    // Gets page number, alternative to $_GET method for pagination function in search.php
    function CheckPage(){
        // Gets current url
        var url = window.location.href;
        // Gets page number from the url
        // var res = url.split("http://localhost/StudentInformation/PHP/indexLog.php?page=");
        var res = url.replace(/\D/g, "");

        // if page number is undetected it is equivalent to one
        if(!res){
            res = 1;
        }
        
        return res;
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

    // jQuery Version of the View Pop-up Modal
    $('#result').on("click", '.view', function(){
        var id = $(this).parents("tr").attr("id");

        $(".bg-modal-view").css('display', 'flex');
        $('body').css('overflow', 'hidden');

        //Poupulates Update/ Edit Form Inputs
        $.ajax({
            url: 'fetchLog.php',
            type: 'get',
            data: {id: id},
            dataType: 'json',
            error: function() {
                alert('Something is wrong');
            },
            success: function(data) {

                resetColor();

                $('#id-view').val(data[0]);
                $('.student-action-type').text(data[1]);

                if(data[1] == "UPDATE"){

                    studentNameOriginal = data[5] + ", " + data[6] + " " + data[7] + ".";
                    studentNameModified = data[35] + ", " + data[36] + " " + data[37] + ".";

                    studentAddressOriginal = containsHashtag(data[10]) + " " + data[11] + " " + data[12] + ", " + data[13] + " " + data[14] + ", " + data[15];
                    studentAddressModified = containsHashtag(data[40]) + " " + data[41] + " " + data[42] + ", " + data[43] + " " + data[44] + ", " + data[45];

                    studentProvincialAddressOriginal = containsHashtag(data[16]) + " " + data[17] + " " + data[18] + ", " + data[19] + " " + data[20] + ", " + data[21];
                    studentProvincialAddressModified = containsHashtag(data[46]) + " " + data[47] + " " + data[48] + ", " + data[49] + " " + data[50] + ", " + data[51];


                    studentNumber = anyChange(data[3], data[33]);
                    studentCourse = anyChange(data[4], data[34]);
                    studentName = anyChange(studentNameOriginal, studentNameModified);
                    studentBirthdate = anyChange(data[8], data[38]);
                    studentGender = anyChange(data[9], data[39]);
                    studentAddress = anyChange(studentAddressOriginal, studentAddressModified);
                    studentProvincialAddress = anyChange(studentProvincialAddressOriginal, studentProvincialAddressModified);
                    studentContactNumber = anyChange(data[22], data[52]);
                    studentEmail = anyChange(data[23], data[53]);
                    studentGuardian = anyChange(data[24], data[54]);
                    studentGuardianContactNumber = anyChange(data[25], data[55]);
                    studentRemark = anyChange(data[26], data[56]);
                    studentSponsor = anyChange(data[27], data[57]);
                    studentHSAddress = anyChange(data[28], data[58]);



                    if(studentNumber != ""){
                        $('.student-number-view-label').css("color", "var(--red-9)");
                        $('.student-number-view').css("color", "var(--red-9)");

                    }
                    $('.student-number-view').html(data[3] + studentNumber);

                    if(studentCourse != ""){
                        $('.student-course-view-label').css("color", "var(--red-9)");
                        $('.student-course-view').css("color", "var(--red-9)");

                    }
                    $('.student-course-view').html(data[4] + studentCourse);

                    if(studentName != ""){
                        $('.student-name-view-label').css("color", "var(--red-9)");
                        $('.student-name-view').css("color", "var(--red-9)");

                    }
                    $('.student-name-view').html(studentNameOriginal + studentName);

                    if(studentBirthdate != ""){
                        $('.student-birthdate-view-label').css("color", "var(--red-9)");
                        $('.student-birthdate-view').css("color", "var(--red-9)");

                    }
                    $('.student-birthdate-view').html(BirthdateWord(data[8]) + studentBirthdate);

                    if(studentGender != ""){
                        $('.student-gender-view-label').css("color", "var(--red-9)");
                        $('.student-gender-view').css("color", "var(--red-9)");

                    }
                    $('.student-gender-view').html(data[9] + studentGender);

                    if(studentAddress != ""){
                        $('.student-address-view-label').css("color", "var(--red-9)");
                        $('.student-address-view').css("color", "var(--red-9)");

                    }
                    $('.student-address-view').html(studentAddressOriginal + studentAddress);

                    if(studentProvincialAddress != ""){
                        $('.student-provincial-address-view-label').css("color", "var(--red-9)");
                        $('.student-provincial-address-view').css("color", "var(--red-9)");

                    }
                    $('.student-provincial-address-view').html(studentProvincialAddressOriginal + studentProvincialAddress);

                    if(studentContactNumber != ""){
                        $('.student-contact-number-view-label').css("color", "var(--red-9)");
                        $('.student-contact-number-view').css("color", "var(--red-9)");

                    }
                    $('.student-contact-number-view').html(data[22] + studentContactNumber);

                    if(studentEmail != ""){
                        $('.student-email-view-label').css("color", "var(--red-9)");
                        $('.student-email-view').css("color", "var(--red-9)");

                    }
                    $('.student-email-view').html(data[23] + studentEmail);

                    if(studentGuardian != ""){
                        $('.student-guardian-view-label').css("color", "var(--red-9)");
                        $('.student-guardian-view').css("color", "var(--red-9)");

                    }
                    $('.student-guardian-view').html(data[24] + studentGuardian);

                    if(studentGuardianContactNumber != ""){
                        $('.guardian-contact-number-view-label').css("color", "var(--red-9)");
                        $('.guardian-contact-number-view').css("color", "var(--red-9)");

                    }
                    $('.guardian-contact-number-view').html(data[25] + studentGuardianContactNumber);

                    if(studentRemark != ""){
                        $('.student-remark-view-label').css("color", "var(--red-9)");
                        $('.student-remark-view').css("color", "var(--red-9)");

                    }
                    $('.student-remark-view').html(isOptional(data[26]) + studentRemark);

                    if(studentSponsor != ""){
                        $('.student-sponsor-view-label').css("color", "var(--red-9)");
                        $('.student-sponsor-view').css("color", "var(--red-9)");

                    }
                    $('.student-sponsor-view').html(isOptional(data[27]) + studentSponsor);

                    if(studentHSAddress != ""){
                        $('.student-hs-address-view-label').css("color", "var(--red-9)");
                        $('.student-hs-address-view').css("color", "var(--red-9)");

                    }
                    $('.student-hs-address-view').html(isOptional(data[58]) + studentHSAddress);
                }

                if(data[1] == "DELETE"){

                    $('.student-number-view-label').css("color", "var(--red-9)");
                    $('.student-number-view').css("color", "var(--red-9)");
                
                    $('.student-course-view-label').css("color", "var(--red-9)");
                    $('.student-course-view').css("color", "var(--red-9)");
                
                    $('.student-name-view-label').css("color", "var(--red-9)");
                    $('.student-name-view').css("color", "var(--red-9)");
                
                    $('.student-birthdate-view-label').css("color", "var(--red-9)");
                    $('.student-birthdate-view').css("color", "var(--red-9)");
                
                    $('.student-gender-view-label').css("color", "var(--red-9)");
                    $('.student-gender-view').css("color", "var(--red-9)");
                
                    $('.student-address-view-label').css("color", "var(--red-9)");
                    $('.student-address-view').css("color", "var(--red-9)");
                                    
                    $('.student-provincial-address-view-label').css("color", "var(--red-9)");
                    $('.student-provincial-address-view').css("color", "var(--red-9)");
                
                    $('.student-contact-number-view-label').css("color", "var(--red-9)");
                    $('.student-contact-number-view').css("color", "var(--red-9)");
                
                    $('.student-email-view-label').css("color", "var(--red-9)");
                    $('.student-email-view').css("color", "var(--red-9)");
                
                    $('.student-guardian-view-label').css("color", "var(--red-9)");
                    $('.student-guardian-view').css("color", "var(--red-9)");
                
                    $('.guardian-contact-number-view-label').css("color", "var(--red-9)");
                    $('.guardian-contact-number-view').css("color", "var(--red-9)");
                
                    $('.student-remark-view-label').css("color", "var(--red-9)");
                    $('.student-remark-view').css("color", "var(--red-9)");
                
                    $('.student-sponsor-view-label').css("color", "var(--red-9)");
                    $('.student-sponsor-view').css("color", "var(--red-9)");
                
                    $('.student-hs-address-view-label').css("color", "var(--red-9)");
                    $('.student-hs-address-view').css("color", "var(--red-9)");


                    $('.student-number-view').text(data[3]);
                    $('.student-course-view').text(data[4]);
                    $('.student-name-view').text(data[5] + ", " + data[6] + " " + data[7] + ".");
                    $('.student-birthdate-view').text(BirthdateWord(data[8]));
                    $('.student-gender-view').text(data[9]);
                    $('.student-address-view').text(containsHashtag(data[10]) + " " + data[11] + " " + data[12] + ", " + data[13] + " " + data[14] + ", " + data[15]);
                    $('.student-provincial-address-view').text(containsHashtag(data[16]) + " " + data[17] + " " + data[18] + ", " + data[19] + " " + data[20] + ", " + data[21]);
                    $('.student-contact-number-view').text(data[22]);
                    $('.student-email-view').text(data[23]);
                    $('.student-guardian-view').text(data[24]);
                    $('.guardian-contact-number-view').text(data[25]);
                    $('.student-remark-view').text(isOptional(data[26]));
                    $('.student-sponsor-view').text(isOptional(data[27]));
                    $('.student-hs-address-view').text(isOptional(data[28]));
                
                }
            }
        });
    });

    $(".close").click(function(){
        $(".bg-modal-view").hide();
        $('body').css('overflow', 'auto');
    });



    // jQuery Version of Search function
    search_data();

    function search_data(query, queryType, activityType){

        var page = CheckPage();

        $.ajax({
            url: 'searchLog.php',
            method:'POST',
            data:{query:query, queryType:queryType, activityType:activityType,  page:page},
            error: function() {
                alert('Something is wrong');

            },
            success:function(data) {
                $('#result').html(data);
            }
        });

    }

    $('.data-searchbox').keyup(function(){
        var search = $('.data-searchbox').val();
        var searchType = $('.data-filter :selected').val();
        var dataType = $('.method-filter :selected').val();

        if(search != '' && searchType != '' && dataType != ''){
            search_data(search, searchType, dataType);

        } else{
            search_data();
        }
    });
 
});