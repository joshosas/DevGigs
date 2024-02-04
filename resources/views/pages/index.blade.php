<x-layout>

     @include('partials._hero')
     @include('partials._search')

     <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
          @unless(count($listings) == 0)

          @foreach($listings as $listing)
          <!-- Items -->
          <x-listing-card :listing="$listing" />
          @endforeach
          @else
          <h5>No Listings Found!</h5>
          @endunless
     </div>

     <div class="mt-6 p-4">
          {{$listings->links()}}
     </div>

</x-layout>