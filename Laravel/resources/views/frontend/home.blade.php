@extends('frontend.master.layout')

 @section('title') Roberta Randazzo @endsection

 @section('subheading') Developer, Curious & Enthusiast. @endsection

 @section('content')

<!-- STAMPA ARTICOLO, AUTORE, CATEGORIA E DATA DAL DB -->
    @foreach($articles as $article)



        <div class="post-preview">

            <a href={{ url('articolo/'.$article->slug) }}">
              <h2 class="post-title"> {{ $article->title }} </h2>
            </a>


<!-- STAMPA AUTORE DAL DB -->
            <p class="post-meta">Scritto da
              <a href="{{ url('autore/'.$article->user->slug) }}">
                {{ $article->user->first_name . ' ' . $article->user->last_name }}
              </a>,



<!-- STAMPA DATA DAL DB -->
              il {{ date('d/m/Y H:i', strtotime($article->published_at)) }}
            </p>

            <p>
              <b>Categorie: </b>


<!-- STAMPA CATEGORIA -->
              @foreach($article->categories as $category)

                <a href="{{ url('categoria/' . $category->slug) }}">
                  {{ $category->name }}
                </a> /

              @endforeach
            </p>


<!-- STAMPA CONTENUTO ARTICOLO -->
            {!! $article->body !!}

            <hr/>

            </div>
      @endforeach

      {!! $articles->render() !!}
  @endsection
