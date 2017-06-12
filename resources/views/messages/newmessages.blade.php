@extends('layouts.app')


@section('content')

<link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container">
<div class="row">
    <div class="col-sm-3">

        <ul class="nav nav-pills nav-stacked nav-email shadow mb-20">
            <li >
                <a href="{{route('getReceivedMessages')}}">
                    <i class="fa fa-inbox"></i> Messages reçus <span class="label pull-right"></span>
                </a>
            </li>
            <li>
                <a href="{{route('getMessagesSent')}}"><i class="fa fa-envelope-o"></i>Messages Envoyés</a>
            </li>
            <li class="active">
                <a href="#"><i class="fa fa-certificate"></i>Messages non lus</a>
            </li>
            
        </ul><!-- /.nav -->

        
    </div>
    <div class="col-sm-9">
        <div class="panel rounded shadow panel-teal">
            <div class="panel-heading">
                <div class="pull-left">
                    <h3 class="panel-title">Nouveaux messages</h3>
                </div>

                <div class="clearfix"></div>
            </div><!-- /.panel-heading -->
            
            <div class="panel-body no-padding">

                <div class="table-responsive">
                    <table class="table table-hover table-email">
                        <tbody>
                        @foreach($messages as $message)
                        <tr class="unread selected">

                            <td>
                                <div class="media">
                                    
                                        <a href="#" class="pull-left">
                                            <img alt="..." src="http://bootdey.com/img/Content/avatar/avatar1.png" class="media-object">
                                        </a>
                                 
                                        
                                            <div class="media-body ">
                                            <h4 class="text-primary">

                                            envoyé par : {{ $message->getSenderAttribute()->name }}</h4>

                                            <p class="email-summary" id="truncatetext">{{$message->message}} </p>
                                            <span class="media-meta"></span>
                                            <p><a href="{{route('getReceivedMessageById',$message)}}">Voir</a></p>
                                        </div>
                                    
                                </div>
                            </td>
                        </tr>
                       
                      @endforeach
                        </tbody>
                    </table>
                </div><!-- /.table-responsive -->

            </div><!-- /.panel-body -->
        </div><!-- /.panel -->
    </div>
</div>
</div>
@endsection
