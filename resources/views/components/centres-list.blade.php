<section class="flex flex-wrap justify-start px-1 md:px-12">
    @foreach ($centres as $centre)
        @include ('centres.card', ['centre' => $centre])
    @endforeach
</section>
