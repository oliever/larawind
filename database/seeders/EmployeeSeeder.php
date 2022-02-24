<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    public function run()
    {
        $nutters_headoffice_staff = [
            ['team_id'=>1,'location_id'=>'999','name'           => 'Manpreet Brar','level' => 'super_admin'],
            ['team_id'=>1,'location_id'=>'999','name'           => 'Donald Cranston','level' => 'headoffice_staff'],
            ['team_id'=>1,'location_id'=>'999','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("LYNN CRANSTON")))),'level' => 'headoffice_staff'],
            ['team_id'=>1,'location_id'=>'999','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("MELISSA KUNTZ")))),'level' => 'headoffice_staff'],
            ['team_id'=>1,'location_id'=>'999','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("KAYLA BACHMEIER")))),'level' => 'headoffice_staff'],
            ['team_id'=>1,'location_id'=>'999','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("KELLY SEITZ")))),'level' => 'headoffice_staff'],
            ['team_id'=>1,'location_id'=>'999','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("PAUL OGDEN")))),'level' => 'headoffice_staff'],
            ['team_id'=>1,'location_id'=>'999','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("TAMMY GRUE")))),'level' => 'headoffice_staff'],
            ['team_id'=>1,'location_id'=>'999','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("BRAD WINSOR")))),'level' => 'headoffice_staff'],
            ['team_id'=>1,'location_id'=>'999','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("Paul CLEWES")))),'level' => 'headoffice_staff'],
            ['team_id'=>1,'location_id'=>'999','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("NICOLE SUTHERLAND")))),'level' => 'headoffice_staff'],
            ['team_id'=>1,'location_id'=>'999','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("SHELLEY CHAMPION")))),'level' => 'headoffice_staff'],
            ['team_id'=>1,'location_id'=>'999','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("MICHELLE WELLS")))),'level' => 'headoffice_staff'],
            ['team_id'=>1,'location_id'=>'999','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("ANNETTE MATERI")))),'level' => 'headoffice_staff'],
            ['team_id'=>1,'location_id'=>'999','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("LAURA HILLIS")))),'level' => 'headoffice_staff'],
            ['team_id'=>1,'location_id'=>'999','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("CECILE SEEBECK")))),'level' => 'headoffice_staff'],
            ['team_id'=>1,'location_id'=>'999','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("BRANDI PEDERSON")))),'level' => 'headoffice_staff'],
            ['team_id'=>1,'location_id'=>'999','name'           => "Paul Ogden",'level' => 'headoffice_admin'],
            ['team_id'=>1,'location_id'=>'999','name'           => "Brad Winsor",'level' => 'headoffice_admin'],
            ['team_id'=>1,'location_id'=>'999','name'           => "Paul Clewes",'level' => 'headoffice_admin'],
            ['team_id'=>1,'location_id'=>'999','name'           => "Manpreet Brar",'level' => 'headoffice_admin'],
            ['team_id'=>1,'location_id'=>'999','name'           => "Tammy Grue",'level' => 'headoffice_admin'],
        ];
        Employee::insert($nutters_headoffice_staff);

        $nutters_location_staff = [
            //Warehouse
            ['team_id'=>1,'location_id'=>'998','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("SCOTT PHINNEY")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'998','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("DARCY GOERTZEN")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'998','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("Kevin Elderkin")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'998','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("Janiece Richards")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'998','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("JEANETTE MACAULAY")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'998','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("SANDRA LOFGREN")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'998','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("DEVIE MAIER")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'998','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("VALERIE LEMNA")))),'level' => 'location_staff'],
            //Specialty
            ['team_id'=>1,'location_id'=>'997','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("KIM MARSHALL")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'997','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("DONNELLY GRAD")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'997','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("ROSE WEBSTER")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'997','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("STEPHANIE ULRICHSEN")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'997','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("SANDRA NEUFELD")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'997','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("DEANNA THOMPSON")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'997','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("KATHY TETLOCK-CORVINUS")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'997','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("JIM GRAD")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'997','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("DEBORAH KEETLEY")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'997','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("PAT WILSON")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'997','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("TARA WASYLUK")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'997','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("LYNN FAUSER")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'997','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("MARCIA CLEMENT")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'997','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("GERDA	DE LANGE")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'997','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("SHERI LYNN BRUSKY")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'997','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("RENA MARIE BROWN")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'997','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("DEBRA BUECKERT")))),'level' => 'location_staff'],

            //Regular stores
            //Medicine Hat
            ['team_id'=>1,'location_id'=>'1','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("CHRISTINA DAWN MILLS")))),'level' => 'location_manager'],/*  */
            ['team_id'=>1,'location_id'=>'1','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("JENNIFER MCKENZIE")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'1','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("MICHELLE CRESSMAN")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'1','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("BERNICE	PEACOCK")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'1','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("MICHELLE MENZIES")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'1','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("ZOE 	MUDRACK")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'1','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("LORNA	FAVEL")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'1','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("Darcy 	Wedrick")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'1','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("HEAVEN 	CARLTON")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'1','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("KRISTEN 	RESENER")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'1','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("CELESTE 	HUNTER")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'1','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("BROOKLYN 	DAVIDSON")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'1','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("Jace 	LEVEQUE")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'1','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("Eileigh 	HARRIS-MCGHEE")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'1','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("JOLENE 	YANKE SHORT")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'1','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("ALEXA 	RUDE")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'1','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("CAITLIN 	CAMPBELL")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'1','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("LIELT 	SAMKET YESHIGETA")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'1','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("CHARLI	DAVIDSON")))),'level' => 'location_staff'],

            //Red Deer
            ['team_id'=>1,'location_id'=>'3','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("CARLA 	MACKENZIE")))),'level' => 'location_manager'],/*  */
            ['team_id'=>1,'location_id'=>'3','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("AMBER 	LAVOIE")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'3','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("DIANE 	ERICHSEN")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'3','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("CHRISTINE 	BARNES")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'3','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("CLEO	TETTEH")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'3','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("RILEY	SUTHERLAND")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'3','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("SALLY	BUSBY")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'3','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("CHEY-ANNE 	GILLESPIE")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'3','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("CRYSTAL 	GREENWALL")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'3','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("HAROLD	JACOBSON")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'3','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("ELIZABETH 	BAKER")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'3','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("TONI-LYNN 	NOBBS")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'3','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("Hope	Forslund-Clark")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'3','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("NEIL ALLAN JR.	YOUNG")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'3','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("TINA	JACKSON")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'3','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("SHAUN	KUHL")))),'level' => 'location_staff'],

            //Camrose
            ['team_id'=>1,'location_id'=>'45','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("JODY 	MCDOUGALL")))),'level' => 'location_manager'],/*  */
            ['team_id'=>1,'location_id'=>'45','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("SHELBY 	BIANIC")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'45','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("YVONNE 	ROBINSON")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'45','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("LEANNE SUSAN	WALTER")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'45','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("ELIZABETH 	SEMENIUK")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'45','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("GRACE 	PEREIRA")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'45','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("Nola	Smith")))),'level' => 'location_staff'],

            //Canmore
            ['team_id'=>1,'location_id'=>'44','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("ANNETTE 	BRONSCH")))),'level' => 'location_manager'],/*  */
            ['team_id'=>1,'location_id'=>'44','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("DANIEL	FITZPATRICK")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'44','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("CONSTANZA 	COFRE ESPINOZA")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'44','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("JARED 	SKIRROW")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'44','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("BENJAMIN 	BRONSCH")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'44','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("CRYSTAL 	PILOTTE")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'44','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("JULIE 	ANGUS")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'44','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("KAYLA CRYSTAL	DESROSIERS")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'44','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("MARIBEL 	SORIANO")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'44','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("CINDY 	KELLY")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'44','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("IZABELA 	VOJSOVICOVA")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'44','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("MAYA 	SESHIA")))),'level' => 'location_staff'],

            //Moose Jaw
            ['team_id'=>1,'location_id'=>'5','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("JEROME 	KOEBEL")))),'level' => 'location_manager'],/*  */
            ['team_id'=>1,'location_id'=>'5','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("MARLENE 	MOULD")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'5','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("YSALINE	DEPLASSE")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'5','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("JENNA 	DAVY")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'5','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("DARLA 	ENDICOTT")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'5','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("ELIJAH	NICHVALODOFF")))),'level' => 'location_staff'],

            //Swift Current
            ['team_id'=>1,'location_id'=>'47','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("BECKY 	THEISE")))),'level' => 'location_manager'],/*  */
            ['team_id'=>1,'location_id'=>'47','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("MARIAH 	PENNER")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'47','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("TANIA 	ZACHARIAS")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'47','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("BARBARA	McCUAIG")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'47','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("CASSANDRA 	BLYTH")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'47','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("ESTHER 	RATZLAFF")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'47','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("HALEY	FORFAR")))),'level' => 'location_staff'],

            //Saskatoon
            ['team_id'=>1,'location_id'=>'48','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("MONTANA	KYLIUK")))),'level' => 'location_manager'],/*  */
            ['team_id'=>1,'location_id'=>'48','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("HAILEY 	LAFFERTY")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'48','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("JENNIFER 	LENHART")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'48','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("Leah 	Haas")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'48','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("DELPHINE 	MARYNIAK")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'48','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("RENAE 	BROOMAN")))),'level' => 'location_staff'],

            //Okotoks
            ['team_id'=>1,'location_id'=>'38','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("CARLEENA 	YATES")))),'level' => 'location_manager'],/*  */
            ['team_id'=>1,'location_id'=>'38','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("ALISON 	REYNOLDS")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'38','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("Nicole Dawn	Toren")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'38','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("LAURA 	PATON")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'38','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("AFTON 	MCELROY")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'38','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("MARGARET 	BOWEN")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'38','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("MICHAEL 	CAMPBELL")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'38','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("REBECCA 	MEISL")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'38','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("LINDA	FLOREN")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'38','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("Asia	Grant-Eshleman")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'38','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("CATHIE	WINTER")))),'level' => 'location_staff'],

            //Jasper
            ['team_id'=>1,'location_id'=>'28','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("JONATHAN	BOWLEY")))),'level' => 'location_manager'],/*  */
            ['team_id'=>1,'location_id'=>'28','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("ALETHEIA 	CHACONAS")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'28','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("RIKKE 	LIISBERG-LARSEN")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'28','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("SAGE 	DUGUAY")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'28','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("Cassidy 	STAINTON")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'28','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("LYNDSEY 	HUSSEY")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'28','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("JASON	PATIENCE")))),'level' => 'location_staff'],

            //Lloydminster
            ['team_id'=>1,'location_id'=>'10','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("VANESSA 	PALABRICA")))),'level' => 'location_manager'],/*  */
            ['team_id'=>1,'location_id'=>'10','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("RANDALL 	SMITH")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'10','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("MINEKO 	STRUEBY")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'10','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("MARNIE 	SOUTER")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'10','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("RACHEL 	BRAND")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'10','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("ELAINE 	GRAHAM")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'10','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("AMROELEN 	HERRERA")))),'level' => 'location_staff'],

            //Airdrie
            ['team_id'=>1,'location_id'=>'50','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("EDDIE 	GANUELAS")))),'level' => 'location_manager'],/*  */
            ['team_id'=>1,'location_id'=>'50','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("SHELLEY	JOHNSON")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'50','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("CHRISTOPHER 	JORGENSEN")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'50','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("Chandra 	Baeuchle")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'50','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("DAYNA 	GAERTNER")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'50','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("DANIELLE 	SABOURIN")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'50','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("Shelley 	Carefoot")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'50','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("HOLLY 	REDDIN")))),'level' => 'location_staff'],

            //Lethbridge
            ['team_id'=>1,'location_id'=>'6','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("DAN 	MCINTYRE")))),'level' => 'location_manager'],/*  */
            ['team_id'=>1,'location_id'=>'6','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("FRANCES	POPE")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'6','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("HEATHER 	STRAIN")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'6','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("HAIDI 	NAVARRO")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'6','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("LORI 	BORAU")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'6','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("KEN 	LOWRY")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'6','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("Hannah 	Duda")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'6','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("TALIA 	ASHCROFT")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'6','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("ALICE 	JONES")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'6','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("JUDY 	SEBERG")))),'level' => 'location_staff'],
            ['team_id'=>1,'location_id'=>'6','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("KEESHA 	HOLT")))),'level' => 'location_staff'],

        ];
        Employee::insert($nutters_location_staff);

        $armetals_location_staff = [
            ['team_id'=>2,'location_id'=>'100','name'           => "Gedam G. Adhanom",'level' => 'location_staff'],
            ['team_id'=>2,'location_id'=>'100','name'           => "Dawoud Salih Ahmeddin",'level' => 'location_staff'],
            ['team_id'=>2,'location_id'=>'100','name'           => "Darshan Singh Bath",'level' => 'location_staff'],
            ['team_id'=>2,'location_id'=>'100','name'           => "Arnel Caelian",'level' => 'location_staff'],
            ['team_id'=>2,'location_id'=>'100','name'           => "Patrick Caelian",'level' => 'location_staff'],
            ['team_id'=>2,'location_id'=>'100','name'           => "Reyan S Comporal",'level' => 'location_staff'],
            ['team_id'=>2,'location_id'=>'100','name'           => "Christian Sanchez Degamo",'level' => 'location_staff'],
            ['team_id'=>2,'location_id'=>'100','name'           => "Hardev S. Dhillon",'level' => 'location_staff'],
            ['team_id'=>2,'location_id'=>'100','name'           => "Brad R. Doherty",'level' => 'location_staff'],
            ['team_id'=>2,'location_id'=>'100','name'           => "Vinh Tan Duong",'level' => 'location_staff'],
            ['team_id'=>2,'location_id'=>'100','name'           => "Sherwin I Ferrer",'level' => 'location_staff'],
            ['team_id'=>2,'location_id'=>'100','name'           => "Eduardo Segundo Gatica Ponce",'level' => 'location_staff'],
            ['team_id'=>2,'location_id'=>'100','name'           => "Benjamin O. Guillemer",'level' => 'location_staff'],
            ['team_id'=>2,'location_id'=>'100','name'           => "Dalal Hamid Habila",'level' => 'location_staff'],
            ['team_id'=>2,'location_id'=>'100','name'           => "Hamed Turkai Hamed",'level' => 'location_staff'],
            ['team_id'=>2,'location_id'=>'100','name'           => "Hai phuoc Huynh",'level' => 'location_staff'],
            ['team_id'=>2,'location_id'=>'100','name'           => "Lut Huynh",'level' => 'location_staff'],
            ['team_id'=>2,'location_id'=>'100','name'           => "Tam Huynh",'level' => 'location_staff'],
            ['team_id'=>2,'location_id'=>'100','name'           => "Tam Xuan Huynh",'level' => 'location_staff'],
            ['team_id'=>2,'location_id'=>'100','name'           => "Wilfredo Lopez Icmat",'level' => 'location_staff'],
            ['team_id'=>2,'location_id'=>'100','name'           => "Amarjit Kalirai",'level' => 'location_staff'],
            ['team_id'=>2,'location_id'=>'100','name'           => "Vipan Kumar",'level' => 'location_staff'],
            ['team_id'=>2,'location_id'=>'100','name'           => "Viet Hung Le",'level' => 'location_staff'],
            ['team_id'=>2,'location_id'=>'100','name'           => "Mark Leonard",'level' => 'location_staff'],
            ['team_id'=>2,'location_id'=>'100','name'           => "Zhi Jian Kent Li",'level' => 'location_staff'],
            ['team_id'=>2,'location_id'=>'100','name'           => "Greg Ssu-Ting Liu",'level' => 'location_staff'],
            ['team_id'=>2,'location_id'=>'100','name'           => "Danny Lok",'level' => 'location_staff'],
            ['team_id'=>2,'location_id'=>'100','name'           => "Andy Yan Ng",'level' => 'location_staff'],
            ['team_id'=>2,'location_id'=>'100','name'           => "Cuong Van Ngo",'level' => 'location_staff'],
            ['team_id'=>2,'location_id'=>'100','name'           => "Thanh Son Ngo",'level' => 'location_staff'],
            ['team_id'=>2,'location_id'=>'100','name'           => "Huong Nguyen",'level' => 'location_staff'],
            ['team_id'=>2,'location_id'=>'100','name'           => "Khang Nguyen",'level' => 'location_staff'],
            ['team_id'=>2,'location_id'=>'100','name'           => "Quang Chi Nguyen",'level' => 'location_staff'],
            ['team_id'=>2,'location_id'=>'100','name'           => "Thuan Phong Nguyen",'level' => 'location_staff'],
            ['team_id'=>2,'location_id'=>'100','name'           => "Van Xin Nguyen",'level' => 'location_staff'],
            ['team_id'=>2,'location_id'=>'100','name'           => "Thai Xuan Phan",'level' => 'location_staff'],
            ['team_id'=>2,'location_id'=>'100','name'           => "Lixiong Qiu",'level' => 'location_staff'],
            ['team_id'=>2,'location_id'=>'100','name'           => "Divyanshu Ratti",'level' => 'location_staff'],
            ['team_id'=>2,'location_id'=>'100','name'           => "Thein Min Soe",'level' => 'location_staff'],
            ['team_id'=>2,'location_id'=>'100','name'           => "Marvin Soliven",'level' => 'location_staff'],
            ['team_id'=>2,'location_id'=>'100','name'           => "Sukhbinder S Toor",'level' => 'location_staff'],
            ['team_id'=>2,'location_id'=>'100','name'           => "Quang Xuan Tran",'level' => 'location_staff'],
            ['team_id'=>2,'location_id'=>'100','name'           => "Thanh V Tran",'level' => 'location_staff'],
            ['team_id'=>2,'location_id'=>'100','name'           => "Dom Paulo Uyboco",'level' => 'location_staff'],
            ['team_id'=>2,'location_id'=>'100','name'           => "Rene Ventura",'level' => 'location_staff'],
            ['team_id'=>2,'location_id'=>'100','name'           => "Cuong Chi Vo",'level' => 'location_staff'],
            ['team_id'=>2,'location_id'=>'100','name'           => "Brad Wilson",'level' => 'location_staff'],
            ['team_id'=>2,'location_id'=>'100','name'           => "Ming Wu",'level' => 'location_staff'],
            ['team_id'=>2,'location_id'=>'100','name'           => "Gecong Yang",'level' => 'location_staff'],
            ['team_id'=>2,'location_id'=>'100','name'           => "Frank Colarossi",'level' => 'location_staff'],
            ['team_id'=>2,'location_id'=>'100','name'           => "Rick Ghazaleh",'level' => 'location_staff'],
            ['team_id'=>2,'location_id'=>'100','name'           => "Chun Yan Hu",'level' => 'location_staff'],
            ['team_id'=>2,'location_id'=>'100','name'           => "Ruel M. Benigno",'level' => 'location_staff'],
            ['team_id'=>2,'location_id'=>'100','name'           => "Satinder Brar",'level' => 'location_staff'],
            ['team_id'=>2,'location_id'=>'100','name'           => "Randolph Singson",'level' => 'location_staff'],
            ['team_id'=>2,'location_id'=>'100','name'           => "Mohammad Yama",'level' => 'location_staff'],
            ['team_id'=>2,'location_id'=>'100','name'           => "Hui Ting Cherrie Li",'level' => 'location_staff'],
            ['team_id'=>2,'location_id'=>'100','name'           => "Marguerite Bansard",'level' => 'location_staff'],
            ['team_id'=>2,'location_id'=>'100','name'           => "Lalaine Arias",'level' => 'location_staff'],
            ['team_id'=>2,'location_id'=>'100','name'           => "Jeison Eccel",'level' => 'location_staff'],
            ['team_id'=>2,'location_id'=>'100','name'           => "Ramnik Chahal",'level' => 'location_staff'],

        ];
        Employee::insert($armetals_location_staff);
    }
}
