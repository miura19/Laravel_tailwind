<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            投稿の新規作成
        </h2>
        {{-- @if(session('message'))コンポーネント使わないときはこっち
            {{session('message')}}
        @endif --}}
        <x-message :message="session('message')"></x-message>{{-- 基本のコンポーネント--}}
        {{-- <x-amessage :message="session('message')" /> 簡易コンポーネント--}}
        {{-- <x-auth-validation-errors class="mb-4" :errors="$errors" /> --}}
    </x-slot>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mx-4 sm:p-8">
            <form method="post" action="{{route('post.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="md:flex items-center mt-8">
                    <div class="w-full flex flex-col">
                        <label for="body" class="font-semibold leading-none mt-4">件名</label>
                        <input type="text" name="title" value="{{old('title')}}" class="w-auto py-2 placeholder-gray-300 border border-gray-300 rounded-md" id="title" placeholder="Enter Title">
                        <x-auth-validation-errors name="title" />
                    </div>
                </div>

                <div class="w-full flex flex-col">
                    <label for="body" class="font-semibold leading-none mt-4">本文</label>
                    <textarea name="body" class="w-auto py-2 placeholder-gray-300 border border-gray-300 rounded-md" id="body" cols="30" rows="10">{{old('body')}}</textarea>
                    <x-auth-validation-errors name="body" />
                </div>

                <div class="w-full flex flex-col">
                    <label for="image" class="font-semibold leading-none mt-4">画像（1MBまで） </label>
                    <div>
                        <input id="image" type="file" name="image">
                        <x-validation-errors name="image" />
                    </div>
                </div>

                <x-button class="mt-4">
                    送信する
                </x-button>
                
            </form>
            zzz
        </div>
    </div>
</x-app-layout>