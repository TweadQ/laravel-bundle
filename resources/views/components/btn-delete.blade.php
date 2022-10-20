@props(['item', 'routeItem'])
<div class="">
		<form
				action="{{ route($routeItem, $item->id) }}"
				method="POST"
				onsubmit="return confirm('Are you sure you want to delete this book ?')"
		>
				@csrf
				@method('DELETE')
				<button
						class="rounded-lg bg-red-500 p-3 text-white"
						type="submit"
				>Supprimer</button>
		</form>
</div>
