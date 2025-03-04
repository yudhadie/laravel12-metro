@extends('web.templates.default')

@section('content')

<div class="container mt-5">
    <div class="row" id="cards-container">
        <!-- Skeleton cards -->
        <div class="col-lg-4 mb-4">
            <div class="card" aria-hidden="true">
                <div class="img-placeholder placeholder"></div>
                <div class="card-body">
                    <h5 class="card-title placeholder-glow">
                        <span class="placeholder col-6"></span>
                    </h5>
                    <p class="card-text placeholder-glow">
                        <span class="placeholder col-10"></span>
                        <span class="placeholder col-8"></span>
                        <span class="placeholder col-6"></span>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 mb-4">
            <div class="card" aria-hidden="true">
                <div class="img-placeholder placeholder"></div>
                <div class="card-body">
                    <h5 class="card-title placeholder-glow">
                        <span class="placeholder col-6"></span>
                    </h5>
                    <p class="card-text placeholder-glow">
                        <span class="placeholder col-10"></span>
                        <span class="placeholder col-8"></span>
                        <span class="placeholder col-6"></span>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 mb-4">
            <div class="card" aria-hidden="true">
                <div class="img-placeholder placeholder"></div>
                <div class="card-body">
                    <h5 class="card-title placeholder-glow">
                        <span class="placeholder col-6"></span>
                    </h5>
                    <p class="card-text placeholder-glow">
                        <span class="placeholder col-10"></span>
                        <span class="placeholder col-8"></span>
                        <span class="placeholder col-6"></span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('styles')

    <style>
         .placeholder {
            background: #e0e0e0;
            animation: pulse 1.5s infinite;
        }

        @keyframes pulse {
            0% {
                opacity: 1;
            }
            50% {
                opacity: 0.5;
            }
            100% {
                opacity: 1;
            }
        }

        /* Skeleton for image */
        .img-placeholder {
            width: 100%;
            height: 200px; /* Adjust this to the expected height of your images */
            background: #e0e0e0;
        }
    </style>

@endsection

@push('scripts')

    <x-admin.menu.active menu="menu-test"/>
    <script>
        const apiUrl = "http://laravel11.test/api/test";

        // Function to fetch data from the API
        async function fetchData() {
            try {
                const response = await fetch(apiUrl);
                if (!response.ok) {
                    throw new Error("Failed to fetch data");
                }
                const data = await response.json();
                renderCards(data.data);
            } catch (error) {
                console.error("Error fetching data:", error);
            }
        }

        // Function to render cards after data is fetched
        function renderCards(data) {
            const container = document.getElementById("cards-container");

            // Clear skeletons
            container.innerHTML = "";

            data.forEach(item => {
                // Create card element
                const card = document.createElement("div");
                card.classList.add("col-lg-4", "mb-4");

                card.innerHTML = `
                    <div class="card">
                        <img src="${item.photo}" class="card-img-top" alt="${item.name}" style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">${item.name}</h5>
                            <p class="card-text">${item.desc || "No description available."}</p>
                        </div>
                    </div>
                `;

                // Append card to container
                container.appendChild(card);
            });
        }

        // Trigger data fetch on page load
        fetchData();
    </script>

@endpush
