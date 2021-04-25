<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        {{-- <title>Laravel</title> --}}
        <style>
        </style>
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css" rel="stylesheet">
    </head>
    <body>
        <div id="app">
            <v-app>
                <navigation></navigation>
                <v-progress-linear
                    v-if="$store.state.isLoading"
                    indeterminate
                    color="blue darken-2"
                ></v-progress-linear>
                <v-main>
                    <v-container fluid>
                        <router-view>
                        </router-view>
                    </v-container>
                </v-main>
                <vue-footer></vue-footer>
            </v-app>
        </div>
        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
