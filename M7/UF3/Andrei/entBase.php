<?php
/*Entitat Paises.
 * Poseeix tota l'estructura de la taula Paises de la base de dades mundo de mySQL
 * Aquesta classe preten tenir les propietats i mètodes que permeti muntar les
 * sentències insert, update, delete i select de la taula de paises */
 
 
 class entitatBase{
     /*Constants que serviran per indicar la posicio del camp que necessitarem */
     const kTIPUS = 0;
     const kMIDA = 1;
     const kNOT_NULLABLE = 2; //1 si no pot ser null 0 en cas contrari
     const kNOT_VISIBLE = 3;  //1 si no el volem mostrar 0 en cas contrari
     const kREADONLY = 4;  //1 readonly  & 0 read write
     const kDISPLAY_TEXT=5;
     
     /*Guardarà el nom de la taula base*/
     protected $nom_Taula;

     /*Guardarà el nom de la taula base*/
     protected $camps = NULL;
     
     protected $propietats= NULL;
     
    // Accessors públics a les propietats protegides (només lectura) 
     public function get_nom_taula(){
         return $this->nom_Taula;
     }
     public function get_Camps(){
         return $this->camps;
     }
     
     public function get_propietats_camps(){
         return $this->propietats;
     }
     
     /*Mètodes públics*/
     /*Generarà el select command*/
     public function get_select_cmd($where = NULL){ //el $where null es per si no l'hi pasem cap filtre
         
         $cmd = "SELECT * FROM ". $this->nom_Taula ; 
         
         if (isset($where)){
             $cmd = $cmd . " WHERE " . $where;
         }
         
         return $cmd;
         
     }
     
     public function get_insert_cmd($values){
        $final_array=array();
        $inter_array=array();//array destinat a desar les propietats del tipus
        
        $array_propietats=$this->get_propietats_camps();
        
        foreach($array_propietats as $propietat){
            //print $propietat[constant("kTIPUS")];
            array_push($inter_array,$propietat[0]);
            }
        
        for ($i=0;$i<count($values);$i++){
                if ($inter_array[$i]=="char"){
                    $final_array[$i]='"'.(string)$values[$i].'"';
                    }
                else if ($inter_array[$i]=="int") {
                    $final_array[$i]=intval($values[$i]);
                    }
            }
        
        
         
        $cmd = "INSERT INTO ". $this->nom_Taula ; 
         $cmd=$cmd.'(';
         $cmd=$cmd.implode(',',$this->camps);
         //$cmd = $cmd . $this->nom_camp();
         //for($i=0;$i<=count($this->camps)-1;$i++){
         //   $cmd = $cmd . $this->camps[$i];
         //   $cmd=$cmd.',';
         //   }
         //S'hauria de recorre tots els camps i afegirlos en la consulta
         $cmd=$cmd.')';
         // haurem de mirar el camps is són camp tipus texte i posar commetes al valors si calen o no.
         if (isset($final_array)){
             $cmd = $cmd . " VALUES "."(".implode(',',$final_array).')'.';';
             //for ($i=0;$i<count($final_array);$i++){
             //   if($i<count($final_array)-1){
             //       $cmd=$cmd. $final_array[$i].',';
             //   }
             //   else{
             //       $cmd=$cmd.$final_array[$i];
             //   }
             //    }
             
         }
        // $cmd=$cmd.')';
         return $cmd;
        
     }

     public function get_update_cmd($values, $where){
         
     }
     
     public function get_delete_cmd( $where){
         
     }
    
    
    
    private function nom_camp(){
        $lista = new ArrayObject();
        $resultado = mysql_query("SELECT * FROM" . $this->nom_Taula);
        $campos    = mysql_num_fields($resultado);
        for ($i=0; $i < $campos; $i++) {
            $tipo= mysql_field_name($resultado, $i);
            $lista->append($tipo);
            }
        
        return $lista;
        }
 }
 

 
 /*Per accedir a les constants
 echo entPaisos::kTIPUS;
 echo '<br/> '.entPaisos::kMIDA;
 echo '<br/> '.entPaisos::kNOT_NULLABLE;
 echo '<br/> '.entPaisos::kNOT_VISIBLE;
 echo '<br/> '.entPaisos::kREADONLY;*/
 
?>
