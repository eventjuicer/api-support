<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;



use Eventjuicer\Services\Resolver;
use Eventjuicer\Repositories\EloquentTicketRepository;
use Eventjuicer\Repositories\ParticipantRepository;
use Eventjuicer\Repositories\Criteria\WhereIn;
use Eventjuicer\Repositories\Criteria\RelEmpty;
 
 
class TicketStats extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'visitors:ticket-stats {host}';

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
    public function handle(
        EloquentTicketRepository $ticketRepo, 
        ParticipantRepository $participantsRepo
    )
    {
        $route = new Resolver($this->argument("host"));

        $eventId =  $route->getEventId();

        $this->info("Event id: " . $eventId);

        $participantsByTicketRole = $ticketRepo->getParticipantsWithTicketRole("visitor", "event", $eventId);

        $unique = $participantsByTicketRole->pluck("email")->unique()->count();

        $participant_ids = $participantsByTicketRole->pluck("id")->all();

        $this->info("Total UNIQUE visitors: " . $unique );

        $participantsRepo->pushCriteria(new WhereIn("id", $participant_ids));
        $participantsRepo->pushCriteria(new RelEmpty("ticketdownloads"));

        //it is pointless to preload relations as they will not be serialized by JOB dispatcher!
        $participants = $participantsRepo->all();

        $this->info("Visitors without a ticket: " . $participants->count() );

    

    }
}
