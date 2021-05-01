<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Article = new Article();
        $Article->fill(config('project.seeder.article.init_article'));
        $Article->save();
    }
}
