<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- 会社に見つかると面倒なので、とりあえずnoindexを配置 -->
        <meta name="robots" content="noindex">
        <title>{{ config('app.name') }}</title>
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
    </head>
    <body>
        <div id="app">
            <v-app>
                <navigation></navigation>
                <v-progress-linear
                    v-if="isLoading"
                    indeterminate
                    color="blue darken-2"
                ></v-progress-linear>
                <v-main>
                    <v-container fluid>
                        <router-view>
                        </router-view>
                    </v-container>
                </v-main>
                <info-dialog></info-dialog>
                <vue-footer></vue-footer>
            </v-app>
        </div>
        <script src="{{ mix('js/manifest.js') }}"></script>
        <script src="{{ mix('js/vendor.js') }}"></script>
        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
