<?php

namespace Database\Seeders;

use App\Models\MachineCenter;
use Illuminate\Database\Seeder;

class MachineCenterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $machineCenters = [
            ['team_id' => 2,'name' => 'CA106-Compressor Air King'],
            ['team_id' => 2,'name' => 'CA184-Compressor/Comp Air'],
            ['team_id' => 2,'name' => 'CA324-Pressure Tank'],
            ['team_id' => 2,'name' => 'CA551-Compressor'],
            ['team_id' => 2,'name' => 'CA558-Compressor'],
            ['team_id' => 2,'name' => 'GP585-Laser Etching'],
            ['team_id' => 2,'name' => 'HP105-Polish_Machine'],
            ['team_id' => 2,'name' => 'HP227-Polishing_Machin'],
            ['team_id' => 2,'name' => 'HP576-Polishing_-_Buff'],
            ['team_id' => 2,'name' => 'HP577-Polishing-Buffing Machine'],
            ['team_id' => 2,'name' => 'HP578-Polishing-Buffing Machine'],
            ['team_id' => 2,'name' => 'MA115-Fuel_tank_strap_'],
            ['team_id' => 2,'name' => 'MA119-Band Saw A&R'],
            ['team_id' => 2,'name' => 'MA129-Machine Lathe'],
            ['team_id' => 2,'name' => 'MA131-Verticle_mill'],
            ['team_id' => 2,'name' => 'MA134-Drill Press'],
            ['team_id' => 2,'name' => 'MA158-Surface Grinder'],
            ['team_id' => 2,'name' => 'MA159-Drill_Press'],
            ['team_id' => 2,'name' => 'MA165-Pedestal Grinder'],
            ['team_id' => 2,'name' => 'MA203-Threading_Machin'],
            ['team_id' => 2,'name' => 'MA220-Wing_Vertical_mi'],
            ['team_id' => 2,'name' => 'MA221-Mobile Lift'],
            ['team_id' => 2,'name' => 'MA444-Forklift(Propane)/Toyota'],
            ['team_id' => 2,'name' => 'MA446-Mig Welder'],
            ['team_id' => 2,'name' => 'MA561-Forklift'],
            ['team_id' => 2,'name' => 'MS107-CNC_Brake_/_Accu'],
            ['team_id' => 2,'name' => 'MS224-CNC_IMCAR_roller'],
            ['team_id' => 2,'name' => 'MS401-CNC_Punch_Press'],
            ['team_id' => 2,'name' => 'MS402-CNC_Punch_Press'],
            ['team_id' => 2,'name' => 'MS403-CNC_Punch_Press'],
            ['team_id' => 2,'name' => 'MS412-CNC_Brake_/_Accu'],
            ['team_id' => 2,'name' => 'MS413-CNC_Brake_/_Accu'],
            ['team_id' => 2,'name' => 'MS416-All_Steel_Brake_'],
            ['team_id' => 2,'name' => 'MS422-Roller_/_Famar_r'],
            ['team_id' => 2,'name' => 'MS423-Roller_/_New_Dim'],
            ['team_id' => 2,'name' => 'PL214-Drying Oven Prep'],
            ['team_id' => 2,'name' => 'PL320-Paint Cure Oven'],
            ['team_id' => 2,'name' => 'PL321-Painting_Booth_/'],
            ['team_id' => 2,'name' => 'PL322-Part Wash and Rinse'],
            ['team_id' => 2,'name' => 'SP102-Belt_Sander'],
            ['team_id' => 2,'name' => 'SP109-500_Ton_Hydrauli'],
            ['team_id' => 2,'name' => 'SP111-Spot_welder'],
            ['team_id' => 2,'name' => 'SP118-Hand_Shear'],
            ['team_id' => 2,'name' => 'SP136-Roller'],
            ['team_id' => 2,'name' => 'SP137-30_ton_hydraulic'],
            ['team_id' => 2,'name' => 'SP142-30_ton_punch_pre'],
            ['team_id' => 2,'name' => 'SP147-Air_Cleaner_Band'],
            ['team_id' => 2,'name' => 'SP149-100_ton_brake_pr'],
            ['team_id' => 2,'name' => 'SP156-CNC_Punch_Press'],
            ['team_id' => 2,'name' => 'SP164-80_ton_punch_pre'],
            ['team_id' => 2,'name' => 'SP175-Cab_Skirt_Bender'],
            ['team_id' => 2,'name' => 'SP178-40_ton_press'],
            ['team_id' => 2,'name' => 'SP199-110_ton_punch_pr'],
            ['team_id' => 2,'name' => 'SP202-Deburring_Machin'],
            ['team_id' => 2,'name' => 'SP216-Band_saw'],
            ['team_id' => 2,'name' => 'SP218-300_ton_punch_pr'],
            ['team_id' => 2,'name' => 'SP219-Mechanical_punch'],
            ['team_id' => 2,'name' => 'SP411-CNC_brake'],
            ['team_id' => 2,'name' => 'SP415-CNC_brake_press'],
            ['team_id' => 2,'name' => 'SP428-Roller/New Dimension'],
            ['team_id' => 2,'name' => 'SP441-CNC_laser_Cut'],
            ['team_id' => 2,'name' => 'SP445-PRC_Laser_Lab'],
            ['team_id' => 2,'name' => 'SP567-Time Saver/Debur'],
            ['team_id' => 2,'name' => 'SP575-Servo Roll Feed'],
            ['team_id' => 2,'name' => 'SP575-Vertical Contour Saw'],
            ['team_id' => 2,'name' => 'SP581-Shear'],
            ['team_id' => 2,'name' => 'TP225-CNC_tube_bender_'],
            ['team_id' => 2,'name' => 'TP101-Sand_Belt'],
            ['team_id' => 2,'name' => 'TP117-Multi_tube_bende'],
            ['team_id' => 2,'name' => 'TP124-Hand_brake'],
            ['team_id' => 2,'name' => 'TP132-Drill_press_Shea'],
            ['team_id' => 2,'name' => 'TP138-Brake_press_/_Ch'],
            ['team_id' => 2,'name' => 'TP143-25_ton_punch_pre'],
            ['team_id' => 2,'name' => 'TP144-75_ton_punch_pre'],
            ['team_id' => 2,'name' => 'TP145-Numbering_machin'],
            ['team_id' => 2,'name' => 'TP146-Hand Tube Bender'],
            ['team_id' => 2,'name' => 'TP150-50_ton_punch_pre'],
            ['team_id' => 2,'name' => 'TP153-35_ton_punch_pre'],
            ['team_id' => 2,'name' => 'TP155-CNC_Saw_Cutting'],
            ['team_id' => 2,'name' => 'TP157-Hand_Bender'],
            ['team_id' => 2,'name' => 'TP161-F50_twin_header_'],
            ['team_id' => 2,'name' => 'TP167-Tube_Cutting_Saw'],
            ['team_id' => 2,'name' => 'TP168-Tube_Bender_/'],
            ['team_id' => 2,'name' => 'TP169-50_ton_punch_pre'],
            ['team_id' => 2,'name' => 'TP176-65_ton_press'],
            ['team_id' => 2,'name' => 'TP181-Twin_Bender_/'],
            ['team_id' => 2,'name' => 'TP196-Forklift(Propane)/Daewoo'],
            ['team_id' => 2,'name' => 'TP215-CNC_Brake_/Accur'],
            ['team_id' => 2,'name' => 'TP226-Twin_Tube_Bender'],
            ['team_id' => 2,'name' => 'TP450-CNC_Band_Saw'],
            ['team_id' => 2,'name' => 'TP460-Mechanical_punch'],
            ['team_id' => 2,'name' => 'TP574-VibraHone'],
            ['team_id' => 2,'name' => 'TP582-Drill Press Shearing'],
            ['team_id' => 2,'name' => 'TP587-Drill_Press'],
            ['team_id' => 2,'name' => 'WL148-Mig_welder'],
            ['team_id' => 2,'name' => 'WL152-Tig_Wave_Welder'],
            ['team_id' => 2,'name' => 'WL198-Tig_Arc_Welder'],
            ['team_id' => 2,'name' => 'WL200-CNC_Robot_Weldin'],
            ['team_id' => 2,'name' => 'WL201-Arcworld Robot'],
            ['team_id' => 2,'name' => 'WL565-Mig_welder'],
            ['team_id' => 2,'name' => 'WL566-Mig_welder'],
            ['team_id' => 2,'name' => 'WL583-Robot Weld Yaskawa Motoman Robotics'],
        ];

        MachineCenter::insert($machineCenters);
    }
}
/*
CA106-Compressor Air King
CA184-Compressor/Comp Air
CA324-Pressure Tank
CA551-Compressor
CA558-Compressor
GP585-Laser Etching
HP105-Polish_Machine
HP227-Polishing_Machin
HP576-Polishing_-_Buff
HP577-Polishing-Buffing Machine
HP578-Polishing-Buffing Machine
MA115-Fuel_tank_strap_
MA119-Band Saw A&R
MA129-Machine Lathe
MA131-Verticle_mill
MA134-Drill Press
MA158-Surface Grinder
MA159-Drill_Press
MA165-Pedestal Grinder
MA203-Threading_Machin
MA220-Wing_Vertical_mi
MA221-Mobile Lift
MA444-Forklift(Propane)/Toyota
MA446-Mig Welder
MA561-Forklift
MS107-CNC_Brake_/_Accu
MS224-CNC_IMCAR_roller
MS401-CNC_Punch_Press
MS402-CNC_Punch_Press
MS403-CNC_Punch_Press
MS412-CNC_Brake_/_Accu
MS413-CNC_Brake_/_Accu
MS416-All_Steel_Brake_
MS422-Roller_/_Famar_r
MS423-Roller_/_New_Dim
PL214-Drying Oven Prep
PL320-Paint Cure Oven
PL321-Painting_Booth_/
PL322-Part Wash and Rinse
SP102-Belt_Sander
SP109-500_Ton_Hydrauli
SP111-Spot_welder
SP118-Hand_Shear
SP136-Roller
SP137-30_ton_hydraulic
SP142-30_ton_punch_pre
SP147-Air_Cleaner_Band
SP149-100_ton_brake_pr
SP156-CNC_Punch_Press
SP164-80_ton_punch_pre
SP175-Cab_Skirt_Bender
SP178-40_ton_press
SP199-110_ton_punch_pr
SP202-Deburring_Machin
SP216-Band_saw
SP218-300_ton_punch_pr
SP219-Mechanical_punch
SP411-CNC_brake
SP415-CNC_brake_press
SP428-Roller/New Dimension
SP441-CNC_laser_Cut
SP445-PRC_Laser_Lab
SP567-Time Saver/Debur
SP575-Servo Roll Feed
SP575-Vertical Contour Saw
SP581-Shear
TP225-CNC_tube_bender_
TP101-Sand_Belt
TP117-Multi_tube_bende
TP124-Hand_brake
TP132-Drill_press_Shea
TP138-Brake_press_/_Ch
TP143-25_ton_punch_pre
TP144-75_ton_punch_pre
TP145-Numbering_machin
TP146-Hand Tube Bender
TP150-50_ton_punch_pre
TP153-35_ton_punch_pre
TP155-CNC_Saw_Cutting
TP157-Hand_Bender
TP161-F50_twin_header_
TP167-Tube_Cutting_Saw
TP168-Tube_Bender_/
TP169-50_ton_punch_pre
TP176-65_ton_press
TP181-Twin_Bender_/
TP196-Forklift(Propane)/Daewoo
TP215-CNC_Brake_/Accur
TP226-Twin_Tube_Bender
TP450-CNC_Band_Saw
TP460-Mechanical_punch
TP574-VibraHone
TP582-Drill Press Shearing
TP587-Drill_Press
WL148-Mig_welder
WL152-Tig_Wave_Welder
WL198-Tig_Arc_Welder
WL200-CNC_Robot_Weldin
WL201-Arcworld Robot
WL565-Mig_welder
WL566-Mig_welder
WL583-Robot Weld Yaskawa Motoman Robotics
*/
