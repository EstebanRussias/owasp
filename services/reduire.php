<?php
   function reduire($param1,$taille_Max){
               if (strlen($param1)>= $taille_Max){
                   return substr($param1, 0, $taille_Max)." ...";
               }
               return $param1;
           };
?>