<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    @auth
        <div class="flow-root p-4 bg-slate-200">
            <div class="float-left">
                <p>Congrats! you are logged in!</p>
            </div>
            <form action="/logout" method="POST" class="bg-slate-400 font-bold p-2 border rounded-xl float-right">
                @csrf
                <button>Logout</button>
            </form>
        </div>
        {{-- form to create a new post --}}

        <div class="flex flex-col justify-between items-center">
            <h2 class="mb-4 font-bold mt-4 text-lg">Create a new post</h2>
            <form action="/create-post" method="POST">
                @csrf
                <input type="text" name="title" placeholder="title"
                    class="block mb-2 border rounded-md w-full bg-gray-500 text-gray-200">
                <textarea name="body" placeholder="body" class="block mb-2 border rounded-md w-full bg-gray-500 text-gray-200"></textarea>
                <button class="block w-full bg-black border rounded-md text-gray-200">Create</button>
            </form>
        </div>
        {{-- display all posts --}}
        <div class="p-4">
            <h2 class="font-bold text-2xl mb-4">All posts</h2>
            <div class="grid grid-cols-1 gap-y-4 md:grid md:grid-cols-3 md:gap-4">
                @foreach ($posts as $post)
                    <div class="bg-gray-500 p-8 border rounded-md">
                        <h2 class="font-bold text-xl mb-2 text-white">{{ $post->title }} by <span
                                class="text-xs text-white italic">{{ $post->user->name }}</span></h2>
                        <p class="text-gray-200">{{ $post['body'] }}</p>
                        {{-- buttons to edit and delete post --}}
                        <div class="flex gap-4 mt-4">
                            <p><a href="/edit-post/{{ $post->id }}"
                                    class="bg-orange-400 text-white border rounded-md w-20 px-4 py-0.5">Edit</a>
                            </p>
                            <form action="/delete-post/{{ $post->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="bg-red-400 w-20 text-white border rounded-md">Delete</button>
                            </form>
                        </div>

                    </div>
                @endforeach
            </div>
        </div>
    @else
        <div class="grid grid-cols-2">
            {{-- Registration form --}}
            <div class="flex flex-col justify-center items-center h-screen bg-slate-200">
                <div class="bg-purple-300 p-8 border rounded-md">
                    <h2 class="font-bold text-2xl mb-2 px-12">Register</h2>
                    <form action="/register" method="POST" class="text-lg">
                        @csrf
                        <input name="name" type="text" placeholder="name" class="block mb-2 border rounded-md">
                        <input name="email" type="text" placeholder="email" class="block mb-2 border rounded-md">
                        <input name="password" type="password" placeholder="password" class="block mb-4 border rounded-md">
                        <button class="block w-full bg-black border rounded-md text-gray-200">Register</button>
                    </form>
                </div>
            </div>
            {{-- Login form --}}
            <div class="flex flex-col justify-center items-center h-screen bg-slate-200">
                <div class="bg-purple-300 p-8 border rounded-md">
                    <h2 class="font-bold text-2xl mb-2 px-12">Login</h2>
                    <form action="/login" method="POST" class="text-lg">
                        @csrf
                        <input name="loginname" type="text" placeholder="name" class="block mb-2 border rounded-md">
                        <input name="loginpassword" type="password" placeholder="password"
                            class="block mb-4 border rounded-md">
                        <button class="block w-full bg-black border rounded-md text-gray-200">Login</button>
                    </form>
                </div>
            </div>
        </div>

    @endauth
</body>

</html>
