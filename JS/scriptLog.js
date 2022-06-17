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

    $('.student-company-name-view-label').css("color", "var(--green-9)");
    $('.student-company-name-view').css("color", "var(--green-9)");

    $('.student-company-address-view-label').css("color", "var(--green-9)");
    $('.student-company-address-view').css("color", "var(--green-9)");

    $('.student-company-position-view-label').css("color", "var(--green-9)");
    $('.student-company-position-view').css("color", "var(--green-9)");

    $('.student-company-contact-number-view-label').css("color", "var(--green-9)");
    $('.student-company-contact-number-view').css("color", "var(--green-9)");

    $('.restore').css('display', 'none');
}

function redColor(){
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

    $('.student-company-name-view-label').css("color", "var(--red-9)");
    $('.student-company-name-view').css("color", "var(--red-9)");

    $('.student-company-address-view-label').css("color", "var(--red-9)");
    $('.student-company-address-view').css("color", "var(--red-9)");

    $('.student-company-position-view-label').css("color", "var(--red-9)");
    $('.student-company-position-view').css("color", "var(--red-9)");

    $('.student-company-contact-number-view-label').css("color", "var(--red-9)");
    $('.student-company-contact-number-view').css("color", "var(--red-9)");
}

$(document).ready(function(){
    // Loads Last Toggle Class
    if (localStorage.getItem('Toggle1') === 'true') {

        $('.navigation').addClass('notransition');
        $('.main').addClass('notransition');

        $('.navigation').addClass('active');
        $('.main').addClass('active');

        setTimeout(function() {
			$('.navigation').removeClass('notransition');
            $('.main').removeClass('notransition');
		}, 100);

	}

    // Toggles Sidebar
    $('.toggle').click(function(){
        $('.navigation').toggleClass('active');
        $('.main').toggleClass('active');
        localStorage.setItem('Toggle1', $('.navigation').hasClass('active'));
        // localStorage.setItem('Toggle2', $('.main').hasClass('active'));

    });

    
    // Gets page number, alternative to $_GET method for pagination function in search.php
    function CheckPage(){
        // Gets current url
        var url = window.location.href;
        // Gets page number from the url
        var res = url.split("http://localhost/StudentInformation/PHP/ActivityLog/indexLog.php?page=");
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


    // jQuery Version of the View Pop-up Modal
    $('#result').on("click", '.view', function(){
        var id = $(this).parents("tr").attr("id");

        $(".bg-modal-view").css('display', 'flex');
        $('body').css('overflow', 'hidden');

        //Poupulates Update/ Edit Form Inputs
        $.ajax({
            url: 'fetchLog.php',
            type: 'GET',
            data: {id: id},
            dataType: 'json',
            error: function() {
                alert('Fetch: Something is wrong');
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


                    studentCompanyName = anyChange(data[29], data[59]);
                    studentCompanyAddress = anyChange(data[30], data[60]);
                    studentCompanyPosition = anyChange(data[31], data[61]);
                    studentCompanyContactNumber = anyChange(data[32], data[62]);



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



                    if(studentCompanyName != ""){
                        $('.student-company-name-view-label').css("color", "var(--red-9)");
                        $('.student-company-name-view').css("color", "var(--red-9)");

                    }
                    $('.student-company-name-view').html(isOptional(data[29]) + studentCompanyName);


                    if(studentCompanyAddress != ""){
                        $('.student-company-address-view-label').css("color", "var(--red-9)");
                        $('.student-company-address-view').css("color", "var(--red-9)");

                    }
                    $('.student-company-address-view').html(isOptional(data[30]) + studentCompanyAddress);

                    if(studentCompanyPosition != ""){
                        $('.student-company-position-view-label').css("color", "var(--red-9)");
                        $('.student-company-position-view').css("color", "var(--red-9)");

                    }
                    $('.student-company-position-view').html(isOptional(data[31]) + studentCompanyPosition);

                    if(studentCompanyContactNumber != ""){
                        $('.student-company-contact-number-view-label').css("color", "var(--red-9)");
                        $('.student-company-contact-number-view').css("color", "var(--red-9)");

                    }
                    $('.student-company-contact-number-view').html(isOptional(data[32]) + studentCompanyContactNumber);
                }

                if(data[1] == "DELETE"){

                    redColor()

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



                    $('.student-company-name-view').text(isOptional(data[29]));
                    $('.student-company-address-view').text(isOptional(data[30]));
                    $('.student-company-position-view').text(isOptional(data[31]));
                    $('.student-company-contact-number-view').text(isOptional(data[32]));

                    $('.restore').css('display', 'inline-block');
                }
            }
        });
    });

    $(".close").click(function(){
        $(".bg-modal-view").hide();
        $('body').css('overflow', 'auto');
    });


    // jQuery Version of Search function// jQuery Version of Search function
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


    // jQuery Version of Graph function
    count_data();
    
    function count_data(){

        $.ajax({
            url: '../CRUD/count.php',
            method:'POST',
            data:{chartType:'gender'},
            dataType:"JSON",
            error: function() {
                alert('Count: Something is wrong');

            },
            success:function(data) {
                $male = parseInt(data[0].total);
                $female = parseInt(data[1].total);
                $total = $male + $female;

                $('.total').append($total);
                $('.male').append($male);
                $('.female').append($female);

            }
        });


        $.ajax({
            url: '../CRUD/count.php',
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

                const ctx = document.getElementById('city').getContext('2d');
                var graph = new Chart(ctx, {
                    type: 'polarArea',
                    data: {
                        labels: city,
                        datasets: [{
                            label: 'Students',
                            data: total,
                            backgroundColor: color,
                            
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false
                    }
                });

            }
        });


        $.ajax({
            url: '../CRUD/count.php',
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


                const ctx2 = document.getElementById('province').getContext('2d');
                const graph2 = new Chart(ctx2, {
                    type: 'bar',
                    data: {
                        labels: province,
                        datasets: [{
                            label: 'Students',
                            data: total,
                            backgroundColor: color,
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false
                    }
                });

            }
        });

    }


    // jQuery Version of Restore function
    $('.restore').click(function(){
        var id = $('#id-view').val();

        //Poupulates Update/ Edit Form Inputs
        $.ajax({
            url: 'fetchRestoreLog.php',
            type: 'GET',
            data: {id: id},
            dataType: 'json',
            error: function() {
                alert('Something is wrong');
            },
            success: function(data) {

                id = data[1];
                studentNumber = data[2];
                studentCourse = data[3];
                studentSurname = data[4];
                studentFirstName = data[5];
                studentMiddleInitial = data[6];
                studentBirthdate = data[7];
                studentGender = data[8];
                studentHouseNumber = data[9];
                studentStreet = data[10];
                studentSubdivision = data[11];
                studentBarangay = data[12];
                studentTown = data[13];
                studentDistrict = data[14];
                studentProvincialHouseNumber = data[15];
                studentProvincialStreet = data[16];
                studentProvincialSubdivision = data[17];
                studentProvincialBarangay = data[18];
                studentProvincialTown = data[19];
                studentProvincialDistrict = data[20];
                studentContactNumber = data[21];
                studentEmail = data[22];
                guardianName = data[23];
                guardianContactNumber = data[24];
                studentRemark = data[25];
                studentSponsor = data[26];
                studentHighSchoolAddress = data[27];
                studentCompanyName = data[28];
                studentCompanyAddress = data[29];
                studentCompanyPosition = data[30];
                studentCompanyContactNumber = data[31];

                
                $.ajax({
                    url: 'insertLog.php',
                    type: 'POST',
                    data: {id:id, studentNumber:studentNumber, studentCourse:studentCourse, studentSurname:studentSurname, studentFirstName:studentFirstName, studentMiddleInitial:studentMiddleInitial, studentBirthdate:studentBirthdate, studentGender:studentGender, studentHouseNumber:studentHouseNumber, studentStreet:studentStreet, studentSubdivision:studentSubdivision, studentBarangay:studentBarangay, studentTown:studentTown, studentDistrict:studentDistrict, studentProvincialHouseNumber:studentProvincialHouseNumber, studentProvincialStreet:studentProvincialStreet, studentProvincialSubdivision:studentProvincialSubdivision, studentProvincialBarangay:studentProvincialBarangay, studentProvincialTown:studentProvincialTown, studentProvincialDistrict:studentProvincialDistrict, studentContactNumber:studentContactNumber, studentEmail:studentEmail, guardianName:guardianName, guardianContactNumber:guardianContactNumber, studentRemark:studentRemark, studentSponsor:studentSponsor, studentHighSchoolAddress:studentHighSchoolAddress, studentCompanyName:studentCompanyName, studentCompanyAddress:studentCompanyAddress, studentCompanyPosition:studentCompanyPosition, studentCompanyContactNumber:studentCompanyContactNumber},
                    error: function() {
                        alert('Something is wrong');
                    },
                    success: function(data) {
                        // Needs this because there's a bug that does not show message when not refreshed
                        // location.reload(true);
                        alert("check main");
                        $(".bg-modal-view").hide();
                        $('body').css('overflow', 'auto');
                    }
                });
            }
        });

        
    });


    // Logout
	$('.logout-btn').click(function(){
        id = $('.logout-btn').attr('id')

		$.ajax({
			url: '../LoginRegister/Logout.php',
			type: 'GET',
            dataType:"json",
			error: function() {
				alert('Logout: Something is wrong');

			},
			success: function(data) {
				if(data.location){
					window.location.replace(data.location);
				}
				
			}
		});
	})
 
});