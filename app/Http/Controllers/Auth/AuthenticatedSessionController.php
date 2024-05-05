<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use Illuminate\Support\Facades\Date;


class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();
        $hora = Carbon::now()->format('H:i');

        if (auth()->user()->tipus == 'capDepartament') {
            return redirect('dashboard');
        }
        elseif(auth()->user()->tipus == 'treballador'){
            $this->sendTelegramMessage(auth()->user()->name . " ha fet login a les " . $hora);
            $this->sendMailLogin(auth()->user()->name, "ha hecho login", $hora);
            return redirect('dashboard-basic');
        }
        else{
            return auth()->logout();
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $hora = Carbon::now()->format('H:i');
        if (auth()->user() && auth()->user()->tipus == 'treballador') {
            $this->sendTelegramMessage(auth()->user()->name . " ha fet logout a les " . $hora);
            $this->sendMailLogout(auth()->user()->name, "ha fet logout", $hora);
        }

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    protected function sendTelegramMessage(string $message)
    {
        $telegram_token = '7105209113:AAH8-pbQOIJo3vtd_VFJRzcP9BeJRiZ8Vws';
        $admin_ids = [ 405985393 ];
        

        foreach ($admin_ids as $admin_id) {
            Http::post("https://api.telegram.org/bot" . $telegram_token . "/sendMessage", [
                'chat_id' => $admin_id,
                'text' => $message,
            ]);
        }
    }

    protected function sendMailLogin(string $name, string $hora)
    {
        $this->sendMail($name, "ha fet login", "Login a RentByRent", $hora);
    }

    /**
     * Send an email notification for logout using PHPMailer.
     */
    protected function sendMailLogout(string $name, string $hora)
    {
        $this->sendMail($name, "ha fet logout", "Logout a RentByRent", $hora);
    }
    protected function sendMail(string $name, string $action, string $subject, string $hora)
    {
        $mail = new PHPMailer(true);

        try {
            $hora = Date::now()->format('H:i');
            // Server settings
            $mail->isSMTP(); // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com'; // Gmail SMTP server
            $mail->SMTPAuth = true; // Enable SMTP authentication
            $mail->Username = 'laravelrentbyrent@gmail.com'; // SMTP username
            $mail->Password = 'bdhl wiqk slhy hwvf'; // SMTP password 
            $mail->Port = 587; // TCP port to connect to

            // Recipients
            $mail->setFrom('laravelrentbyrent@gmail.com', 'RentByRent');
            $mail->addAddress('laravelrentbyrent@gmail.com', 'adminlog');

            // Content
            $mail->isHTML(true); // Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body = "L'usuari $name $action a les $hora.";
            $mail->AltBody = "L'usuari $name $action a les $hora.";

            $mail->send();
        } catch (Exception $e) {
            // Handle errors (optional)
        }
    }
}