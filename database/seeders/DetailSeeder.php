<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('details')->truncate();

        $array = [
            'product_id'        => [1,1,1,1,1,1,1,1,2,2,2,2,2,2,2,2,3,3,3,3,3,3,3,3],
            'specification_id'  => [1,2,3,4,5,6,7,8,1,2,3,4,5,6,7,8,1,2,3,4,5,6,7,8],
            'information_id'    => [4,13,16,19,24,29,37,44,7,13,16,20,25,29,37,43,9,13,16,21,25,29,36,43],
            'author_id'         => 1,
        ];
        $data = generate_seeder_data($array);
        DB::table('details')->insert($data);
    }
}

/**
 * Check specification information
 * 1. CPU
 *      1.  Core I3
 *      2.  Core I5
 *      3.  Core I7
 *      4.  Apple A17 Pro
 *      5.  Apple A16 Bionic
 *      6.  Apple A15 Bionic
 *      7.  Snapdragon 8
 *      8.  Snapdragon 7
 *      9.  MediaTek Helio
 * 2. RAM
 *      10. 1GB
 *      11. 2GB
 *      12. 4GB
 *      13. 8GB
 *      14. 16GB
 * 3. Hard Disk
 *      15. 128 GB
 *      16. 256 GB
 *      17. 512 GB
 *      18. 1 TB
 * 4. Graphics card
 *      19. Apple GPU
 *      20. Adreno 740
 *      21. Mali G52
 *      22. Intel UHD Graphics
 *      23. Intel Iris Xe Graphics
 * 5. OS
 *      24. iOS
 *      25. Android
 *      26. Windows 10
 *      27. Ubuntu
 * 6. Screen
 *      28. 2.5 inch
 *      29. 6.7 inch
 *      30. 13 inch
 *      31. 14 inch
 *      32. 15 inch
 * 7. Battery
 *      33. 1200 mAh
 *      34. 1500 mAh
 *      35. 2000 mAh li-ion
 *      36. 3000 mAh li-ion
 *      37. 4000 mAh li-ion
 *      38. 3 cell li-ion, 50wh
 *      39. 5 cell li-ion, 70wh
 *      40. 7 cell li-ion, 100wh
 * 8. Weight
 *      41. 100 g
 *      42. 150 g
 *      43. 200 g
 *      44. 220 g
 *      45. 1.7 kg
 *      46. 2.3 kg
 *      47. 3.5 kg
 */