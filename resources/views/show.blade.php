<x-app-layout>

    <head>
        <title>Apartments</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>
    <body>
    <div class="container mt-5">
        <h1 class="mb-4">Apartments</h1>
        <div class="row">
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <img src="{{ $apartment->image }}" class="card-img-top" alt="Apartment Image">
                        <div class="card-body">
                            <h5 class="card-title">{{ $apartment->city }}</h5>
                            <p class="card-text">{{ $apartment->street }}, {{ $apartment->houseNumber }}</p>
                            <p class="card-text">Salary: ${{ number_format($apartment->salary, 2) }}</p>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    </body>

</x-app-layout>
