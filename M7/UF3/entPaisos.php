<?php
/*Entitat Paises.
 * Poseeix tota l'estructura de la taula Paises de la base de dades mundo de mySQL
 * Aquesta classe preten tenir les propietats i m�todes que permeti muntar les
 * sent�ncies insert, update, delete i select de la taula de paises */
 
 
include 'entBase.php';
 
 class entPaisos extends entitatBase{
    
    public function __construct(){
    
     $this->nom_Taula = "Paises";
     $this->camps = array("Pais", "Capital", "Moneda", "Superficie",
      "Poblacion", "Esperanza_de_vida", "Mortalidad_Infantil", "PNB",
       "PNB_per_capita", "Lengua", "Religion", "Continente");
     
     $this->propietats=array(    "Pais"=>array("char",50,0,0,0,"Pa�s"),
                                "Capital"=>array("char",50,0,0,0,"Capital"),
                                "Moneda"=>array("char",50,0,0,0,"Moneda"),
                                "Superficie"=>array("int",11,0,0,0,"Superf�cie"),
                                "Poblacion"=>array("int",11,0,0,0,"Poblaci�"),
                                "Esperanza_de_vida"=>array("int",11,0,0,0,"Esperan�a de vida"),
                                "Mortalidad_Infantil"=>array("int",11,0,0,0,"Mortalitat infantil"),
                                "PNB"=>array("int",11,0,0,0,"Producte Nacional Brut"),
                                "PNB_per_capita"=>array("int",11,0,0,0,"Producte Nacional Brut per c�pita"),
                                "Lengua"=>array("char",17,0,0,0,"Ll�ngua"),
                                "Religion"=>array("char",15,0,0,0,"Religi�"),
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
