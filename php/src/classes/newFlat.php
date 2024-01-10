<?php

require_once("flat.php");
    class FlatFactory {
        public static function createFlatFromDatabaseRow($row) {
            $flat = new Flat(
                $row['Id'],
                $row['DataDodania'],
                $row['Region'],
                $row['IloscPokoi'],
                $row['Ulica'],
                $row['Metraz'],
                $row['Model'],
                $row['RokBudowy'],
                $row['Cena'],
                $row['StopaProcentowa']
            );
            
            return $flat;
        }
    }
?>
