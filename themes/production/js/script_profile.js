var intervalNeedToSave;
$( document ).ready(function() {
    $('#Profile_filename').change(function() {
        $('#userpic_edit').hide();
        $('#userpic_save').css('display', 'inline-block');
        blinkSaveBtn();
        $('#userpic_action span').text('save userpic');
        $('#userpic_action span').css('color', '#ff0000');
    });
/*
    $('#userpic_save').change(function() {
        $('#userpic_edit').css('display', 'inline-block');
        $('#userpic_save').hide();
		clearInterval(intervalNeedToSave);
        $('#userpic_action span').text('change userpic');
        $('#user-form-update').submit();
    });*/
});


function ChangeUserPic(){
    if($('#userpic_action span').text() != 'save userpic')
        $('#Profile_filename').click();
    else
        $('#user-form-update input[type=submit]').click();
        //$('#user-form-update').submit();
}


function blinkSaveBtn(){

	intervalNeedToSave = setInterval(function() {
        if($('#userpic_save').css('background-position') == '0px 0px')
	        $('#userpic_save').css('background-position', '0px -20px');
    	else
        	$('#userpic_save').css('background-position', '0px 0px');
	}, 1000);
}

function ChangeProfile(){
    $('#prifile_action').unbind('click');
    $('#prifile_action').css('cursor', 'default');
    $('#prifile_action').css('color', '#ff0000');
    $('#user-form-update input:not([type=file])').css('display', 'inline-block');
    $('.submit_cover').show();
    $('.val_captions').hide();
}