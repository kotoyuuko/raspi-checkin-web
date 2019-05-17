<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SetRole extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tool:set-role {user} {role}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Set user\'s role to manager';

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
     * @return mixed
     */
    public function handle()
    {
        $user = \App\User::find($this->argument('user'));
        $user->role = $this->argument('role') == 'manager' ? 'manager' : 'user';
        $user->save();
    }
}
