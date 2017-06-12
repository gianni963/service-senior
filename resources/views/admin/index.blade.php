@extends('layouts.app')

@section('content')

        <p>Administration du site</p>

        <ul class="nav nav-tabs" role="tablist">
        		<li role="presentation" class="active"><a href="#annonces" aria-controls="home" role="tab" data-toggle="tab">Annonces</a></li>
        		<li role="presentation"><a href="#users" aria-controls="users" role="tab" data-toggle="tab">Membres</a></li>
                <li role="presentation"><a href="#tags" aria-controls="users" role="tab" data-toggle="tab">Tags</a></li>
    	</ul>



        	<div class="tab-content">
        		<div role="tabpanel" class="tab-pane fade in active" id="annonces">

        			<table class="table table-striped table-hover datatable">
        				<thead>
        				<tr>
                            <th>Titre</th>
                            <th>Date</th>
                            <th>Auteur</th>
                            <th>Supprimer</th>
        				</tr>
        				</thead>

                        @foreach($annonces as $annonce)
                            <tbody>
                                <td>Titre : {{ $annonce->titre }}</td>
                                <td>Créé le : {{ $annonce->created_at }}</td>
                                <td>Auteur : {{ $annonce->user->name }}</td>
                                <td>
                                    <form action="{{ route('admin.annonce.delete', $annonce->id) }}" method="POST"
                                          style="display: inline"
                                          onsubmit="return confirm('Êtes-vous sûr?');">
                                        <input type="hidden" name="_method" value="DELETE">
                                        {{ csrf_field() }}
                                        <button class="btn btn-danger">Delete</button>
                                   </form>
                                </td>
                            </tbody>
                        @endforeach

                        {{$annonces->links()}}


        			</table>



        		</div>
        		<div role="tabpanel" class="tab-pane fade in" id="users">

                    <table class="table table-striped table-hover datatable">
                        <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Supprimer</th>
                            <th>Attribuer un rôle</th>
                        </tr>
                        </thead>

                        @foreach($users as $user)
                            <tbody>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email}}</td>
                                <td><form action="{{ route('admin.user.delete', $user->id) }}" method="POST"
                                          style="display: inline"
                                          onsubmit="return confirm('Êtes-vous sûr?');">
                                        <input type="hidden" name="_method" value="DELETE">
                                        {{ csrf_field() }}
                                        <button class="btn btn-danger">Delete</button>
                                   </form></td>
                                <td></td>
                            </tbody>
                        @endforeach

                        {{$users->links()}}
                    </table>
                </div>

                <div role="tabpanel" class="tab-pane fade in" id="tags">

                    <table class="table table-striped table-hover datatable">
                        <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Créer un tag</th>
                            <th>Supprimer un tag</th>

                        </tr>
                        </thead>

                        @foreach($tags as $tag)
                            <tbody>
                                <td>{{ $tag->name }}</td>
                                <td></td>
                                <td><form action="{{ route('admin.tag.delete', $tag->id) }}" method="POST"
                                          style="display: inline"
                                          onsubmit="return confirm('Êtes-vous sûr?');">
                                        <input type="hidden" name="_method" value="DELETE">
                                        {{ csrf_field() }}
                                        <button class="btn btn-danger">Delete</button>
                                   </form></td>
                            </tbody>
                        @endforeach

                        {{$tags->links()}}
                    </table>


                </div>

        </div>

        <script type="text/javascript">

            $(document).ready(function() {

                $('#myTabs a').click(function (e) {
                  e.preventDefault()
                  $(this).tab('show')
                });


                $('.datatable').DataTable({
                    "paging":   false,
                    "info":     false
                });

                $('#search').on( 'keyup click', function () {

                    // filterGlobal();
                    $('.datatable').dataTable().fnFilter(this.value);
                } );

            });

        </script>


@endsection