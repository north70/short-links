<?php

namespace App\Console\Commands;

use App\Domain\Links\Actions\DeleteExpiredLinksAction;
use Illuminate\Console\Command;

class DeleteExpiredLinksCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'links:delete-expired';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete expired links';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(DeleteExpiredLinksAction $action)
    {
        $action->execute();

        return Command::SUCCESS;
    }
}
