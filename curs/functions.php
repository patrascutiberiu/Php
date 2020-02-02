<?php
function checkbox(string $name, string $value, array $data) : string
{
    $attributes='';
    if (isset($data[$name]) && in_array($value, $data[$name])) {
       $attributes .= 'checked';
    }
    $attributes .='checked';
    return <<<HTML
    <input type="checkbox" name="{$name}[]" value="$value">
HTML;
}

function radio(string $name, string $value, array $data) : string
{
    $attributes='';
    if (isset($data[$name]) && $value === $data[$name]) {
       $attributes .= 'checked';
    }
    $attributes .='checked';
    return <<<HTML
    <input type="radio" name="{$name}[]" value="$value">
HTML;
}

function select(string $name, $value,array $options): string{
    $html_options=[];
    foreach ($options as $key => $option) {
        $attributes = $key == $value ? 'selected' : '';
        $html_options[] ="<option value='$key' $attributes >$option</option>";
    }
    //envoie ensamble de mes options sous forme de chaine de caractere
    return "<select class='form-control>' name='$name'".implode($html_options)."</select>";
}

function dump($variable){
    echo '<pre>';
    var_dump($variable);
    echo '</pre>';
}

function creneaux_html(array $creneaux){
    $phrases=[];
    if (empty($creneaux)) {
        return 'Fermé';
    }
    foreach ($creneaux as $creneau) {
        $phrases[] = " de <strong>{$creneau[0]}h</strong> à <strong>{$creneau[1]}h</strong>";
    }
    
    return 'Ouvert '.implode(' et ', $phrases);
}
function in_creneaux(int $heure, array $creneaux): bool
{
    foreach ($creneaux as $creneau) {
        $debut=$creneau[0];
        $fin= $creneau[1];
        if ($heure >= $debut && $heure <= $fin) {
            return true;
        }
    }
    return false;
}