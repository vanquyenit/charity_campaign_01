const elixir = require('laravel-elixir');
require('es6-promise').polyfill();

elixir(function (mix) {
    mix.sass([
        'resources/assets/sass/base.scss',
        'resources/assets/sass/common.scss',
        'resources/assets/sass/custom.scss'
    ], 'public/css/');
    mix.sass([
        'resources/assets/sass/master.scss',
    ], 'public/css/master.css');
    mix.copy('resources/assets/css', 'public/css');
    mix.copy('resources/assets/img', 'public/img');
    mix.copy('resources/assets/js', 'public/js');

    mix.styles([
        'resources/assets/css/plugins.css',
        'resources/assets/css/main.css',
        'resources/assets/css/themes.css',
        'resources/assets/css/chat.css'
    ], 'public/css/templates.css');
    mix.styles([
        'resources/assets/css/profile_00.css',
        'resources/assets/css/profile_01.css',
        'resources/assets/css/profile_02.css',
        'resources/assets/css/profile_03.css'
    ], 'public/css/user_profile.css');
});
