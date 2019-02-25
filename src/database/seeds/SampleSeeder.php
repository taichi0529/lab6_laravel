<?php

use App\Models\Entry;
use App\Models\User;
use App\Models\Work;
use Illuminate\Database\Seeder;

class SampleSeeder extends Seeder
{

    private $faker;
    private $workNumber = 1;
    private $works = [];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->faker = Faker\Factory::create('ja_JP');

        // ユーザーを作成
        $users = factory(User::class, 20)->create();

        foreach ($users as $user) {
            $this->createWork($user);
            $this->createWork($user);
            $this->createWork($user);
            $this->createWork($user);
            $this->createWork($user);
        }

        foreach ($this->works as $work) {
            $shuffledUsers = $users->all();
            shuffle($shuffledUsers);
            foreach (array_slice($shuffledUsers, 0, rand(1, 3)) as $user) {
                $this->createEntry($work, $user);
            }
        }
    }

    public function createWork(User $owner)
    {
        if (rand(1, 100) % 3 === 1) {
            $this->works[] = Work::create([
                'title' => 'お仕事' . $this->workNumber,
                'owner_id' => $owner->id,
                'reward' => $this->faker->randomElement([10000, 15000, 18000, 20000, 25000]),
                'entry_end_at' => $this->faker->dateTimeBetween('now', '+ 7 days'),
                'description' => $this->faker->text,
            ]);
            $this->workNumber += 1;
        }
    }

    public function createEntry(Work $work, User $user)
    {
        if ($work->owner_id === $user->id) {
            return;
        }
        Entry::create([
            'user_id' => $user->id,
            'work_id' => $work->id,
        ]);

    }


}
