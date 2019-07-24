<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class InterfaceWithCustomQuery extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'graphql:query';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $graphql = <<<'GRAPHQL'
{
  objects {
    id
    morphable {
      id
      statistics {
        id
        someStatistic
      }
    }
  }
}
GRAPHQL;

        $result = \Rebing\GraphQL\Support\Facades\GraphQL::query($graphql);

        echo json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES), "\n"; exit;
    }
}
