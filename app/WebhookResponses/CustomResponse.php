<?php

namespace App\WebhookResponses;

use Illuminate\Http\Request;
use Spatie\WebhookClient\WebhookConfig;
use Symfony\Component\HttpFoundation\Response;
use Spatie\WebhookClient\WebhookResponse\RespondsToWebhook;

class CustomResponse implements RespondsToWebhook
{
    public function respondToValidWebhook(Request $request, WebhookConfig $config): Response
    {
        return response()->json(['message' => 'ok', 'issue-title' => $request->issue['title']]);
    }
}
