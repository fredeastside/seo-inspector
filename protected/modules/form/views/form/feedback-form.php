<div class="modal_form_container">
    <form id="<?php echo $form_name;?>_form" class="modal_form" >
        <div class="row">
            <label class="required" for="<?php echo $form_name;?>_name">
                <span class="form_caption">Ваше имя</span>
                <span class="required">*</span>
            </label>
            <input id="<?php echo $form_name;?>_name" type="text" name="<?php echo $form_name;?>_name" placeholder="Имя" />
            <div id="<?php echo $form_name;?>_name_em_" class="errorMessage" style="display:none"></div>
        </div>
        <div class="row">
            <label class="required" for="<?php echo $form_name;?>_email">
                <span class="form_caption">e-mail</span>
                <span class="required">*</span>
            </label>
            <input id="<?php echo $form_name;?>_email" type="text" name="<?php echo $form_name;?>_email"  placeholder="e-mail" />
            <div id="<?php echo $form_name;?>_email_em_" class="errorMessage" style="display:none"></div>
        </div>
        <div class="row">
            <label class="required" for="<?php echo $form_name;?>_text">
                <span class="form_caption">Сообщение</span>
                <span class="required">*</span>
            </label>
            <textarea id="<?php echo $form_name;?>_text" type="text" name="<?php echo $form_name;?>_text"  placeholder="Сообщение"></textarea>
            <div id="<?php echo $form_name;?>_text_em_" class="errorMessage" style="display:none"></div>
        </div>

        <div class="row buttons">
            <input type="hidden" value="<?php echo $form_name;?>" name="form-name" />
            <input type="submit" value="Отправить" name="yt0" onclick="return FormSubmit('<?php echo $form_name;?>');" />
        </div>
    </form>
</div>