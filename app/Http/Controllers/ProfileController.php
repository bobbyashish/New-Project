<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ProfileUpdateRequest;
use App\Mail\SendMail;
use App\Models\User;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;
use App\Notifications\MyNotification;
use Exception;
use Illuminate\Support\Facades\Notification;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): Response
    {
        return Inertia::render('Profile/Edit', [
            'mustVerifyEmail' => $request->user() instanceof MustVerifyEmail,
            'status' => session('status'),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validate([
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function apply()
    {
       return Inertia::render("pply");
    }


    public function mail(ProfileUpdateRequest $request)
    {
        User::create($request->all());
        \Mail::to($request->email)->send(new SendMail);
        return redirect()->to('/login')->with('success', 'You are registered successfuly. Login to continue');
    }


    
    // public function sendmail()
    // {

    //      $recipient = 'atbt923@gmail.com';
    // \Mail::to($recipient)->send(new SendMail());
    // return "Email sent successfully!";


        // User::create($request->all());
        // \Mail::to($request->email)->send(new SendMail);
        // return redirect()->to('orders/index')->with('success', 'You are registered successfuly. Login to continue');
    // }
    public function sendnotification()
    {
        $user = User::all();
        $details=[
        'greetings'=>'Hye friends,',
        'body'=>'i am here to send first email notification',
        'actiontext'=>'Please support me.',
        'actionurl'=>'/',
        'lastline'=>'Thanks to all of you to support me',

        ];
        try {
            Notification::send($user, new MyNotification($details));
        } catch (Exception $e) {
            dump($e);
        }
        dd('done');
    // }
}

public function sendEmail()
{
    $email = new SendMail();
    Mail::to('atbt923@gmail.com')->send($email);

    return 'Email sent successfully!';
}
}

//     public function toMail($notifiable)
// {
//     return (new MailMessage)
//                 ->subject('Subject of the Notification')
//                 ->greeting('Hello!')
//                 ->line('This is the body of the notification.')
//                 ->action('View Notification', url('/'))
//                 ->line('Thank you for using our application!');
// }
// }