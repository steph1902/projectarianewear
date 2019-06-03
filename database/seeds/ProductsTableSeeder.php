<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        
        DB::table('products')->insert([
            'product_name' => 'ABBY TOP',
            'product_stock' => rand(1,100),
            'product_price' => 285000,
            'product_material' => 'SATTEN CREPE',
            'product_description' => 'Flare at front detail , Premium Sateen Fabric , wide Sabrina neck, Free size',
            'product_wash_instruction' => 'Hand wash cold separetely , was inside out , do not bleach , do not dry clean , do not iron print or decorative print.'
            // 'product_color' => ''

            
        ]);

        DB::table('products')->insert([
            'product_name' => 'AGATHA DRESS',
            'product_stock' => rand(1,100),
            'product_price' => 359000,
            'product_material' => 'JERSEY',
            'product_description' => 'v neck, long v neck, elastis strech,strech fabric, long sleeves',
            'product_wash_instruction' => 'Hand wash cold separetely , was inside out , do not bleach , do not dry clean , do not iron print or decorative print.'
            
        ]);

        DB::table('products')->insert([
            'product_name' => 'ALEEYAH DRESS',
            'product_stock' => rand(1,100),
            'product_price' => 300000,
            'product_material' => 'SATTEN',
            'product_description' => 'None',
            'product_wash_instruction' => 'Hand wash cold separetely , was inside out , do not bleach , do not dry clean , do not iron print or decorative print.'
            
        ]);

        DB::table('products')->insert([
            'product_name' => 'ALEXA TOP',
            'product_stock' => rand(1,100),
            'product_price' => 300000,
            'product_material' => 'None',
            'product_description' => 'None',
            'product_wash_instruction' => 'Hand wash cold separetely , was inside out , do not bleach , do not dry clean , do not iron print or decorative print.'

            
        ]);

        DB::table('products')->insert([
            'product_name' => 'ALICE VEST',
            'product_stock' => rand(1,100),
            'product_price' => 395000,
            'product_material' => 'None',
            'product_description' => 'None',
            'product_wash_instruction' => 'Hand wash cold separetely , was inside out , do not bleach , do not dry clean , do not iron print or decorative print'
            
        ]);

        DB::table('products')->insert([
            'product_name' => 'ALINA',
            'product_stock' => rand(1,100),
            'product_price' => 240000,
            'product_material' =>  'None',
            'product_description' => 'None',
            'product_wash_instruction' => 'Hand wash cold separetely , was inside out , do not bleach , do not dry clean , do not iron print or decorative print.'

            
        ]);

        DB::table('products')->insert([
            'product_name' => 'ARA PLEATS TOP',
            'product_stock' => rand(1,100),
            'product_price' => 285000,
            'product_material' =>  'None',
            'product_description' => 'None',
            'product_wash_instruction' => 'Hand wash cold separetely , was inside out , do not bleach , do not dry clean , do not iron print or decorative print.'
            
        ]);

        DB::table('products')->insert([
            'product_name' => 'ARIANE TANKTOP',
            'product_stock' => rand(1,100),
            'product_price' => 240000,
            'product_material' => 'SATTEN WITH ORGANZA',
            'product_description' => 'SLEEVELESS REVERSIBLE.ORGANZA WITH CLEAN FINISHING AND FLOWY LOOK',
            'product_wash_instruction' => 'Hand wash cold separetely , was inside out , do not bleach , do not dry clean , do not iron print or decorative print .'
            
        ]);

        DB::table('products')->insert([
            'product_name' => 'BELL TOP',
            'product_stock' => rand(1,100),
            'product_price' => 0,
            'product_material' => 'None',
            'product_description' => 'None',
            'product_wash_instruction' => 'Hand wash cold separetely , was inside out , do not bleach , do not dry clean , do not iron print or decorative print.'
            
        ]);

        DB::table('products')->insert([
            'product_name' => 'BELL PANTS',
            'product_stock' => rand(1,100),
            'product_price' => 300000,
            'product_material' => 'None',
            'product_description' => 'None',
            'product_wash_instruction' => 'Hand wash cold separetely , was inside out , do not bleach , do not dry clean , do not iron print or decorative print .'

            
        ]);

        DB::table('products')->insert([
            'product_name' => 'BELL SET',
            'product_stock' => rand(1,100),
            'product_price' => 500000,
            'product_material' => 'None',
            'product_description' => 'None',
            'product_wash_instruction' => 'Hand wash cold separetely , was inside out , do not bleach , do not dry clean , do not iron print or decorative print.'
            
        ]);

        DB::table('products')->insert([
            'product_name' => 'BELLA TOP',
            'product_stock' => rand(1,100),
            'product_price' => 265000,
            'product_material' => 'SCUBA CREPE',
            'product_description' => 'None',
            'product_wash_instruction' => 'Hand wash cold separetely , was inside out , do not bleach , do not dry clean , do not iron print or decorative print.'
            
        ]);

        DB::table('products')->insert([
            'product_name' => 'BIANCA TANK TOP',
            'product_stock' => rand(1,100),
            'product_price' => 200000,
            'product_material' => 'SATTEN',
            'product_description' => 'Crop top no lining cemben style adjustable rope',
            'product_wash_instruction' => 'Hand wash cold separetely , was inside out , do not bleach , do not dry clean , do not iron print or decorative print .'
        ]);

        DB::table('products')->insert([
            'product_name' => 'CAIL DRESS',
            'product_stock' => rand(1,100),
            'product_price' => 300000,
            'product_material' => 'INTERLOCK COTTON PUFF HAND',
            'product_description' => 'V round neck , neck verystrech fabric',
            'product_wash_instruction' => 'Hand wash cold separetely , was inside out , do not bleach , do not dry clean , do not iron print or decorative print .'            
        ]);

        DB::table('products')->insert([
            'product_name' => 'CELINE DRESS',
            'product_stock' => rand(1,100),
            'product_price' => 350000,
            'product_material' => 'SATTEN',
            'product_description' => 'None',
            'product_wash_instruction' => 'Hand wash cold separetely , was inside out , do not bleach , do not dry clean , do not iron print or decorative print .'
            
        ]);

        DB::table('products')->insert([
            'product_name' => 'CHLOE',
            'product_stock' => rand(1,100),
            'product_price' =>
            'product_material' =>
            'product_description' =>
            'product_wash_instruction' =>
            
        ]);

        DB::table('products')->insert([
            'product_name' => 'CINDY TANK TOP',
            'product_stock' => rand(1,100),
            'product_price' => 220000,
            'product_material' => 'PREMIUM COTTON',
            'product_description' => 'CINDY TANK TOP, V NECK, SPAGETTI STRIPE, LACE DETAIL FRONT',
            'product_wash_instruction' => 'Hand wash cold separetely , was inside out , do not bleach , do not dry clean , do not iron print or decorative print .'
            
        ]);

        DB::table('products')->insert([
            'product_name' => 'CLARA OUTER',
            'product_stock' => rand(1,100),
            'product_price' => 350000,
            'product_material' => 'PREMIUM CREPE',
            'product_description' => 'CLARA OUTER , LINING INSIDE, BLAZER WITH CLEAN DETAIL AT FRONT , LONG SLEEVE, COMFORT FIT, FREE SIZE',
            'product_wash_instruction' => 'Hand wash cold separetely , was inside out , do not bleach , do not dry clean , do not iron print or decorative print .'
            
        ]);

        DB::table('products')->insert([
            'product_name' => 'DOROTHY TANKTOP',
            'product_stock' => rand(1,100),
            'product_price' => 270000,
            'product_material' => 'KNOTE IT SELF',
            'product_description' => 'frontdetail, elastic at the back, side zepper',
            'product_wash_instruction' => 'Hand wash cold separetely , was inside out , do not bleach , do not dry clean , do not iron print or decorative print .'
            
        ]);

        DB::table('products')->insert([
            'product_name' => 'EBONY',
            'product_stock' => rand(1,100),
            'product_price' => 300000,
            'product_material' => 'None',
            'product_description' => 'None',
            'product_wash_instruction' => 'Hand wash cold separetely , was inside out , do not bleach , do not dry clean , do not iron print or decorative print .'
            
        ]);

        DB::table('products')->insert([
            'product_name' => 'EVA TOP',
            'product_stock' => rand(1,100),
            'product_price' => 270000,
            'product_material' => 'SCUBA',
            'product_description' => 'Scuba sleeveless , origami front flowy style',
            'product_wash_instruction' => 'Hand wash cold separetely , was inside out , do not bleach , do not dry clean , do not iron print or decorative print'
            
        ]);

        DB::table('products')->insert([
            'product_name' => 'FLYNN OUTER',
            'product_stock' => rand(1,100),
            'product_price' => 500000,
            'product_material' => 'PREMIUM BLACK OUT',
            'product_description' => 'Fluffy flare hand , Fully Lining , Bordir detail at neck, Premium black out Fabric.',
            'product_wash_instruction' => 'Hand wash cold separetely , was inside out , do not bleach , do not dry clean , do not iron print or decorative print .'
            
        ]);

        DB::table('products')->insert([
            'product_name' => 'FRISKA PLEATS DRESS',
            'product_stock' => rand(1,100),
            'product_price' =>  850000,
            'product_material' => 'None',
            'product_description' => 'None',
            'product_wash_instruction' => 'Hand wash cold separetely , was inside out , do not bleach , do not dry clean , do not iron print or decorative print .'
            
        ]);

        DB::table('products')->insert([
            'product_name' => 'GAIA TOP',
            'product_stock' => rand(1,100),
            'product_price' =>  265000,
            'product_material' => 'None',
            'product_description' => 'None',
            'product_wash_instruction' => 'Hand wash cold separetely , was inside out , do not bleach , do not dry clean , do not iron print or decorative print .'
            
        ]);

        DB::table('products')->insert([
            'product_name' => 'INDY OUTER',
            'product_stock' => rand(1,100),
            'product_price' => 360000,
            'product_material' => 'SCUBA',
            'product_description' => 'None',
            'product_wash_instruction' => 'Hand wash cold separetely , was inside out , do not bleach , do not dry clean , do not iron print or decorative print'
            
        ]);

        DB::table('products')->insert([
            'product_name' => 'JOLLYN',
            'product_stock' => rand(1,100),
            'product_price' => 240000,
            'product_material' => 'None',
            'product_description' => 'None',
            'product_wash_instruction' => 'Hand wash cold separetely , was inside out , do not bleach , do not dry clean , do not iron print or decorative print'
            
        ]);

        DB::table('products')->insert([
            'product_name' => 'KIM JUMPSUIT',
            'product_stock' => rand(1,100),
            'product_price' => 500000,
            'product_material' => 'SCUBA'
            'product_description' => 'Very strech fabric , Lining inside, Have button detail at frind, 2 tone colour',
            'product_wash_instruction' => 'Hand wash cold separetely , was inside out , do not bleach , do not dry clean , do not iron print or decorative print'
            
        ]);

        DB::table('products')->insert([
            'product_name' => 'KIMMY TOP',
            'product_stock' => rand(1,100),
            'product_price' => 0,
            'product_material' => 'KNITTING COTTON',
            'product_description' => 'Knitting cotton strech fabric overlap knot relaxed fit',
            'product_wash_instruction' => 'Hand wash cold separetely , was inside out , do not bleach , do not dry clean , do not iron print or decorative print'
            
        ]);

        DB::table('products')->insert([
            'product_name' => 'KOURTNEY DRESS',
            'product_stock' => rand(1,100),
            'product_price' => 450000,
            'product_material' => 'VELVET SUEDE',
            'product_description' => 'Velvet suede fabric, Sleeveless, Detail twisted at front , V shape neck',
            'product_wash_instruction' => 'Hand wash cold separetely , was inside out , do not bleach , do not dry clean , do not iron print or decorative print .'
        ]);

        DB::table('products')->insert([
            'product_name' => 'KYLIE JUMPSUIT',
            'product_stock' => rand(1,100),
            'product_price' => 375000,
            'product_material' => 'SCUBA MIX , SCUBA CRAP',
            'product_description' => 'Overlap  style, Drappery style, Long Pants, Very strech fabric , zipper at back side'
            'product_wash_instruction' => 'Hand wash cold separetely , was inside out , do not bleach , do not dry clean , do not iron print or decorative print .'
            
        ]);

        DB::table('products')->insert([
            'product_name' => 'LACE TOP',
            'product_stock' => rand(1,100),
            'product_price' => 270000,
            'product_material' => 'None',
            'product_description' => 'None',
            'product_wash_instruction' => 'Hand wash cold separetely , was inside out , do not bleach , do not dry clean , do not iron print or decorative print .'
            
        ]);

        DB::table('products')->insert([
            'product_name' => 'LENA TOP',
            'product_stock' => rand(1,100),
            'product_price' => 265000,
            'product_material' => 'SCUBA CREPE',
            'product_description' => 'LOOSE FITTING, ASYMETRICAL SHOLDER, UNFINISH TRIMING',
            'product_wash_instruction' => 'Hand wash cold separetely , was inside out , do not bleach , do not dry clean , do not iron print or decorative print.'
            
        ]);

        DB::table('products')->insert([
            'product_name' => 'LORRA DRESS',
            'product_stock' => rand(1,100),
            'product_price' => 260000,
            'product_material' => 'None',
            'product_description' => 'None',
            'product_wash_instruction' => 'Hand wash cold separetely , was inside out , do not bleach , do not dry clean , do not iron print or decorative print .'
            
        ]);

        DB::table('products')->insert([
            'product_name' => 'LUNA VEST',
            'product_stock' => rand(1,100),
            'product_price' => 285000,
            'product_material' => 'SCUBA',
            'product_description' => 'SLEEVESLESS, PATCH POCKET DETAIL, UNFINISH SEAM',
            'product_wash_instruction' => 'Hand wash cold separetely , was inside out , do not bleach , do not dry clean , do not iron print or decorative print .'
            
        ]);

        DB::table('products')->insert([
            'product_name' => 'LYN TOP',
            'product_stock' => rand(1,100),
            'product_price' => 220000,
            'product_material' => 'COTTON',
            'product_description' => 'LONG SLEEVE.AT SLEEVE CAN PULL THE ROPE TO UP THE SLEEVE',
            'product_wash_instruction' => 'Hand wash cold separetely , was inside out , do not bleach , do not dry clean , do not iron print or decorative print .'
            
        ]);

        DB::table('products')->insert([
            'product_name' => 'MARSYA TOP',
            'product_stock' => rand(1,100),
            'product_price' => 300000,
            'product_material' => 'Double strech cotton',
            'product_description' => 'Double strech cotton, v round neck button front detail origami flare st',
            'product_wash_instruction' => 'Hand wash cold separetely , was inside out , do not bleach , do not dry clean , do not iron print or decorative print .'
            
        ]);

        DB::table('products')->insert([
            'product_name' => 'MARZA TANK TOP',
            'product_stock' => rand(1,100),
            'product_price' => 200000,
            'product_material' => 'SATTEN',
            'product_description' => 'Satten, v neck with rubber rope',
            'product_wash_instruction' => 'Hand wash cold separetely , was inside out , do not bleach , do not dry clean , do not iron print or decorative print .'
            
        ]);

        DB::table('products')->insert([
            'product_name' => 'MEZZA TOP',
            'product_stock' => rand(1,100),
            'product_price' => 300000,
            'product_material' => 'None',
            'product_description' => 'None'
            'product_wash_instruction' => 'Hand wash cold separetely , was inside out , do not bleach , do not dry clean , do not iron print or decorative print .'
        ]);

        DB::table('products')->insert([
            'product_name' => 'MILA PANTS',
            'product_stock' => rand(1,100),
            'product_price' => 0,
            'product_material' => 'None',
            'product_description' => 'mila pants slim fit eelastic waist band fold detail bottom and side zipper', 
            'product_wash_instruction' => 'Hand wash cold separetely , was inside out , do not bleach , do not dry clean , do not iron print or decorative print.'
            
        ]);

        DB::table('products')->insert([
            'product_name' => 'MIRA TOP',
            'product_stock' => rand(1,100),
            'product_price' => 270000,
            'product_material' => 'None',
            'product_description' => 'None',
            'product_wash_instruction' => 'Hand wash cold separetely , was inside out , do not bleach , do not dry clean , do not iron print or decorative print .'
        ]);

        DB::table('products')->insert([
            'product_name' => 'NATASHA TOP',
            'product_stock' => rand(1,100),
            'product_price' => 285000,
            'product_material' => 'CREPE',
            'product_description' => 'None',
            'product_wash_instruction' => 'Hand wash cold separetely , was inside out , do not bleach , do not dry clean , do not iron print or decorative print .'
            
        ]);

        DB::table('products')->insert([
            'product_name' => 'NATASHA PANTS',
            'product_stock' => rand(1,100),
            'product_price' => 275000,
            'product_material' => 'CREPE',
            'product_description' => 'CREPE FABRIC SLIM FIT 7/8 LONG PANTS WITH POCKET',
            'product_wash_instruction' => 'Hand wash cold separetely , was inside out , do not bleach , do not dry clean , do not iron print or decorative print .'
            
        ]);

        DB::table('products')->insert([
            'product_name' => 'NATASHA SETS',
            'product_stock' => rand(1,100),
            'product_price' => 0,
            'product_material' => 'CREPE',
            'product_description' => 'None',
            'product_wash_instruction' => 'Hand wash cold separetely , was inside out , do not bleach , do not dry clean , do not iron print or decorative print .'
        ]);

        DB::table('products')->insert([
            'product_name' => 'PLEATS PANTS',
            'product_stock' => rand(1,100),
            'product_price' => 360000,
            'product_material' => 'None',
            'product_description' => 'None',
            'product_wash_instruction' => 'Hand wash cold separetely , was inside out , do not bleach , do not dry clean , do not iron print or decorative print .'
            
        ]);

        DB::table('products')->insert([
            'product_name' => 'SABRINA TOP',
            'product_stock' => rand(1,100),
            'product_price' => 240000,
            'product_material' => 'None',
            'product_description' => 'None',
            'product_wash_instruction' => 'Hand wash cold separetely , was inside out , do not bleach , do not dry clean , do not iron print or decorative print .'
            
        ]);

        DB::table('products')->insert([
            'product_name' => 'SHELBY TOP',
            'product_stock' => rand(1,100),
            'product_price' => 240000,
            'product_material' => 'None',
            'product_description' => 'None',
            'product_wash_instruction' => 
            
        ]);

        DB::table('products')->insert([
            'product_name' => 'SIENA',
            'product_stock' => rand(1,100),
            'product_price' => 0,
            'product_material' => 'None',
            'product_description' => 'Top sleeveless elastic at waist detail twisted at front soft fabric',
            'product_wash_instruction' => 'Hand wash cold separetely , was inside out , do not bleach , do not dry clean , do not iron print or decorative print .'
            
        ]);

        
        DB::table('products')->insert([
            'product_name' => 'SOPHIE TOP',
            'product_stock' => rand(1,100),
            'product_price' => 400000,
            'product_material' => 'WOOL',
            'product_description' => 'WOOL FABRIC WITH SQUARE PATTERN AND OVERSIZE',
            'product_wash_instruction' => 'Hand wash cold separetely , was inside out , do not bleach , do not dry clean , do not iron print or decorative print.'
            
        ]);

            

        DB::table('products')->insert([
            'product_name' => 'SOPHIE PANTS',
            'product_stock' => rand(1,100),
            'product_price' => 285000,
            'product_material' => 'WOOL',
            'product_description' => 'FABRIC WITH SQUARE PATTERN AND OVERSIZE DESIGN',
            'product_wash_instruction' => 'Hand wash cold separetely , was inside out , do not bleach , do not dry clean , do not iron print or decorative print .'
            
        ]);

        DB::table('products')->insert([
            'product_name' => 'SOPHIE SETS',
            'product_stock' => rand(1,100),
            'product_price' => 0,
            'product_material' => 'WOOL',
            'product_description' => 'WOOL FABRIC WITH SQUARE PATTERN AND OVERSIZE DESIGN',
            'product_wash_instruction' => 'Hand wash cold separetely , was inside out , do not bleach , do not dry clean , do not iron print or decorative print .'
            
        ]);

            
        DB::table('products')->insert([
            'product_name' => 'SURI TOP',
            'product_stock' => rand(1,100),
            'product_price' => 285000,
            'product_material' => 'SCUBA',
            'product_description' => 'Detail at front, Premium scuba fabric, Wide neck and use for half sabrina , styleor normal, Have belt at side can adjust',
            'product_wash_instruction' => 'Hand wash cold separetely , was inside out , do not bleach , do not dry clean , do not iron print or decorative print'
            
        ]);

        DB::table('products')->insert([
            'product_name' => 'VEBY PANTS',
            'product_stock' => rand(1,100),
            'product_price' => 285000,
            'product_material' => 'None',
            'product_description' => 'None',
            'product_wash_instruction' => 'Hand wash cold separetely , was inside out , do not bleach , do not dry clean , do not iron print or decorative print .'
            
        ]);

        DB::table('products')->insert([
            'product_name' => 'VICKY PANTS',
            'product_stock' => rand(1,100),
            'product_price' => 300000,
            'product_material' => 'None',
            'product_description' => 'None',
            'product_wash_instruction' => 'Hand wash cold separetely , was inside out , do not bleach , do not dry clean , do not iron print or decorative print.'
            
        ]);


        DB::table('products')->insert([
            'product_name' => 'VIVIAN TOP',
            'product_stock' => rand(1,100),
            'product_price' => 270000
            'product_material' => 'RIB',
            'product_description' => 'RIB FABRIC WITH FRONT LONG TIE DETAIL',
            'product_wash_instruction' => 'Hand wash cold separetely , was inside out , do not bleach , do not dry clean , do not iron print or decorative print .'
            
        ]);

        
        DB::table('products')->insert([
            'product_name' => 'YOONA PLEADS DRESS',
            'product_stock' => rand(1,100),
            'product_price' => 450000,
            'product_material' => 'PLEATED FABRIC',
            'product_description' => 'DRESS WITH PLEATED DETAILS, INNERLINING,V NECK LINE, SLIM FIT, STRECH FABRIC, RUBBER WAIST',
            'product_wash_instruction' => 'Hand wash cold separetely , was inside out , do not bleach , do not dry clean , do not iron print or decorative print .'
            
        ]);

    }
}

