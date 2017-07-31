<?php

namespace Physio\MyLittleCMS\Http\Controllers;

use App\Http\Requests\ContactFormRequest;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {

        return view('pages.contact')->with(['title' => 'Contatti', 'footer' => $this->getFooterInfo()]);
    }

	public function store(ContactFormRequest $request)
    {
	    \Mail::send('emails.contact',
	        array(
	            'nome' => $request->get('nome'),
	            'cognome' => $request->get('cognome'),
	            'email' => $request->get('email'),
	            'telefono' => $request->get('telefono'),
	            'messaggio' => $request->get('messaggio'),
	        ), function($message)
	    {
	        $message->from('ilphysio@gmail.com');
	        if ( $message->to('ilphysio@gmail.com', 'Admin')->subject('TODOParrot Feedback') ) {
	        	http_response_code(200);
	        	echo "Thank You! Your message has been sent.";
	        } else {
				http_response_code(500);
				echo "Oops! Something went wrong and we couldn't send your message.";
	        }
	    });
    }
}
