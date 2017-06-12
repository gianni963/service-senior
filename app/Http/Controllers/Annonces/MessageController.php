<?php

namespace App\Http\Controllers\Annonces;

use Mail;
use App\Mail\AnnonceMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Message;
use App\Annonce;
use App\User;
use App\Http\Controllers\Controller;

class MessageController extends Controller
{

   //Retourne tous les messages qui n'ont pas encore été lus
   public function getNewMessages(Request $request)
   {

         $messages = Message::where('read',0)
            ->where('receiver_id', $request->user()->id)
            ->orderBy('created_at', 'desc')
            ->get();

            return view('messages.newmessages', compact('messages'));
         ;

   }


   public function getReceivedMessages(Request $request)
   {
    //retourne les messages reçus
      $messages = Message::where('receiver_id', $request->user()->id)
      ->orderBy('created_at', 'desc')
      ->get();

      return view('messages.receivedmessages', compact('messages'));

   }

   public function getReceivedMessageById(Request $request, Message $message)
   {
      //message = Message::where('id', $request->input('id'))->first();

      //si le message n'a pas été encore lu (read == 0), on change son statut (read == 1) 
     if ($message->read == 0){
        $message->read = 1;
        $message->save();
     }

     return view('messages.receivedmessage_show', compact('message'));;

   }

   public function getMessagesSent(Request $request)
   {
    //retourne les messages envoyés
      $messages = Message::where('sender_id', $request->user()->id)
        ->orderBy('created_at', 'desc')
        ->get();

      return view('messages.sentmessages', compact('messages'));

   }

   public function getSentMessageById(Request $request,Message $message)
   {
      $this->authorize('ownSentMessage', $message);
      return view('messages.sentmessage_show', compact('message'));

   }

   public function sendMessage(Request $request, $id)
   {
     $annonce = Annonce::findOrFail($id);

     $message = new Message;
     $message->sender_id = Auth::user()->id;
     $message->receiver_id = $annonce->user->id;
     $message->annonce_id = $annonce->id;
     $message->message = $request->message;
     $message->read = 0;
     $message->save();

     
     Mail::to($annonce->user->email)->queue(
            new AnnonceMail($annonce, $message));
     return redirect()->back()->withSuccess('Votre message a été envoyé');


    }

     public function answerMessage(Request $request, Message $message)
    {
      //réponse à un message à partir de panneau de messagerie de l'utilisateur
      
     $answer = new Message;
     $answer->sender_id = Auth::user()->id;
     $answer->receiver_id = $message->sender_id;
     $answer->annonce_id = $message->annonce_id;
     $answer->message = $request->message;
     $answer->read = 0;
     $answer->save();

    

     return redirect()->route('getMessagesSent');
    }

}
