<?php

namespace Database\Seeders;

use App\Models\Hunter;
use Illuminate\Database\Seeder;

class HunterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hunters = [
            [
                'src' => '/assets/images/hunters/hunter1.jpg',
                'name' => 'Burt Gummer',
                'description' => "Burt Gummer is a firearms enthusiast, and a paranoid survivalist. He
                and his (as of Tremors 2) former wife, Heather Gummer (played by Reba McEntire),
                were the first persons in the film series to directly kill a Graboid thanks to the
                large supply of weapons kept in their basement. He has an overkill approach to trouble
                and takes himself deadly seriously, much to the annoyance or amusement of others. Even
                Earl Basset noted that Burt puts a whole new shine on the meaning of overkill; Burt
                retorted: When you need it and don't have it, youll be singing a different tune.
                According to Tyler Reed, he is the Martha Stewart of whatever it is that he does."
            ],
            [
                'src' => '/assets/images/hunters/hunter2.jpg',
                'name' => 'Valentine McKee',
                'description' => 'When we first meet Val, he and Earl made their
                living as hired hands but eventually they got sick enough
                of their job that they packed up their belongings and left
                Perfection for Bixby. On the way there both he and Earl
                discovered the first victims of underground animals
                including Edgar Deems and Old Fred. They where also the first
                in the film to survive an encounter with a Graboid when a
                Graboid tongue grabbed onto the rear axle of their truck
                after they discovered a landslide caused by the beast when
                it killed two road workers. It was also Val and Earl who
                indirectly killed the first Graboid by causing it to ram
                head-first into a concrete trench. At the end of the film he
                killed the last Graboid who also happened to be the one who
                grabbed onto their truck at the beginning of the film, dubbed Stumpy,
                by scaring it into throwing itself through a high cliff face by using
                one of Burt Gummers home-made pipe bombs. After the last
                Graboid was killed, Val and Earl proceeded to leave Perfection Valley
                for Bixby. As revealed by Earl the first Graboid threat
                made him rich and famous.'
            ],
            [
                'src' => '/assets/images/hunters/hunter3.jpg',
                'name' => 'Earl Bassett',
                'description' => 'Earl became a hired hand in the small desert
                valley town of Perfection, Nevada, working with partner
                Valentine McKee to eke out an almost entirely insignificant
                lifestyle. Though Valentine wouldve cringed at Earls usage
                of the phrase "hired hands" ("Handymen, Earl! We are handy
                men!"), it was in truth what they were. Earl and Val
                constantly said that they were going to go somewhere
                and make a better life for themselves; they never
                actually did anything about it until one of Walter Changs
                septic tanks blew up all over them in 1989.'
            ],
            [
                'src' => '/assets/images/hunters/hunter4.jpg',
                'name' => 'Heather Gummer',
                'description' => 'Heather Gummer was the wife of Burt Gummer
                in the first film. Like Burt, she is a firearms enthusiast.
                The two worked as a team in being prepared for defending
                themselves. However, because McEntire chose not to reprise
                her role Heather left Burt. It was stated that sometime
                between Tremors and Tremors 2: Aftershocks, she left Burt
                when he became too paranoid even for her and she divorced
                him and moved away. Burt still cares for her apparently as
                he uses her name ("Heather") as part of the passcode of
                his bunkers security system.'
            ],
            [
                'src' => '/assets/images/hunters/hunter5.jpg',
                'name' => 'Rhonda LeBeck',
                'description' => 'Rhonda LeBeck was both the female lead and
                 the source of scientific knowledge in the first movie.
                 For this last reason, Val and Earl depended on her a lot on
                 her knowledge which ultimately saved everyone in the town of Perfection.'
            ],
        ];

        foreach ($hunters as $hunter) {
            Hunter::factory()->create($hunter);
        }
    }
}
