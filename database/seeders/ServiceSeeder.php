<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $service = new Service();
        $service->specialization_id = 1;
        $service->name = 'Check Up and clean';
        $service->save();

        $service1 = new Service();
        $service1->specialization_id = 1;
        $service1->name = 'Fluoride Treatment';
        $service1->save();

        $service2 = new Service();
        $service2->specialization_id = 1;
        $service2->name = 'Fillings';
        $service2->save();

        $service3 = new Service();
        $service3->specialization_id = 1;
        $service3->name = 'White fillings';
        $service3->save();

        $service4 = new Service();
        $service4->specialization_id = 1;
        $service4->name = 'Dentures';
        $service4->save();

        $service5 = new Service();
        $service5->specialization_id = 1;
        $service5->name = 'Root canal treatment';
        $service5->save();

        $service6 = new Service();
        $service6->specialization_id = 1;
        $service6->name = 'Tooth extraction';
        $service6->save();

        $service7 = new Service();
        $service7->specialization_id = 1;
        $service7->name = 'Childrensdentistry';
        $service7->save();

        $service8 = new Service();
        $service8->specialization_id = 1;
        $service8->name = 'Dental crowns';
        $service8->save();

        $service8 = new Service();
        $service8->specialization_id = 1;
        $service8->name = 'Crown Lengthening';
        $service8->save();

        $service9 = new Service();
        $service9->specialization_id = 1;
        $service9->name = 'Gum Reccesion';
        $service9->save();

        $service10 = new Service();
        $service10->specialization_id = 2;
        $service10->name = 'Gum Disease  Treatment';
        $service10->save();

        $service11 = new Service();
        $service11->specialization_id = 2;
        $service11->name = 'Fissure sealants';
        $service11->save();

        $service12 = new Service();
        $service12->specialization_id = 2;
        $service12->name = 'Sport Mouthguards';
        $service12->save();

        $service13 = new Service();
        $service13->specialization_id = 2;
        $service13->name = 'Tooth Grinding & Wear';
        $service13->save();

        $service14 = new Service();
        $service14->specialization_id = 2;
        $service14->name = 'Wisdom teeth';
        $service14->save();

        $service15 = new Service();
        $service15->specialization_id = 3;
        $service15->name = 'Teeht whitening';
        $service15->save();

        $service16 = new Service();
        $service16->specialization_id = 3;
        $service16->name = 'Veeners';
        $service16->save();

        $service17 = new Service();
        $service17->specialization_id = 3;
        $service17->name = 'Dental Bridges';
        $service17->save();

        $service18 = new Service();
        $service18->specialization_id = 3;
        $service18->name = 'Dental crowns';
        $service18->save();

        $service19 = new Service();
        $service19->specialization_id = 3;
        $service19->name = 'Discolored teeth';
        $service19->save();

        $service20 = new Service();
        $service20->specialization_id = 3;
        $service20->name = 'All On 4';
        $service20->save();

        $service21 = new Service();
        $service21->specialization_id = 3;
        $service21->name = 'Implants';
        $service21->save();

        $service22 = new Service();
        $service22->specialization_id = 3;
        $service22->name = 'Onlays Inlays';
        $service22->save();

        $service23 = new Service();
        $service23->specialization_id = 3;
        $service23->name = 'Invisalign';
        $service23->save();

        $service24 = new Service();
        $service24->specialization_id = 4;
        $service24->name = 'Tooth extraction';
        $service24->save();

        $service25 = new Service();
        $service25->specialization_id = 4;
        $service25->name = 'Denture Repairs';
        $service25->save();

        $service26 = new Service();
        $service26->specialization_id = 4;
        $service26->name = 'Root canal treatment';
        $service26->save();

        $service27 = new Service();
        $service27->specialization_id = 4;
        $service27->name = 'Wisdom teeth';
        $service27->save();

        $service28 = new Service();
        $service28->specialization_id = 4;
        $service28->name = 'Trauma Accidents';
        $service28->save();

        $service29 = new Service();
        $service29->specialization_id = 4;
        $service29->name = 'Cracked Teeth';
        $service29->save();

        $service30 = new Service();
        $service30->specialization_id = 4;
        $service30->name = 'Broken Filling';
        $service30->save();

        $service31 = new Service();
        $service31->specialization_id = 4;
        $service31->name = 'Broken Denture';
        $service31->save();

        $service32 = new Service();
        $service32->specialization_id = 4;
        $service32->name = 'Gum Swelling';
        $service32->save();

        $service33 = new Service();
        $service33->specialization_id = 4;
        $service33->name = 'Anxious Patients';
        $service33->save();
    }
}
