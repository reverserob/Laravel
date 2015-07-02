@extends('frontend.master.layout')

 @section('title') Roberta Randazzo @endsection

 @section('subheading') Developer, Curious & Enthusiast. @endsection

 @section('content')

<!-- STAMPA ARTICOLO, AUTORE, CATEGORIA E DATA DAL DB -->
    @foreach($articles as $article)

@include('frontend.includes.articleslistitem', ['article' => $article])


      @endforeach

      {!! $articles->render() !!}
  @endsection
