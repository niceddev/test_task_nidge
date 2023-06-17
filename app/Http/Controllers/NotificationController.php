<?php

namespace App\Http\Controllers;

use App\Http\Requests\NotificationRequest;
use App\Jobs\SendNotificationJob;

class NotificationController extends Controller
{
    public function index()
    {
        return view('modules.notifications.index');
    }

    public function send(NotificationRequest $notificationRequest)
    {
        SendNotificationJob::dispatch($notificationRequest->input('message'));
        return redirect()->route('notifications.index');
    }

}
