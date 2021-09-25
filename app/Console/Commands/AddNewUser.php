<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class AddNewUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'datnq:add-new-user {number}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add new user';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
//        $argument = $this->argument('number');
//        for($i = 0; $i < $argument; $i++) {
//            $name = $this->ask('What is your name');
//            $email = $this->ask('What is your Email');
//            $password = $this->secret('What is your Password');
//            $gender = $this->choice("what is your gender", ['male', 'female'], 'male');
//
//            if ($this->confirm('Do you want to continue', true)) {
//                User::create([
//                    'name' => $name,
//                    'email' => $email,
//                    'password' => bcrypt($password),
//                    'gender' => $gender,
//                ]);
//                $this->info('sucsess');
//            }
//        }
//        $this->info("info");
//        $this->line("line");
//        $this->comment("comment");
//        $this->question("question");
//        $this->error("error");
        $headers = ['name', 'email'];
        $users = User::all(['name', 'email'])->toArray();
        $this->callSilent('aabc', [
            'number' => 1,
            '--email' => [
                ''
            ]
        ]);
        $this->table($headers, $users);
        return 0;
    }
}
