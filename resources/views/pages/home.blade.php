<x-layouts.main-layout title='Accueil'>
    <div class="ml-7 mt-5 grid grid-cols-3 gap-4 w-[115rem]">
    @forelse ($books as $book)
    <a href="{{ route('books.show', $book->id) }}">
            <x-cards.card
												:title="$book->title"
												:price="$book->price"
												:author="$book->author"
										/>
    </a>
    @empty
        <p>No book yet</p>
    @endforelse
    </div>
    <div class="pt-8">
        {{ $books->links() }}
    </div>

    {{-- @foreach ($books as $book) : 
         <p></p>
    @empty
        <p>No book yet</p>
    @endforeach --}}

</x-layouts.main-layout>