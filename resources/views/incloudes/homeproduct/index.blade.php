<section id="product" class="why-us section">
    <div class="container">
        <div class="row no-gutters">
            @foreach ($products as $p)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="{{ $p->image_url }}" class="card-img-top" alt="{{ $p->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $p->name }}</h5>
                            <p class="card-text">{{ $p->description }}</p>
                            <p class="card-text"><strong>Price: </strong>{{ $p->price }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>