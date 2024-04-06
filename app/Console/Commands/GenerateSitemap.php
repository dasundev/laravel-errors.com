<?php

namespace App\Console\Commands;

use App\Models\Error;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class GenerateSitemap extends Command
{
    protected $signature = 'sitemap:generate';

    protected $description = 'Generate the sitemap.';

    public function handle(): void
    {
        Log::alert('Generating sitemap...');

        $errors = Error::approved()
            ->pluck('slug')
            ->map(fn ($slug) => Url::create("/errors/$slug"));

        Sitemap::create()
            ->add($errors)
            ->writeToFile(public_path('sitemap.xml'));

        Log::alert('Sitemap generated successfully.');
    }
}
