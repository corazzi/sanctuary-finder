<ul>
    @foreach (['cats', 'dogs', 'pigs', 'horses'] as $species)
        <li class="mb-1">
            <input type="checkbox" id="species-{{ $species }}" name="species-{{ $species }}" value=""/>
            <label for="species-{{ $species }}" class="absolute mt-px ml-4">
                {{ ucfirst($species) }}
            </label>
        </li>
    @endforeach
</ul>
