
## About

このgitレポジトリは、Hirofumi Kusabaの技術的なポートフォリオになっています。  
Vue.jsとLaravelを使用し、データベースとSPAを用いた、ウェブサイトを作成しました。  
ブログ機能やいいね機能を実装しています。  
コードについても、他のプロジェクトで再利用できるよう、自分なりに考えて記述しています。  
ぜひ隅々までご覧ください。  

* * *
## About using docker templete git repository 
### このgitレポジトリは、maxkostinevich/Laravel-Docker-Template を、ライセンスに基づいて改変したうえで、非営利・個人利用を目的として使用しています。
### This git repository is using 'maxkostinevich/Laravel-Docker-Template' for the purpose of a personal using (NOT commercial purpose), and modificated with accecpting them license.
https://github.com/maxkostinevich/Laravel-Docker-Template
https://github.com/maxkostinevich/Laravel-Docker-Template/blob/master/LICENSE

### [MIT License](https://opensource.org/licenses/MIT)
(c) 2020 [Max Kostinevich](https://maxkostinevich.com) - All rights reserved.

* * *

## Project setup (Local)
if using Windows OS with Docker Desktop
```
docker-compose up --build -d
.\php.bat
```

in docker php container
```
composer install
chown -R www-data:www-data storage/
chown -R www-data:www-data bootstrap/cache/
php artisan storage:link
php artisan migrate
```

if using Windows OS, I recommend set up npm on cmd/PowerShell
```
npm install
npm run dev
```