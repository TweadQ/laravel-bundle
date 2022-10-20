@props(['title', 'price', 'author'])
<div class="shadow-lg">
		<div class="p-4">
				<p class="pb-3 text-lg font-black">{{ $title }}</p>
				<p>{{ $price }}€</p>
        <p>{{ $author }}</p>
		</div>
    <div class="card-actions justify-end">
      <button class="btn btn-primary">Voir</button>
    </div>
</div>
