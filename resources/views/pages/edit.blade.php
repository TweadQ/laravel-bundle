@php
$style = 'rounded-lg w-full block mb-3';
@endphp
<x-layouts.main-layout title="Créer un nouveau livre">
		<div class="px-20 py-20">
				<h1 class="py-5 text-xl font-black">Update book</h1>
				<div class="max-w-sm">
						<form
								action="{{ route('books.update', $book->id) }}"
								enctype="multipart/form-data"
								method="post"
						>
								@csrf
                                @method('PUT')
								<div class="">
										<input
												class="{{ $style }}"
												name="title"
												placeholder="Votre titre"
												type="text"
												value="{{ old('title', $book->title) }}"
										>
										<x-error-msg name="title" />
								</div>
								<div class="">
										<textarea
										  class="{{ $style }}"
										  cols="30"
										  id=""
										  name="description"
										  rows="10"
										>{{ old('description', $book->description) }}</textarea>
										<x-error-msg name="description" />

								</div>
								<div class="">
										<input
												class="{{ $style }}"
												name="author"
												placeholder="Auteur..."
												type="text"
												value="{{ old('author', $book->author) }}"
										>
										<x-error-msg name="author" />

								</div>
								<div class="">
										<input
												class="{{ $style }}"
												name="price"
												placeholder="Prix"
												type="text"
												value="{{ old('price', $book->price) }}"
										>
										<x-error-msg name="price" />

								</div>
								<div class="">
										<input
												class="{{ $style }}"
												name="nombre_pages"
												placeholder="Nombre de pages"
												type="text"
												value="{{ old('nombre_pages', $book->nombre_pages) }}"
										>
										<x-error-msg name="nombre_pages" />

								</div>
								<div class="">
										<input
												class="{{ $style }}"
												name="url_img"
												placeholder="Votre image"
												type="file"
										>
										<x-error-msg name="url_img" />

								</div>
								<button
										class="mt-5 rounded-lg bg-indigo-500 p-2 text-white"
										type="submit"
								>Envoyer</button>
						</form>

				</div>

		</div>
</x-layouts.main-layout>