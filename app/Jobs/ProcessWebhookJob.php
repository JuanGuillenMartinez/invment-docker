<?php

namespace App\Jobs;

use Illuminate\Support\Facades\Log;
use Spatie\WebhookClient\Jobs\ProcessWebhookJob as SpatieProcessWebhookJob;
use Spatie\WebhookClient\Models\WebhookCall;

class ProcessWebhookJob extends SpatieProcessWebhookJob
{
    // Recomendable inicializar el constructor para poder utilizar la instancia de webhookCall
    protected $request;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(WebhookCall $request)
    {
        $this->request = $request;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        
        // Aquí se puede manejar el payload obtenido por el recurso externo
        $payload = $this->request->payload;
        Log::info($payload['issue']['title']);
    }
}
