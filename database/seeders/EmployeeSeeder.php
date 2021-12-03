<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    public function run()
    {
        $nutters_headoffice_staff = [
            ['location_id'=>'999','name'           => 'Manpreet Brar','level' => 'super_admin'],
            ['location_id'=>'999','name'           => 'Donald Cranston','level' => 'headoffice_staff'],
            ['location_id'=>'999','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("LYNN CRANSTON")))),'level' => 'headoffice_staff'],
            ['location_id'=>'999','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("MELISSA KUNTZ")))),'level' => 'headoffice_staff'],
            ['location_id'=>'999','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("KAYLA BACHMEIER")))),'level' => 'headoffice_staff'],
            ['location_id'=>'999','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("KELLY SEITZ")))),'level' => 'headoffice_staff'],
            ['location_id'=>'999','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("PAUL OGDEN")))),'level' => 'headoffice_staff'],
            ['location_id'=>'999','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("TAMMY GRUE")))),'level' => 'headoffice_staff'],
            ['location_id'=>'999','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("BRAD WINSOR")))),'level' => 'headoffice_staff'],
            ['location_id'=>'999','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("Paul CLEWES")))),'level' => 'headoffice_staff'],
            ['location_id'=>'999','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("NICOLE SUTHERLAND")))),'level' => 'headoffice_staff'],
            ['location_id'=>'999','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("SHELLEY CHAMPION")))),'level' => 'headoffice_staff'],
            ['location_id'=>'999','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("MICHELLE WELLS")))),'level' => 'headoffice_staff'],
            ['location_id'=>'999','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("ANNETTE MATERI")))),'level' => 'headoffice_staff'],
            ['location_id'=>'999','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("LAURA HILLIS")))),'level' => 'headoffice_staff'],
            ['location_id'=>'999','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("CECILE SEEBECK")))),'level' => 'headoffice_staff'],
            ['location_id'=>'999','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("BRANDI PEDERSON")))),'level' => 'headoffice_staff'],
            ['location_id'=>'999','name'           => "Paul Ogden",'level' => 'headoffice_admin'],
            ['location_id'=>'999','name'           => "Brad Winsor",'level' => 'headoffice_admin'],
            ['location_id'=>'999','name'           => "Paul Clewes",'level' => 'headoffice_admin'],
            ['location_id'=>'999','name'           => "Manpreet Brar",'level' => 'headoffice_admin'],
            ['location_id'=>'999','name'           => "Tammy Grue",'level' => 'headoffice_admin'],
        ];
        Employee::insert($nutters_headoffice_staff);

        $nutters_store_staff = [
            //Warehouse
            ['location_id'=>'998','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("SCOTT PHINNEY")))),'level' => 'store_staff'],
            ['location_id'=>'998','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("DARCY GOERTZEN")))),'level' => 'store_staff'],
            ['location_id'=>'998','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("Kevin Elderkin")))),'level' => 'store_staff'],
            ['location_id'=>'998','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("Janiece Richards")))),'level' => 'store_staff'],
            ['location_id'=>'998','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("JEANETTE MACAULAY")))),'level' => 'store_staff'],
            ['location_id'=>'998','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("SANDRA LOFGREN")))),'level' => 'store_staff'],
            ['location_id'=>'998','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("DEVIE MAIER")))),'level' => 'store_staff'],
            ['location_id'=>'998','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("VALERIE LEMNA")))),'level' => 'store_staff'],
            //Specialty
            ['location_id'=>'997','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("KIM MARSHALL")))),'level' => 'store_staff'],
            ['location_id'=>'997','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("DONNELLY GRAD")))),'level' => 'store_staff'],
            ['location_id'=>'997','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("ROSE WEBSTER")))),'level' => 'store_staff'],
            ['location_id'=>'997','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("STEPHANIE ULRICHSEN")))),'level' => 'store_staff'],
            ['location_id'=>'997','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("SANDRA NEUFELD")))),'level' => 'store_staff'],
            ['location_id'=>'997','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("DEANNA THOMPSON")))),'level' => 'store_staff'],
            ['location_id'=>'997','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("KATHY TETLOCK-CORVINUS")))),'level' => 'store_staff'],
            ['location_id'=>'997','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("JIM GRAD")))),'level' => 'store_staff'],
            ['location_id'=>'997','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("DEBORAH KEETLEY")))),'level' => 'store_staff'],
            ['location_id'=>'997','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("PAT WILSON")))),'level' => 'store_staff'],
            ['location_id'=>'997','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("TARA WASYLUK")))),'level' => 'store_staff'],
            ['location_id'=>'997','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("LYNN FAUSER")))),'level' => 'store_staff'],
            ['location_id'=>'997','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("MARCIA CLEMENT")))),'level' => 'store_staff'],
            ['location_id'=>'997','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("GERDA	DE LANGE")))),'level' => 'store_staff'],
            ['location_id'=>'997','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("SHERI LYNN BRUSKY")))),'level' => 'store_staff'],
            ['location_id'=>'997','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("RENA MARIE BROWN")))),'level' => 'store_staff'],
            ['location_id'=>'997','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("DEBRA BUECKERT")))),'level' => 'store_staff'],

            //Regular stores
            //Medicine Hat
            ['location_id'=>'1','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("CHRISTINA DAWN MILLS")))),'level' => 'store_manager'],/*  */
            ['location_id'=>'1','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("JENNIFER MCKENZIE")))),'level' => 'store_staff'],
            ['location_id'=>'1','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("MICHELLE CRESSMAN")))),'level' => 'store_staff'],
            ['location_id'=>'1','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("BERNICE	PEACOCK")))),'level' => 'store_staff'],
            ['location_id'=>'1','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("MICHELLE MENZIES")))),'level' => 'store_staff'],
            ['location_id'=>'1','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("ZOE 	MUDRACK")))),'level' => 'store_staff'],
            ['location_id'=>'1','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("LORNA	FAVEL")))),'level' => 'store_staff'],
            ['location_id'=>'1','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("Darcy 	Wedrick")))),'level' => 'store_staff'],
            ['location_id'=>'1','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("HEAVEN 	CARLTON")))),'level' => 'store_staff'],
            ['location_id'=>'1','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("KRISTEN 	RESENER")))),'level' => 'store_staff'],
            ['location_id'=>'1','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("CELESTE 	HUNTER")))),'level' => 'store_staff'],
            ['location_id'=>'1','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("BROOKLYN 	DAVIDSON")))),'level' => 'store_staff'],
            ['location_id'=>'1','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("Jace 	LEVEQUE")))),'level' => 'store_staff'],
            ['location_id'=>'1','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("Eileigh 	HARRIS-MCGHEE")))),'level' => 'store_staff'],
            ['location_id'=>'1','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("JOLENE 	YANKE SHORT")))),'level' => 'store_staff'],
            ['location_id'=>'1','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("ALEXA 	RUDE")))),'level' => 'store_staff'],
            ['location_id'=>'1','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("CAITLIN 	CAMPBELL")))),'level' => 'store_staff'],
            ['location_id'=>'1','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("LIELT 	SAMKET YESHIGETA")))),'level' => 'store_staff'],
            ['location_id'=>'1','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("CHARLI	DAVIDSON")))),'level' => 'store_staff'],

            //Red Deer
            ['location_id'=>'3','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("CARLA 	MACKENZIE")))),'level' => 'store_manager'],/*  */
            ['location_id'=>'3','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("AMBER 	LAVOIE")))),'level' => 'store_staff'],
            ['location_id'=>'3','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("DIANE 	ERICHSEN")))),'level' => 'store_staff'],
            ['location_id'=>'3','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("CHRISTINE 	BARNES")))),'level' => 'store_staff'],
            ['location_id'=>'3','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("CLEO	TETTEH")))),'level' => 'store_staff'],
            ['location_id'=>'3','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("RILEY	SUTHERLAND")))),'level' => 'store_staff'],
            ['location_id'=>'3','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("SALLY	BUSBY")))),'level' => 'store_staff'],
            ['location_id'=>'3','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("CHEY-ANNE 	GILLESPIE")))),'level' => 'store_staff'],
            ['location_id'=>'3','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("CRYSTAL 	GREENWALL")))),'level' => 'store_staff'],
            ['location_id'=>'3','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("HAROLD	JACOBSON")))),'level' => 'store_staff'],
            ['location_id'=>'3','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("ELIZABETH 	BAKER")))),'level' => 'store_staff'],
            ['location_id'=>'3','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("TONI-LYNN 	NOBBS")))),'level' => 'store_staff'],
            ['location_id'=>'3','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("Hope	Forslund-Clark")))),'level' => 'store_staff'],
            ['location_id'=>'3','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("NEIL ALLAN JR.	YOUNG")))),'level' => 'store_staff'],
            ['location_id'=>'3','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("TINA	JACKSON")))),'level' => 'store_staff'],
            ['location_id'=>'3','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("SHAUN	KUHL")))),'level' => 'store_staff'],

            //Camrose
            ['location_id'=>'45','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("JODY 	MCDOUGALL")))),'level' => 'store_manager'],/*  */
            ['location_id'=>'45','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("SHELBY 	BIANIC")))),'level' => 'store_staff'],
            ['location_id'=>'45','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("YVONNE 	ROBINSON")))),'level' => 'store_staff'],
            ['location_id'=>'45','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("LEANNE SUSAN	WALTER")))),'level' => 'store_staff'],
            ['location_id'=>'45','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("ELIZABETH 	SEMENIUK")))),'level' => 'store_staff'],
            ['location_id'=>'45','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("GRACE 	PEREIRA")))),'level' => 'store_staff'],
            ['location_id'=>'45','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("Nola	Smith")))),'level' => 'store_staff'],

            //Canmore
            ['location_id'=>'44','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("ANNETTE 	BRONSCH")))),'level' => 'store_manager'],/*  */
            ['location_id'=>'44','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("DANIEL	FITZPATRICK")))),'level' => 'store_staff'],
            ['location_id'=>'44','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("CONSTANZA 	COFRE ESPINOZA")))),'level' => 'store_staff'],
            ['location_id'=>'44','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("JARED 	SKIRROW")))),'level' => 'store_staff'],
            ['location_id'=>'44','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("BENJAMIN 	BRONSCH")))),'level' => 'store_staff'],
            ['location_id'=>'44','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("CRYSTAL 	PILOTTE")))),'level' => 'store_staff'],
            ['location_id'=>'44','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("JULIE 	ANGUS")))),'level' => 'store_staff'],
            ['location_id'=>'44','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("KAYLA CRYSTAL	DESROSIERS")))),'level' => 'store_staff'],
            ['location_id'=>'44','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("MARIBEL 	SORIANO")))),'level' => 'store_staff'],
            ['location_id'=>'44','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("CINDY 	KELLY")))),'level' => 'store_staff'],
            ['location_id'=>'44','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("IZABELA 	VOJSOVICOVA")))),'level' => 'store_staff'],
            ['location_id'=>'44','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("MAYA 	SESHIA")))),'level' => 'store_staff'],

            //Moose Jaw
            ['location_id'=>'5','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("JEROME 	KOEBEL")))),'level' => 'store_manager'],/*  */
            ['location_id'=>'5','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("MARLENE 	MOULD")))),'level' => 'store_staff'],
            ['location_id'=>'5','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("YSALINE	DEPLASSE")))),'level' => 'store_staff'],
            ['location_id'=>'5','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("JENNA 	DAVY")))),'level' => 'store_staff'],
            ['location_id'=>'5','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("DARLA 	ENDICOTT")))),'level' => 'store_staff'],
            ['location_id'=>'5','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("ELIJAH	NICHVALODOFF")))),'level' => 'store_staff'],

            //Swift Current
            ['location_id'=>'47','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("BECKY 	THEISE")))),'level' => 'store_manager'],/*  */
            ['location_id'=>'47','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("MARIAH 	PENNER")))),'level' => 'store_staff'],
            ['location_id'=>'47','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("TANIA 	ZACHARIAS")))),'level' => 'store_staff'],
            ['location_id'=>'47','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("BARBARA	McCUAIG")))),'level' => 'store_staff'],
            ['location_id'=>'47','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("CASSANDRA 	BLYTH")))),'level' => 'store_staff'],
            ['location_id'=>'47','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("ESTHER 	RATZLAFF")))),'level' => 'store_staff'],
            ['location_id'=>'47','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("HALEY	FORFAR")))),'level' => 'store_staff'],

            //Saskatoon
            ['location_id'=>'48','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("MONTANA	KYLIUK")))),'level' => 'store_manager'],/*  */
            ['location_id'=>'48','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("HAILEY 	LAFFERTY")))),'level' => 'store_staff'],
            ['location_id'=>'48','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("JENNIFER 	LENHART")))),'level' => 'store_staff'],
            ['location_id'=>'48','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("Leah 	Haas")))),'level' => 'store_staff'],
            ['location_id'=>'48','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("DELPHINE 	MARYNIAK")))),'level' => 'store_staff'],
            ['location_id'=>'48','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("RENAE 	BROOMAN")))),'level' => 'store_staff'],

            //Okotoks
            ['location_id'=>'38','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("CARLEENA 	YATES")))),'level' => 'store_manager'],/*  */
            ['location_id'=>'38','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("ALISON 	REYNOLDS")))),'level' => 'store_staff'],
            ['location_id'=>'38','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("Nicole Dawn	Toren")))),'level' => 'store_staff'],
            ['location_id'=>'38','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("LAURA 	PATON")))),'level' => 'store_staff'],
            ['location_id'=>'38','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("AFTON 	MCELROY")))),'level' => 'store_staff'],
            ['location_id'=>'38','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("MARGARET 	BOWEN")))),'level' => 'store_staff'],
            ['location_id'=>'38','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("MICHAEL 	CAMPBELL")))),'level' => 'store_staff'],
            ['location_id'=>'38','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("REBECCA 	MEISL")))),'level' => 'store_staff'],
            ['location_id'=>'38','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("LINDA	FLOREN")))),'level' => 'store_staff'],
            ['location_id'=>'38','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("Asia	Grant-Eshleman")))),'level' => 'store_staff'],
            ['location_id'=>'38','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("CATHIE	WINTER")))),'level' => 'store_staff'],

            //Jasper
            ['location_id'=>'28','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("JONATHAN	BOWLEY")))),'level' => 'store_manager'],/*  */
            ['location_id'=>'28','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("ALETHEIA 	CHACONAS")))),'level' => 'store_staff'],
            ['location_id'=>'28','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("RIKKE 	LIISBERG-LARSEN")))),'level' => 'store_staff'],
            ['location_id'=>'28','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("SAGE 	DUGUAY")))),'level' => 'store_staff'],
            ['location_id'=>'28','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("Cassidy 	STAINTON")))),'level' => 'store_staff'],
            ['location_id'=>'28','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("LYNDSEY 	HUSSEY")))),'level' => 'store_staff'],
            ['location_id'=>'28','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("JASON	PATIENCE")))),'level' => 'store_staff'],

            //Lloydminster
            ['location_id'=>'10','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("VANESSA 	PALABRICA")))),'level' => 'store_manager'],/*  */
            ['location_id'=>'10','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("RANDALL 	SMITH")))),'level' => 'store_staff'],
            ['location_id'=>'10','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("MINEKO 	STRUEBY")))),'level' => 'store_staff'],
            ['location_id'=>'10','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("MARNIE 	SOUTER")))),'level' => 'store_staff'],
            ['location_id'=>'10','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("RACHEL 	BRAND")))),'level' => 'store_staff'],
            ['location_id'=>'10','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("ELAINE 	GRAHAM")))),'level' => 'store_staff'],
            ['location_id'=>'10','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("AMROELEN 	HERRERA")))),'level' => 'store_staff'],

            //Airdrie
            ['location_id'=>'50','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("EDDIE 	GANUELAS")))),'level' => 'store_manager'],/*  */
            ['location_id'=>'50','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("SHELLEY	JOHNSON")))),'level' => 'store_staff'],
            ['location_id'=>'50','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("CHRISTOPHER 	JORGENSEN")))),'level' => 'store_staff'],
            ['location_id'=>'50','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("Chandra 	Baeuchle")))),'level' => 'store_staff'],
            ['location_id'=>'50','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("DAYNA 	GAERTNER")))),'level' => 'store_staff'],
            ['location_id'=>'50','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("DANIELLE 	SABOURIN")))),'level' => 'store_staff'],
            ['location_id'=>'50','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("Shelley 	Carefoot")))),'level' => 'store_staff'],
            ['location_id'=>'50','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("HOLLY 	REDDIN")))),'level' => 'store_staff'],

            //Lethbridge
            ['location_id'=>'6','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("DAN 	MCINTYRE")))),'level' => 'store_manager'],/*  */
            ['location_id'=>'6','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("FRANCES	POPE")))),'level' => 'store_staff'],
            ['location_id'=>'6','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("HEATHER 	STRAIN")))),'level' => 'store_staff'],
            ['location_id'=>'6','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("HAIDI 	NAVARRO")))),'level' => 'store_staff'],
            ['location_id'=>'6','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("LORI 	BORAU")))),'level' => 'store_staff'],
            ['location_id'=>'6','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("KEN 	LOWRY")))),'level' => 'store_staff'],
            ['location_id'=>'6','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("Hannah 	Duda")))),'level' => 'store_staff'],
            ['location_id'=>'6','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("TALIA 	ASHCROFT")))),'level' => 'store_staff'],
            ['location_id'=>'6','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("ALICE 	JONES")))),'level' => 'store_staff'],
            ['location_id'=>'6','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("JUDY 	SEBERG")))),'level' => 'store_staff'],
            ['location_id'=>'6','name'           => preg_replace('!\s+!', ' ', (ucwords(strtolower("KEESHA 	HOLT")))),'level' => 'store_staff'],

        ];
        Employee::insert($nutters_store_staff);


    }
}
