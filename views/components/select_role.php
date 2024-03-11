<?php

function selectRole($role){
    echo '<option value="'.$role['idrole'].'">'.$role['role'].'</option>';
}