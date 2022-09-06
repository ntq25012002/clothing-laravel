@extends('layouts.main')

@section('content-header-title')
    <h3>Test upload multiple files image</h3>
@endsection
@section('content')
    @foreach ($listings as $listing)
        <!-- Listing Item -->
        <div class="listing-item">

            <a href="single-property-page-1.html" class="listing-img-container">

                <div class="listing-badges">
                    <span>{{ $listing->status }}</span>
                </div>

                <div class="listing-img-content">
                    <span class="listing-price">{{ $listing->price }} <i>$520 / sq ft</i></span>
                    <span class="like-icon with-tip" data-tip-content="Add to Bookmarks"></span>
                    <span class="compare-button with-tip" data-tip-content="Add to Compare"></span>
                </div>


                <div class="listing-carousel">
                    **@foreach ($listing->images as $image)
                        <div><img src="{{ asset('$image->image_path') }}" alt=""></div>
                    @endforeach**
                </div>
            </a>

            <div class="listing-content">

                <div class="listing-title">
                    <h4><a href="#">{{ $listing->title }}</a></h4>
                    <a href="" class="listing-address popup-gmaps">
                        <i class="fa fa-map-marker"></i>
                        {{ $listing->address }}
                    </a>

                    <a href="single-property-page-1.html" class="details button border">Details</a>
                </div>

                <ul class="listing-details">
                    <li>530 sq ft</li>
                    <li>{{ $listing->bedrooms }} Bedroom</li>
                    <li>{{ $listing->rooms }} Rooms</li>
                    <li>{{ $listing->bathrooms }} Bathroom</li>
                </ul>
            </div>

        </div>
        <!-- Listing Item / End -->
    @endforeach
@endsection


@section('page-script')
    <script>
        $('[class*="lfm"]').each(function() {
            $(this).filemanager('image', {
                prefix: admin
            });
        });
    </script>
@endsection
