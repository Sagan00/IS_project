<?php

require_once("coffee.php");
    class CoffeeFactory {
        public static function createCoffeeFromDatabaseRow($row) {
            $coffee = new Coffee(
                $row['ID'],
                $row['Species'],
                $row['Owner'],
                $row['Country_of_Origin'],
                $row['Region'],
                $row['Producer'],
                $row['Haravest_Year'],
                $row['Grading_Date'],
                $row['Processing_Method'],
                $row['Aroma'],
                $row['Flavor'],
                $row['Aftertaste'],
                $row['Acidity'],
                $row['Body'],
                $row['Balance'],
                $row['Uniformity'],
                $row['Clean_Cup'],
                $row['Sweetnes'],
                $row['Cupper_Points'],
                $row['Total_Cup_Points'],
                $row['Moisture'],
                $row['Color'],
                $row['Certification'],
                $row['Altitude_Meters']
            );
            
            return $coffee;
        }
    }
#haravest year!!
#sweetnes
?>
