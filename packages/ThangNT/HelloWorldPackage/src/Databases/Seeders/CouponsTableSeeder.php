<?php

use Illuminate\Database\Seeder;
use App\Models\Coupon;
use App\Models\Image;

class CouponTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $maxCount = 30;

        // Seed image of Coupon
        $i = $maxCount;
        $images = [];
        $url = public_path() . '/images/';
        checkExistAndCreateFolder($url . "coupons/");
        while ($i-- > 0) {
            $imageName = rand(1, 19) . '.jpg';
            $imageDesName = str_random(10) . '-' . $imageName;

            $src_name = $url . "fake-image-events/$imageName";
            $des_name = $url . 'coupons/' . $imageDesName;

            copy($src_name, $des_name);

            $image = new Image;
            $image->fill([
                    'name'        => $imageDesName,
                    'type'        => IMAGE_TYPE_COUPON,
                ])->save();
            $images[] = $image;
        }

        // Seed coupons
        Coupon::truncate();
        $data = [];
        $count = $i = $maxCount;
        $types = getCouponTypeList();
        $status = getCouponStatusList();
        while ($count-- > 0) {
            $image = $images[$count];
            $coupon = new Coupon;
            $coupon->fill([
                'code'         => 'Coupon' . ( $i - $count ),
                'type'         => array_rand([$types]),
                'image_id'     => $images[$count]->id,
                'images'       => '[' . $images[$count]->id . ']',
                'status'       => array_rand($status),
                'discount_rate' => rand(0, 100),
                'discount_rate_type' => COUPON_DISCOUNT_RATE_TYPE_PERCENT, //rand(COUPON_DISCOUNT_RATE_TYPE_PERCENT, COUPON_DISCOUNT_RATE_TYPE_VALUE),
                'start_date'   => $faker->dateTimeBetween('-10 days', '+ 100 days'),
                'expired_date' => $faker->dateTimeBetween('-10 days', '+ 100 days'),
            ])->save();
            $image->relation_id = $coupon->id;
            $image->save();
        }

    }
}
