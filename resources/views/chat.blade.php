<x-app-layout>

</x-app-layout>


@extends('layouts.app')
@section('title', '')

@section('scripts')
    {{--<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>--}}
    <script src="{{ asset('js/chat.js') }}" defer></script>
@endsection


@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div id="app">
                <div class="panel panel-default">
                    <div class="panel-heading">Chats</div>
                    <div class="panel-body">
                        <chat-messages :messages="messages"></chat-messages>
                    </div>
                    <div class="panel-footer">
                        <chat-form
                            v-on:Messagesent="addMessage"
                            :user="{{ Auth::user() }}"
                        ></chat-form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
    </div>
@endsection
