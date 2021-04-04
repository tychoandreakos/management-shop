<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

/**
 * Generate command admin
 * If user type php artisan create:admin --name args --email args --password args
 * that's will be injected to the mysql automatically
 */

class GenerateAdmins extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:admin 
    {--nm|name=admin : The name of the admin} 
    {--e|email=admin@admin.com : Email for the admin} 
    ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Generate admin account automatically";

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
    public function handle(User $user)
    {
        // Confirm the password
        $password_secret = $this->secret("Type password for the admin");
        $confirm_secret = $this->secret(
            "Please verify or confirm your password again"
        );

        // Handler the process adding to the auth table
        if ($password_secret == $confirm_secret) {
            // Retrieving input from user console
            $name = $this->option("name");
            $email = $this->option("email");
            try {
                $user->name = $name;
                $user->email = $email;
                $user->password = Hash::make($password_secret);
                $user->save();

                // Writing the output to the console
                $this->info(
                    "Suceessfuly adding user name={$name} / email={$email} to the database"
                );
            } catch (\Exception $e) {
                $this->info(
                    "Failed to insert name=${name} / email=${email} to the database => {$e}"
                );
            }
        } else {
            $this->info(
                "Oops your password and confirm password is not the same! please try again."
            );
        }
        return 0;
    }
}
