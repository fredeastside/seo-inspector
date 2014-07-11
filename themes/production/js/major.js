

// ========================================== COMMUNICATION ==========================================
function SendPOST(url, args, strHadler){
    var strHadler = strHadler;
    $.post(
        url,
        '&data=' + JSON.stringify(args) + '&ajax=feedback-form',// + '&handler=' + strHadler,
        function(data) {
            ReceivePOST(strHadler, data);
        }
    );
}

function ReceivePOST(strHadler, data){
    protoFunc(strHadler, data);
}


function SendCMD(url, strFunc, params, strHadler){
    $.post(
        url,
        {srFunc: strFunc, params: params, clFunc: strHadler},
        function( data ) {
            ReceivePost(data);
        },
        'json'
    );
}


function ReceiveCMD(data){
    if(data.clFunc){
        protoFunc(data.clFunc, data.args);
    }
    else
        alert('No such func');
}


// ========================================== USER EVENTS ==========================================
$(document).ready(function() {
    $('#feedback_link').click(function(){
        //ShowFeedbackForm();
        SendPOST('/form/form/feedback', {text: ''}, 'ShowModal');
        //SendPost('/temp.php', 'Testing', {text: 'QQWW'}, 'text');
        return false;
    });
});

function TestInputField(field, origin_text, b_flag_regular){
    $field = $(field);
    text = '';
    var bFlagError = false;

    text = $field.val()
/*
    if($field.prop("tagName") == 'INPUT')
        text = $field.val()
    else
        if($field.prop("tagName") == 'TEXTAREA')
            text = $field.text()
*/
    if(b_flag_regular){
        if(!origin_text.test(text)){
            bFlagError = true;

        }
    }
    else{
        if(text == '' || (text != origin_text && origin_text != '')){
            bFlagError = true;
        }
    }

    if(bFlagError){
        //alert('Вы должны правильно заполнить ' + $field.attr('placeholder'));
        $field.css('border-color', '#ff0000');
        $field.parent().find('.errorMessage').text('Неправильно заполнено.');
        ShowError($field.parent().find('.errorMessage'));

        $field.unbind();
        $field.click(function(){
            $(this).css('border-color', '');
            $(this).parent().find('.errorMessage').hide();
        });

        return false;
    }


    return true;
}

function FormSubmit(form_name){
    var emailPattern = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    field_name = $("input[id="+ form_name +"_name]");
    field_email = $("input[id="+ form_name +"_email]");
    field_message = $("textarea[id="+ form_name +"_text]");
    //var emailAddress = ($mailfrom.val() ? $mailfrom.val() : '');
    var bFlagError = false;
    if($(field_name).length)
        if(!TestInputField(field_name, '', false))
            bFlagError = true;

    if($(field_email).length)
        if(!TestInputField(field_email, emailPattern, true))
            bFlagError = true;

    if($(field_message).length)
        if(!TestInputField(field_message, '', false))
            bFlagError = true;



    if(bFlagError){
        //alert('Вы должны правильно заполнить отмеченные поля');
        return false;
    }


    var inputData = $.unserialize($('#'+ form_name +'_form').serialize());
    var sendData = {};
    var iIterator = 0;
    for(var key in inputData){
        if(!inputData.hasOwnProperty(key))
            continue;

        $label = $("#" +form_name+ "_form *[name='"+key+"']").prev().find('.form_caption');
        sendData[iIterator] = {};
        sendData[iIterator]['name'] = key;
        sendData[iIterator]['value'] = inputData[key];
        if($label.length)
            sendData[iIterator++]['caption'] = $label.text();
        else
            sendData[iIterator++]['caption'] = 'unknown:';
    }
    SendPOST('/form/form/submit', sendData, 'ShowModal');

    return false;
}

// ========================================== FUNCS ===============================================
function protoFunc(func){
    try{
        window[func].apply(null, Array.prototype.slice.call(arguments, 1));
    }
    catch (e){
        console.log(e);
    }
}

function ShowModal(htmlText){
    $('body').addClass('blur_bg');
    $.fancybox(htmlText, {
        // fancybox API options
        fitToView: false,
        width: 905,
        height: 505,
        autoSize: false,
        closeClick: false,
        openEffect: 'none',
        closeEffect: 'none'
    });

}


(function($){
    $.unserialize = function(serializedString){
        var str = decodeURI(serializedString);
        var pairs = str.split('&');
        var obj = {}, p, idx, val;
        for (var i=0, n=pairs.length; i < n; i++) {
            p = pairs[i].split('=');
            idx = p[0];
            if (idx.indexOf("[]") == (idx.length - 2)) {
                var ind = idx.substring(0, idx.length-2)
                if (obj[ind] === undefined) {
                    obj[ind] = [];
                }
                obj[ind].push(p[1]);
            }
            else {
                obj[idx] = p[1];
            }
        }
        return obj;
    };
})(jQuery);

var arrErrAnimate = new Array();
function ShowError(error_container){
    if(!error_container.length)
        return;

    var id = $(error_container).closest('form').find('.row').index($(error_container).closest('.row'));


    arrErrAnimate[id] = new Array();
    arrErrAnimate[id].step = 0;
    arrErrAnimate[id].margin = -20;
    arrErrAnimate[id].interval = 10;
    arrErrAnimate[id].acceleration = .9;
    arrErrAnimate[id].speed = 1;
    arrErrAnimate[id].sign = -1;
    arrErrAnimate[id].softness = .9;

    $(error_container).css('margin-top', arrErrAnimate[id].margin + 'px');
    $(error_container).show();

    arrErrAnimate[id].timer = setInterval(function () {

        $(error_container).css('margin-top', arrErrAnimate[id].margin + 'px');
        //console.log(arrErrAnimate[id].margin);

        if(arrErrAnimate[id].step > 8){
            clearInterval(arrErrAnimate[id].timer);
            //MoveError(arrErrAnimate[id], error_container);
        }

        arrErrAnimate[id].speed += arrErrAnimate[id].acceleration * arrErrAnimate[id].sign;
        arrErrAnimate[id].margin += arrErrAnimate[id].speed * arrErrAnimate[id].sign;

        if(arrErrAnimate[id].margin >= 0){//((-2) * arrErrAnimate[id].speed)){
            arrErrAnimate[id].step++;
            arrErrAnimate[id].speed -= arrErrAnimate[id].softness * arrErrAnimate[id].sign;
            arrErrAnimate[id].sign *= -1;
            arrErrAnimate[id].margin = 0;
        }
    }, arrErrAnimate[id].interval);

}
/*
function MoveError(element, error_container){
    element.interval = 10;
    element.acceleration = .15;
    element.step = 0;
    element.speed = .7;

    element.timer = setInterval(function () {

        $(error_container).css('margin-left', element.step + 'px');

        element.speed -= element.acceleration;
        element.step += element.speed;
        if(element.speed <= 0)
            clearInterval(element.timer);


    }, element.interval);
}
*/

/*
function ShowFeedbackForm(){
    var ee = 0;

    try{
        ee = $.parseJSON('{test: 1}');
        alert(ee);
    }
    catch (e){
        alert(e);
    }




    $.ajax({
        type: "POST",
        cache: false,
        url: href, // preview.php
        data: 'places=' + JSON.stringify(arrSelected) + '&time=' + $('#seance_selector').val(), // all form fields
        success: function (data) {
            if(data == 'occupied'){
                alert('Одно или несколько выбранных мест уже заняты');
                refreshHall();
            }
            else{
                $.fancybox(data, {
                    // fancybox API options
                    fitToView: false,
                    width: 905,
                    height: 505,
                    autoSize: false,
                    closeClick: false,
                    openEffect: 'none',
                    closeEffect: 'none'
                });
                formLoaded(true);
            }
        }
    });

}
*/