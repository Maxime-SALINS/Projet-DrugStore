<?php

function selectRole($role){
    echo '<option value="'.$role['idrole'].'">'.$role['role'].'</option>';
}

function selectWizard($wizard){
    echo '<option value="'.$wizard['id'].'">'.$wizard['name'].'</option>';
}

function selectCategory($category){
    echo '<option value="'.$category['id'].'">'.$category['type_category'].'</option>';
}