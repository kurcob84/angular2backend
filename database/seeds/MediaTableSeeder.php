<?php

use Illuminate\Database\Seeder;
use App\Media;

class MediaTableSeeder extends Seeder {

    public function run() {
        //DB::table('media')->delete();
        // Patrick Rogge
        Media::create(array(
            'filename' => "test",
            'path' => "http://www.museumangewandtekunst.de/images/max/mode-bewegt-bild-alexander_mcqueen-brunskill-seraphim-2013-foto-1_2.jpg",
            'conent_parent_id' => 1
        ));

        // Test Tester
        Media::create(array(
            'filename' => "testtets",
            'path' => "https://www.b2run.de/run/de/de/muenchen/bilder/2017/b2run-muenchen-2017-bild-004.jpg",
            'conent_parent_id' => 1
        ));

        // Trans4mation
        Media::create(array(
            'filename' => "rewre",
            'path' => "https://assets.kununu.com/images/images_logos/trans4mation-it-gmbh-9444c.gif",
            'conent_parent_id' => 2
        ));

        // Telekom
        Media::create(array(
            'filename' => "fjfdsf",
            'path' => "https://www.telekom.com/resource/image/386490/portrait_ratio1x1/3000/3000/51c3154dcbfea7226dfb44c87971c6e7/xy/bi-magyar-x.png",
            'conent_parent_id' => 2
        ));
    }

}
