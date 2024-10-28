<x-app-layout>
    <x-slot name="header">
        <h1 class="text-heading text-2xl font-bold">Create New Tenant</h1>
    </x-slot>

    <div class="max-w-2xl mx-auto mt-10 bg-white shadow-md rounded-lg p-8">
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                <strong class="font-bold">Whoops!</strong>
                <span class="block sm:inline">There were some problems with your input.</span>
                <ul class="mt-2 list-disc list-inside text-red-600">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('tenant.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-text">Tenant Name</label>
                <input type="text" name="name" id="name" required
                    class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Enter tenant name" value="{{ old('name') }}">
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-text">Tenant Email</label>
                <input type="email" name="email" id="email" required
                    class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Enter tenant email" value="{{ old('email') }}">
            </div>

            <div class="mb-4">
                <label for="domains" class="block text-sm font-medium text-text">Domains</label>
                <input type="text" name="domains" id="domains" required
                    class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Comma separated domains" value="{{ old('domains') }}">
                <p class="mt-1 text-xs text-gray-500">
                    Example: <span class="font-medium">example, subdomain, my-site</span>
                </p>
                <p class="mt-1 text-xs text-gray-500">
                    Note: Domains should be separated by commas and should not include a dot and TLD.
                </p>
            </div>


            <div class="mb-4">
                <label for="active" class="flex items-center">
                    <input type="checkbox" name="active" id="active"
                        class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded" required>
                    <span class="ml-2 text-text">Active</span>
                </label>
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-text">Password</label>
                <input type="password" name="password" id="password" required
                    class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Enter tenant password">
            </div>

            <div class="mb-4">
                <label for="confirm_password" class="block text-sm font-medium text-text">Confirm Password</label>
                <input type="password" name="confirm_password" id="confirm_password" required
                    class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Confirm tenant password">
            </div>

            <div class="mb-6">
                <label for="data" class="block text-sm font-medium text-text">Additional Data (JSON)</label>
                <textarea name="data" id="data"
                    class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring-blue-500 focus:border-blue-500"
                    placeholder='{"key": "value"}'>{{ old('data') }}</textarea>
            </div>

            <div>
                <button type="submit"
                    class="w-full bg-oxford-blue hover:bg-hoki text-white font-bold py-2 px-4 rounded">
                    Create Tenant
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
