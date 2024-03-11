<?php

function selectCategory($category){
    echo '<option value="'.$category['id'].'">'.$category['type_category'].'</option>';
}