@extends('layouts.default')
@section('title')
  Liste des films
@stop

@section('content')

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
              {{-- <p class="mt-1 text-xs text-gray-600">9 minutes read</p> --}}
            </div>
          </section>
        </div>
      </div>
      @endforeach

    </section>

@stop