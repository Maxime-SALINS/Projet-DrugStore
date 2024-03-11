<?php

function selectWizard($wizard){
    echo '<option value="'.$wizard['id'].'">'.$wizard['name'].'</option>';
}