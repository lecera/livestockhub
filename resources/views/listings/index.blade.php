<x-layout>
    @include('partials/_hero')
        <!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">

                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    @unless(count($listings) == 0)
                        @foreach ($listings as $listing)
                            <x-listing_card :listing="$listing" />
                        @endforeach
                    @else
                        <p>No listings found!</p>
                    @endunless
                </div>

            </div>
        </section>
</x-layout>
