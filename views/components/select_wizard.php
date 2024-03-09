<?php

function selectWizard($wizard){
    echo '<option value="'.$wizard['id_wizard'].'">'.$wizard['wizard_name'].'</option>';
}