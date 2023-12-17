@extends('layouts.default')
@section('title')
  Liste des films
@stop

@section('content')
<div class="flex justify-end">
  <a href="{{route('movies.create')}}" class="p-3 bg-black rounded-full text-white w-100 font-semibold">Ajouter</a>
</div>

<div>
  @if(session()->has('success'))
      <div class="flex justify-start items-center m-1 font-medium py-1 px-2 bg-white rounded-md bg-green-700 border border-green-700 ">
        <div slot="avatar">
            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle w-5 h-5 mx-2">
                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                <polyline points="22 4 12 14.01 9 11.01"></polyline>
            </svg>
        </div>
        <div class="text-l font-normal  max-w-full flex-initial">
            <div class="py-2">
              {{session('success')}}
            </div>
        </div>
    </div>
  @endif
</div>

<section class="flex flex-row flex-wrap mx-auto">
    @foreach ($movies as $item)
    <!-- Card Component -->
      <div
        class="transition-all duration-150 flex w-full px-4 py-6 md:w-1/2 lg:w-1/3"
      >
        <div
          class="w-full flex flex-col items-stretch min-h-full pb-4 mb-6 transition-all duration-150 bg-white rounded-lg shadow-lg hover:shadow-2xl"
        >
          <div class="md:flex-shrink-0 justify-center flex">
            <img
              src={{!empty($item->image)?$item->image: "https://www.unfe.org/wp-content/uploads/2019/04/SM-placeholder-1024x512.png"}} 
              alt="Blog Cover"
              class="object-cover rounded-lg rounded-b-none md:h-56"
            />
          </div>
          <hr class="border-gray-300" />
          <div class="flex flex-wrap items-center flex-1 px-4 py-1 text-center mx-auto">
              <h2 class="text-2xl font-bold tracking-normal text-gray-800">
               {{$item->title}}
              </h2>
          </div>
          <hr class="border-gray-300" />
          <p
            class="flex flex-row flex-wrap w-full px-4 py-2 overflow-hidden text-sm text-justify text-gray-700"
          >
            {!!nl2br($item->description)!!}
          </p>
          <hr class="border-gray-300" />
          <section class="px-4 py-2 mt-2">
            <div class="flex items-center justify-between">
              <div class="flex items-center flex-1">
                <div class="flex flex-col mr-2">
                  <div class="font-semibold text-gray-700">
                    {{$item->director}}
                  </div>
                  <span class="mx-1 text-xs text-gray-600">{{$item->release_date}}</span>
                </div>
              </div>
              <div class="mt-1 text-xs text-gray-600">
                <a href="{{route('movies.edit', ['movie' => $item])}}">Modifier</a>
                <span>•</span>
                <form class="inline" method="post" action="{{route('movies.delete', ['movie'=>$item])}}">
                  @csrf 
                  @method('delete')
                  <input type="submit" class="cursor-pointer" value="Supprimer">
                </form>
              </div>
            </div>
          </section>
        </div>
      </div>
      @endforeach

    </section>

@stop