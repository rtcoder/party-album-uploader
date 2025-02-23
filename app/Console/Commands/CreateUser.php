<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateUser extends Command
{
    protected $signature = 'user:create {--email=} {--password=}';
    protected $description = 'Tworzy nowego użytkownika z podanym e-mailem i hasłem';

    public function handle(): int
    {
        $email = $this->option('email');
        $password = $this->option('password');

        if (!$email || !$password) {
            $this->error('Musisz podać zarówno email, jak i hasło.');
            return 1;
        }

        if (User::query()->where('email', $email)->exists()) {
            $this->error('Użytkownik o podanym e-mailu już istnieje.');
            return 1;
        }

        $user = User::query()->create([
            'email' => $email,
            'password' => Hash::make($password),
        ]);

        $this->info("Użytkownik {$user->email} został utworzony.");
        return 0;
    }
}
