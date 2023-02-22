@props(['listing'])
<x-card>       
        
        <a href="/listings/{{$listing->id}}"><img class="card-img-top" src="{{$listing->photo ? asset('storage/' . $listing->photo) : asset('storage/photos/noimage.jpg')}}" alt="..." /></a>
        <!-- Product details-->
        <div class="card-body p-4">
            <div class="text-center">
                <!-- Product name-->
                <?php
                    $formattedPrice = number_format($listing->price);
                ?>
                <!-- Listing price-->
                <h5 class="fw-bolder"><a href="/listings/{{$listing->id}}">&#x20B1 {{$formattedPrice}}</a></h5>
            </div>
            <div class="row">
                <div class="col12">Gender: {{$listing->gender}}</div>
            </div>
            <div class="row">
                <div class="col12">Age: {{$listing->age}} Years</div>
            </div>
            <div class="row">
                <div class="col12">Qty: {{$listing->quantity}}</div>
            </div>
        </div>
        <!-- Product actions-->
        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="/listings/{{$listing->id}}">View Details</a></div>
        </div>

</x-card>