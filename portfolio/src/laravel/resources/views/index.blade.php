<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css" rel="stylesheet">
    </head>
    <body>
        <div id="app">
            <v-app>
                <navigation app></navigation>
                <v-main>
                    <v-container fluid>
                        <router-view></router-view>
                    </v-container>
                </v-main>
                <vue-footer app></vue-footer>
            </v-app>
        </div>
        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
