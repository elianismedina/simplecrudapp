<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="flex flex-col items-center justify-between mt-8">
        <h1 class="font-bold mt-4 mb-4">Edit post</h1>
        <form action="/edit-post/{{ $post->id }}" method="POST">
            @csrf
            @method('PUT')
            <input type="text" name="title" value="{{ $post->title }}"
                class="block mb-2 border rounded-md w-full">
            <textarea name="body" class="block mb-2 border rounded-md w-full">
                {{ $post->body }}
            </textarea>
            <button class="block w-full bg-black border rounded-md text-gray-200">Save changes</button>
        </form>
    </div>


</body>

</html>
