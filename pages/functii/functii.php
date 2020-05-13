<?php
/*
always in english
proper naming for functions means a name that has clarity - what that function do?
    erore1() should be getMainErrorMessage
proper naming for parameters means names that say what it is that parameter
    $value should be $errorType
one space before and after ()
one space before and after =,*,/,===,etc
one space between functions
allways indent parent - children elment with tab - not space
o functie are o singura actiune si face un singur lucru

*/


function erore1($value,$msg) : void

{
    if (isset($_GET['error']) {
        if ($_GET['error']==$value) {
            echo $msg;
        }
    }
}

function erore2($value,$msg)
{
    if(isset($_GET['error'])){
        if($_GET['error']==$value){
            echo '<div class="alert alert-danger" role="alert">
              '.$msg.'
            </div>';
        }
    }
}

//afiseaza mesajele de succes - getSuccessMessage( $succesType, $successMessage)
function succes(string $value, string $msg) : void
{
    if( isset ($_GET['succes'])) {
        if ($_GET['succes'] == $value) {
            echo
                '<div class="alert alert-success" role="alert">
                    '.$msg.'
                </div>';
        }
    }
}
/*
 * what this function do pick a proper name and what the heck are those var and nr
 * check psr1 and psr2
 */

function binarySearch(Array $var, $nr)
{
    ///se intampla ceva important care opreste scriptul - e o fraza
	if (count($var) === 0) return false;

	//setezi ceva... ce setezi?
	$nr_mic = 0;
	$nr_mare = count($var) - 1;


	while ($nr_mic <= $nr_mare) {
		$nr_important = floor(($nr_mic + $nr_mare) / 2);
		if($var[$nr_important] == $nr) {
			return true;
		}
		if ($nr < $var[$nr_important]) {
			$nr_mare = $nr_important -1;
		}
		else {
			$nr_mic = $nr_important + 1;
		}
	}
	return false;
}

//ce inseamna valoare 1 2 3?
//camelcase fara underscore
//spatii dupa egal
//aici e loc de refactorizare
function comparare_materii($valoare1,$valoare_user,$valoare2,$valoare3)
{
    //seteaza niste variabile desi ar putea fi constante
  $materii_biologie=array("Chimie","Biologie","Fizica","Matematica");
  $materii_straine=array("Engleza","Franceza","Germana","Spaniola","Latina");
  $materii_matematica=array("Matematica","Fizica","Informatica");
  $materii_informatica=array("TIC","Informatica");
  $materii_antreprenor=array("ATP","Economie","Educatie civica");
  $materii_psihologie=array("Psihologie","Sociologie");
  $materii_geografie=array("Geografie","Istorie");

    ///verifici ceva si returnezi ceva in functie de asta
    /// verifica conditiile de intendare la else if si if
    /// nici o linie de cod nu trebuie sa fie mai lunga de 80char sau 120 char
    /// dupa virgula spatiu liber intotdeauna
  if(
      ($valoare_user == $valoare1) ||
      ($valoare_user == $valoare2) ||
      ($valoare_user == $valoare3)
  )
        return 5;
  elseif(
      //isClassType($valoare1, $materii_straine);
            ( in_array($valoare1, $materii_straine) &&  in_array($valoare_user, $materii_straine )) ||
            ( in_array($valoare2, $materii_straine) && in_array($valoare_user, $materii_straine)) ||
            ( in_array($valoare3, $materii_straine) && in_array($valoare_user, $materii_straine)) ||
            ( in_array($valoare1,$materii_biologie) && in_array($valoare_user,$materii_biologie)) ||
            ( in_array($valoare2,$materii_biologie) && in_array($valoare_user,$materii_biologie) ) ||
            ( in_array($valoare3,$materii_biologie) && in_array($valoare_user,$materii_biologie) ) ||

  elseif((in_array($valoare1,$materii_matematica) && in_array($valoare_user,$materii_matematica)) || (in_array($valoare2,$materii_matematica) && in_array($valoare_user,$materii_matematica)) || (in_array($valoare3,$materii_matematica) && in_array($valoare_user,$materii_matematica)))

  elseif((in_array($valoare1,$materii_informatica) && in_array($valoare_user,$materii_informatica)) || (in_array($valoare2,$materii_informatica) && in_array($valoare_user,$materii_informatica)) || (in_array($valoare3,$materii_informatica) && in_array($valoare_user,$materii_informatica)))

  elseif((in_array($valoare1,$materii_antreprenor) && in_array($valoare_user,$materii_antreprenor)) || (in_array($valoare2,$materii_antreprenor) && in_array($valoare_user,$materii_antreprenor)) || (in_array($valoare3,$materii_antreprenor) && in_array($valoare_user,$materii_antreprenor)))

  elseif((in_array($valoare1,$materii_psihologie) && in_array($valoare_user,$materii_psihologie)) || (in_array($valoare2,$materii_psihologie) && in_array($valoare_user,$materii_psihologie)) || (in_array($valoare3,$materii_psihologie) && in_array($valoare_user,$materii_psihologie)))

  elseif((in_array($valoare1,$materii_geografie) && in_array($valoare_user,$materii_geografie)) || (in_array($valoare2,$materii_geografie) && in_array($valoare_user,$materii_geografie)) || (in_array($valoare3,$materii_geografie) && in_array($valoare_user,$materii_geografie)))
    return 3;
  else
    return 0;
}
    function isClassType($class, $classType) : bool
    {
        return in_array($class,$classType);
    }

//ca mai sus in loc de else if replace with switch
function comparare_profil($valoare,$valoare_user){

  $profile_filo=array("Filologie","Stiinte-sociale");
  $profile_real=array("Mate-info","Stiinte ale naturii");

  if($valoare_user == $valoare)
        return 10;
  elseif(in_array($valoare,$profile_filo) && in_array($valoare_user,$profile_filo))
    return 5;
  elseif(in_array($valoare,$profile_real) && in_array($valoare_user,$profile_real))
    return 5;
  else
   return 0;
}

function comparare_pasiune($valoare,$valoare_user){
//buba - solicita baza de date... aceste date sunt hardcodate si nu sunt administrabile
    //sa existe  in baza de date
    //selectate din baza de date


  $pasiune_programare=array("Matematica","Programare/Calculatoare","Electronica","Cibernetica");
  $pasiune_fizica=array("Matematica","Fizica","Astronomie","Arhitectura","Constructii","Inginerie electrica","Electronica","Inginerie Aerospatila");
  $pasiune_medicina=array("Chimie","Medicina","Biologie","Animale","Agricultura","Ecologie","Animale");
  $pasiune_politica=array("Politica","Drept");
  $pasiune_lingvistica=array("Limbi straine","Literatura","Limba romana","Filozofie","Psihologie");
  $pasiune_jurnalism=array("Jurnalism","Editare video/sunet","Regie","Actorie");
  $pasiune_geografie=array("Geografie","Istorie");
  $pasiune_sport=array("Biologie","Medicina","Sport");
  $pasiune_afaceri=array("Business","Economie","Matematica");
  $pasiune_serviciu=array("Drept","Serviciul in cadrul politiei","Serviciul militar");
  $pasiune_design=array("Design","Desen","Editare video/sunet");
  $pasiune_religie=array("Religie","Istorie");
  $pasiune_geologie=array("Geologie","Geografie","Biologie");

  if($valoare_user == $valoare)
        return 10;
  elseif(in_array($valoare,$pasiune_programare) && in_array($valoare_user,$pasiune_programare))
    return 5;
  elseif(in_array($valoare,$pasiune_fizica) && in_array($valoare_user,$pasiune_fizica))
    return 5;
  elseif(in_array($valoare,$pasiune_medicina) && in_array($valoare_user,$pasiune_medicina))
    return 5;
  elseif(in_array($valoare,$pasiune_politica) && in_array($valoare_user,$pasiune_politica))
    return 5;
  elseif(in_array($valoare,$pasiune_jurnalism) && in_array($valoare_user,$pasiune_jurnalism))
    return 5;
  elseif(in_array($valoare,$pasiune_geografie) && in_array($valoare_user,$pasiune_geografie))
    return 5;
  elseif(in_array($valoare,$pasiune_sport) && in_array($valoare_user,$pasiune_sport))
    return 5;
  elseif(in_array($valoare,$pasiune_afaceri) && in_array($valoare_user,$pasiune_afaceri))
    return 5;
  elseif(in_array($valoare,$pasiune_serviciu) && in_array($valoare_user,$pasiune_serviciu))
    return 5;
  elseif(in_array($valoare,$pasiune_design) && in_array($valoare_user,$pasiune_design))
    return 5;
  elseif(in_array($valoare,$pasiune_religie) && in_array($valoare_user,$pasiune_religie))
    return 5;
  elseif(in_array($valoare,$pasiune_geologie) && in_array($valoare_user,$pasiune_geologie))
    return 5;
  else
   return 0;
}

function comparare_judet($valoare,$valoare_user){

  $judet_sud=array("Ilfov","Prahova","Teleorman","Giurgiu","Calarasi","Constanta","Tulcea","Braila","Buzau","Bucuresti","Dambovita","Arges","Valcea","Gorj","Mehedinti","Dolj","Brasov");
  $judet_transilvania=array("Satu-Mare","Maramures","Bihor","Arad","Timis","Caras-Severin","Hunedoara","Alba","Cluj","Salaj","Sibiu","Brasov","Covasna","Harghita","Mures","Bistrita-Nasaud","Cluj");
  $judet_moldova=array("Galati","Vrancea","Bacau","Iasi","Neamt","Suceava","Botosani","Harghita","Brasov","Covasna");


  if($valoare_user == $valoare)
        return 10;
  elseif(in_array($valoare,$judet_sud) && in_array($valoare_user,$judet_sud))
    return 3;
  elseif(in_array($valoare,$judet_transilvania) && in_array($valoare_user,$judet_transilvania))
    return 3;
  elseif(in_array($valoare,$judet_moldova) && in_array($valoare_user,$judet_moldova))
    return 3;
  else
    return 0;
}



function getCompability($array, $user)
{
    $compability_couter = 0;
    $number_imapartire = 110;
    if($user[0]['job'] == $array['job'])
        $compability_couter += 5;
    if($user[0]['carti'] == $array['carti'])
        $compability_couter += 5;
    if($user[0]['sociabil'] == $array['sociabil'])
        $compability_couter += 5;
    if($user[0]['sport'] == $array['sport'])
        $compability_couter += 5;
    if($user[0]['stres'] == $array['stres'])
        $compability_couter += 5;

    $compability_couter += comparare_materii($array['materie1'],$user[0]['materie1'],$array['materie2'],$array['materie3']);
    $compability_couter += comparare_materii($array['materie2'],$user[0]['materie2'],$array['materie2'],$array['materie3']);
    $compability_couter += comparare_materii($array['materie3'],$user[0]['materie3'],$array['materie2'],$array['materie3']);

    $compability_couter += comparare_profil($array['Profil'],$user[0]['Profil']);

    $compability_couter += comparare_judet($array['Judet'],$user[0]['Judet']);

    $compability_couter += $user[0]['domeniu_intensitate']*comparare_pasiune($user[0]['Domeniu'],$array['pasiune_facultati']);

    return floor(($compability_couter/$number_imapartire) * 100);
}




?>
