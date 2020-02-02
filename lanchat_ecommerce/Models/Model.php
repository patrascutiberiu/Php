<?php

abstract class Model
{
    public function toArray(array $_toIgnore = [])
    {
        $result = [];
        //je parcours tous les attributs de l'objet courant
        //si le nom de l'attribut est présent dans le tableau $_toIgnore, je l'ignore
        //sinon, j'ajoute l'attribut à un tableau que je renverrai après le foreach
        foreach ($this as $attributeName => $attributeValue) 
        {
            if(!in_array($attributeName,$_toIgnore))
            {
                //j'ajoute mon attname dans mon tab resultat avec la valeur
                $result[$attributeName]=$attributeValue;
            }
        }
        return $result; // array
    }
}