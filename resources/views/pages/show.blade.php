<x-layouts.main-layout title='Accueil'>
<div class="px-20 py-20">
    <h1 class="py-5 text-xl font-black">Titre : {{ $book->title }}</h1>
    <img
            alt=""
            class="w-96"
            src="{{ $book->url_img }}"
    >
    <div class="pt-5">
            <p class="text-blue-500">Auteur : {{ $book->author }}</p>
            <p class="text-blue-500">Nombre de pages : {{ $book->nombre_pages }}</p>
            <p class="text-blue-500">Prix : {{ $book->price }}€</p>
            <p>{!! nl2br(e($book->description)) !!}</p>
    </div>
    @auth
            <div class="flex space-x-5 pt-8">
                    <a
                            class="rounded-lg bg-green-600 p-2 text-white"
                            href="{{ route('books.edit', $book->id) }}"
                    >Modifier</a>
                    <x-btn-delete :item="$book" routeItem="books.destroy"/>
            </div>
    @endauth
</div>
</x-layouts.main-layout>