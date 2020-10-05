<?php
interface iMastermind {
  public function __construct($taille=4);
  public function test($code);
  public function getEssais();
  public function getTaille();
}

/** classe dont une instance est un jeu de mastermind */
class Mastermind implements iMastermind {
  /** code à découvrir chaine de car compris entre 0 et 9 */
  protected $code="";

  /** liste des essais */
  protected $lessai=array();

  /** constructeur par défaut : génération d'un code aléatoire de taille
   * chiffres différents 
   */ 
  public function __construct($taille=4){
    for($i=0;$i<$taille;$i++){
      $c=rand(0,9);		// nouveau chiffre
      $this->code.="$c";
    }
  }
  /** teste la validité d'une chaîne code et retourne un booléen :
   * - que des chiffres ;
   * - de même taille que $this->code
   */ 
  public function valide($code){
    if(!is_string($code) || strlen($code)!=strlen($this->code) 
       || !ctype_digit($code)){
      return false;
    }
    return true;
  }
  /** teste une chaîne de caractères par rapport au code et retourne un
   * tableau de 2 entiers : ( nb de chiffres bien placés, nb de chiffres mal 
   * placés ou false si invalide
   */
  public function test($essai){
    $cessai=$essai; // copie car modifié	
    $ccode=$this->code; // copie car modifié
    if(!$this->valide($essai))
      return false;
    $res=array("bon"=>0, "mal"=>0);
     
    for($i=0;$i<strlen($cessai);$i++){ // boucle des biens placés
      if($ccode[$i]==$cessai[$i]){
        $ccode[$i]='Y'; // afin de ne plus le prendre en compte
	$cessai[$i]='Y'; // afin de ne plus le prendre en compte
    	$res["bon"]++;
      }
    } // fin de la boucle des biens placés
    for($i=0;$i<strlen($cessai);$i++){ // boucle des mals placés
      if($cessai[$i]!='Y'){
        $pos = strpos($ccode,$cessai[$i]);
        if (!($pos === false)) {
          $res["mal"]++;
          $ccode[$pos]='Y';
	}
      }
    } // fin de boucle des mals placés
    $this->lessai[$essai]=$res;
    return $res;
  }

  /** retourne la taille du code */
  public function getTaille () {
    return strlen($this->code);
  }
  public function getEssais () {
    return $this->lessai;
  }
}
// $m=new Mastermind(); //pour tester
// print_r($m);
// print_r($m->test("1234"));
?>
