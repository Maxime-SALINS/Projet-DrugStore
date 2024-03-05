<?php

function selectWizard($wizard){
    echo '<option value="'.$wizard['id'].'">'.$wizard['wizard_name'].'</option>';
}