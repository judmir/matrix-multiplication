<?php

declare(strict_types=1);

namespace App\Providers;

use App\Contract\TransformerInterface;
use App\Transformer\MatrixValuesToExcelColumnCharacters;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind( TransformerInterface::class, MatrixValuesToExcelColumnCharacters::class );
    }
}
