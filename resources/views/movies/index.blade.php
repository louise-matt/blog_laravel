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
      <div class="flex justify-start items-center m-1 font-medium py-1 px-2 bg-white rounded-md text-green-100 bg-green-700 border border-green-700 ">
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
          class="flex flex-col items-stretch min-h-full pb-4 mb-6 transition-all duration-150 bg-white rounded-lg shadow-lg hover:shadow-2xl"
        >
          <div class="md:flex-shrink-0">
            <img
              src="https://www.unfe.org/wp-content/uploads/2019/04/SM-placeholder-1024x512.png"
              alt="Blog Cover"
              class="object-fill w-full rounded-lg rounded-b-none md:h-56"
            />
          </div>
          <hr class="border-gray-300" />
          <div class="flex flex-wrap items-center flex-1 px-4 py-1 text-center mx-auto">
            <a href="#" class="hover:underline">
              <h2 class="text-2xl font-bold tracking-normal text-gray-800">
               {{$item->title}}
              </h2>
            </a>
          </div>
          <hr class="border-gray-300" />
          <p
            class="flex flex-row flex-wrap w-full px-4 py-2 overflow-hidden text-sm text-justify text-gray-700"
          >
            {{$item->description}}
          </p>
          <hr class="border-gray-300" />
          <section class="px-4 py-2 mt-2">
            <div class="flex items-center justify-between">
              <div class="flex items-center flex-1">
                <img
                  class="object-cover h-10 rounded-full"
                  src="https://thumbs.dreamstime.com/b/default-avatar-photo-placeholder-profile-icon-eps-file-easy-to-edit-default-avatar-photo-placeholder-profile-icon-124557887.jpg"
                  alt="Avatar"
                />
                <div class="flex flex-col mx-2">
                  <a href="" class="font-semibold text-gray-700 hover:underline">
                    Louise Matt
                  </a>
                  <span class="mx-1 text-xs text-gray-600">15 Déc 2023</span>
                </div>
              </div>
              <a href="{{route('movies.edit', ['movie' => $item])}}" class="mt-1 text-xs text-gray-600">Modifier</a>
            </div>
          </section>
        </div>
      </div>
      @endforeach

    </section>

@stop