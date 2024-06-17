<x-app-layout>

    <head>
        <title>Apartments</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <style>
            /* Custom styles for pagination */
            .pagination {
                display: flex;
                justify-content: center;
                margin-top: 2rem;
            }

            .pagination > .page-item > a,
            .pagination > .page-item > span {
                color: #007bff;
                border: 1px solid #dee2e6;
                padding: 0.5rem 0.75rem;
                margin: 0 0.25rem;
                text-decoration: none;
                display: inline-block;
            }

            .pagination > .page-item.active > a,
            .pagination > .page-item.active > span {
                background-color: #007bff;
                color: #fff;
                border-color: #007bff;
            }

            .pagination > .page-item.disabled > span,
            .pagination > .page-item.disabled > a {
                color: #6c757d;
                pointer-events: none;
                background-color: #fff;
                border-color: #dee2e6;
            }

            .pagination > .page-item:first-child > a,
            .pagination > .page-item:last-child > a {
                margin: 0;
            }
        </style>
    </head>
    <body>
    <div class="container mt-5">

        <!-- Last Visited Apartment Section -->
        @if ($lastVisitedPages)
         <h2>Last Visited Pages</h2>
    <ul>
        @foreach ($lastVisitedPages as $page)
        {{--  @dd($page['title']['id'])  --}}
            <li><a href="{{ $page['url'] }}">  
             @if (is_array($page['title']) && isset($page['title']['city']))
            {{ $page['title']['city'].' '.$page['title']['street'] }}
        @else
            {{ $page['title'] }}
        @endif
         </a></li>
              @if (is_array($page['title']))
        <h1>Last Viewed Apartment</h1>
        <div class='row'>
        <div class="card mb-4">
            <div class="card-body">
                <img src="{{ $page['title']['image'] }}" class="card-img-top" alt="Apartment Image">
                <h5 class="card-title">{{ $page['title']['city'] }}</h5>
                <p>{{ $page['title']['street'] }}, {{ $page['title']['houseNumber'] }}</p>
                <p>Salary: ${{ number_format($page['title']['salary'], 2) }}</p>
                <a href="{{ route('show', $page['title']['id']) }}" class="btn btn-primary">View Details</a>
            </div>
        </div>
        </div>
        @endif
        @endforeach
    </ul>
        @endif
     
        <!-- All Apartments Section -->
        <h1 class="mb-4">All Apartments</h1>
        <div class="row">
            @foreach ($apartments as $apartment)
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <img src="{{ $apartment->image }}" class="card-img-top" alt="Apartment Image">
                    <div class="card-body">
                        <h5 class="card-title">{{ $apartment->city }}</h5>
                        <p class="card-text">{{ $apartment->street }}, {{ $apartment->houseNumber }}</p>
                        <p class="card-text">Salary: ${{ number_format($apartment->salary, 2) }}</p>
                        <a href="{{ route('show', $apartment->id) }}" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
      

    </div>
    </body>

</x-app-layout>
