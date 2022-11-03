<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\product;

class Code extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'product_detail_id'=>1,
                'code'=> 'N9TT-9G0A-B7FQ-RANC',

            ],
            [
                'product_detail_id'=>2,
                'code'=> 'QK6A-JI6S-7ETR-0A6C',

            ],
            [
                'product_detail_id'=>3,
                'code'=> 'SXFP-CHYK-ONI6-S89U',

            ],
            [
                'product_detail_id'=>4,
                'code'=> 'XNSS-HSJW-3NGU-8XTJ',

            ],
            [
                'product_detail_id'=>5,
                'code'=> 'NHLE-L6MI-4GE4-ETEV',

            ],
            [
                'product_detail_id'=>6,
                'code'=> '6ETI-UIL2-9WAX-XHYO',

            ],
            [
                'product_detail_id'=>7,
                'code'=> '8YX8-8LRH-2J7E-AL4Q',

            ],
            [
                'product_detail_id'=>8,
                'code'=> 'Y795-F9GG-D44A-NJEK',

            ],
            [
                'product_detail_id'=>9,
                'code'=> 'QJBE-M632-TH73-GFMQ',

            ],
            [
                'product_detail_id'=>10,
                'code'=> 'AF7L-24JE-522V-953W',

            ],
            [
                'product_detail_id'=>11,
                'code'=> '7XKU-U96A-9QVW-9LZ9',

            ],
            [   
                'product_detail_id'=>12,
                'code'=> 'XNET-HMD6-T64N-HFX7',

            ],
            [
                'product_detail_id'=>13,
                'code'=> 'CQCA-4UJE-4HG9-RD62',

            ],
            [
                'product_detail_id'=>14,
                'code'=> 'WYK5-5RX9-FWT2-TJDS',

            ],
            [
                'product_detail_id'=>15,
                'code'=> '76KP-3HR4-WJAF-B7GR',

            ],
        ];
        foreach($user as $key => $value){
            product::create($value);
        }
    }
}
