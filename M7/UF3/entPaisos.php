<?php
/*Entitat Paises.
 * Poseeix tota l'estructura de la taula Paises de la base de dades mundo de mySQL
 * Aquesta classe preten tenir les propietats i mètodes que permeti muntar les
 * sentències insert, update, delete i select de la taula de paises */
 
 
include 'entBase.php';
 
 class entPaisos extends entitatBase{
    
    public function __construct(){
    
     $this->nom_Taula = "Paises";
     $this->camps = array("Pais", "Capital", "Moneda", "Superficie",
      "Poblacion", "Esperanza_de_vida", "Mortalidad_Infantil", "PNB",
       "PNB_per_capita", "Lengua", "Religion", "Continente");
     
     $this->propietats=array(    "Pais"=>array("char",50,0,0,0,"País"),
                                "Capital"=>array("char",50,0,0,0,"Capital"),
                                "Moneda"=>array("char",50,0,0,0,"Moneda"),
                                "Superficie"=>array("int",11,0,0,0,"Superfície"),
                                "Poblacion"=>array("int",11,0,0,0,"Població"),
                                "Esperanza_de_vida"=>array("int",11,0,0,0,"Esperança de vida"),
                                "Mortalidad_Infantil"=>array("int",11,0,0,0,"Mortalitat infantil"),
                                "PNB"=>array("int",11,0,0,0,"Producte Nacional Brut"),
                                "PNB_per_capita"=>array("int",11,0,0,0,"Producte Nacional Brut per càpita"),
                                "Lengua"=>array("char",17,0,0,0,"Llèngua"),
                                "Religion"=>array("char",15,0,0,0,"Religió"),
                                "Continente"=>array("char",10,0,0,0,"Continent")
                                );
 
 }    

         
     
     
     
 }
 
//Per accedir a les constants
$obj=new entPaisos();
/*
 echo entPaisos::kTIPUS;
 echo '<br/> '.entPaisos::kMIDA;
 echo '<br/> '.entPaisos::kNOT_NULLABLE;
 echo '<br/> '.entPaisos::kNOT_VISIBLE;
 echo '<br/> '.entPaisos::kREADONLY;
 */
$inserta=array("Flipilandia","Empanalanda","Pataton",3522500,51, 100, 0,45, 58 ,"Enpanado","La de otros","La Luna");
 //echo $obj->get_insert_cmd($insert);
 
 //echo $obj->get_nom_taula();

//echo $obj->get_select_cmd("Pais LIKE Nigeria");

echo $obj->get_insert_cmd($inserta);
?>
